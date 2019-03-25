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

        $forecast = new Forecast(array(
            'item' => $validatedData['item'],
            'year' => $validatedData['year']
        ));

        $forecast->save();
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
                $singleForecast->save();
            }
        }

        $data = $this->createChart($validatedData['demand'], $validatedData['year']);

        return redirect('/forecasts/'.$forecast->id)
            ->with('success', 'Added New Forecast for '. $validatedData['item'] .' Successfully!')
            ->with('forecast', Forecast::find($forecast->id))
            ->with('chart', $data['chart']);
    }

    /**
     * Display the specified resource.
     *
     * int id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $forecast = Forecast::find($id);
        $demands = collect();
        foreach ($forecast->singleForecasts as $singleForecast) $demands->push($singleForecast->demand);

        $data = $this->createChart($demands, $forecast->year);

        return view('pages.forecasts.show')
            ->with('forecast', $forecast)
            ->with('chart', $data['chart'])
            ->with('forecastsFinal', $data['forecasts'])
            ->with('CMAFinal', $data['CMAFinal'])
            ->with('demandsFinal', $data['demandsFinal']);
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
            'item' => 'required',
            'year' => 'required',
            'demand' => 'required'
        ]);

        $forecast = Forecast::find($id);
        $forecast->item = $validatedData['item'];
        $forecast->year = $validatedData['year'];
        $forecast->save();

        foreach ($forecast->singleForecasts as $singleForecast) $singleForecast->delete();

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
                $singleForecast->save();
            }
        }

        $data = $this->createChart($validatedData['demand'], $validatedData['year']);

        return redirect('/forecasts/'.$forecast->id)
            ->with('success', 'Updated Forecast for '. $validatedData['item'] .' Successfully!')
            ->with('forecast', Forecast::find($forecast->id))
            ->with('chart', $data['chart']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $forecast = Forecast::find($id);
        foreach ($forecast->singleForecasts as $singleForecast) $singleForecast->delete();
        $forecast->delete();

        return redirect('/forecasts')
            ->with('success', 'Deleted Forecast Successfully!');
    }

    public function createChart($demands, $year) {
        $data = $this->calculate($demands);

        $dates = collect();
        for ($i = 0; $i < 4; $i++) {
            for ($j = 1; $j <= 4; $j++) $dates->push($j.'Q '.($year+$i));
        }

        $chart = new MyChart;
        $chart->labels($dates->toArray());
        $chart->dataset('Forecast', 'line', $data['forecasts']->toArray())->options(['color' => '#38c172',]);
        $chart->dataset('Center Moving Average (4-Period)', 'line', $data['CMAFinal']->toArray())->options(['color' => '#e74a3b ',]);
        $chart->dataset('Demand', 'line', $data['demandsFinal']->toArray())->options(['color' => '#3490dc',]);

        return array(
            'chart' => $chart,
            'forecasts' => $data['forecasts'],
            'CMAFinal' => $data['CMAFinal'],
            'demandsFinal' => $data['demandsFinal']
        );
    }

    public function calculate($demands) {
        $MA = collect();
        $CMA = collect();
        $SI = collect();
        $St = collect();
        $deseasonalize = collect();

        $xy = collect();
        $xTotal = 0;
        $yTotal = 0;
        $xyTotal = 0;
        $x2Total = 0;

        $Tt = collect();
        $forecasts = collect();

        $CMAFinal = collect();
        $demandsFinal = collect();

        for ($i = 0; $i < 9; $i++) $MA->push(($demands[$i] + $demands[$i+1] + $demands[$i+2] + $demands[$i+3])/4);
        for ($i = 0; $i < 8; $i++) {
            $CMA->push(($MA[$i] + $MA[$i+1])/2);
            $SI->push($demands[$i+2]/$CMA[$i]);
        }

        for ($i = 0; $i < 4; $i++) {
            $St->push(($SI[2] + $SI[6])/2);
            $St->push(($SI[3] + $SI[7])/2);
            $St->push(($SI[0] + $SI[4])/2);
            $St->push(($SI[1] + $SI[5])/2);
        }

        for ($i = 0; $i < 12; $i++) {
            $deseasonalize->push($demands[$i]/$St[$i]);
            $xTotal += ($i+1);
            $xy->push(($deseasonalize[$i]*($i+1)));
            $xyTotal += ($deseasonalize[$i]*($i+1));
            $yTotal += $deseasonalize[$i];
            $x2Total += (($i+1) * ($i+1));
        }
        $xBar = ($xTotal/12);
        $yBar = ($yTotal/12);

        $b = ( ($xyTotal-(12*$xBar*$yBar))/($x2Total-(12*$xBar*$xBar)) );
        $a = ($yBar-($b*$xBar));

        for ($i = 1; $i <= 16; $i++) $Tt->push($a + ($b * $i));
        for ($i = 0; $i < 16; $i++) $forecasts->push(round(($St[$i] * $Tt[$i]),2));

        for ($i = 0; $i < 16; $i++) {
            if ($i < 12) $demandsFinal->push($demands[$i]);
            else $demandsFinal->push(null);

            if ($i >= 2 && $i <= 9) $CMAFinal->push(round($CMA[($i-2)], 2));
            else $CMAFinal->push(null);
        }

        return array(
            'forecasts' => $forecasts,
            'CMAFinal' => $CMAFinal,
            'demandsFinal' => $demandsFinal
        );
    }
}
