@extends('admin.layouts.master')
@section('title')
Bycript Text Generator || Online Bcrypt Hash Generator & Checker ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span>All Coding & Data Translation Tools</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Online Bcrypt Hash Generator & Checker By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>
                            <b>
                                <h3>Encrypt</h3>
                                Encrypt some text. The result shown will be a Bcrypt encrypted hash.
                            </b>
                        </p>
                        <form id="sendbydata">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-9 col-sm-8 col-6">
                                    <input type="text" id="chang_by_encript" class="form-control" name="chang_by_encript" placeholder="String"><br>
                                    <input type="text" id="encripted_code" class="form-control" name="encripted_code" hidden>
                                    <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2 waves-effect waves-light" id="clear-button" onclick="clearText()"><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-outline-info  mr-1 mb-1 mt-2 waves-effect waves-light" id="copy-button" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="encripted">Encrypt</button>
                                </div>
                            </div>
                        </form>

                    </div><br>
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>
                            <b>
                                <h3>Decrypt</h3>
                                Test your Bcrypt hash against some plaintext, to see if they match.
                            </b>
                        </p>
                        <form id="check_encript_code">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-9 col-sm-8 col-6">
                                    <input type="text" id="chang_by_encript1" class="form-control" name="chang_by_encript1" placeholder="String To check against"><br>
                                    <input type="text" id="encript_code" class="form-control" name="encript_code" placeholder="Hash To Check"><br>
                                    <input type="text" id="matched_code" class="form-control" name="matched_code" hidden>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4">
                                    <button class="btn btn-primary waves-effect waves-light" type="button" id="check">Check</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Full Editor -->

    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title mb-0 text-center">
                    <h5 class="mb-0">Other Tools Code & Data Translation Relaited By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                    <!-- <small class="text-muted">Yearly Earnings Overview</small> -->
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1" role="tablist">
                    <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textBycripttools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Bycript Hash Generator
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textBinarycodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Binary Code Translator
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textHexcodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Hex Code Translator
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textMorsecodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Morse Code Translator
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('csvToJsontools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            CSV to JSON Converter
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('jsonToCsvtools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            JSON to CSV Converter
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
<script>
    $(document).ready(function() {
        $(document).on('click', '#encripted', function() {
            var formData = $("#sendbydata").serialize();
            var newurl = "{{route('textEncriptchange')}}";
            $.ajax({
                url: newurl,
                type: 'post',
                data: formData,
                success: function(response) {
                    $('#encripted_code').removeAttr('hidden');
                    $('#encripted_code').val(response);
                },
                error: function(error) {
                    // Handle any errors that occur during the AJAX request
                    console.error("Error:", error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#check', function() {
            var formData1 = $("#check_encript_code").serialize();
            var newurl = "{{ route('textEncriptcheck') }}";
            $.ajax({
                url: newurl,
                type: 'post',
                data: formData1,
                success: function(response) {
                    $('#matched_code').removeAttr('hidden');
                    $('#matched_code').val(response);
                },
                error: function(error) {
                    // Handle any errors that occur during the AJAX request
                    console.error("Error:", error);
                }
            });
        });
    });
</script>

<script>
    function copyToClipboard() {
        const inputField = document.getElementById('encripted_code');
        const selection = window.getSelection();

        if (selection.toString().length > 0) {
            // If text is selected, copy the selected text
            document.execCommand('copy');
        } else {
            // If no text is selected, copy the entire input field value
            inputField.select();
            document.execCommand('copy');
        }
        alert('copy successfully !')
    }

    //Copy Text End

    function clearText() {
        const inputField = document.getElementById('encripted_code');
        const selection = window.getSelection();

        if (selection.toString().length > 0) {
            document.execCommand('delete');
        } else {
            inputField.value = ''; // Clear the entire input field
        }
    }
</script>

@endpush