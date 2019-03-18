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
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/supplier', $fileNameToStore);
        } else $fileNameToStore = 'noimage.jpg';

        $supplier = new Supplier(array(
            'name' => $validatedData['name'],
            'person' => $validatedData['person'],
            'address' => $validatedData['address']
        ));

        $supplier->email = $request->input('email');
        $supplier->contact = $request->input('contact');
        $supplier->tin = $request->input('tin');
        $supplier->image = $fileNameToStore;

        $supplier->save();

        return redirect('/suppliers')
            ->with('success', 'Added New Supplier '. $validatedData['name'] .' Successfully!')
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
            'cover_image' => 'image|nullable|max:1999'
        ]);

        $supplier = Supplier::find($id);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/supplier', $fileNameToStore);
            $supplier->image = $fileNameToStore;
        }

        $supplier->name = $validatedData['name'];
        $supplier->person = $validatedData['person'];
        $supplier->address = $validatedData['address'];
        $supplier->email = $request->input('email');
        $supplier->contact = $request->input('contact');
        $supplier->tin = $request->input('tin');

        $supplier->save();

        return redirect('/suppliers')
            ->with('success', 'Updated Supplier '. $validatedData['name'] .' Successfully!')
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
            ->with('success', 'Deleted Supplier Successfully!');
    }
}
