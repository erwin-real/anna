@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Tools</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tools</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="float-left">Tools</h5>
                    <a href="/tools/create" class="btn btn-outline-primary float-right"><i class="fas fa-plus"></i> Add Tool</a>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($tools->isEmpty())
                        <p> There are no tools yet.</p>
                    @else
                        {{--{{$tools->links()}}--}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Tool Name</th>
                                    <th>Materials Needed</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tools as $tool)
                                    <tr>
                                        <td><a href="/tools/{{$tool->id}}">{{ $tool->name }}</a></td>
                                        <td>{{ count($tool->singleTools) }}</td>
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