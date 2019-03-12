@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Company Information</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Company Information</li>
            </ol>
        </nav>

        @include('includes.messages')

        <div class="button-holder text-right">
            <a href="/companyInfo/1/edit" target="_blank" class="btn btn-outline-info mt-1">
                <i class="fas fa-pencil-alt"></i> Update
            </a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid mt-3 col-lg-6 col-sm-10">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Name:') }} <b>{{$company_info ? $company_info->name : 'none'}}</b></div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="address" class="col-md-12 col-form-label text-md-left"><b>{{ __('Company Address') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="address">{{$company_info ? $company_info->address : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-left"><b>{{ __('Email') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="email">{{$company_info ? $company_info->email : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-12 col-form-label text-md-left"><b>{{ __('Mobile #') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="mobile">{{$company_info ? $company_info->mobile : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="landline" class="col-md-12 col-form-label text-md-left"><b>{{ __('Landline') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="landline">{{$company_info ? $company_info->landline : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tin" class="col-md-12 col-form-label text-md-left"><b>{{ __('TIN.') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="tin">{{$company_info ? $company_info->tin : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="registered" class="col-md-12 col-form-label text-md-left"><b>{{ __('Registered To') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="registered">{{$company_info ? $company_info->registered : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rdo" class="col-md-12 col-form-label text-md-left"><b>{{ __('RDO #') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="rdo">{{$company_info ? $company_info->rdo : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nature" class="col-md-12 col-form-label text-md-left"><b>{{ __('Nature of Business') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="nature">{{$company_info ? $company_info->nature : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-12 col-form-label text-md-left"><b>{{ __('Business Type') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="type">{{$company_info ? $company_info->type : 'none'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tax" class="col-md-12 col-form-label text-md-left"><b>{{ __('Tax Type') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="tax">{{$company_info ? $company_info->tax : 'none'}}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection