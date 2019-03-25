@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Create User</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/users">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card shadow mb-4">
                    <div class="card-header">{{ __('User\'s Information') }}</div>

                    <div class="card-body">

                        <form method="POST" action="/users" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="fname" class="col-md-12 col-form-label text-md-left">{{ __('First Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mname" class="col-md-12 col-form-label text-md-left">{{ __('Middle Name') }}</label>

                                <div class="col-md-12">
                                    <input id="mname" type="text" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" value="{{ old('mname') }}" autofocus>

                                    @if ($errors->has('mname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname" class="col-md-12 col-form-label text-md-left">{{ __('Last Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="User_Group" class="col-md-12 col-form-label text-md-left">{{ __('User Group') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="User_Group" name="User_Group" class="form-control" required autofocus>
                                        <option value="Service Group">Service Group</option>
                                        <option value="Feedmill">Feedmill</option>
                                        <option value="Poultry">Poultry</option>
                                        <option value="Swine">Swine</option>
                                        <option value="FO-Retail">FO-Retail</option>
                                        <option value="FO-Production">FO-Production</option>
                                        <option value="F&B">F&B</option>
                                        {{--<option value="R&M Store: North and South">R&M Store: North and South</option>--}}
                                        {{--<option value="R&M Structural (Facilities)">R&M Structural (Facilities)</option>--}}
                                    </select>

                                    @if ($errors->has('User_Group'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('User_Group') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-12 col-form-label text-md-left">{{ __('Username') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Password') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label text-md-left">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('Email Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-12 col-form-label text-md-left">{{ __('Birth Date') }}</label>

                                <div class="col-md-12">
                                    <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday') }}" autofocus>

                                    @if ($errors->has('birthday'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-12 col-form-label text-md-left">{{ __('Address') }}</label>

                                <div class="col-md-12">
                                    <textarea id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autofocus></textarea>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="landline" class="col-md-12 col-form-label text-md-left">{{ __('Landline') }}</label>

                                <div class="col-md-12">
                                    <input id="landline" type="number" class="form-control{{ $errors->has('landline') ? ' is-invalid' : '' }}" name="landline" value="{{ old('landline') }}" autofocus>

                                    @if ($errors->has('landline'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('landline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-12 col-form-label text-md-left">{{ __('Mobile') }}</label>

                                <div class="col-md-12">
                                    <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="custom-file">
                                <label for="cover_image" class="col-md-12 col-form-label pl-0 text-md-left">{{ __('Photo') }}</label>

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
