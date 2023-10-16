@extends('admin.layouts.master')
@section('title')
Online JSON to CSV Text Converter || JSON to CSV Text Converter || Convert Case
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('allcodeDatatransalator')}}">All Coding & Data Translation Tools/</a></span>JSON to CSV Text Converter</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">JSON to CSV Text Converter By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>Enter Your Text....👇</p>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <textarea name="description" class="form-control form-control-lg" cols="30" rows="10" id="write-text" contenteditable="true" oninput="updateText();" placeholder='[
  {
    "Column 1": "Title",
    "Column 2": "OnMediums"
  },
  {
    "Column 1": "Url",
    "Column 2": "https://onmediums.com"
  }
]'></textarea>
                        </fieldset>
                        <p class="text-center">
                            <strong>Words Count: <span id="write-word-count">0</span></strong>
                            | <strong>Characters Count: <span id="write-character-count">0</span></strong>
                            | <strong>Line Count: <span id="write-line-count">0</span></strong>
                        </p>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>Generated Response....👇</p>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <textarea name="generated-description" class="form-control form-control-lg" cols="30" rows="10" id="generated-text" contenteditable="true" placeholder="Column 1,Column 2
Title,OnMediums
Url,https://onmediums.com"></textarea>
                        </fieldset>
                        <p class="text-center">
                            <strong>Words Count: <span id="generated-word-count">0</span></strong>
                            | <strong>Characters Count: <span id="generated-character-count">0</span></strong>
                            | <strong>Line Count: <span id="generated-line-count">0</span></strong>
                        </p>
                        <div>
                            <button type="button" class="btn btn-outline-primary mr-1 mb-1 mt-2" onclick="copyGeneratedText()"><i class="fas fa-copy"></i></button>
                            <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2" onclick="clearGeneratedText()"><i class="fas fa-trash"></i></button>
                            <a id="download-link" class="btn btn-outline-success mr-1 mb-1 mt-2" href="#" download="generated_text.txt"><i class="fas fa-download"></i>Text</a>
                        </div>
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
                    <h5 class="mb-0 ">How To Use JSON to CSV Text Converter By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">JSON to CSV Text Converter</h5>
                            <small>Enter Value Automatic json convert csv text</small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "[
                                {
                                "Column 1": "Title",
                                "Column 2": "OnMediums"
                                },
                                {
                                "Column 1": "Url",
                                "Column 2": "https://onmediums.com"
                                }
                                ]"  textarea, the text will be generated in text formats'
                                Column 1,Column 2
                                Title,OnMediums
                                Url,https://onmediums.com' in the second textarea. <br><br>
                                <b>2.</b>If you want to convert text to a csv and save time by using a JSON to CSV Text Converter tool
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
<script src="{{asset('textconvertor/json_stringify.js')}}"></script>
<script>
function convertTextFormat(text) {
    const jsonData =text;

try {
    const parsedData = JSON.parse(jsonData);

    if (!Array.isArray(parsedData) || parsedData.length === 0) {
        throw new Error("Invalid JSON format. Please provide a valid JSON array.");
    }

    const headers = Object.keys(parsedData[0]);
    const csvData = [headers.join(',')];

    for (const row of parsedData) {
        const values = headers.map(header => row[header]);
        csvData.push(values.join(','));
    }

  return csvData.join('\n');
} catch (error) {
    return `Error: ${error.message}`;
}
}
</script>
@endpush