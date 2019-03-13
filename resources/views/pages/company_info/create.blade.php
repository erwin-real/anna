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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/companyInfo">Company Information</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid mt-3 col-lg-6 col-sm-10">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Update Company Information') }}</div>

                    <div class="card-body">

                        <form action="{{ action('CompanyInfoController@store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Company Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('Company Address') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('Email') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-12 col-form-label text-md-left">{{ __('Mobile #') }}</label>

                                <div class="col-md-12">
                                    <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="landline" class="col-md-12 col-form-label text-md-left">{{ __('Landline') }}</label>

                                <div class="col-md-12">
                                    <input id="landline" type="number" class="form-control{{ $errors->has('landline') ? ' is-invalid' : '' }}" name="landline" autofocus>

                                    @if ($errors->has('landline'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('landline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tin" class="col-md-12 col-form-label text-md-left">{{ __('TIN.') }}</label>

                                <div class="col-md-12">
                                    <input id="tin" type="number" class="form-control{{ $errors->has('tin') ? ' is-invalid' : '' }}" name="tin" autofocus>

                                    @if ($errors->has('tin'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="registered" class="col-md-12 col-form-label text-md-left">{{ __('Registered To') }}</label>

                                <div class="col-md-12">
                                    <input id="registered" type="text" class="form-control{{ $errors->has('registered') ? ' is-invalid' : '' }}" name="registered" autofocus>

                                    @if ($errors->has('registered'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('registered') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rdo" class="col-md-12 col-form-label text-md-left">{{ __('RDO #') }}</label>

                                <div class="col-md-12">
                                    <input id="rdo" type="number" class="form-control{{ $errors->has('rdo') ? ' is-invalid' : '' }}" name="rdo" autofocus>

                                    @if ($errors->has('rdo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rdo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nature" class="col-md-12 col-form-label text-md-left">{{ __('Nature of Business') }}</label>

                                <div class="col-md-12">
                                    <input id="nature" type="text" class="form-control{{ $errors->has('nature') ? ' is-invalid' : '' }}" name="nature" autofocus>

                                    @if ($errors->has('nature'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nature') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-12 col-form-label text-md-left">{{ __('Business Type') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="type" name="type" class="form-control" required autofocus>
                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Partnership">Partnership</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tax" class="col-md-12 col-form-label text-md-left">{{ __('Tax Type') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="tax" name="tax" class="form-control" required autofocus>
                                        <option value="Non-vat">Non-vat</option>
                                        <option value="Property Tax">Property Tax</option>
                                        <option value="Progressive Tax">Progressive Tax</option>
                                    </select>

                                    @if ($errors->has('tax'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa fa-check"></i> {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection