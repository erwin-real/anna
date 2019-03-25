@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">Add Forecast</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/forecasts">Forecasts</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Forecast</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-8 col-sm-10">
                <div class="card shadow mb-4">
                    <div class="card-header">{{ __('Forecast\'s Information') }}</div>

                    <div class="card-body">

                        <form method="POST" action="/forecasts" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="item" class="col-md-12 col-form-label text-md-left">{{ __('Item') }} <span class="text-danger">*</span></label>

                                <div class="col-md-9">
                                    <input id="item" type="text" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" name="item" required autofocus>

                                    @if ($errors->has('item'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('item') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Quarter</th>
                                            <th>Demand <span class="text-danger">*</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="year" name="year" required onchange="updateYear(this)">
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                        <option value="2034">2034</option>
                                                        <option value="2035">2035</option>
                                                        <option value="2036">2036</option>
                                                    </select>
                                                </td>
                                                <td>1</td>
                                                <td><input class="form-control" type="number" id="demand" name="demand[]" required/></td>
                                            </tr>
                                            @php
                                                for ($i = 0; $i < 3; $i++) {
                                                    for ($j = 0; $j < 4; $j++) {
                                                        if ($i == 0 && $j <= 2) {
                                                            echo
                                                            '<tr>
                                                                <td>'. (2015+$i) .'</td>
                                                                <td>'. ($j+2) .'</td>
                                                                <td><input class="form-control" type="number" id="demand" name="demand[]" required/></td>
                                                            </tr>';
                                                        } elseif ($i == 0 && $j==3) break;
                                                        else {
                                                            echo
                                                            '<tr>
                                                                <td>'. (2015+$i) .'</td>
                                                                <td>'. ($j+1) .'</td>
                                                                <td><input class="form-control" type="number" id="demand" name="demand[]" required/></td>
                                                            </tr>';
                                                        }
                                                    }
                                                }
                                            @endphp
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-5 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa fa-check"></i> {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add the following code if you want the name of the file appear on select

        function updateYear(r) {
            // document.getElementById('submit').disabled = false;
            // for (let i = 0; i < years.length; i++) {
            //     if (years[i] === r.value) document.getElementById('submit').disabled = true;
            // }

            let node = r.parentNode.parentNode.parentNode.children;
            for (let i = 1; i < 4; i++) node[i].children[0].innerText = r.value;
            for (let i = 4; i < 8; i++) node[i].children[0].innerText = parseInt(r.value) + 1;
            for (let i = 8; i < 12; i++) node[i].children[0].innerText = parseInt(r.value) + 2;
        }
    </script>
@endsection
