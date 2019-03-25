@extends('layouts.main')

@section('content')

    {{-- Right Content --}}
    <div class="body-right">
        <div class="container-fluid">
            <h1 class="h2 mb-0 text-gray-800">{{'Update Forecast'}}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/forecasts">Forecasts</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/forecasts/{{$forecast->id}}">{{$forecast->item}} {{$forecast->year}}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update Forecast</li>
                </ol>
            </nav>

            @include('includes.messages')

            <div class="container-fluid mt-5 col-lg-8 col-sm-10">
                <div class="card shadow mb-4">
                    <div class="card-header">{{ __('Update Forecast\'s Information') }}</div>

                    <div class="card-body">

                        <form action="{{ action('ForecastController@update', $forecast->id) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf

                            <div class="form-group row">
                                <label for="item" class="col-md-12 col-form-label text-md-left">{{ __('Item') }} <span class="text-danger">*</span></label>

                                <div class="col-md-9">
                                    <input id="item" type="text" value="{{$forecast->item}}" class="form-control{{ $errors->has('item') ? ' is-invalid' : '' }}" name="item" required autofocus>

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
                                                    <option value="2015" {{($forecast->year == 2015 ? 'selected' : '')}}>2015</option>
                                                    <option value="2016" {{($forecast->year == 2016 ? 'selected' : '')}}>2016</option>
                                                    <option value="2017" {{($forecast->year == 2017 ? 'selected' : '')}}>2017</option>
                                                    <option value="2018" {{($forecast->year == 2018 ? 'selected' : '')}}>2018</option>
                                                    <option value="2019" {{($forecast->year == 2019 ? 'selected' : '')}}>2019</option>
                                                    <option value="2020" {{($forecast->year == 2020 ? 'selected' : '')}}>2020</option>
                                                    <option value="2021" {{($forecast->year == 2021 ? 'selected' : '')}}>2021</option>
                                                    <option value="2022" {{($forecast->year == 2022 ? 'selected' : '')}}>2022</option>
                                                    <option value="2023" {{($forecast->year == 2023 ? 'selected' : '')}}>2023</option>
                                                    <option value="2024" {{($forecast->year == 2024 ? 'selected' : '')}}>2024</option>
                                                    <option value="2025" {{($forecast->year == 2025 ? 'selected' : '')}}>2025</option>
                                                    <option value="2026" {{($forecast->year == 2026 ? 'selected' : '')}}>2026</option>
                                                    <option value="2027" {{($forecast->year == 2027 ? 'selected' : '')}}>2027</option>
                                                    <option value="2028" {{($forecast->year == 2028 ? 'selected' : '')}}>2028</option>
                                                    <option value="2029" {{($forecast->year == 2029 ? 'selected' : '')}}>2029</option>
                                                    <option value="2030" {{($forecast->year == 2030 ? 'selected' : '')}}>2030</option>
                                                    <option value="2031" {{($forecast->year == 2031 ? 'selected' : '')}}>2031</option>
                                                    <option value="2032" {{($forecast->year == 2032 ? 'selected' : '')}}>2032</option>
                                                    <option value="2033" {{($forecast->year == 2033 ? 'selected' : '')}}>2033</option>
                                                    <option value="2034" {{($forecast->year == 2034 ? 'selected' : '')}}>2034</option>
                                                    <option value="2035" {{($forecast->year == 2035 ? 'selected' : '')}}>2035</option>
                                                    <option value="2036" {{($forecast->year == 2036 ? 'selected' : '')}}>2036</option>
                                                </select>
                                            </td>
                                            <td>1</td>
                                            <td><input class="form-control" type="number" id="demand" name="demand[]" value="{{$forecast->singleForecasts[0]->demand}}" required/></td>
                                        </tr>
                                        @php
                                            for ($i = 0; $i < 3; $i++) {
                                                for ($j = 0; $j < 4; $j++) {
                                                    if ($i == 0 && $j <= 2) {
                                                        echo
                                                        '<tr>
                                                            <td>'. ($forecast->year+$i) .'</td>
                                                            <td>'. ($j+2) .'</td>
                                                            <td><input class="form-control" type="number" id="demand" name="demand[]" value="'. $forecast->singleForecasts[($j + ($i*4) + 1)]->demand .'" required/></td>
                                                        </tr>';
                                                    } elseif ($i == 0 && $j==3) break;
                                                    else {
                                                        echo
                                                        '<tr>
                                                            <td>'. ($forecast->year+$i) .'</td>
                                                            <td>'. ($j+1) .'</td>
                                                            <td><input class="form-control" type="number" id="demand" name="demand[]" value="'. $forecast->singleForecasts[($j + ($i*4))]->demand .'" required/></td>
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