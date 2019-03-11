@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Users</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Users</li>
                <!-- <li class="breadcrumb-item" aria-current="page"><a href="/users">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Guide</li> -->
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Users</h5>
                    <a href="/users/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add User</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($users->isEmpty())
                        <p> There are no users yet.</p>
                    @else
                        {{$users->links()}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email-address</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="/users/{{$user->id}}">{{ $user->fname }} {{ $user->lname }}</a></td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ ($user->email == null) ? "none" : $user->email }}</td>
                                        <td>{{ $user->type }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
        </div>


    </div>

@endsection