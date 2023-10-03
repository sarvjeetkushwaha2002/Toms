@extends('admin.layouts.master')
@section('title')
Text To Speech Generator || Online Text To Speech || Free Text To Speech||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a><a href="{{route('allcodeDatatransalator')}}">All Coding & Data Translation Tools/</a></span>Text To Speech Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Text To Speech Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p>Enter Your Text....👇</p>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <textarea name="description" class="form-control form-control-lg" cols="30" rows="10" id="textspeech" contenteditable="true" oninput="updateText();" placeholder="Enter Your Text"></textarea>
                        </fieldset>
                        <p class="text-center">
                            <strong>Words Count: <span id="write-word-count">0</span></strong>
                            | <strong>Characters Count: <span id="write-character-count">0</span></strong>
                            | <strong>Line Count: <span id="write-line-count">0</span></strong>
                        </p>
                        <div>
                            <button type="button" class="btn btn-outline-primary mr-1 mb-1 mt-2" onclick="copyGeneratedText()"><i class="fas fa-copy"></i></button>
                            <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2" onclick="clearGeneratedText()"><i class="fas fa-trash"></i></button>
                            <button type="button" class="btn btn-outline-info mr-1 mb-1 mt-2" onclick="readButttonText()"><i class="fa fa-volume-up"></i></button>
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
                    <h5 class="mb-0 ">How To Use Text To Speech Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Online Text To Speech Generator</h5>
                            <small>Enter Value and Click the <i class="fa fa-volume-up"></i> Button after Speech voice Generator </small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "Enter Youe Text" in textarea, the text will be generated in voice formats 'Enter Your text <i class="fa fa-volume-up"></i>'<br><br>
                                <b>2.</b>Do you want to convert your text into an voice Formate? Then use this simple and free Online Text To Speech Generator. All you have to do is write the words that you want to be converted into voice in the down hand field of the Text To Speech Generator , then as you write it out, you’re going to see the font get converted into voice formate on the up. Once you are done, simply copy the text formate and paste it where you want.
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
    function updateText() {
        const textArea = document.getElementById('textspeech');
        const generatedTextArea = document.getElementById('generated-text');

        const text = textArea.value;
        const words = text.trim().split(/\s+/);

        document.getElementById('write-word-count').textContent = words.length;
        document.getElementById('write-character-count').textContent = text.length;
        document.getElementById('write-line-count').textContent = text.split('\n').length;

        updateText();
    }

    function readButttonText() {

        const textInput = document.getElementById('textspeech');
        const speechSynthesis = window.speechSynthesis;

        const text = textInput.value;

        if (text.trim() !== '') {
            const speech = new SpeechSynthesisUtterance(text);
            speechSynthesis.speak(speech);
        } else {
            const speech = new SpeechSynthesisUtterance('Please enter text to be spoken.');
            speechSynthesis.speak(speech);
        }

    }

    function copyGeneratedText() {
        const inputField = document.getElementById('textspeech');
        const selection = window.getSelection();

        if (selection.toString().length > 0) {
            document.execCommand('copy');
        } else {
            inputField.select();
            document.execCommand('copy');
        }
        const speechSynthesis = window.speechSynthesis;
        const speech = new SpeechSynthesisUtterance('You are Copy Successfully!');
        speechSynthesis.speak(speech);
    }

    //Copy Text End

    function clearGeneratedText() {
        const inputField = document.getElementById('textspeech');
        const selection = window.getSelection();

        if (selection.toString().length > 0) {
            document.execCommand('delete');
        } else {
            inputField.value = '';
        }
        const speechSynthesis = window.speechSynthesis;
        const speech = new SpeechSynthesisUtterance('You are remove Successfully!');
        speechSynthesis.speak(speech);
    }
</script>

@endpush