@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Forecasts</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Forecasts</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Forecasts</h5>
                    <a href="/forecasts/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Forecast</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($forecasts->isEmpty())
                        <p> There are no forecasts yet.</p>
                    @else
                        {{--{{$forecasts->links()}}--}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Forecast Name</th>
                                    <th>Contact Person</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th>Forecast Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($forecasts as $forecast)
                                    <tr>
                                        <td><a href="/forecasts/{{$forecast->id}}">{{ $forecast->name }}</a></td>
                                        <td>{{ $forecast->person }}</td>
                                        <td>{{ $forecast->address }}</td>
                                        <td>{{ $forecast->email }}</td>
                                        <td>{{ $forecast->type }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <div class="card-body mt-2">
                    {!! $chart->container() !!}
                </div>
            </div>

        </div>
        </div>


    </div>

@endsection

<script src="/js/vue.js"></script>
<script src="/js/echarts-en.min.js"></script>
{!! $chart->script() !!}

<script src="/js/highcharts.js"></script>