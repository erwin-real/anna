<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        return view('pages.products.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'plu' => 'required',
            'main_desc' => 'required',
            'brand' => 'required',
            'supplier' => 'required',
            'category' => 'required',
            'tax' => 'required',
            'primary_unit' => 'required',
            'unit_measurement' => 'required',
            'type' => 'required',
        ]);

        $product = new Product(array(
            'plu' => $validatedData['plu'],
            'main_desc' => $validatedData['main_desc'],
            'brand' => $validatedData['brand'],
            'supplier' => $validatedData['supplier'],
            'category' => $validatedData['category'],
            'tax' => $validatedData['tax'],
            'primary_unit' => $validatedData['primary_unit'],
            'unit_measurement' => $validatedData['unit_measurement'],
            'type' => $validatedData['type']
        ));

        $product->other_desc = $request->get('other_desc');
        $product->retail = $request->input('retail') == 'on' ? 1 : 0;
        $product->srp = $request->get('srp');
        $product->discount = $request->get('discount');
        $product->dealer_price = $request->get('dealer_price');
        $product->distributor_price = $request->get('distributor_price');
        $product->tax_exempt = $request->input('tax_exempt') == 'on' ? 1 : 0;
        $product->public_price = $request->get('public_price');
        $product->purchase_cost = $request->get('purchase_cost');
        $product->save();

        return redirect('/products')
            ->with('success', 'Added New Product Successfully!')
            ->with('products', Product::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.products.show')->with('product', Product::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.products.edit')->with('product', Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'plu' => 'required',
            'main_desc' => 'required',
            'brand' => 'required',
            'supplier' => 'required',
            'category' => 'required',
            'tax' => 'required',
            'primary_unit' => 'required',
            'unit_measurement' => 'required',
            'type' => 'required',
        ]);

        $product = Product::find($id);
        $product->plu = $validatedData['plu'];
        $product->main_desc = $validatedData['main_desc'];
        $product->brand = $validatedData['brand'];
        $product->supplier = $validatedData['supplier'];
        $product->category = $validatedData['category'];
        $product->tax = $validatedData['tax'];
        $product->primary_unit = $validatedData['primary_unit'];
        $product->unit_measurement = $validatedData['unit_measurement'];
        $product->type = $validatedData['type'];

        $product->other_desc = $request->get('other_desc');
        $product->retail = $request->input('retail') == 'on' ? 1 : 0;
        $product->srp = $request->get('srp');
        $product->discount = $request->get('discount');
        $product->dealer_price = $request->get('dealer_price');
        $product->distributor_price = $request->get('distributor_price');
        $product->tax_exempt = $request->input('tax_exempt') == 'on' ? 1 : 0;
        $product->public_price = $request->get('public_price');
        $product->purchase_cost = $request->get('purchase_cost');
        $product->save();

        return redirect('/products')
            ->with('success', 'Updated product Successfully!')
            ->with('products', Product::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')
            ->with('success', 'Deleted product Successfully!');
    }
}