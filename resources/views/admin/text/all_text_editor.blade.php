@extends('admin.layouts.master')
@section('title')
Tech OnMediums || Text Editor
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span>All Text Editor</h4>
<div class="row">
    <!-- Full Editor -->
    <!-- <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Text Editor By <a href="{{route('indexDashboard')}}" class="fw-semibold">TOMs</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div id="full-editor" contenteditable="true" oninput="updateCounts()">
                        </div>
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
    </div> -->
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

    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title mb-0 text-center">
                    <h5 class="mb-0">Other Tools Text Relaited By <a href="{{route('indexDashboard')}}" class="fw-semibold">TOMs</a></h5>
                    <!-- <small class="text-muted">Yearly Earnings Overview</small> -->
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs widget-nav-tabs pb-3 gap-4 mx-1" role="tablist">
                    <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textConvertortools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Convert Case
                        </a>
                    </li>
                    <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textSmalltools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Small text Tool
                        </a>
                    </li>
                    <li class="nav-item bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textWidetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Wide text Tool
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textReversetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Reverse Text Tool
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textStrikethroughtools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Strikethrough Text Tool
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textTitleCasetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Title Case Text Tool
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textBinarycodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Binary Code Translator
                        </a>
                    </li>
                    <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textMorsecodetools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Morse Code Translator
                        </a>
                    </li>
                    <!-- <li class="nav-item  bg-label-secondary rounded p-2 " role="presentation">
                        <a href="{{route('textItalictools')}}" class="nav-link btn d-flex flex-column align-items-center justify-content-center" aria-controls="navs-orders-id" aria-selected="false" tabindex="-1">
                            Italic Text Tool
                        </a>
                    </li> -->
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
<!-- <script src="{{asset('textconvertor/textconvertor_luicast.js')}}"></script> -->
<script src="{{asset('textconvertor/textareacovertor_luicast.js')}}"></script>

@endpush