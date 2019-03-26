@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">MIR Encoding Outs</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">MIR Encoding Outs</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="float-left">MIR Encoding Outs</h5>
                        @if(strtoupper(Auth::user()->type) == 'COORDINATOR')
                            <a href="/encodingOuts/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add MIR Encoding Out</a>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="card-body mt-2">
                        @if ($encodingOuts->isEmpty())
                            <p> There are no encoding outs yet.</p>
                        @else
                            {{--{{$encodingOuts->links()}}--}}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>MIR #</th>
                                        <th>PR #</th>
                                        <th>Department</th>
                                        <th>Customer</th>
                                        <th>Supplier</th>
                                        <th>Coordinator</th>
                                        <th>Order Date</th>
                                        <th>Date Delivered</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($encodingOuts as $encodingOut)
                                            <tr>
                                                <td><a href="/encodingOuts/{{$encodingOut->id}}">{{$encodingOut->mir}}</a></td>
                                                <td>{{ $encodingOut->pr }}</td>
                                                <td>{{ $encodingOut->department }}</td>
                                                <td><a href="/customers/{{$encodingOut->customer->id}}">{{ $encodingOut->customer->name }}</a></td>
                                                <td><a href="/suppliers/{{$encodingOut->supplier->id}}">{{ $encodingOut->supplier->name }}</a></td>
                                                <td><a href="/users/{{$encodingOut->user->id}}">{{ $encodingOut->user->fname }} {{ $encodingOut->user->lname }}</a></td>
                                                <td>{{date('D M d, Y', strtotime($encodingOut->order_date))}}</td>
                                                <td>{{date('D M d, Y | h:i a', strtotime($encodingOut->date_delivered))}}</td>
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