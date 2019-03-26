@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Materials</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Materials</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="float-left">Materials</h5>
                    <a href="/materials/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Material</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($materials->isEmpty())
                        <p> There are no materials yet.</p>
                    @else
                        {{--{{$materials->links()}}--}}
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th>PLU</th>
                                    <th>Description</th>
                                    <th>Safety Stock</th>
                                    <th>Reorder Level</th>
                                    <th>Status</th>
                                    <th>SRP</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($materials as $material)
                                        <tr class="{{($material->warning_quantity && $material->warning_quantity >= $material->stocks) ? 'bg-warning' : ''}}">
                                            <td><a href="/materials/{{$material->id}}">{{ $material->plu }}</a></td>
                                            <td>{{ $material->main_desc }}</td>
                                            <td>{{ $material->ideal_quantity ? $material->ideal_quantity : 'none' }}</td>
                                            <td>{{ $material->warning_quantity ? $material->warning_quantity : 'none' }}</td>
                                            <td>
                                                {{ ($material->warning_quantity && $material->warning_quantity >= $material->stocks)  ? 'REORDER' : '' }}
                                                <i class="{{ ($material->warning_quantity && $material->warning_quantity < $material->stocks)  ? 'fas fa-check' : '' }}"></i>
                                            </td>
                                            <td>{{ $material->srp ? $material->srp : 'none' }}</td>
                                            <td>{{ $material->stocks }}</td>
                                            <td>{{ $material->unit_measurement }}</td>
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