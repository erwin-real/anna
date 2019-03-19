@if(strtoupper(Auth::user()->type) != "COORDINATOR")

    @if(strtoupper(Auth::user()->type) == "MNE" && $purchaseRequest->mne == 2)
        @include('pages.purchase_requests.form')

    @elseif(strtoupper(Auth::user()->type) == "AMG" && $purchaseRequest->amg == 2 && $purchaseRequest->mne == 1)
        @include('pages.purchase_requests.form')

    @elseif(strtoupper(Auth::user()->type) == "COO" && $purchaseRequest->coo == 2 && $purchaseRequest->amg == 1)
        @include('pages.purchase_requests.form')

    @elseif(strtoupper(Auth::user()->type) == "PURCHASING" && $purchaseRequest->purchasing == 2 && $purchaseRequest->coo == 1)
        @include('pages.purchase_requests.form')

    @endif

@endif