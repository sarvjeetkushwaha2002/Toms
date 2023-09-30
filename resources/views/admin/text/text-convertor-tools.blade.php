@extends('admin.layouts.master')
@section('title')
Dashboard ||Text Convertor Editor
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Text Convertor Editor</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Text Convertor Case By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
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

    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title mb-0 text-center">
                    <h5 class="mb-0 ">How To Use Text Convertor By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Convert This Text To Lower Case</h5>
                            <small>Click on Lower Button</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be converted to lowercase. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be converted to lowercase.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Convert This Text To Upper Case</h5>
                            <small>Click on Upper Button</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be converted to uppercase. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be converted to uppercase.
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Convert This Text To Inverse Case</h5>
                            <small>Click on Inverse Button</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be converted to inversecase. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be converted to Inversecase.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Convert This Text To Title Case</h5>
                            <small>Click on Title Button</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be converted to titlecase. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be converted to titlecase.
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Convert This Text To Alternating Case</h5>
                            <small>Click on Alternating Button</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be converted to alternatingcase. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be converted to alternatingcase.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Convert This Text To Capitalize Case</h5>
                            <small>Click on Capitalize Button</small><br><br>
                            <p><b>1.</b>If text is selected, only the selected text should be converted to capitalizecase. <br> <br>
                                <b>2.</b> If no text is selected, the entire content in the editor should be converted to capitalizecase.
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Clear This Text To <i class="fa fa-times"></i> Icon</h5>
                            <small>Click on <i class="fa fa-times"></i> Icon</small><br><br>
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
<script src="{{asset('textconvertor/textareacovertor_luicast.js')}}"></script>

@endpush