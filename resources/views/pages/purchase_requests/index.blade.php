@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Purchase Requests</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Requests</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Purchase Requests</h5>
                    <a href="/purchaseRequests/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Purchase Request</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($purchaseRequests->isEmpty())
                        <p> There are no purchase requests yet.</p>
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
                                    <th>Warehouse Assistant</th>
                                    <th>Order Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchaseRequests as $purchaseRequest)
                                        <tr>
                                            <td><a href="/purchaseRequests/{{$purchaseRequest->id}}">{{$purchaseRequest->pr}}</a></td>
                                            <td>{{ $purchaseRequest->department }}</td>
                                            <td><a href="/customers/{{$purchaseRequest->customer->id}}">{{ $purchaseRequest->customer->name }}</a></td>
                                            <td><a href="/suppliers/{{$purchaseRequest->supplier->id}}">{{ $purchaseRequest->supplier->name }}</a></td>
                                            <td>{{ $purchaseRequest->assistant }}</td>
                                            <td>{{date('D M d, Y', strtotime($purchaseRequest->order_date))}}</td>
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