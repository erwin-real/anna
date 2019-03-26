@if(strtoupper(Auth::user()->type) != "COORDINATOR")

    @if(strtoupper(Auth::user()->type) == "MNE" && $purchaseRequest->mne == 2)
        @include('pages.purchase_requests.form')

    @elseif(strtoupper(Auth::user()->type) == "WAREHOUSE" && $purchaseRequest->warehouse == 2 && $purchaseRequest->mne == 1)
        @include('pages.purchase_requests.form')

    @elseif(strtoupper(Auth::user()->type) == "AMG" && $purchaseRequest->amg == 2 && $purchaseRequest->warehouse == 1)
        @include('pages.purchase_requests.form')

    @endif

@endif