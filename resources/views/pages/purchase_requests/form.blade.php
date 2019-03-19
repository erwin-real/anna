<div class="form-group row">
    <label class="col-md-12 col-form-label text-md-left"><b>{{ __('Update Status') }}</b></label>

    <div class="col-12 text-center">
        <form id="delete" method="POST" action="{{ action('PurchaseRequestController@updateStatus', $purchaseRequest->id) }}" class="m-auto">
            @csrf
            <input type="hidden" name="type" value="{{Auth::user()->type}}">
            <div class="form-check row pl-0">
                <label class="custom-control custom-radio">
                    <input id="radio1" name="status" type="radio" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Approve</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio2" name="status" type="radio" value="0">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Reject</span>
                </label>
            </div>

            <div class="form-group">
                <label for="remarks" class="col-md-12 col-form-label text-md-left"><b>{{ __('Remarks') }}</b></label>

                <div class="col-md-12">
                    <textarea id="remarks" type="text" class="form-control{{ $errors->has('remarks') ? ' is-invalid' : '' }}" name="remarks" autofocus></textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Submit</button>
            </div>
        </form>
    </div>
</div>