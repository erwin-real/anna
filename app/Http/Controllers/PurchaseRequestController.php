<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Material;
use App\PurchaseRequest;
use App\SinglePurchaseRequest;
use App\Supplier;
use App\Track;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { $this->middleware('auth'); }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('pages.purchase_requests.index')
            ->with('purchaseRequests',
                PurchaseRequest::where('mne', '=', '2')
                    ->orWhere('amg', '=', '2')
                    ->orWhere('coo', '=', '2')
                    ->orWhere('purchasing', '=', '2')->get()
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.purchase_requests.create')
            ->with('customers', Customer::all())
            ->with('suppliers', Supplier::all())
            ->with('materials', Material::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $my_arr = $request->get('materials');
        $dups = $new_arr = array();
        foreach ($my_arr as $key => $val) {
            if (!isset($new_arr[$val])) {
                $new_arr[$val] = $key;
            } else {
                if (isset($dups[$val])) {
                    $dups[$val][] = $key;
                } else {
                    $dups[$val] = array($key);
                }
            }
        }
        if ($dups) return redirect('/purchaseRequests/create')->with('error', 'Cannot create the request because it has duplicate materials!');

        $validatedData = $request->validate([
            'department' => 'required',
            'customer' => 'required',
            'supplier' => 'required',
            'assistant' => 'required',
            'pr' => 'required',
            'order_date' => 'required'
        ]);

        $purchaseRequest = new PurchaseRequest(array(
            'department' => $validatedData['department'],
            'customer_id' => $validatedData['customer'],
            'supplier_id' => $validatedData['supplier'],
            'assistant' => $validatedData['assistant'],
            'pr' => $validatedData['pr'],
            'order_date' => $validatedData['order_date']
        ));

        $purchaseRequest->remarks = $request->get('remarks');
        $purchaseRequest->save();

        for ($i = 0; $i < count($request->get('materials')); $i++) {
            $singlePurchaseRequest = new SinglePurchaseRequest(array(
                'material_id' => $request->get('materials')[$i],
                'purchase_request_id' => $purchaseRequest->id,
                'quantity' => $request->get('quantity')[$i]
            ));

            $singlePurchaseRequest->save();
        }

        return redirect('/purchaseRequests')
            ->with('success', 'Added New Purchase Request Successfully!')
            ->with('purchaseRequests', PurchaseRequest::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.purchase_requests.show')
            ->with('purchaseRequest', PurchaseRequest::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.purchase_requests.edit')
            ->with('purchaseRequest', PurchaseRequest::find($id))
            ->with('customers', Customer::all())
            ->with('suppliers', Supplier::all())
            ->with('materials', Material::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $my_arr = $request->get('materials');
        $dups = $new_arr = array();
        foreach ($my_arr as $key => $val) {
            if (!isset($new_arr[$val])) {
                $new_arr[$val] = $key;
            } else {
                if (isset($dups[$val])) {
                    $dups[$val][] = $key;
                } else {
                    $dups[$val] = array($key);
                }
            }
        }
        if ($dups) return redirect('/purchaseRequests/'.$id.'/edit')
            ->with('error', 'Cannot update the request because it has duplicate materials!');

        $validatedData = $request->validate([
            'department' => 'required',
            'customer' => 'required',
            'supplier' => 'required',
            'assistant' => 'required',
            'pr' => 'required',
            'order_date' => 'required'
        ]);

        $purchaseRequest = PurchaseRequest::find($id);
        $purchaseRequest->department = $validatedData['department'];
        $purchaseRequest->customer_id = $validatedData['customer'];
        $purchaseRequest->supplier_id = $validatedData['supplier'];
        $purchaseRequest->assistant = $validatedData['assistant'];
        $purchaseRequest->pr = $validatedData['pr'];
        $purchaseRequest->order_date = $validatedData['order_date'];
        $purchaseRequest->remarks = $request->get('remarks');
        $purchaseRequest->save();

        foreach ($purchaseRequest->singlePurchaseRequests as $singlePurchaseRequest) $singlePurchaseRequest->delete();

        for ($i = 0; $i < count($request->get('materials')); $i++) {
            $singlePurchaseRequest = new SinglePurchaseRequest(array(
                'material_id' => $request->get('materials')[$i],
                'purchase_request_id' => $purchaseRequest->id,
                'quantity' => $request->get('quantity')[$i]
            ));

            $singlePurchaseRequest->save();
        }

        return redirect('/purchaseRequests')
            ->with('success', 'Updated Purchase Request Successfully!')
            ->with('purchaseRequests', PurchaseRequest::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $purchaseRequest = PurchaseRequest::find($id);
        foreach ($purchaseRequest->singlePurchaseRequests as $singlePurchaseRequest) $singlePurchaseRequest->delete();
        $purchaseRequest->delete();

        return redirect('/purchaseRequests')
            ->with('success', 'Deleted Purchase Request Successfully!');
    }

    public function updateStatus($id, Request $request) {
        $purchaseRequest = PurchaseRequest::find($id);

        if ($request->get('type') == "MNE") {
            $purchaseRequest->mne = $request->input('status');
            $purchaseRequest->mne_date = Carbon::now();
            $purchaseRequest->mne_remarks = $request->input('remarks');
        } elseif ($request->get('type') == "AMG") {
            $purchaseRequest->amg = $request->input('status');
            $purchaseRequest->amg_date = Carbon::now();
            $purchaseRequest->amg_remarks = $request->input('remarks');
        } elseif ($request->get('type') == "COO") {
            $purchaseRequest->coo = $request->input('status');
            $purchaseRequest->coo_date = Carbon::now();
            $purchaseRequest->coo_remarks = $request->input('remarks');
        } elseif ($request->get('type') == "PURCHASING") {
            $purchaseRequest->purchasing = $request->input('status');
            $purchaseRequest->purchasing_date = Carbon::now();
            $purchaseRequest->purchasing_remarks = $request->input('remarks');
        }
        $purchaseRequest->save();

        return redirect('/purchaseRequests')
            ->with('success', 'Updated Purchase Request Successfully!');
    }

    public function purchaseOrders() {
        $matchThese = ['mne' => 1, 'amg' => 1, 'coo' => 1, 'purchasing' => 1, 'received' => 0];
        return view('pages.purchase_orders.index')
            ->with('purchaseRequests', PurchaseRequest::where($matchThese)->get());
    }

    public function showPurchaseOrders($id) {
        return view('pages.purchase_orders.show')
            ->with('purchaseRequest', PurchaseRequest::find($id));
    }

    public function receivingReceipt() {
        return view('pages.receiving_receipt.index')
            ->with('purchaseRequests', PurchaseRequest::where('received', '=', '1')->get());
    }

    public function createRR(Request $request) {
        $purchaseRequest = PurchaseRequest::find($request->input('id'));
        if ($purchaseRequest->mne == 1 && $purchaseRequest->amg == 1 &&
            $purchaseRequest->coo == 1 && $purchaseRequest->purchasing == 1) {
            $purchaseRequest->received = true;
            foreach ($purchaseRequest->singlePurchaseRequests as $singlePurchaseRequest) {
                $material = Material::find($singlePurchaseRequest->material_id);

                $track = new Track(array(
                    'material_id' => $material->id,
                    'previous' => $material->stocks,
                    'user_id' => auth()->user()->id
                ));

                $material->stocks += $singlePurchaseRequest->quantity;
                $material->save();

                $track->updated = $material->stocks;
                $track->date_modified = $material->updated_at;
                $track->save();
            }
            $purchaseRequest->save();

            return redirect('/receivingReceipts')
                ->with('success', 'Created Receiving Receipt Successfully!');
        }
    }

    public function receivingReceiptShow($id) {
        return view('pages.receiving_receipt.show')
            ->with('purchaseRequest', PurchaseRequest::find($id));
    }

    public function purchaseSummary() {
        return view('pages.purchase_summary.index')
            ->with('purchaseRequests', PurchaseRequest::all());
    }

    public function destroyRR($id) {
        $purchaseRequest = PurchaseRequest::find($id);
        foreach ($purchaseRequest->singlePurchaseRequests as $singlePurchaseRequest) $singlePurchaseRequest->delete();
        $purchaseRequest->delete();

        return redirect('/receivingReceipts')
            ->with('success', 'Deleted Receiving Receipt Successfully!');
    }
}
