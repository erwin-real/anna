<?php

namespace App\Http\Controllers;

use App\Charts\MyChart;
use App\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
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
        return view('pages.forecasts.index')
            ->with('forecasts', Forecast::orderBy('updated_at', 'desc')->paginate(20))
            ->with('chart', $this->createChart());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('pages.forecasts.create');
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
            'address' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/forecast', $fileNameToStore);
        } else $fileNameToStore = 'noimage.jpg';

        $forecast = new Forecast(array(
            'name' => $validatedData['name'],
            'address' => $validatedData['address']
        ));

        $forecast->type = $request->input('type');
        $forecast->person = $request->input('person');
        $forecast->email = $request->input('email');
        $forecast->contact = $request->input('contact');
        $forecast->tin = $request->input('tin');
        $forecast->image = $fileNameToStore;

        $forecast->save();

        return redirect('/forecasts')
            ->with('success', 'Added New Forecast '. $validatedData['name'] .' Successfully!')
            ->with('forecasts', Forecast::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Display the specified resource.
     *
     * int id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('pages.forecasts.show')->with('forecast', Forecast::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return view('pages.forecasts.edit')->with('forecast', Forecast::find($id));
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
            'cover_image' => 'image|nullable|max:1999'
        ]);

        $forecast = Forecast::find($id);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/forecast', $fileNameToStore);
            $forecast->image = $fileNameToStore;
        }

        $forecast->name = $validatedData['name'];
        $forecast->address = $validatedData['address'];
        $forecast->email = $request->input('email');
        $forecast->person = $request->input('person');
        $forecast->email = $request->input('email');
        $forecast->contact = $request->input('contact');
        $forecast->tin = $request->input('tin');
        $forecast->type = $request->input('type');

        $forecast->save();

        return redirect('/forecasts')
            ->with('success', 'Updated Forecast '. $validatedData['name'] .' Successfully!')
            ->with('forecasts', Forecast::orderBy('updated_at', 'desc')->paginate(20));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $forecast = Forecast::find($id);
        $forecast->delete();

        return redirect('/forecasts')
            ->with('success', 'Deleted Forecast Successfully!');
    }

    public function createChart() {

        $chart = new MyChart;
        $chart->labels([1,2,3,4]);
        $chart->dataset('Total', 'line', [3,1,5,2])->options(['color' => '#3490dc',]);
        $chart->dataset('Capital', 'line', [7,2,5,3])->options(['color' => '#6c757d',]);
        $chart->dataset('Income', 'line', [4,1,7,5])->options(['color' => '#38c172',]);

    //        $chart = new MyChart;
    //        $chart->labels(array_slice($data['dates']->toArray(), -7));
    //        $chart->dataset('Total', 'line', array_slice($data['totals']->toArray(), -7))->options(['color' => '#3490dc',]);
    //        $chart->dataset('Capital', 'line', array_slice($data['capitals']->toArray(), -7))->options(['color' => '#6c757d',]);
    //        $chart->dataset('Income', 'line', array_slice($data['incomes']->toArray(), -7))->options(['color' => '#38c172',]);

        return $chart;
    }
}
