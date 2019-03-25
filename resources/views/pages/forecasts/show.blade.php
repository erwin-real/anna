@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid mb-5">
            <h1 class="h2 mb-0 text-gray-800">{{$forecast->item}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/forecasts">Forecasts</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$forecast->item}} {{$forecast->year}}</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="mt-5 col-12">
                <div class="card shadow">
                    <div class="card-header ">
                        <h5>Forecast's Information</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Item') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$forecast->item}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 text-center"><b>Time Series of {{$forecast->item}}</b></label>
                            <div class="col-12">
                                {!! $chart->container() !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 table-responsive text-center">
                                <table class="table table-hover table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Quarter</th>
                                            <th>Demand</th>
                                            <th>Center Moving Average (4-Period)</th>
                                            <th>Forecast</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $quarter = 1;
                                            $year = $forecast->year;
                                            for ($i = 0; $i < 16; $i++) {
                                                echo '<tr>';
                                                echo '<td class="p-0">'. $year . '</td>';
                                                echo '<td class="p-0">'. $quarter .'</td>';
                                                echo '<td class="p-0">'. $demandsFinal[$i] .'</td>';
                                                echo '<td class="p-0">'. $CMAFinal[$i] .'</td>';
                                                echo '<td class="p-0">'. $forecastsFinal[$i] .'</td>';
                                                echo '</tr>';
                                                $quarter++;
                                                if ($quarter == 5) {
                                                    $quarter = 1;
                                                    $year++;
                                                }
                                            }
                                        @endphp
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Added at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y h:i a', strtotime($forecast->created_at)) }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Updated at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y h:i a', strtotime($forecast->updated_at)) }}</span>
                            </div>
                        </div>

                        <a href="{{ action('ForecastController@edit', $forecast->id) }}" class="btn btn-outline-info float-left mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delUserModal">
                            <i class="fas fa-trash fa-sm fa-fw"></i>
                            Delete
                        </button>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
            <a href="/forecasts" class="btn btn-outline-primary mt-3"><i class="fas fa-chevron-left"></i> Back</a>
        </div>
    </div>

    <div class="modal fade" id="delUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this forecast?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure on deleting this forecast.</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form id="delete" method="POST" action="{{ action('ForecastController@destroy', $forecast->id) }}" class="float-left mb-0">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

<script src="/js/vue.js"></script>
<script src="/js/echarts-en.min.js"></script>
{!! $chart->script() !!}

<script src="/js/highcharts.js"></script>