<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Material;
use App\EncodingOut;
use App\SingleEncodingOut;
use App\Supplier;
use App\Track;
use Carbon\Carbon;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class EncodingOutController extends Controller
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
        return view('pages.encoding_outs.index')
            ->with('encodingOuts', EncodingOut::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.encoding_outs.create')
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
        if ($dups) return redirect('/encodingOuts/create')->with('error', 'Cannot create the MIR Encoding Out because it has duplicate materials!');

        $validatedData = $request->validate([
            'department' => 'required',
            'customer' => 'required',
            'supplier' => 'required',
            'assistant' => 'required',
            'eo' => 'required',
            'order_date' => 'required',
            'date_delivered' => 'required'
        ]);

        $encodingOut = new EncodingOut(array(
            'department' => $validatedData['department'],
            'customer_id' => $validatedData['customer'],
            'supplier_id' => $validatedData['supplier'],
            'assistant' => $validatedData['assistant'],
            'eo' => $validatedData['eo'],
            'order_date' => $validatedData['order_date'],
            'date_delivered' => $validatedData['date_delivered']
        ));

        $encodingOut->remarks = $request->get('remarks');
        $encodingOut->save();

        for ($i = 0; $i < count($request->get('materials')); $i++) {
            $singleEncodingOut = new SingleEncodingOut(array(
                'material_id' => $request->get('materials')[$i],
                'encoding_out_id' => $encodingOut->id,
                'quantity' => $request->get('quantity')[$i]
            ));

            $singleEncodingOut->save();
        }

        return redirect('/encodingOuts')
            ->with('success', 'Added New MIR Encoding Out Successfully!')
            ->with('encodingOuts', EncodingOut::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.encoding_outs.show')
            ->with('encodingOut', EncodingOut::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EncodingOut  $encodingOut
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.encoding_outs.edit')
            ->with('encodingOut', EncodingOut::find($id))
            ->with('customers', Customer::all())
            ->with('suppliers', Supplier::all())
            ->with('materials', Material::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EncodingOut  $encodingOut
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
        if ($dups) return redirect('/encodingOuts/'.$id.'/edit')
            ->with('error', 'Cannot update the MIR Encoding Out because it has duplicate materials!');

        $validatedData = $request->validate([
            'department' => 'required',
            'customer' => 'required',
            'supplier' => 'required',
            'assistant' => 'required',
            'pr' => 'required',
            'order_date' => 'required',
            'date_delivered' => 'required'
        ]);

        $encodingOut = EncodingOut::find($id);
        $encodingOut->department = $validatedData['department'];
        $encodingOut->customer_id = $validatedData['customer'];
        $encodingOut->supplier_id = $validatedData['supplier'];
        $encodingOut->assistant = $validatedData['assistant'];
        $encodingOut->pr = $validatedData['pr'];
        $encodingOut->order_date = $validatedData['order_date'];
        $encodingOut->remarks = $request->get('remarks');
        $encodingOut->save();

        foreach ($encodingOut->singleEncodingOuts as $singleEncodingOut) $singleEncodingOut->delete();

        for ($i = 0; $i < count($request->get('materials')); $i++) {
            $singleEncodingOut = new SingleEncodingOut(array(
                'material_id' => $request->get('materials')[$i],
                'encoding_out_id' => $encodingOut->id,
                'quantity' => $request->get('quantity')[$i]
            ));

            $singleEncodingOut->save();
        }

        return redirect('/encodingOuts')
            ->with('success', 'Updated MIR Encoding Out Successfully!')
            ->with('encodingOuts', EncodingOut::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EncodingOut  $encodingOut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $encodingOut = EncodingOut::find($id);
        foreach ($encodingOut->singleEncodingOuts as $singleEncodingOut) $singleEncodingOut->delete();
        $encodingOut->delete();

        return redirect('/encodingOuts')
            ->with('success', 'Deleted MIR Encoding Out Successfully!');
    }
}
