@extends('layouts.main')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-0 text-gray-800">Materials Inventory</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Materials Inventory</li>
            </ol>
        </nav>

        @include('includes.messages')

        <!-- Content Row -->
        <div class="row">
            <div class="container-fluid">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="text-center">Materials Inventory</h5>
                    <div class="clearfix"></div>
                </div>

                <div class="card-body mt-2">
                    @if ($tracks->isEmpty())
                        <p> There are no tracks yet.</p>
                    @else
                        {{--{{$tracks->links()}}--}}

                        <div class="lists-table table-responsive mt-3">
                            {!! $tracks->appends(\Request::except('page'))->render() !!}
                            <table class="table table-hover table-striped py-3 text-center">
                                <thead>
                                <tr>
                                    <th scope="col">Material Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Previous Stock</th>
                                    <th scope="col">Stock In</th>
                                    <th scope="col">Stock Use/Sell</th>
                                    <th scope="col">Final Stock</th>
                                    <th scope="col">Date modified</th>
                                    <th scope="col">Modified by</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($tracks as $track)
                                        <tr>
                                            <td><a href="/materials/{{$track->material->id}}">{{$track->material->plu}}</a></td>
                                            <td>{{$track->material->main_desc}}</td>
                                            <td>{{$track->material->unit_measurement}}</td>
                                            <td>{{$track->previous}}</td>
                                            @if(($track->updated - $track->previous) > 0)
                                                <td>{{$track->updated - $track->previous}}</td>
                                                <td>0</td>
                                            @else
                                                <td>0</td>
                                                <td>{{($track->updated - $track->previous)*(-1)}}</td>
                                            @endif
                                            <td>{{$track->updated}}</td>
                                            <td>{{date('D M d\'y h:i a', strtotime($track->date_modified))}}</td>
                                            <td><a href="/users/{{$track->user->id}}">{{$track->user->fname}} {{$track->user->lname}}</a></td>





                                            <td class="icons">
                                                {!!Form::open(['action' => ['PagesController@destroyTrack', $track->id], 'method' => 'POST', 'class' => 'delete', 'onsubmit'=>'return confirm("Are you sure you want to delete this record?")'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['id'=>'delete', 'class'=>'del-btn', 'type'=>'submit']) !!}
                                                {!!Form::close()!!}
                                            </td>
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


    <script>
        $(document).ready(function() {
            $("#delete").on("submit", function () {
                return confirm("Are you sure you want to delete all track products?");
            });
        });
    </script>
@endsection