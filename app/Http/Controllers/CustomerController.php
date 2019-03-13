<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        return view('pages.customers.index')->with('customers', Customer::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.customers.create');
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
            'address' => 'required'
        ]);

        $customer = new Customer(array(
            'name' => $validatedData['name'],
            'address' => $validatedData['address']
        ));

        $customer->type = $request->input('type');
        $customer->person = $request->input('person');
        $customer->email = $request->input('email');
        $customer->contact = $request->input('contact');
        $customer->tin = $request->input('tin');

        $customer->save();

        return redirect('/customers')
            ->with('success', 'Added new customer '. $validatedData['name'])
            ->with('customers', Customer::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * int id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.customers.show')->with('customer', Customer::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.customers.edit')->with('customer', Customer::find($id));
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
            'address' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->name = $validatedData['name'];
        $customer->address = $validatedData['address'];
        $customer->email = $request->input('email');
        $customer->person = $request->input('person');
        $customer->email = $request->input('email');
        $customer->contact = $request->input('contact');
        $customer->tin = $request->input('tin');
        $customer->type = $request->input('type');

        $customer->save();

        return redirect('/customers')
            ->with('success', 'Updated customer '. $validatedData['name'])
            ->with('customers', Customer::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers')
            ->with('success', 'Deleted customer successfully!');
    }
}
