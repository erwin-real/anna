<?php

namespace App\Http\Controllers;

use App\Charts\MyChart;
use App\Customer;
use App\Material;
use App\PurchaseRequest;
use App\Supplier;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { $this->middleware('auth'); }

    public function dashboard() {
        return view('pages.dashboard')
            ->with('customers', Customer::all())
            ->with('suppliers', Supplier::all())
            ->with('materials', Material::all())
            ->with('purchaseRequests', PurchaseRequest::all());
    }
}
