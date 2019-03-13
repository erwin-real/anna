<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
        return view('pages.materials.index')->with('materials', Material::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.materials.create');
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

        $material = new Material(array(
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

        $material->other_desc = $request->get('other_desc');
        $material->retail = $request->input('retail') == 'on' ? 1 : 0;
        $material->srp = $request->get('srp');
        $material->discount = $request->get('discount');
        $material->dealer_price = $request->get('dealer_price');
        $material->distributor_price = $request->get('distributor_price');
        $material->tax_exempt = $request->input('tax_exempt') == 'on' ? 1 : 0;
        $material->public_price = $request->get('public_price');
        $material->purchase_cost = $request->get('purchase_cost');
        $material->save();

        return redirect('/materials')
            ->with('success', 'Added new material ')
            ->with('materials', Material::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.materials.show')->with('material', Material::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.materials.edit')->with('material', Material::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
