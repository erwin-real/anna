@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Products</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Products</h5>
                    <a href="/products/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Product</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($products->isEmpty())
                        <p> There are no products yet.</p>
                    @else
                        {{--{{$products->links()}}--}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>PLU</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Unit</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td><a href="/products/{{$product->id}}">{{ $product->plu }}</a></td>
                                            <td>{{ $product->main_desc }}</td>
                                            <td>{{ $product->other_desc }}</td>
                                            <td>{{ $product->primary_unit }}</td>
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