@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                <!-- <li class="breadcrumb-item" aria-current="page"><a href="/users">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Guide</li> -->
            </ol>
        </nav>
        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($customers)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suppliers</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($suppliers)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Materials</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($materials)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-puzzle-piece fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Purchase Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($purchaseRequests)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- CUSTOMERS -->
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Customers Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="/customers"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if(count($customers) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Type</th>
                                        <th>Email Address</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 0; ($i < 5 && $i < count($customers)); $i++)
                                        <tr>
                                            <td>{{$customers[$i]->name}}</td>
                                            <td>{{$customers[$i]->type}}</td>
                                            <td>{{$customers[$i]->email}}</td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        @else
                            No customers yet ...
                        @endif
                    </div>
                </div>
            </div>

            <!-- SUPPLIERS -->
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Suppliers Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="/suppliers"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if(count($suppliers) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Contact Person</th>
                                    <th>Email Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for ($i = 0; ($i < 5 && $i < count($suppliers)); $i++)
                                    <tr>
                                        <td>{{$suppliers[$i]->name}}</td>
                                        <td>{{$customers[$i]->contact}}</td>
                                        <td>{{$customers[$i]->email}}</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                        @else
                            No suppliers yet ...
                        @endif
                    </div>
                </div>
            </div>

            <!-- MATERIALS -->
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Materials Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="/materials"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if(count($materials) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>PLU</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 0; ($i < 5 && $i < count($materials)); $i++)
                                        <tr>
                                            <td>{{$materials[$i]->plu}}</td>
                                            <td>{{$materials[$i]->main_desc}}</td>
                                            <td>{{$materials[$i]->unit_measurement}}</td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        @else
                            No materials yet ...
                        @endif
                    </div>
                </div>
            </div>

            <!-- PURCHASE REQUESTS -->
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Purchase Requests Overview</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="/purchaseRequests"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if(count($purchaseRequests) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>PR #</th>
                                        <th>Department</th>
                                        <th>Warehouse Assistant</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 0; ($i < 5 && $i < count($purchaseRequests)); $i++)
                                        <tr>
                                            <td>{{$purchaseRequests[$i]->pr}}</td>
                                            <td>{{$purchaseRequests[$i]->department}}</td>
                                            <td>{{$purchaseRequests[$i]->assistant}}</td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        @else
                            No purchase requests yet ...
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            {{--<div class="col-xl-4 col-lg-5">--}}
                {{--<div class="card shadow mb-4">--}}
                    {{--<!-- Card Header - Dropdown -->--}}
                    {{--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">--}}
                        {{--<h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>--}}
                        {{--<div class="dropdown no-arrow">--}}
                            {{--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>--}}
                            {{--</a>--}}
                            {{--<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">--}}
                                {{--<div class="dropdown-header">Dropdown Header:</div>--}}
                                {{--<a class="dropdown-item" href="#">Action</a>--}}
                                {{--<a class="dropdown-item" href="#">Another action</a>--}}
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Card Body -->--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="chart-pie pt-4 pb-2">--}}
                            {{--<canvas id="myPieChart"></canvas>--}}
                        {{--</div>--}}
                        {{--<div class="mt-4 text-center small">--}}
                    {{--<span class="mr-2">--}}
                      {{--<i class="fas fa-circle text-primary"></i> Direct--}}
                    {{--</span>--}}
                            {{--<span class="mr-2">--}}
                      {{--<i class="fas fa-circle text-success"></i> Social--}}
                    {{--</span>--}}
                            {{--<span class="mr-2">--}}
                      {{--<i class="fas fa-circle text-info"></i> Referral--}}
                    {{--</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <!-- Content Row -->
        {{--<div class="row">--}}

            {{--<!-- Content Column -->--}}
            {{--<div class="col-lg-6 mb-4">--}}

                {{--<!-- Project Card Example -->--}}
                {{--<div class="card shadow mb-4">--}}
                    {{--<div class="card-header py-3">--}}
                        {{--<h6 class="m-0 font-weight-bold text-primary">Projects</h6>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>--}}
                        {{--<div class="progress mb-4">--}}
                            {{--<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                        {{--<h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>--}}
                        {{--<div class="progress mb-4">--}}
                            {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                        {{--<h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>--}}
                        {{--<div class="progress mb-4">--}}
                            {{--<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                        {{--<h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>--}}
                        {{--<div class="progress mb-4">--}}
                            {{--<div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                        {{--<h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>--}}
                        {{--<div class="progress">--}}
                            {{--<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Color System -->--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-6 mb-4">--}}
                        {{--<div class="card bg-primary text-white shadow">--}}
                            {{--<div class="card-body">--}}
                                {{--Primary--}}
                                {{--<div class="text-white-50 small">#4e73df</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 mb-4">--}}
                        {{--<div class="card bg-success text-white shadow">--}}
                            {{--<div class="card-body">--}}
                                {{--Success--}}
                                {{--<div class="text-white-50 small">#1cc88a</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 mb-4">--}}
                        {{--<div class="card bg-info text-white shadow">--}}
                            {{--<div class="card-body">--}}
                                {{--Info--}}
                                {{--<div class="text-white-50 small">#36b9cc</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 mb-4">--}}
                        {{--<div class="card bg-warning text-white shadow">--}}
                            {{--<div class="card-body">--}}
                                {{--Warning--}}
                                {{--<div class="text-white-50 small">#f6c23e</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 mb-4">--}}
                        {{--<div class="card bg-danger text-white shadow">--}}
                            {{--<div class="card-body">--}}
                                {{--Danger--}}
                                {{--<div class="text-white-50 small">#e74a3b</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6 mb-4">--}}
                        {{--<div class="card bg-secondary text-white shadow">--}}
                            {{--<div class="card-body">--}}
                                {{--Secondary--}}
                                {{--<div class="text-white-50 small">#858796</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="col-lg-6 mb-4">--}}

                {{--<!-- Illustrations -->--}}
                {{--<div class="card shadow mb-4">--}}
                    {{--<div class="card-header py-3">--}}
                        {{--<h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="text-center">--}}
                            {{--<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">--}}
                        {{--</div>--}}
                        {{--<p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>--}}
                        {{--<a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- Approach -->--}}
                {{--<div class="card shadow mb-4">--}}
                    {{--<div class="card-header py-3">--}}
                        {{--<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>--}}
                        {{--<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}

    </div>

@endsection