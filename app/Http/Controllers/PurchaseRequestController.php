<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Material;
use App\PurchaseRequest;
use App\SinglePurchaseRequest;
use App\Supplier;
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
            ->with('purchaseRequests', PurchaseRequest::all());
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
        if ($dups) return redirect('/purchaseRequests/create')
            ->with('error', 'Cannot create the request because it has duplicate materials!');

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
        if ($dups) return redirect('/purchaseRequests/create')
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
}
