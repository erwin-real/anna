

{{-- MNE --}}
@if($purchaseRequest->mne != 2)
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('MNE Supervisor') }}</b></label>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $purchaseRequest->mne == 1 ? 'Approved' : 'Reject' }}</td>
                        <td>{{ date('D M d, Y | h:i a', strtotime($purchaseRequest->mne_date))}}</td>
                        <td>{{ $purchaseRequest->mne_remarks }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

{{-- WAREHOUSE --}}
@if($purchaseRequest->warehouse != 2)
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('Warehouse Assistant') }}</b></label>
        <span class="col-md-12 ml-3 text-md-left">{{$purchaseRequest->warehouse_user->fname}} {{$purchaseRequest->warehouse_user->lname}}</span>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $purchaseRequest->warehouse == 1 ? 'Approved' : 'Reject' }}</td>
                        <td>{{ date('D M d, Y | h:i a', strtotime($purchaseRequest->warehouse_date))}}</td>
                        <td>{{ $purchaseRequest->warehouse_remarks }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

{{-- AMG --}}
@if($purchaseRequest->amg != 2)
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('AMG Supervisor') }}</b></label>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $purchaseRequest->amg == 1 ? 'Approved' : 'Reject' }}</td>
                        <td>{{ date('D M d, Y | h:i a', strtotime($purchaseRequest->amg_date))}}</td>
                        <td>{{ $purchaseRequest->amg_remarks }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif