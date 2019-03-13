@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Customers</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Customers</h5>
                    <a href="/customers/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Customer</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($customers->isEmpty())
                        <p> There are no customers yet.</p>
                    @else
                        {{--{{$customers->links()}}--}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Contact Person</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th>Customer Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td><a href="/customers/{{$customer->id}}">{{ $customer->name }}</a></td>
                                        <td>{{ $customer->person }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->type }}</td>
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