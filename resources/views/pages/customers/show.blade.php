@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid mb-5">
            <h1>{{$customer->name}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/customers">Customers</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$customer->name}}</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="mt-5 col-lg-7 col-sm-8">
                <div class="card">
                    <div class="card-header ">
                        <h5>Customer's Information</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Company Name') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$customer->name}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Contact Person') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$customer->person}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Address') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$customer->address}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Email Address') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$customer->email}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Contact No.') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$customer->contact}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('TIN #') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$customer->tin}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Customer Type') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{$customer->type}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Added at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y', strtotime($customer->created_at)) }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Updated at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y', strtotime($customer->updated_at)) }}</span>
                            </div>
                        </div>

                        <a href="{{ action('CustomerController@edit', $customer->id) }}" class="btn btn-outline-info float-left mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delUserModal">
                            <i class="fas fa-trash fa-sm fa-fw"></i>
                            Delete
                        </button>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
            <a href="/customers" class="btn btn-outline-primary mt-3"><i class="fas fa-chevron-left"></i> Back</a>
        </div>
    </div>

    <div class="modal fade" id="delUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this user?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure on deleting this user.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form id="delete" method="POST" action="{{ action('CustomerController@destroy', $customer->id) }}" class="float-left">
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