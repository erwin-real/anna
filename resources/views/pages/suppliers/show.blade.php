@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1>{{$user->fname.' '.$user->lname}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/users">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$user->fname.' '. $user->mname .' '.$user->lname}}</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="mt-5 col-lg-7 col-sm-8">
                <div class="card">
                    <div class="card-header ">
                        <h5><strong>Name</strong>: {{ $user->fname }} {{ $user->lname }}</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <p> <strong>Username</strong>: {{ $user->username }}</p>
                        <p> <strong>Email</strong>: {{ $user->email ? $user->email : 'none'}}</p>
                        <p> <strong>User Group</strong>: {{ $user->group }}</p>
                        <p> <strong>Birthday</strong>: {{ $user->birthday ? date('M d, Y', strtotime($user->birthday)) : 'none'}}</p>
                        <p> <strong>Address</strong>: {{ $user->address ? $user->address : 'none'}}</p>
                        <p> <strong>Landline</strong>: {{ $user->landline ? $user->landline : 'none'}}</p>
                        <p> <strong>Mobile No.</strong>: {{ $user->mobile ? $user->mobile : 'none'}}</p>
                        <p> <strong>Created at</strong>: {{ date('D m-d-Y', strtotime($user->created_at)) }}</p>
                        <p> <strong>Updated at</strong>: {{ date('D m-d-Y', strtotime($user->updated_at)) }}</p>
                        <a href="{{ action('UsersController@editUser', $user->id) }}" class="btn btn-outline-info float-left mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>

                        @if(Auth::user()->username != $user->username)
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delUserModal">
                                <i class="fas fa-trash fa-sm fa-fw"></i>
                                Delete
                            </button>
                        @endif
                        <div class="clearfix"></div>
                    </div>

                </div>

                <a href="/users" class="btn btn-outline-primary mt-3"><i class="fas fa-chevron-left"></i> Back</a>

            </div>
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

                    <form id="delete" method="POST" action="{{ action('UsersController@destroyUser', $user->id) }}" class="float-left">
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