<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        return view('pages.suppliers.index')->with('suppliers', Supplier::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'person' => 'required',
            'address' => 'required',
            'tax_type' => 'required'
        ]);

        $supplier = new Supplier(array(
            'name' => $validatedData['name'],
            'person' => $validatedData['person'],
            'address' => $validatedData['address'],
            'tax_type' => $validatedData['tax_type']
        ));

        $supplier->tax_type = $validatedData['tax_type'];
        $supplier->email = $request->input('email');
        $supplier->contact = $request->input('contact');
        $supplier->tin = $request->input('tin');
        $supplier->tax_output = $request->input('tax_output');

        $supplier->save();

        return redirect('/suppliers')
            ->with('success', 'Added new supplier '. $validatedData['name'])
            ->with('suppliers', Supplier::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * int id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.suppliers.show')->with('supplier', Supplier::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.suppliers.edit')->with('supplier', Supplier::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'person' => 'required',
            'address' => 'required',
            'tax_type' => 'required'
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $validatedData['name'];
        $supplier->person = $validatedData['person'];
        $supplier->address = $validatedData['address'];
        $supplier->tax_type = $validatedData['tax_type'];
        $supplier->email = $request->input('email');
        $supplier->contact = $request->input('contact');
        $supplier->tin = $request->input('tin');
        $supplier->tax_output = $request->input('tax_output');

        $supplier->save();

        return redirect('/suppliers')
            ->with('success', 'Updated supplier '. $validatedData['name'])
            ->with('suppliers', Supplier::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('/suppliers')
            ->with('success', 'Deleted supplier successfully!');
    }
}
