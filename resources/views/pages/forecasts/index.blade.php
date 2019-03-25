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
                <div class="card shadow">
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
                                            <th>Item</th>
                                            <th>Year</th>
                                            <th>Date Created</th>
                                            <th>Date Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($forecasts as $forecast)
                                            <tr>
                                                <td><a href="/forecasts/{{$forecast->id}}">{{ $forecast->item }}</a></td>
                                                <td>{{ $forecast->year }} - {{ $forecast->year+3 }}</td>
                                                <td>{{ date('D M d, Y', strtotime($forecast->created_at)) }}</td>
                                                <td>{{ date('D M d, Y', strtotime($forecast->updated_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>


    </div>

@endsection