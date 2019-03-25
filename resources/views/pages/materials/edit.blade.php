@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Update Material</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/materials">Materials</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/materials/{{$material->id}}">{{$material->main_desc}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Material</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card shadow mb-4">
                    <div class="card-header">{{ __('Material\'s Information') }}</div>

                    <div class="card-body">

                        <form action="{{ action('MaterialController@update', $material->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="plu" class="col-md-12 col-form-label text-md-left">{{ __('PLU') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="plu" type="text" class="form-control{{ $errors->has('plu') ? ' is-invalid' : '' }}" name="plu" value="{{$material->plu}}" required autofocus>

                                    @if ($errors->has('plu'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plu') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="main_desc" class="col-md-12 col-form-label text-md-left">{{ __('Material\'s Description') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="main_desc" type="text" class="form-control{{ $errors->has('main_desc') ? ' is-invalid' : '' }}" name="main_desc" value="{{$material->main_desc}}" required autofocus>

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
                                    <input id="other_desc" type="text" class="form-control{{ $errors->has('other_desc') ? ' is-invalid' : '' }}" name="other_desc" value="{{$material->other_desc}}" autofocus>

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
                                        <option disabled {{!$material->brand ? 'selected' : ''}}>Choose ...</option>
                                        <option value="brand1" {{$material->brand == 'brand1' ? 'selected' : ''}}>brand1</option>
                                        <option value="brand2" {{$material->brand == 'brand2' ? 'selected' : ''}}>brand2</option>
                                        <option value="brand3" {{$material->brand == 'brand3' ? 'selected' : ''}}>brand3</option>
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
                                            <option value="{{$supplier->name}}" {{$material->supplier == $supplier->name ? 'selected' : ''}}>{{$supplier->name}}</option>
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
                                        <option value="AIR-CON & REFRIGERATION" {{$material->category == 'AIR-CON & REFRIGERATION' ? 'selected' : ''}}>AIR-CON & REFRIGERATION</option>
                                        <option value="AUTOMOTIVE SUPPLIES" {{$material->category == 'AUTOMOTIVE SUPPLIES' ? 'selected' : ''}}>AUTOMOTIVE SUPPLIES</option>
                                        <option value="BEARINGS" {{$material->category == 'BEARINGS' ? 'selected' : ''}}>BEARINGS</option>
                                        <option value="CLEANING MATERIALS" {{$material->category == 'CLEANING MATERIALS' ? 'selected' : ''}}>CLEANING MATERIALS</option>
                                        <option value="ELECTRICAL & MECHANICAL" {{$material->category == 'ELECTRICAL & MECHANICAL' ? 'selected' : ''}}>ELECTRICAL & MECHANICAL</option>
                                        <option value="FURNITURE & FIXTURES" {{$material->category == 'FURNITURE & FIXTURES' ? 'selected' : ''}}>FURNITURE & FIXTURES</option>
                                        <option value="FARM EQUIPMENT & SUPPLIES" {{$material->category == 'FARM EQUIPMENT & SUPPLIES' ? 'selected' : ''}}>FARM EQUIPMENT & SUPPLIES</option>
                                        <option value="FANBELTS" {{$material->category == 'FANBELTS' ? 'selected' : ''}}>FANBELTS</option>
                                        <option value="FILTERS" {{$material->category == 'FILTERS' ? 'selected' : ''}}>FILTERS</option>
                                        <option value="FO SUPPLIES" {{$material->category == 'FO SUPPLIES' ? 'selected' : ''}}>FO SUPPLIES</option>
                                        <option value="GASOLINE, OIL & LUBRICANTS" {{$material->category == 'GASOLINE, OIL & LUBRICANTS' ? 'selected' : ''}}>GASOLINE, OIL & LUBRICANTS</option>
                                        <option value="HARDWARE & CONSTRUCTION" {{$material->category == 'HARDWARE & CONSTRUCTION' ? 'selected' : ''}}>HARDWARE & CONSTRUCTION</option>
                                        <option value="INFORMATION TECHNOLOGIES" {{$material->category == 'INFORMATION TECHNOLOGIES' ? 'selected' : ''}}>INFORMATION TECHNOLOGIES</option>
                                        <option value="MACHINERIES" {{$material->category == 'MACHINERIES' ? 'selected' : ''}}>MACHINERIES</option>
                                        <option value="MARKETING MATERIALS" {{$material->category == 'MARKETING MATERIALS' ? 'selected' : ''}}>MARKETING MATERIALS</option>
                                        <option value="OFFICE SUPPLIES" {{$material->category == 'OFFICE SUPPLIES' ? 'selected' : ''}}>OFFICE SUPPLIES</option>
                                        <option value="PLUMBINGS" {{$material->category == 'PLUMBINGS' ? 'selected' : ''}}>PLUMBINGS</option>
                                        <option value="UNIFORMS" {{$material->category == 'UNIFORMS' ? 'selected' : ''}}>UNIFORMS</option>
                                    </select>

                                    @if ($errors->has('supplier'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-check row ml-0">
                                <input class="form-check-input" type="checkbox" {{$material->retail == 1 ? 'checked' : ''}} name="retail" id="retail">
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
                                        <option value="ROLL" {{$material->unit_measurement == 'ROLL' ? 'selected' : ''}}>ROLL</option>
                                        <option value="REAM" {{$material->unit_measurement == 'REAM' ? 'selected' : ''}}>REAM</option>
                                        <option value="SHEET" {{$material->unit_measurement == 'SHEET' ? 'selected' : ''}}>SHEET</option>
                                        <option value="TANK" {{$material->unit_measurement == 'TANK' ? 'selected' : ''}}>TANK</option>
                                        <option value="YARD" {{$material->unit_measurement == 'YARD' ? 'selected' : ''}}>YARD</option>
                                        <option value="TRAY" {{$material->unit_measurement == 'TRAY' ? 'selected' : ''}}>TRAY</option>
                                        <option value="TUBE" {{$material->unit_measurement == 'TUBE' ? 'selected' : ''}}>TUBE</option>
                                        <option value="VIAL" {{$material->unit_measurement == 'VIAL' ? 'selected' : ''}}>VIAL</option>
                                        <option value="EACH" {{$material->unit_measurement == 'EACH' ? 'selected' : ''}}>EACH</option>
                                        <option value="SET" {{$material->unit_measurement == 'SET' ? 'selected' : ''}}>SET</option>
                                        <option value="PAIR" {{$material->unit_measurement == 'PAIR' ? 'selected' : ''}}>PAIR</option>
                                        <option value="BOX" {{$material->unit_measurement == 'BOX' ? 'selected' : ''}}>BOX</option>
                                        <option value="LITER" {{$material->unit_measurement == 'LITER' ? 'selected' : ''}}>LITER</option>
                                        <option value="GALLON" {{$material->unit_measurement == 'GALLON' ? 'selected' : ''}}>GALLON</option>
                                        <option value="TRUCKLOAD" {{$material->unit_measurement == 'TRUCKLOAD' ? 'selected' : ''}}>TRUCKLOAD</option>
                                        <option value="ELF" {{$material->unit_measurement == 'ELF' ? 'selected' : ''}}>ELF</option>
                                        <option value="BAG" {{$material->unit_measurement == 'BAG' ? 'selected' : ''}}>BAG</option>
                                        <option value="CUBIC METER" {{$material->unit_measurement == 'CUBIC METER' ? 'selected' : ''}}>CUBIC METER</option>
                                        <option value="BOOKLET" {{$material->unit_measurement == 'BOOKLET' ? 'selected' : ''}}>BOOKLET</option>
                                        <option value="BOTTLE" {{$material->unit_measurement == 'BOTTLE' ? 'selected' : ''}}>BOTTLE</option>
                                        <option value="BUNDLE" {{$material->unit_measurement == 'BUNDLE' ? 'selected' : ''}}>BUNDLE</option>
                                        <option value="CAN" {{$material->unit_measurement == 'CAN' ? 'selected' : ''}}>CAN</option>
                                        <option value="CANISTER" {{$material->unit_measurement == 'CANISTER' ? 'selected' : ''}}>CANISTER</option>
                                        <option value="CASE" {{$material->unit_measurement == 'CASE' ? 'selected' : ''}}>CASE</option>
                                        <option value="DOZEN" {{$material->unit_measurement == 'DOZEN' ? 'selected' : ''}}>DOZEN</option>
                                        <option value="FOOT" {{$material->unit_measurement == 'FOOT' ? 'selected' : ''}}>FOOT</option>
                                        <option value="METER" {{$material->unit_measurement == 'METER' ? 'selected' : ''}}>METER</option>
                                        <option value="GRAM" {{$material->unit_measurement == 'GRAM' ? 'selected' : ''}}>GRAM</option>
                                        <option value="PACK" {{$material->unit_measurement == 'PACK' ? 'selected' : ''}}>PACK</option>
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
                                        <option value="PO RECEIPT" {{$material->type == 'PO RECEIPT' ? 'selected' : ''}}>PO RECEIPT</option>
                                        <option value="MOVE ORDER ISSUE" {{$material->type == 'MOVE ORDER ISSUE' ? 'selected' : ''}}>MOVE ORDER ISSUE</option>
                                        <option value="RETURN TO VENDOR" {{$material->type == 'RETURN TO VENDOR' ? 'selected' : ''}}>RETURN TO VENDOR</option>
                                        <option value="MISCELLANEOUS REPORT" {{$material->type == 'MISCELLANEOUS REPORT' ? 'selected' : ''}}>MISCELLANEOUS REPORT</option>
                                        <option value="MISCELLANEOUS ISSUE" {{$material->type == 'MISCELLANEOUS ISSUE' ? 'selected' : ''}}>MISCELLANEOUS ISSUE</option>
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
                                    <input id="srp" type="number" class="form-control{{ $errors->has('srp') ? ' is-invalid' : '' }}" value="{{$material->srp}}" name="srp" autofocus>

                                    @if ($errors->has('srp'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('srp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discount" class="col-md-12 col-form-label text-md-left">{{ __('Discounted Price') }}</label>

                                <div class="col-md-12">
                                    <input id="discount" type="number" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" value="{{$material->descount}}" name="discount" autofocus>

                                    @if ($errors->has('discount'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dealer_price" class="col-md-12 col-form-label text-md-left">{{ __('Dealer\'s Price') }}</label>

                                <div class="col-md-12">
                                    <input id="dealer_price" type="number" class="form-control{{ $errors->has('dealer_price') ? ' is-invalid' : '' }}" value="{{$material->dealer_price}}" name="dealer_price" autofocus>

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
                                    <input id="distributor_price" type="number" class="form-control{{ $errors->has('distributor_price') ? ' is-invalid' : '' }}" value="{{$material->distributor_price}}" name="distributor_price" autofocus>

                                    @if ($errors->has('distributor_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('distributor_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="public_price" class="col-md-12 col-form-label text-md-left">{{ __('Public Price') }}</label>

                                <div class="col-md-12">
                                    <input id="public_price" type="number" class="form-control{{ $errors->has('public_price') ? ' is-invalid' : '' }}" value="{{$material->public_price}}" name="public_price" autofocus>

                                    @if ($errors->has('public_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('public_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="purchase_cost" class="col-md-12 col-form-label text-md-left">{{ __('Purchase Cost') }}</label>

                                <div class="col-md-12">
                                    <input id="purchase_cost" type="number" class="form-control{{ $errors->has('purchase_cost') ? ' is-invalid' : '' }}" value="{{$material->purchase_cost}}" name="purchase_cost" autofocus>

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
                                    <input id="warning_quantity" type="number"
                                           class="form-control{{ $errors->has('warning_quantity') ? ' is-invalid' : '' }}"
                                           name="warning_quantity" value="{{$material->warning_quantity}}" autofocus>

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
                                    <input id="ideal_quantity" type="number"
                                           class="form-control{{ $errors->has('ideal_quantity') ? ' is-invalid' : '' }}"
                                           name="ideal_quantity" autofocus value="{{$material->ideal_quantity}}">

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
