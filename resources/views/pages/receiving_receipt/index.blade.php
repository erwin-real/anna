@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Receiving Receipts</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Receiving Receipts</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="float-left">Receiving Receipts</h5>
                        @if(strtoupper(Auth::user()->type) == 'COORDINATOR')
                            {{--<a href="/purchaseRequests/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Purchase Request</a>--}}
                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="card-body mt-2">
                        @if ($purchaseRequests->isEmpty())
                            <p> There are no receiving receipts yet.</p>
                        @else
                            {{--{{$purchaseRequests->links()}}--}}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>PR #</th>
                                        <th>Department</th>
                                        <th>Customer</th>
                                        <th>Supplier</th>
                                        <th>Coordinator</th>
                                        <th>Warehouse Assistant</th>
                                        <th>Received by</th>
                                        <th>Date Created</th>
                                        <th>Order Date</th>
                                        <th>Date Received</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchaseRequests as $purchaseRequest)
                                            <tr>
                                                <td><a href="/receivingReceipts/{{$purchaseRequest->id}}">{{$purchaseRequest->pr}}</a></td>
                                                <td>{{ $purchaseRequest->department }}</td>
                                                <td><a href="/customers/{{$purchaseRequest->customer->id}}">{{ $purchaseRequest->customer->name }}</a></td>
                                                <td><a href="/suppliers/{{$purchaseRequest->supplier->id}}">{{ $purchaseRequest->supplier->name }}</a></td>
                                                <td><a href="/users/{{$purchaseRequest->user->id}}">{{ $purchaseRequest->user->fname }} {{ $purchaseRequest->user->lname }}</a></td>
                                                <td><a href="/users/{{$purchaseRequest->warehouse_user->id}}">{{ $purchaseRequest->warehouse_user->fname }} {{ $purchaseRequest->warehouse_user->lname }}</a></td>
                                                <td><a href="/users/{{$purchaseRequest->received_user->id}}">{{ $purchaseRequest->received_user->fname }} {{ $purchaseRequest->received_user->lname }}</a></td>
                                                <td>{{date('D M d, Y | h:i a', strtotime($purchaseRequest->created_at))}}</td>
                                                <td>{{date('D M d, Y', strtotime($purchaseRequest->order_date))}}</td>
                                                <td>{{date('D M d, Y | h:i a', strtotime($purchaseRequest->date_received))}}</td>
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