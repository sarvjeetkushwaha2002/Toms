@extends('admin.layouts.master')
@section('title')
Dashboard ||Dashboard
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span>Home</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Text Editor By <a href="{{route('indexDashboard')}}" class="fw-semibold">TOMs</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <textarea name="description" class="form-control form-control-lg" cols="30" rows="10" id="text-input" contenteditable="true" oninput="updateCounts()"></textarea>
                        </fieldset>
                        <p class="text-center">
                            <strong>Words Count:<span id="word-count">0</span></strong>
                            |<strong> Characters Count:<span id="character-count">0</span></strong>
                            |<strong> Line Count:<span id="line-count">0</span></strong>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2 waves-effect waves-light" id="clear-button" onclick="clearText()"><i class="fa fa-times"></i></button>
                        <button type="submit" class="btn btn-outline-info  mr-1 mb-1 mt-2 waves-effect waves-light" id="copy-button" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                        <button type="submit" class="btn btn-outline-primary mr-1 mb-1 mt-2 waves-effect waves-light" id="download-doc-button"><i class="fa fa-download">Text</i></button>
                        <button type="submit" class="btn btn-outline-success mr-1 mb-1 mt-2 waves-effect waves-light" id="lower-case-button">Lower</button>
                        <button type="submit" class="btn btn-outline-success mr-1 mb-1 mt-2 waves-effect waves-light" id="upper-case-button">Upper</button>
                        <button type="submit" class="btn btn-outline-success mr-1 mb-1 mt-2 waves-effect waves-light" id="inverse-case-button">Inverse</button>
                        <button type="submit" class="btn btn-outline-success mr-1 mb-1 mt-2 waves-effect waves-light" id="capitalize-case-button">Capitalize</button>
                        <button type="submit" class="btn btn-outline-success mr-1 mb-1 mt-2 waves-effect waves-light" id="alternating-case-button">Alternating</button>
                        <button type="submit" class="btn btn-outline-success mr-1 mb-1 mt-2 waves-effect waves-light" id="title-case-button">Sensitive or Title</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Full Editor -->

    <!-- <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-center h-px-500">
                    <form class="w-px-400 border rounded p-3 p-md-5">
                        <h5 class="mb-4 text-center ">Currency Converter By <a href="{{route('indexDashboard')}}" class="fw-semibold">TOMs</a></h5>
                        <div class="mb-3 amount">
                            <label class="form-label" for="form-alignment-username">Enter Your Amount</label>
                            <input type="text" id="form-alignment-username" class="form-control currency_amount" placeholder="" value="1" name="amount">
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="row">
                                <div class="col-5">
                                    <label class="form-label" for="form-alignment-password">From</label>
                                    <div class="input-group input-group-merge from">
                                        <img src="https://flagcdn.com/48x36/us.png" alt="flag" width="20px" height="20" class="mt-2 m-1">
                                        <select class="select2 form-select currency_from"></select>
                                    </div>
                                </div>
                                <div class="col-2 icon ">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <div class="col-5">
                                    <label class="form-label" for="form-alignment-password">To</label>
                                    <div class="input-group input-group-merge to">
                                        <img src="https://flagcdn.com/48x36/in.png" alt="flag" width="20px" height="20" class="mt-2 m-1">
                                        <select class="select2 form-select currency_to"> </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 exchange-rate">
                         
                            1 USD = 118.16 NPR
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-success waves-effect waves-light exchange_currency">Get Exchange Currency</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title mb-0 text-center">
                    <h5 class="mb-0">Other Tools By <a href="{{route('indexDashboard')}}" class="fw-semibold">TOMs</a></h5>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1" role="tablist">
                    <li class="nav-item bg-label-secondary rounded p-2" role="presentation">
                        <a href="{{route('indexTextEditorall')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            All Type Text Editor
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="javascript:void(0);" class="nav-link btn d-flex align-items-center justify-content-center disabled" role="tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1">
                            <div class="badge bg-label-secondary rounded p-2"><i class="ti ti-plus ti-sm"></i></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('currencyconvertor/country-list.js')}}"></script>
<script src="{{asset('currencyconvertor/script.js')}}"></script>
<script src="{{asset('textconvertor/textareacovertor_luicast.js')}}"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.exchange_currency', function() {
            var currency_amount = $('.currency_amount').val();
            var currency_from = $('.currency_from').val();
            var currency_to = $('.currency_to').val();
            // set endpoint and your API key
            endpoint = 'convert';
            access_key = '23f4751b93b0cb22d07dfca7aed80277';
            // define from currency, to currency, and amount
            from = currency_from;
            to = currency_to;
            amount = currency_amount;
            // execute the conversion using the "convert" endpoint:
            $.ajax({
                url: 'https://api.exchangeratesapi.io/v1/' + endpoint + '?access_key=' + access_key + '&from=' + from + '&to=' + to + '&amount=' + amount,
                dataType: 'jsonp',
                success: function(json) {
                    // access the conversion result in json.result
                    alert(json.result);

                }
            });
        });
    });
</script>

@endpush