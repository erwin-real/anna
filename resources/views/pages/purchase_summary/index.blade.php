@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Purchase Summary</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Summary</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="float-left">Purchase Summary</h5>
                        @if(strtoupper(Auth::user()->type) == 'COORDINATOR')
                            {{--<a href="/purchaseRequests/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Purchase Request</a>--}}
                        @endif
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
                                        <th>Coordinator</th>
                                        <th>Approval</th>
                                        <th>Order Date</th>
                                        <th>Date Created</th>
                                        <th>Date Received</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchaseRequests as $purchaseRequest)
                                            <tr>
                                                <td>
                                                    @if ($purchaseRequest->amg != 1) <a href="/purchaseRequests/{{$purchaseRequest->id}}">{{$purchaseRequest->pr}}</a>
                                                    @elseif ($purchaseRequest->amg == 1 && $purchaseRequest->received != 1) <a href="/purchaseOrders/{{$purchaseRequest->id}}">{{$purchaseRequest->pr}}</a>
                                                    @else <a href="/receivingReceipts/{{$purchaseRequest->id}}">{{$purchaseRequest->pr}}</a>
                                                    @endif
                                                </td>
                                                <td>{{ $purchaseRequest->department }}</td>
                                                <td><a href="/customers/{{$purchaseRequest->customer->id}}">{{ $purchaseRequest->customer->name }}</a></td>
                                                <td><a href="/suppliers/{{$purchaseRequest->supplier->id}}">{{ $purchaseRequest->supplier->name }}</a></td>
                                                <td><a href="/users/{{$purchaseRequest->user->id}}">{{ $purchaseRequest->user->fname }} {{ $purchaseRequest->user->lname }}</a></td>
                                                <td>
                                                    <span><i class="{{ $purchaseRequest->mne == 1 ? 'fas fa-check' : 'fas fa-times' }}"></i> MNE</span><br>
                                                    <span><i class="{{ $purchaseRequest->warehouse == 1 ? 'fas fa-check' : 'fas fa-times' }}"></i> Warehouse</span><br>
                                                    <span><i class="{{ $purchaseRequest->amg == 1 ? 'fas fa-check' : 'fas fa-times' }}"></i> AMG</span><br>
                                                </td>
                                                <td>{{date('m-d-y', strtotime($purchaseRequest->order_date))}}</td>
                                                <td>{{date('m-d-y | h:i a', strtotime($purchaseRequest->created_at))}}</td>
                                                <td>{{ $purchaseRequest->received == 1 ? date('m-d-y | h:i a', strtotime($purchaseRequest->date_received)) : 'N/A'}}</td>
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