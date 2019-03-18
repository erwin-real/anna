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
                        <a href="/suppliers">Suppliers</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/suppliers/{{$supplier->id}}">{{$supplier->name}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Supplier</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Update Supplier\'s Information') }}</div>

                    <div class="card-body">

                        <form action="{{ action('SupplierController@update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Company Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$supplier->name}}" name="name" required autofocus>

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
                                    <input id="person" type="text" class="form-control{{ $errors->has('person') ? ' is-invalid' : '' }}" name="person" value="{{$supplier->person}}" required autofocus>

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
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{$supplier->address}}" required autofocus>

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
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$supplier->email}}">

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
                                    <input id="contact" type="number" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{$supplier->contact}}">

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
                                    <input id="tin" type="number" class="form-control{{ $errors->has('tin') ? ' is-invalid' : '' }}" name="tin" value="{{$supplier->tin}}">

                                    @if ($errors->has('tin'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="custom-file">
                                <label for="cover_image" class="col-md-12 col-form-label pl-0 text-md-left">{{ __('Logo') }}</label>

                                <div class="col-md-12">
                                    <input id="cover_image" type="file" class="custom-file-input {{ $errors->has('cover_image') ? ' is-invalid' : '' }}" name="cover_image" autofocus>
                                    <label class="custom-file-label" for="cover_image">Choose file...</label>

                                    @if ($errors->has('cover_image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cover_image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0 mt-5 text-center">
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

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
