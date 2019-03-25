@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Add Tool</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/tools">Tools</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Tool</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-10 col-sm-10">
                <div class="card shadow mb-4">
                    <div class="card-header">{{ __('Tool\'s Information') }}</div>

                    <div class="card-body">

                        <form method="POST" action="/tools" onsubmit="return check()">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Tool Name') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="materialsTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item<span class="text-danger">*</span></th>
                                            <th colspan="2">Life Span <span class="text-danger">*</span></th>
                                            <th>Del</th>
                                        </tr>
                                    </thead>
                                    <tbody id="materialsBody">
                                    </tbody>
                                </table>
                            </div>


                            <div class="form-group row mb-0 mt-5 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa fa-check"></i> {{ __('Save') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                        <button class="btn btn-outline-info mt-5" href="#" onclick="addRow()"><i class="fas fa-plus"></i> Add new field for materials needed</button><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var values = ['days', 'weeks', 'months', 'years'];

        function addRow() {
            let td, tr;
            let tbody = document.getElementById("materialsBody");

            // for each outer array row
            tr = document.createElement("tr");

            // NAME
            td = document.createElement("td");
            let node_name = document.createElement("input");
            node_name.type = 'text';
            node_name.name = 'names[]';
            node_name.className = 'form-control';
            node_name.setAttribute("required", "required");
            td.appendChild(node_name);
            tr.appendChild(td);


            // NUMBER
            td = document.createElement("td");
            let node_number = document.createElement("input");
            node_number.type = 'number';
            node_number.name = 'numbers[]';
            node_number.className = 'form-control';
            node_number.setAttribute("required", "required");
            td.appendChild(node_number);
            tr.appendChild(td);


            // PERIOD
            td = document.createElement("td");
            let selectList = document.createElement("select");
            selectList.setAttribute("class", "form-control select-class");
            selectList.name = 'periods[]';

            for (let i = 0; i < values.length; i++) {
                let option = document.createElement("option");
                option.setAttribute("value", values[i]);
                option.text = values[i];
                selectList.appendChild(option);
            }

            td.appendChild(selectList);
            tr.appendChild(td);


            // DELETE BUTTON
            td = document.createElement("td");
            let node_del = document.createElement("i");
            node_del.className = 'fa fa-trash del-btn';
            node_del.style = "cursor:pointer";
            node_del.setAttribute("onclick", "deleteRow(this)");
            td.setAttribute("class", "text-center");
            td.appendChild(node_del);
            tr.appendChild(td);

            tbody.appendChild(tr);
        }

        function deleteRow(r) {
            let i = (r.parentNode.parentNode.rowIndex);
            document.getElementById("materialsTable").deleteRow(i);
        }

        function check() { return document.getElementById("materialsBody").children.length > 0; }

    </script>
@endsection
