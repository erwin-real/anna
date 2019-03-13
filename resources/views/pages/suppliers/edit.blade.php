@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Update Supplier</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/customers">Customers</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/customers/{{$customer->id}}">{{$customer->name}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Customer</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Update Customer\'s Information') }}</div>

                    <div class="card-body">

                        <form action="{{ action('CustomerController@update', $customer->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Company Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$customer->name}}" name="name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="person" class="col-md-12 col-form-label text-md-left">{{ __('Contact Person') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="person" type="text" class="form-control{{ $errors->has('person') ? ' is-invalid' : '' }}" name="person" value="{{$customer->person}}" required autofocus>

                                    @if ($errors->has('person'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('person') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('Address') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$customer->address}}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('Email Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$customer->email}}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact" class="col-md-12 col-form-label text-md-left">{{ __('Contact No.') }}</label>

                                <div class="col-md-12">
                                    <input id="contact" type="number" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{$customer->contact}}">

                                    @if ($errors->has('contact'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tin" class="col-md-12 col-form-label text-md-left">{{ __('TIN #') }}</label>

                                <div class="col-md-12">
                                    <input id="tin" type="number" class="form-control{{ $errors->has('tin') ? ' is-invalid' : '' }}" name="tin" value="{{$customer->tin}}">

                                    @if ($errors->has('tin'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tax_output" class="col-md-12 col-form-label text-md-left">{{ __('Tax Output %') }}</label>

                                <div class="col-md-12">
                                    <input id="tax_output" type="text" class="form-control{{ $errors->has('tax_output') ? ' is-invalid' : '' }}" name="tax_output"  value="{{$customer->tax_output}}">

                                    @if ($errors->has('tax_output'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax_output') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tax_type" class="col-md-12 col-form-label text-md-left">{{ __('Tax') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="tax_type" name="tax_type" class="form-control" required autofocus>
                                        <option value="Non-vat" {{$customer->tax_type == 'Non-vat' ? 'selected' : ''}}>Non-vat</option>
                                        <option value="Property Tax" {{$customer->tax_type == 'Property Tax' ? 'selected' : ''}}>Property Tax</option>
                                    </select>

                                    @if ($errors->has('tax_type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax_type') }}</strong>
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
