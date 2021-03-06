@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Add Product</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/products">Products</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card shadow mb-4">
                    <div class="card-header">{{ __('Product\'s Information') }}</div>

                    <div class="card-body">

                        <form method="POST" action="/products">
                            @csrf

                            <div class="form-group row">
                                <label for="plu" class="col-md-12 col-form-label text-md-left">{{ __('PLU') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="plu" type="text" class="form-control{{ $errors->has('plu') ? ' is-invalid' : '' }}" name="plu" required autofocus>

                                    @if ($errors->has('plu'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plu') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="main_desc" class="col-md-12 col-form-label text-md-left">{{ __('Product\'s Description') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="main_desc" type="text" class="form-control{{ $errors->has('main_desc') ? ' is-invalid' : '' }}" name="main_desc" required autofocus>

                                    @if ($errors->has('main_desc'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('main_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="other_desc" class="col-md-12 col-form-label text-md-left">{{ __('Other Description') }}</label>

                                <div class="col-md-12">
                                    <input id="other_desc" type="text" class="form-control{{ $errors->has('other_desc') ? ' is-invalid' : '' }}" name="other_desc" autofocus>

                                    @if ($errors->has('other_desc'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('other_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-md-12 col-form-label text-md-left">{{ __('Brand') }}</label>

                                <div class="col-md-12">
                                    <select id="brand" name="brand" class="form-control" autofocus>
                                        <option disabled selected>Choose ...</option>
                                        <option value="brand1">brand1</option>
                                        <option value="brand2">brand2</option>
                                        <option value="brand3">brand3</option>
                                    </select>

                                    @if ($errors->has('brand'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="supplier" class="col-md-12 col-form-label text-md-left">{{ __('Supplier') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="supplier" name="supplier" class="form-control" required autofocus>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->name}}">{{$supplier->name}}</option>
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
                                <label for="category" class="col-md-12 col-form-label text-md-left">{{ __('Category') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="category" name="category" class="form-control" required autofocus>
                                        <option value="AIR-CON & REFRIGERATION">AIR-CON & REFRIGERATION</option>
                                        <option value="AUTOMOTIVE SUPPLIES">AUTOMOTIVE SUPPLIES</option>
                                        <option value="BEARINGS">BEARINGS</option>
                                        <option value="CLEANING MATERIALS">CLEANING MATERIALS</option>
                                        <option value="ELECTRICAL & MECHANICAL">ELECTRICAL & MECHANICAL</option>
                                        <option value="FURNITURE & FIXTURES">FURNITURE & FIXTURES</option>
                                        <option value="FARM EQUIPMENT & SUPPLIES">FARM EQUIPMENT & SUPPLIES</option>
                                        <option value="FANBELTS">FANBELTS</option>
                                        <option value="FILTERS">FILTERS</option>
                                        <option value="FO SUPPLIES">FO SUPPLIES</option>
                                        <option value="GASOLINE, OIL & LUBRICANTS">GASOLINE, OIL & LUBRICANTS</option>
                                        <option value="HARDWARE & CONSTRUCTION">HARDWARE & CONSTRUCTION</option>
                                        <option value="INFORMATION TECHNOLOGIES">INFORMATION TECHNOLOGIES</option>
                                        <option value="MACHINERIES">MACHINERIES</option>
                                        <option value="MARKETING MATERIALS">MARKETING MATERIALS</option>
                                        <option value="OFFICE SUPPLIES">OFFICE SUPPLIES</option>
                                        <option value="PLUMBINGS">PLUMBINGS</option>
                                        <option value="UNIFORMS">UNIFORMS</option>
                                    </select>

                                    @if ($errors->has('supplier'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-check row">
                                <input class="form-check-input" type="checkbox" name="retail" id="retail">
                                <label class="form-check-label" for="retail">
                                    For Bulk and Retail?
                                </label>

                                @if ($errors->has('retail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('retail') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="unit_measurement" class="col-md-12 col-form-label text-md-left">{{ __('Unit of Measurement') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="unit_measurement" name="unit_measurement" class="form-control" required autofocus>
                                        <option value="ROLL">ROLL</option>
                                        <option value="REAM">SHEET</option>
                                        <option value="TANK">TANK</option>
                                        <option value="YARD">YARD</option>
                                        <option value="TRAY">TRAY</option>
                                        <option value="TUBE">TUBE</option>
                                        <option value="VIAL">VIAL</option>
                                        <option value="EACH">EACH</option>
                                        <option value="SET">SET</option>
                                        <option value="PAIR">PAIR</option>
                                        <option value="BOX">BOX</option>
                                        <option value="LITER">LITER</option>
                                        <option value="GALLON">GALLON</option>
                                        <option value="TRUCKLOAD">TRUCKLOAD</option>
                                        <option value="ELF">ELF</option>
                                        <option value="BAG">BAG</option>
                                        <option value="CUBIC METER">CUBIC METER</option>
                                        <option value="BOOKLET">BOOKLET</option>
                                        <option value="BOTTLE">BOTTLE</option>
                                        <option value="BUNDLE">BUNDLE</option>
                                        <option value="CAN">CAN</option>
                                        <option value="CANISTER">CANISTER</option>
                                        <option value="CASE">CASE</option>
                                        <option value="DOZEN">DOZEN</option>
                                        <option value="FOOT">FOOT</option>
                                        <option value="METER">METER</option>
                                        <option value="GRAM">GRAM</option>
                                        <option value="PACK">PACK</option>
                                    </select>

                                    @if ($errors->has('unit_measurement'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_measurement') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-12 col-form-label text-md-left">{{ __('Transaction Type') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="type" name="type" class="form-control" required autofocus>
                                        <option value="PO RECEIPT">PO RECEIPT</option>
                                        <option value="MOVE ORDER ISSUE">MOVE ORDER ISSUE</option>
                                        <option value="RETURN TO VENDOR">RETURN TO VENDOR</option>
                                        <option value="MISCELLANEOUS REPORT">MISCELLANEOUS REPORT</option>
                                        <option value="MISCELLANEOUS ISSUE">MISCELLANEOUS ISSUE</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="srp" class="col-md-12 col-form-label text-md-left">{{ __('Suggested Retail Price (SRP)') }}</label>

                                <div class="col-md-12">
                                    <input id="srp" type="number" class="form-control{{ $errors->has('srp') ? ' is-invalid' : '' }}" name="srp" autofocus>

                                    @if ($errors->has('srp'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('srp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="wholesaler_price" class="col-md-12 col-form-label text-md-left">{{ __('Wholesaler Price') }}</label>

                                <div class="col-md-12">
                                    <input id="wholesaler_price" type="number" class="form-control{{ $errors->has('wholesaler_price') ? ' is-invalid' : '' }}" name="wholesaler_price" autofocus>

                                    @if ($errors->has('wholesaler_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('wholesaler_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dealer_price" class="col-md-12 col-form-label text-md-left">{{ __('Dealer\'s Price') }}</label>

                                <div class="col-md-12">
                                    <input id="dealer_price" type="number" class="form-control{{ $errors->has('dealer_price') ? ' is-invalid' : '' }}" name="dealer_price" autofocus>

                                    @if ($errors->has('dealer_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dealer_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="distributor_price" class="col-md-12 col-form-label text-md-left">{{ __('Distributor\'s Price') }}</label>

                                <div class="col-md-12">
                                    <input id="distributor_price" type="number" class="form-control{{ $errors->has('distributor_price') ? ' is-invalid' : '' }}" name="distributor_price" autofocus>

                                    @if ($errors->has('distributor_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('distributor_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reseller_price" class="col-md-12 col-form-label text-md-left">{{ __('Reseller Price') }}</label>

                                <div class="col-md-12">
                                    <input id="reseller_price" type="number" class="form-control{{ $errors->has('reseller_price') ? ' is-invalid' : '' }}" name="reseller_price" autofocus>

                                    @if ($errors->has('reseller_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reseller_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="purchase_cost" class="col-md-12 col-form-label text-md-left">{{ __('Purchase Cost') }}</label>

                                <div class="col-md-12">
                                    <input id="purchase_cost" type="number" class="form-control{{ $errors->has('purchase_cost') ? ' is-invalid' : '' }}" name="purchase_cost" autofocus>

                                    @if ($errors->has('purchase_cost'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purchase_cost') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="warning_quantity" class="col-md-12 col-form-label text-md-left">{{ __('Warning Qauntity') }}</label>

                                <div class="col-md-12">
                                    <input id="warning_quantity" type="number" class="form-control{{ $errors->has('warning_quantity') ? ' is-invalid' : '' }}" name="warning_quantity" autofocus>

                                    @if ($errors->has('warning_quantity'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('warning_quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ideal_quantity" class="col-md-12 col-form-label text-md-left">{{ __('Ideal Quantity') }}</label>

                                <div class="col-md-12">
                                    <input id="ideal_quantity" type="number" class="form-control{{ $errors->has('ideal_quantity') ? ' is-invalid' : '' }}" name="ideal_quantity" autofocus>

                                    @if ($errors->has('ideal_quantity'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ideal_quantity') }}</strong>
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
