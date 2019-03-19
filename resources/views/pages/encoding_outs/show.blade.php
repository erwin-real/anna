@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid mb-5">
            <h1 class="h2 mb-0 text-gray-800">{{$encodingOut->pr}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/encodingOuts">MIR Encoding Outs</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$encodingOut->pr}}</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="mt-5 col-lg-7 col-sm-8">
                <div class="card">
                    <div class="card-header ">
                        <h5>MIR Encoding Out's Information</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('PR #') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$encodingOut->pr}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Department') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$encodingOut->department}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Customer') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name"><a href="/customers/{{$encodingOut->customer->id}}">{{$encodingOut->customer->name}}</a></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Supplier') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name"><a href="/suppliers/{{$encodingOut->supplier->id}}">{{$encodingOut->supplier->name}}</a></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Warehouse Assistant') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$encodingOut->assistant}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Order Date') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{ date('D M d, Y', strtotime($encodingOut->order_date)) }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Coordinator\'s Remarks') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$encodingOut->remarks}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Materials') }}</b></label>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>PLU</th>
                                            <th>Main Description</th>
                                            <th>Qty</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($encodingOut->singleEncodingOuts as $singleEncodingOut)
                                            <tr>
                                                <td>{{$singleEncodingOut->material['plu']}}</td>
                                                <td>{{$singleEncodingOut->material['main_desc']}}</td>
                                                <td>{{$singleEncodingOut->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @include('pages.purchase_requests.status')

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Added at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y', strtotime($encodingOut->created_at)) }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Updated at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y', strtotime($encodingOut->updated_at)) }}</span>
                            </div>
                        </div>

                        @include('pages.purchase_requests.approval')

                        @if(Auth::user()->type == "COORDINATOR" && $encodingOut->purchasing == 2)
                            {{--<a href="{{ action('EncodingOutController@edit', $encodingOut->id) }}" class="btn btn-outline-info float-left mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>--}}

                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delUserModal">
                                <i class="fas fa-trash fa-sm fa-fw"></i>
                                Delete
                            </button>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
            <a href="/encodingOuts" class="btn btn-outline-primary mt-3"><i class="fas fa-chevron-left"></i> Back</a>
        </div>
    </div>

    <div class="modal fade" id="delUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this purchase request?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure on deleting this purchase request.</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form id="delete" method="POST" action="{{ action('EncodingOutController@destroy', $encodingOut->id) }}" class="float-left">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection