

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
                        <td>{{ date('D M d, Y', strtotime($purchaseRequest->mne_date))}}</td>
                        <td>{{ $purchaseRequest->mne_remarks }}</td>
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
                        <td>{{ date('D M d, Y', strtotime($purchaseRequest->amg_date))}}</td>
                        <td>{{ $purchaseRequest->amg_remarks }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

{{-- COO --}}
@if($purchaseRequest->coo != 2)
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('COO') }}</b></label>

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
                        <td>{{ $purchaseRequest->coo == 1 ? 'Approved' : 'Reject' }}</td>
                        <td>{{ date('D M d, Y', strtotime($purchaseRequest->coo_date))}}</td>
                        <td>{{ $purchaseRequest->coo_remarks }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

{{-- PURCHASING --}}
@if($purchaseRequest->purchasing != 2)
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label text-md-left"><b>{{ __('PURCHASING Supervisor') }}</b></label>

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
                        <td>{{ $purchaseRequest->purchasing == 1 ? 'Approved' : 'Reject' }}</td>
                        <td>{{ date('D M d, Y', strtotime($purchaseRequest->purchasing_date))}}</td>
                        <td>{{ $purchaseRequest->purchasing_remarks }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif