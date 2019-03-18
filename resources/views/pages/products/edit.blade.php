@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Update Product</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/products">Products</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/products/{{$product->id}}">{{$product->main_desc}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-6 col-sm-7">
                <div class="card mb-4">
                    <div class="card-header">{{ __('Product\'s Information') }}</div>

                    <div class="card-body">

                        <form action="{{ action('ProductController@update', $product->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="plu" class="col-md-12 col-form-label text-md-left">{{ __('PLU') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="plu" type="text" class="form-control{{ $errors->has('plu') ? ' is-invalid' : '' }}" name="plu" value="{{$product->plu}}" required autofocus>

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
                                    <input id="main_desc" type="text" class="form-control{{ $errors->has('main_desc') ? ' is-invalid' : '' }}" name="main_desc" value="{{$product->main_desc}}" required autofocus>

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
                                    <input id="other_desc" type="text" class="form-control{{ $errors->has('other_desc') ? ' is-invalid' : '' }}" name="other_desc" value="{{$product->other_desc}}" autofocus>

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
                                        <option disabled {{!$product->brand ? 'selected' : ''}}>Choose ...</option>
                                        <option value="brand1" {{$product->brand == 'brand1' ? 'selected' : ''}}>brand1</option>
                                        <option value="brand2" {{$product->brand == 'brand2' ? 'selected' : ''}}>brand2</option>
                                        <option value="brand3" {{$product->brand == 'brand3' ? 'selected' : ''}}>brand3</option>
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
                                            <option value="{{$supplier->name}}" {{$product->supplier == $supplier->name ? 'selected' : ''}}>{{$supplier->name}}</option>
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
                                        <option value="AIR-CON & REFRIGERATION" {{$product->category == 'AIR-CON & REFRIGERATION' ? 'selected' : ''}}>AIR-CON & REFRIGERATION</option>
                                        <option value="AUTOMOTIVE SUPPLIES" {{$product->category == 'AUTOMOTIVE SUPPLIES' ? 'selected' : ''}}>AUTOMOTIVE SUPPLIES</option>
                                        <option value="BEARINGS" {{$product->category == 'BEARINGS' ? 'selected' : ''}}>BEARINGS</option>
                                        <option value="CLEANING MATERIALS" {{$product->category == 'CLEANING MATERIALS' ? 'selected' : ''}}>CLEANING MATERIALS</option>
                                        <option value="ELECTRICAL & MECHANICAL" {{$product->category == 'ELECTRICAL & MECHANICAL' ? 'selected' : ''}}>ELECTRICAL & MECHANICAL</option>
                                        <option value="FURNITURE & FIXTURES" {{$product->category == 'FURNITURE & FIXTURES' ? 'selected' : ''}}>FURNITURE & FIXTURES</option>
                                        <option value="FARM EQUIPMENT & SUPPLIES" {{$product->category == 'FARM EQUIPMENT & SUPPLIES' ? 'selected' : ''}}>FARM EQUIPMENT & SUPPLIES</option>
                                        <option value="FANBELTS" {{$product->category == 'FANBELTS' ? 'selected' : ''}}>FANBELTS</option>
                                        <option value="FILTERS" {{$product->category == 'FILTERS' ? 'selected' : ''}}>FILTERS</option>
                                        <option value="FO SUPPLIES" {{$product->category == 'FO SUPPLIES' ? 'selected' : ''}}>FO SUPPLIES</option>
                                        <option value="GASOLINE, OIL & LUBRICANTS" {{$product->category == 'GASOLINE, OIL & LUBRICANTS' ? 'selected' : ''}}>GASOLINE, OIL & LUBRICANTS</option>
                                        <option value="HARDWARE & CONSTRUCTION" {{$product->category == 'HARDWARE & CONSTRUCTION' ? 'selected' : ''}}>HARDWARE & CONSTRUCTION</option>
                                        <option value="INFORMATION TECHNOLOGIES" {{$product->category == 'INFORMATION TECHNOLOGIES' ? 'selected' : ''}}>INFORMATION TECHNOLOGIES</option>
                                        <option value="MACHINERIES" {{$product->category == 'MACHINERIES' ? 'selected' : ''}}>MACHINERIES</option>
                                        <option value="MARKETING MATERIALS" {{$product->category == 'MARKETING MATERIALS' ? 'selected' : ''}}>MARKETING MATERIALS</option>
                                        <option value="OFFICE SUPPLIES" {{$product->category == 'OFFICE SUPPLIES' ? 'selected' : ''}}>OFFICE SUPPLIES</option>
                                        <option value="PLUMBINGS" {{$product->category == 'PLUMBINGS' ? 'selected' : ''}}>PLUMBINGS</option>
                                        <option value="UNIFORMS" {{$product->category == 'UNIFORMS' ? 'selected' : ''}}>UNIFORMS</option>
                                    </select>

                                    @if ($errors->has('supplier'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-check row">
                                <input class="form-check-input" type="checkbox" {{$product->retail == 1 ? 'checked' : ''}} name="retail" id="retail">
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
                                        <option value="ROLL" {{$product->unit_measurement == 'ROLL' ? 'selected' : ''}}>ROLL</option>
                                        <option value="REAM" {{$product->unit_measurement == 'SHEET' ? 'selected' : ''}}>SHEET</option>
                                        <option value="TANK" {{$product->unit_measurement == 'TANK' ? 'selected' : ''}}>TANK</option>
                                        <option value="YARD" {{$product->unit_measurement == 'YARD' ? 'selected' : ''}}>YARD</option>
                                        <option value="TRAY" {{$product->unit_measurement == 'TRAY' ? 'selected' : ''}}>TRAY</option>
                                        <option value="TUBE" {{$product->unit_measurement == 'TUBE' ? 'selected' : ''}}>TUBE</option>
                                        <option value="VIAL" {{$product->unit_measurement == 'VIAL' ? 'selected' : ''}}>VIAL</option>
                                        <option value="EACH" {{$product->unit_measurement == 'EACH' ? 'selected' : ''}}>EACH</option>
                                        <option value="SET" {{$product->unit_measurement == 'SET' ? 'selected' : ''}}>SET</option>
                                        <option value="PAIR" {{$product->unit_measurement == 'PAIR' ? 'selected' : ''}}>PAIR</option>
                                        <option value="BOX" {{$product->unit_measurement == 'BOX' ? 'selected' : ''}}>BOX</option>
                                        <option value="LITER" {{$product->unit_measurement == 'LITER' ? 'selected' : ''}}>LITER</option>
                                        <option value="GALLON" {{$product->unit_measurement == 'GALLON' ? 'selected' : ''}}>GALLON</option>
                                        <option value="TRUCKLOAD" {{$product->unit_measurement == 'TRUCKLOAD' ? 'selected' : ''}}>TRUCKLOAD</option>
                                        <option value="ELF" {{$product->unit_measurement == 'ELF' ? 'selected' : ''}}>ELF</option>
                                        <option value="BAG" {{$product->unit_measurement == 'BAG' ? 'selected' : ''}}>BAG</option>
                                        <option value="CUBIC METER" {{$product->unit_measurement == 'CUBIC METER' ? 'selected' : ''}}>CUBIC METER</option>
                                        <option value="BOOKLET" {{$product->unit_measurement == 'BOOKLET' ? 'selected' : ''}}>BOOKLET</option>
                                        <option value="BOTTLE" {{$product->unit_measurement == 'BOTTLE' ? 'selected' : ''}}>BOTTLE</option>
                                        <option value="BUNDLE" {{$product->unit_measurement == 'BUNDLE' ? 'selected' : ''}}>BUNDLE</option>
                                        <option value="CAN" {{$product->unit_measurement == 'CAN' ? 'selected' : ''}}>CAN</option>
                                        <option value="CANISTER" {{$product->unit_measurement == 'CANISTER' ? 'selected' : ''}}>CANISTER</option>
                                        <option value="CASE" {{$product->unit_measurement == 'CASE' ? 'selected' : ''}}>CASE</option>
                                        <option value="DOZEN" {{$product->unit_measurement == 'DOZEN' ? 'selected' : ''}}>DOZEN</option>
                                        <option value="FOOT" {{$product->unit_measurement == 'FOOT' ? 'selected' : ''}}>FOOT</option>
                                        <option value="METER" {{$product->unit_measurement == 'METER' ? 'selected' : ''}}>METER</option>
                                        <option value="GRAM" {{$product->unit_measurement == 'GRAM' ? 'selected' : ''}}>GRAM</option>
                                        <option value="PACK" {{$product->unit_measurement == 'PACK' ? 'selected' : ''}}>PACK</option>
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
                                        <option value="PO RECEIPT" {{$product->type == 'PO RECEIPT' ? 'selected' : ''}}>PO RECEIPT</option>
                                        <option value="MOVE ORDER ISSUE" {{$product->type == 'MOVE ORDER ISSUE' ? 'selected' : ''}}>MOVE ORDER ISSUE</option>
                                        <option value="RETURN TO VENDOR" {{$product->type == 'RETURN TO VENDOR' ? 'selected' : ''}}>RETURN TO VENDOR</option>
                                        <option value="MISCELLANEOUS REPORT" {{$product->type == 'MISCELLANEOUS REPORT' ? 'selected' : ''}}>MISCELLANEOUS REPORT</option>
                                        <option value="MISCELLANEOUS ISSUE" {{$product->type == 'MISCELLANEOUS ISSUE' ? 'selected' : ''}}>MISCELLANEOUS ISSUE</option>
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
                                    <input id="srp" type="number" class="form-control{{ $errors->has('srp') ? ' is-invalid' : '' }}" value="{{$product->srp}}" name="srp" autofocus>

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
                                    <input id="wholesaler_price" type="number"
                                           class="form-control{{ $errors->has('wholesaler_price') ? ' is-invalid' : '' }}"
                                           name="wholesaler_price" value="{{$product->wholesaler_price}}" autofocus>

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
                                    <input id="dealer_price" type="number" class="form-control{{ $errors->has('dealer_price') ? ' is-invalid' : '' }}" value="{{$product->dealer_price}}" name="dealer_price" autofocus>

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
                                    <input id="distributor_price" type="number" class="form-control{{ $errors->has('distributor_price') ? ' is-invalid' : '' }}" value="{{$product->distributor_price}}" name="distributor_price" autofocus>

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
                                    <input id="reseller_price" type="number"
                                           class="form-control{{ $errors->has('reseller_price') ? ' is-invalid' : '' }}"
                                           name="reseller_price" value="{{ $product->reseller_price }}" autofocus>

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
                                    <input id="purchase_cost" type="number" class="form-control{{ $errors->has('purchase_cost') ? ' is-invalid' : '' }}" value="{{$product->purchase_cost}}" name="purchase_cost" autofocus>

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
                                           name="warning_quantity" value="{{$product->warning_quantity}}" autofocus>

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
                                           name="ideal_quantity" autofocus value="{{$product->ideal_quantity}}">

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
