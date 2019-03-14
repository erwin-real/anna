@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid mb-5">
            <h1 class="h2 mb-0 text-gray-800">{{$product->name}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/products">Products</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->main_desc}}</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="mt-5 col-lg-7 col-sm-8">
                <div class="card">
                    <div class="card-header ">
                        <h5>Product's Information</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('PLU') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->plu}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Product\'s Description') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->main_desc}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Other Description') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->other_desc}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Brand') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->brand}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Supplier') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->supplier}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Category') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->category}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Tax') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->tax}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('For Bulk and Retail ?') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->retail == 1 ? 'YES' : 'NO'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Primary Unit') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->primary_unit}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Unit of Measurement') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->unit_measurement}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Inventory Type') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->type}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Suggested Retail Price (SRP)') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->srp}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Discounted Price') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->discount}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Dealer\'s Price') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->dealer_price}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Distributor\' Price') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->distributor_price}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Tax Exempt ?') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->tax_exempt == 1 ? 'YES' : 'NO'}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Public Price') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->public_price}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Purchase Cost') }}</b></label>

                            <div class="offset-1 col-10">
                                <span id="name">{{$product->purchase_cost}}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Added at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y', strtotime($product->created_at)) }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Updated at') }}</b></label>

                            <div class="offset-1 col-10">
                                <span>{{ date('D M d, Y', strtotime($product->updated_at)) }}</span>
                            </div>
                        </div>

                        <a href="{{ action('ProductController@edit', $product->id) }}" class="btn btn-outline-info float-left mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>

                        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#delUserModal">
                            <i class="fas fa-trash fa-sm fa-fw"></i>
                            Delete
                        </button>
                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>
            <a href="/products" class="btn btn-outline-primary mt-3"><i class="fas fa-chevron-left"></i> Back</a>
        </div>
    </div>

    <div class="modal fade" id="delUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this product?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure on deleting this product.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                    <form id="delete" method="POST" action="{{ action('ProductController@destroy', $product->id) }}" class="float-left">
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