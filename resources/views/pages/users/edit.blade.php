@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1>Edit User</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/users">Users</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/users/{{$user->id}}">{{$user->fname .' '. $user->lname}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">

                        <form action="{{ action('UsersController@updateUser', $user->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-group row">
                                <label for="fname" class="col-md-12 col-form-label text-md-left">{{ __('First Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ $user->fname }}" required autofocus>

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
                                    <input id="mname" type="text" class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" name="mname" value="{{ $user->mname }}" autofocus>

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
                                    <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ $user->lname }}" required autofocus>

                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="group" class="col-md-12 col-form-label text-md-left">{{ __('User Group') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="group" name="group" class="form-control" required autofocus>
                                        <option {{$user->group == 'R&M Store: North and South' ? 'selected' : ''}} value="R&M Store: North and South">R&M Store: North and South</option>
                                        <option {{$user->group == 'R&M Structural (Facilities)' ? 'selected' : ''}} value="R&M Structural (Facilities)">R&M Structural (Facilities)</option>
                                    </select>

                                    @if ($errors->has('group'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-12 col-form-label text-md-left">{{ __('Username') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('Email Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">

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
                                    <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ $user->birthday ? date('Y-m-d', strtotime($user->birthday)) : null}}" autofocus>

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
                                    <textarea id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" autofocus>{{ $user->address }}</textarea>

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
                                    <input id="landline" type="number" class="form-control{{ $errors->has('landline') ? ' is-invalid' : '' }}" name="landline" value="{{ $user->landline }}" autofocus>

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
                                    <input id="mobile" type="number" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $user->mobile }}" autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
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
