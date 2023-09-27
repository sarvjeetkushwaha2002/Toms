@extends('admin.layouts.master')
@section('title')
Contact Us Text Generator || Online Free Contact Us Text Generator|| Website Page Contact Us Text Generator||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a><a href="{{route('allcodeDatatransalator')}}">All Coding & Data Translation Tools/</a></span>Online Free Contact Us Text Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Online Free Contact Us Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">Tech Onmediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-xl-12 col-xxl-12 col-md-12 col-sm-12">
                        <div class="d-flex align-items-center justify-content-center ">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <br>
                            <form class=" border rounded p-3 p-md-5" id="sendbydata">
                                @csrf
                                <div class="mb-3">
                                    <span id="form_error" style="color: red;"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="company_name">Your Company Name</label>
                                    <input type="text" id="company_name" class="form-control" placeholder="Enter..." name="company_name" required>
                                    <p>If You don't have a company registered,enter the website name.</p>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label" for="website_name">Your Website Name</label>
                                    <input type="text" id="website_name" class="form-control" placeholder="Enter..." name="website_name" required>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label" for="website_url">Your Website URL</label>
                                    <input type="text" id="website_url" class="form-control" placeholder="Enter..." name="website_url" required>
                                </div>
                                <div class="mb-3">
                                    @php
                                    $countries=App\Models\Country::get();
                                    @endphp
                                    <label class="form-label" for="country_id">Country</label>
                                    <select id="country_id" class="select2 form-select" data-allow-clear="true" name="country_id" required>
                                        <option value="0">--Select Country--</option>
                                        @forelse ($countries as $country )
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @empty
                                        <option>No Value</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="states">States</label>
                                    <select id="states" class="select2 form-select" data-allow-clear="true" name="state_id">
                                        <option value="0">--Select State--</option>
                                    </select>
                                </div>
                                <hr>
                                <p>If you want choose any one (email Or phone).</p>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Your Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter..." name="email">
                                </div>
                                <span>Or</span>
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Your Phone Address</label>
                                    <input type="text" id="phone" class="form-control" placeholder="Enter..." name="phone">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="contactUs">Generate Contact Us</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <textarea name="description" class="form-control form-control-lg" cols="30" rows="10" id="text-input" contenteditable="true" oninput="updateCounts()" hidden></textarea>
                        </fieldset>
                        <!-- <p class="text-center">
                            <strong>Words Count:<span id="word-count">0</span></strong>
                            |<strong> Characters Count:<span id="character-count">0</span></strong>
                            |<strong> Line Count:<span id="line-count">0</span></strong>
                        </p> -->
                    </div>
                </div>
                <div class="row" id="button-1">
                    <div class="col">
                        <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2 waves-effect waves-light" id="clear-button" onclick="clearText()"><i class="fa fa-times"></i></button>
                        <button type="submit" class="btn btn-outline-info  mr-1 mb-1 mt-2 waves-effect waves-light" id="copy-button" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                    </div>
                </div><br>
                <div class="container">
                    <div class="row" id="preview">

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
                    <h5 class="mb-0 ">How To Use Online Free Contact Us Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">Tech Onmediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Online Free Contact Us Text Generator</h5>
                            <small>Fill The Form and Click the Button after Generator Contact Us </small><br><br>
                            <p><b>1.</b>First, you will fill out the form, then click on the "Generate Contact Us" button and wait. <br><br>
                                <b>2.</b>First, you will fill out the form and then click on the "Generate Contact Us" button and wait. If you have filled it out correctly, you will see a textarea box with HTML code, and you can copy what you need.
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Clear This Text To <i class="fas fa-trash"></i> Icon</h5>
                            <small>Click on <i class="fas fa-trash"></i> Icon</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be clear.<br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be clear.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Copy This Text To <i class="fa fa-clone"></i> Icon</h5>
                            <small>Click on <i class="fa fa-clone"></i> Icon</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be copy. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be copy.
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
    $(document).ready(function() {
        $(document).on('change', "#country_id", function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                var newurl = "{{ url('fetch-states') }}/" + optionValue;
                $.ajax({
                    url: newurl,
                    method: 'get',
                    beforeSend: function() {
                        $('#states').html('<option selected hidden>Fetching.......</option>');
                    },
                    success: function(p) {
                        $("#states").html(p);
                    }
                });
            });
        }).change();
    });
</script>

<script>
    $(document).ready(function() {
        $('#button-1').hide();
        $(document).on('click', '#contactUs', function() {
            var formData = $("#sendbydata").serialize();
            var newurl = "{{ route('createContactUs') }}";
            $.ajax({
                url: newurl,
                type: 'post',
                data: formData,
                success: function(response) {
                    console.log();
                    if (response.message == 'any fields not fill') {
                        $('#form_error').text('Fill All Required Fields !');
                    } else {
                        $('#text-input').removeAttr('hidden');
                        $('#sendbydata').hide();
                        $('#button-1').show();
                        $('#text-input').val(response); // Update the content with 'response'
                        $('#preview').html(response);
                    }
                },
                error: function(error) {
                    // Handle any errors that occur during the AJAX request
                    alert("Error:", error);
                }
            });
        });
    });
</script>

<script src="{{asset('textconvertor/textareacovertor_luicast.js')}}"></script>
@endpush