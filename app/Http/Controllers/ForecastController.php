<?php

namespace App\Http\Controllers;

use App\Charts\MyChart;
use App\Forecast;
use App\SingleForecast;
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
            ->with('forecasts', Forecast::orderBy('updated_at', 'desc')->paginate(20));
//            ->with('chart', $this->createChart());
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
            'item' => 'required',
            'year' => 'required',
            'demand' => 'required'
        ]);
//        dd($validatedData);

        $forecast = new Forecast(array(
            'item' => $validatedData['item'],
            'year' => $validatedData['year']
        ));

//        $forecast->save();
        $count = 0;

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $singleForecast = new SingleForecast(array(
                    'forecast_id' => $forecast->id,
                    'year' => ($validatedData['year']+$i),
                    'quarter' => $j+1,
                    'demand' => $validatedData['demand'][$count]
                ));
                $count++;
//                $singleForecast->save();
//                echo ($validatedData['year']+$i).'<br>';
            }
        }

        $chart = $this->createChart( $validatedData['demand']);

        return redirect('/forecasts/'.$forecast->id)
            ->with('success', 'Added New Forecast for '. $validatedData['item'] .' Successfully!')
            ->with('forecast', Forecast::find($forecast->id));
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

    public function createChart($demands) {
        $data = $this->calculate($demands);

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

    public function calculate($demands) {
        $MA = collect();
        $CMA = collect();
        $SI = collect();
        $S = collect();
        $deseasonalize = collect();
        $T = collect();
        $forecast = collect();

        for ($i = 0; $i < 9; $i++) $MA->push(($demands[$i] + $demands[$i+1] + $demands[$i+2] + $demands[$i+3])/4);
        for ($i = 0; $i < 8; $i++) {
            $CMA->push(($MA[$i] + $MA[$i+1])/2);
            $SI->push($demands[$i+2]/$CMA[$i]);
        }

        dd($SI);



//        $xy1->push((($demands[$i + 24]) * ($i+1)));
//        $x2->push(($i+1)*($i+1));
//        $xTotal += ($i+1);
//        $y1Total += $size4Raw[$i + 24];
//        $xBar = ($xTotal/12);
//        $y1Bar = ($y1Total/12);
//        $a1 = ($y1Bar-($b1*$xBar));
//        $b1 = ( ($xy1Total-(12*$xBar*$y1Bar))/($x2Total-(12*$xBar*$xBar)) );
//        $size4LRF->push(ceil($a1+($b1*$i)));
    }
}
