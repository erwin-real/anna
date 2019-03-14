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
                                <label for="brand" class="col-md-12 col-form-label text-md-left">{{ __('Brand') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="brand" name="brand" class="form-control" required autofocus>
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
                                        <option value="supplier1" {{$product->supplier == 'supplier1' ? 'selected' : ''}}>supplier1</option>
                                        <option value="supplier2" {{$product->supplier == 'supplier2' ? 'selected' : ''}}>supplier2</option>
                                        <option value="supplier3" {{$product->supplier == 'supplier3' ? 'selected' : ''}}>supplier3</option>
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
                                        <option value="category1" {{$product->category == 'category1' ? 'selected' : ''}}>category1</option>
                                        <option value="category2" {{$product->category == 'category2' ? 'selected' : ''}}>category2</option>
                                        <option value="category3" {{$product->category == 'category3' ? 'selected' : ''}}>category3</option>
                                    </select>

                                    @if ($errors->has('supplier'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('supplier') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tax" class="col-md-12 col-form-label text-md-left">{{ __('Tax') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="tax" name="tax" class="form-control" required autofocus>
                                        <option value="tax1" {{$product->tax == 'tax1' ? 'selected' : ''}}>tax1</option>
                                        <option value="tax2" {{$product->tax == 'tax2' ? 'selected' : ''}}>tax2</option>
                                        <option value="tax3" {{$product->tax == 'tax3' ? 'selected' : ''}}>tax3</option>
                                    </select>

                                    @if ($errors->has('tax'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax') }}</strong>
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
                                <label for="primary_unit" class="col-md-12 col-form-label text-md-left">{{ __('Primary Unit') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="primary_unit" name="primary_unit" class="form-control" required autofocus>
                                        <option value="primary_unit1" {{$product->primary_unit == 'primary_unit1' ? 'selected' : ''}}>primary_unit1</option>
                                        <option value="primary_unit2" {{$product->primary_unit == 'primary_unit2' ? 'selected' : ''}}>primary_unit2</option>
                                        <option value="primary_unit3" {{$product->primary_unit == 'primary_unit3' ? 'selected' : ''}}>primary_unit3</option>
                                    </select>

                                    @if ($errors->has('primary_unit'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('primary_unit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="unit_measurement" class="col-md-12 col-form-label text-md-left">{{ __('Unit of Measurement') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="unit_measurement" name="unit_measurement" class="form-control" required autofocus>
                                        <option value="unit_measurement1" {{$product->unit_measurement == 'unit_measurement1' ? 'selected' : ''}}>unit_measurement1</option>
                                        <option value="unit_measurement2" {{$product->unit_measurement == 'unit_measurement2' ? 'selected' : ''}}>unit_measurement2</option>
                                        <option value="unit_measurement3" {{$product->unit_measurement == 'unit_measurement3' ? 'selected' : ''}}>unit_measurement3</option>
                                    </select>

                                    @if ($errors->has('unit_measurement'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_measurement') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-12 col-form-label text-md-left">{{ __('Inventory Type') }} <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <select id="type" name="type" class="form-control" required autofocus>
                                        <option value="type1" {{$product->type == 'type1' ? 'selected' : ''}}>type1</option>
                                        <option value="type2" {{$product->type == 'type2' ? 'selected' : ''}}>type2</option>
                                        <option value="type3" {{$product->type == 'type3' ? 'selected' : ''}}>type3</option>
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
                                <label for="discount" class="col-md-12 col-form-label text-md-left">{{ __('Discounted Price') }}</label>

                                <div class="col-md-12">
                                    <input id="discount" type="number" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" value="{{$product->descount}}" name="discount" autofocus>

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

                            <div class="form-check row">
                                <input class="form-check-input" type="checkbox" {{$product->tax_exempt == 1 ? 'checked' : ''}} name="tax_exempt" id="tax_exempt">
                                <label class="form-check-label" for="tax_exempt">
                                    Tax Exempt?
                                </label>

                                @if ($errors->has('tax_exempt'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tax_exempt') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="public_price" class="col-md-12 col-form-label text-md-left">{{ __('Public Price') }}</label>

                                <div class="col-md-12">
                                    <input id="public_price" type="number" class="form-control{{ $errors->has('public_price') ? ' is-invalid' : '' }}" value="{{$product->public_price}}" name="public_price" autofocus>

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
                                    <input id="purchase_cost" type="number" class="form-control{{ $errors->has('purchase_cost') ? ' is-invalid' : '' }}" value="{{$product->purchase_cost}}" name="purchase_cost" autofocus>

                                    @if ($errors->has('purchase_cost'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purchase_cost') }}</strong>
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
