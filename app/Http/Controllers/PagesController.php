<?php

namespace App\Http\Controllers;

use App\Charts\MyChart;
use App\Customer;
use App\Material;
use App\PurchaseRequest;
use App\Supplier;
use App\Track;
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
            ->with('purchaseRequests', PurchaseRequest::where('amg', '=', '2')->get());
    }

    public function track() {
//        if ($this->isUserType('admin') || $this->isUserType('seller'))
            return view('pages.tracks.index')->with('tracks', Track::orderBy('date_modified','desc')->paginate(20));

//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function destroyTrack($id) {
//        if ($this->isUserType('admin')) {
            $track = Track::find($id);
            $track->delete();
            return redirect('/tracks')->with('success', 'Deleted Successfully');
//        }
//
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }

    public function destroyAllTracks() {
//        if ($this->isUserType('admin')) {
            foreach (Track::all() as $item) {
                $track = Track::find($item->id);
                $track->delete();
            }
        return redirect('/tracks')->with('success', 'Deleted Successfully');
//        }
//
//        return redirect('/')->with('error', 'You don\'t have the privilege');
    }
}
