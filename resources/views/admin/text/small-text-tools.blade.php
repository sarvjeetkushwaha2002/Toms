@extends('admin.layouts.master')
@section('title')
Small Text Generator || Superscript Generator || Tiny Text Generator ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Small Text Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4 ">
        <div class="card">
            <h5 class="card-header text-center">Small Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>Enter Your Text....👇</p>
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <textarea name="description" class="form-control form-control-lg" cols="30" rows="10" id="write-text" contenteditable="true" oninput="updateText();" placeholder="Enter Your Text"></textarea>
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
                            <textarea name="generated-description" class="form-control form-control-lg" cols="30" rows="10" id="generated-text" contenteditable="true" placeholder="
Small Caps
ENTER YOUR TEXT

Superscript
ᵉⁿᵗᵉʳ ʸᵒᵘʳ ᵗᵉˣᵗ
"></textarea>
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
                    <h5 class="mb-0 ">How To Use Small Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Small Text Generator</h5>
                            <small>Enter Value Automatic Generator </small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "Enter your text" textarea, the text will be generated in both "Small Capital" and "Superscript" formats in the second textarea. <br><br>
                                <b>2.</b>This small text generator is a handy online tool, where you can convert standard text (whether that’s capitals, small letters and more) into tiny text. The tiny text options are ‘small caps’ and ‘superscript’. Find out how to use the tiny text generator above.
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
        const smallCaps = text.split('').map(char => char === '' ? '' : char.toUpperCase()).join('');
        const superscript = text.split('').map(char => getSuperscriptChar(char)).join('');

        return `Small Caps\n${smallCaps}\n\nSuperscript\n${superscript}`;
    }

    function getSuperscriptChar(char) {
        const superscriptMap = {
            '0': '⁰',
            '1': '¹',
            '2': '²',
            '3': '³',
            '4': '⁴',
            '5': '⁵',
            '6': '⁶',
            '7': '⁷',
            '8': '⁸',
            '9': '⁹',
            'a': 'ᵃ',
            'b': 'ᵇ',
            'c': 'ᶜ',
            'd': 'ᵈ',
            'e': 'ᵉ',
            'f': 'ᶠ',
            'g': 'ᵍ',
            'h': 'ʰ',
            'i': 'ⁱ',
            'j': 'ʲ',
            'k': 'ᵏ',
            'l': 'ˡ',
            'm': 'ᵐ',
            'n': 'ⁿ',
            'o': 'ᵒ',
            'p': 'ᵖ',
            'q': 'ᵠ',
            'r': 'ʳ',
            's': 'ˢ',
            't': 'ᵗ',
            'u': 'ᵘ',
            'v': 'ᵛ',
            'w': 'ʷ',
            'x': 'ˣ',
            'y': 'ʸ',
            'z': 'ᶻ',
        };

        return superscriptMap[char.toLowerCase()] || char;
    }
</script>
@endpush