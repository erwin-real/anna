{{--@if(Auth::user()->type != "COORDINATOR" && Auth::user()->id == $purchaseRequest->user->id)--}}

    @if(Auth::user()->type == "MNE SUPERVISOR" && $purchaseRequest->mne == 2)
        @include('pages.purchase_requests.form')

    @elseif(Auth::user()->type == "WAREHOUSE ASSISTANT" && $purchaseRequest->warehouse == 2 && $purchaseRequest->mne == 1)
        @include('pages.purchase_requests.form')

    @elseif(Auth::user()->type == "AMG SUPERVISOR" && $purchaseRequest->amg == 2 && $purchaseRequest->warehouse == 1)
        @include('pages.purchase_requests.form')

    @endif

{{--@endif--}}