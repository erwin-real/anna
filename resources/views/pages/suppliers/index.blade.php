@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Users</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Suppliers</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Suppliers</h5>
                    <a href="/suppliers/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Supplier</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($suppliers->isEmpty())
                        <p> There are no suppliers yet.</p>
                    @else
                        {{--{{$suppliers->links()}}--}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Contact Name</th>
                                    <th>Contact Person</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                    <th>Contact No.</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td><a href="/suppliers/{{$supplier->id}}">{{ $supplier->name }}</a></td>
                                        <td>{{ $supplier->person }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->email ? "none" : $supplier->email }}</td>
                                        <td>{{ $supplier->contact }}</td>
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