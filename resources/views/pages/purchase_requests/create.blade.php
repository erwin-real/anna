@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Add Purchase Request</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/purchaseRequests">Purchase Requests</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Purchase Request</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-sm-12 col-lg-10 col-xl-7">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Purchase Request\'s Information') }}</div>

                    <div class="card-body">

                        <form method="POST" action="/purchaseRequests" onsubmit="return check()">
                            @csrf

                            <div class="form-group row">
                                <label for="department" class="col-md-12 col-form-label text-md-left">{{ __('Department') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="department" name="department" class="form-control" required autofocus>
                                        <option value="department1">department1</option>
                                        <option value="department2">department2</option>
                                        <option value="department3">department3</option>
                                    </select>

                                    @if ($errors->has('department'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="customer" class="col-md-12 col-form-label text-md-left">{{ __('Customer') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="customer" name="customer" class="form-control" required autofocus>
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('customer'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('customer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="supplier" class="col-md-12 col-form-label text-md-left">{{ __('Supplier') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="supplier" name="supplier" class="form-control" required autofocus>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('supplier'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assistant" class="col-md-12 col-form-label text-md-left">{{ __('Warehouse Assistant') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="assistant" name="assistant" class="form-control" required autofocus>
                                        <option value="Mr. Rodrigo Gumapos">Mr. Rodrigo Gumapos</option>
                                        <option value="Mr. Mark Francis David">Mr. Mark Francis David</option>
                                        <option value="Mr. Ricky Torio">Mr. Ricky Torio</option>
                                    </select>

                                    @if ($errors->has('assistant'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('assistant') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pr" class="col-md-12 col-form-label text-md-left">{{ __('PR #') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="pr" type="text" class="form-control{{ $errors->has('pr') ? ' is-invalid' : '' }}" name="pr" required autofocus>

                                    @if ($errors->has('pr'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pr') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_date" class="col-md-12 col-form-label text-md-left">{{ __('Order Date') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="order_date" type="date" class="form-control{{ $errors->has('order_date') ? ' is-invalid' : '' }}" name="order_date" required autofocus>

                                    @if ($errors->has('order_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('order_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="remarks" class="col-md-12 col-form-label text-md-left">{{ __('Remarks') }}</label>

                                <div class="col-md-12">
                                    <textarea id="remarks" type="text" class="form-control{{ $errors->has('remarks') ? ' is-invalid' : '' }}" name="remarks" autofocus></textarea>

                                    @if ($errors->has('remarks'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="card-body">--}}
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="materialsTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="w-75">Materials <span class="small">(PLU | Description)</span><span class="text-danger">*</span></th>
                                                <th class="w-75">Qty <span class="text-danger">*</span></th>
                                                <th>Del</th>
                                            </tr>
                                        </thead>
                                        <tbody id="materialsBody">
                                        </tbody>
                                    </table>
                                </div>
                            {{--</div>--}}

                            <div class="form-group row mb-0 text-center">
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
        var values = [];
        var ids = [];
        var totalMaterials = {{count($materials)}}
        @foreach($materials as $material)
        values.push('{{$material->plu}} | {{$material->main_desc}}');
        ids.push('{{$material->id}}');
        @endforeach

        function addRow() {
            if (document.getElementsByClassName('select-class').length < totalMaterials ) {
                let td, tr;
                let tbody = document.getElementById("materialsBody");

                // for each outer array row
                tr = document.createElement("tr");


                td = document.createElement("td");
                let selectList = document.createElement("select");
                selectList.setAttribute("class", "form-control select-class");
                selectList.name = 'materials[]';

                for (let i = 0; i < values.length; i++) {
                    let option = document.createElement("option");
                    option.setAttribute("value", ids[i]);
                    option.text = values[i];
                    selectList.appendChild(option);
                }

                td.appendChild(selectList);
                tr.appendChild(td);


                td = document.createElement("td");
                let node_number = document.createElement("input");
                node_number.type = 'number';
                node_number.name = 'quantity[]';
                node_number.className = 'form-control';
                node_number.setAttribute("required", "required");
                td.appendChild(node_number);
                tr.appendChild(td);

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
        }
        function deleteRow(r) {
            let i = (r.parentNode.parentNode.rowIndex);
            document.getElementById("materialsTable").deleteRow(i);
        }

        function check() {
            return document.getElementById("materialsBody").children.length > 0;
        }

    </script>
@endsection
