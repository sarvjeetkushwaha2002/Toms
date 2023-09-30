@extends('admin.layouts.master')
@section('title')
Text Replacer || Find and Replace Text Online || Text Replacement Tools
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Find and Replace Text</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Find and Replace Text By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row g-3 mb-3">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-5">
                                <input type="text" id="findInput" class="form-control" name="chang_by_encript" placeholder="Enter the text">
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="findAndSelect()" id="encripted">Find </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                            <div class="col-5">
                                <input type="text" id="replaceInput" class="form-control" name="chang_by_encript" placeholder="Enter the text">
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="replaceText()" id="encripted">Replace </button>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <button type="submit" class="btn btn-outline-primary mr-1 mb-1 mt-2 waves-effect waves-light" id="download-doc-button1"><i class="fa fa-download">Text</i></button>
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
                    <h5 class="mb-0 ">How To Use Find and Replace Text By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Enter This Text To Find</h5>
                            <small>Click on Find Button</small><br><br>
                            <p><b>1.</b>. Enter the text first input Field and click on "Find" button and search for textaera box.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Enter This Text To Replace</h5>
                            <small>Click on Replace Button</small><br><br>
                            <p><b>1.</b>. Enter the text Second input Field and click on "Replace" button and replce all text when find value for textaera box. </p>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Enter This Text To Text Replacer</h5>
                            <small>Click on Replace Button</small><br><br>
                            <p><b>1.</b>If you have a specific text you want to search through and replace a word, you can provide the text here, along with the word you want to find and the word you want to replace it with. I can then guide you on how to make the replacements manually.
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
<script>
    function findAndSelect() {
        var textArea = document.getElementById("text-input");
        var findText = document.getElementById("findInput").value;
        var text = textArea.value;

        if (findText.length > 0) {
            var startIndex = text.indexOf(findText);

            if (startIndex !== -1) {
                textArea.setSelectionRange(startIndex, startIndex + findText.length);
                textArea.focus(); // Set focus to the textarea to see the selection
            }
        }
    }

    function replaceText() {
        var textArea = document.getElementById("text-input");
        var findText = document.getElementById("findInput").value;
        var replaceText = document.getElementById("replaceInput").value;
        var text = textArea.value;

        if (findText.length > 0) {
            text = text.replace(new RegExp(findText, "g"), replaceText);
            textArea.value = text;
        }
    }
</script>
<script>
    const downloadDocButton1 = document.getElementById('download-doc-button1');
    downloadDocButton1.addEventListener('click', () => {
        downloadDoc();
    });

    function downloadDoc() {
        const content = textarea.innerText;
        const docBlob = new Blob([content], {
            type: 'application/msword'
        });
        const url = URL.createObjectURL(docBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'content.doc';
        a.click();
        URL.revokeObjectURL(url);
    }
</script>

@endpush