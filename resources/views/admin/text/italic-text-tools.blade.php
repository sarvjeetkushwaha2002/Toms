@extends('admin.layouts.master')
@section('title')
Italic Text Generator || Italics Generator ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Italic Text Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Italic Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
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
                            <textarea name="generated-description" class="form-control form-control-lg" cols="30" rows="10" id="generated-text" contenteditable="true" placeholder="𝘌𝘯𝘵𝘦𝘳 𝘠𝘰𝘶𝘳 𝘛𝘦𝘹𝘵"></textarea>
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
                    <h5 class="mb-0 ">How To Use Italic Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Italic Text Generator</h5>
                            <small>Enter Value Automatic Generator </small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "Enter your text" 'Enter your text' textarea, the text will be generated in Reverse text formats '𝘌𝘯𝘵𝘦𝘳 𝘠𝘰𝘶𝘳 𝘛𝘦𝘹𝘵' in the second textarea. <br><br>
                                <b>2.</b>Do you want to convert your text into an italic font? Then use this simple and free online italic text generator. All you have to do is write the words that you want to be converted into italics in the left hand field of the italicized generator, then as you write it out, you’re going to see the font get converted into italic text on the right. Once you are done, simply copy the italic text and paste it where you want.
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
        const italicFont = text.split('').map(char => getItalicChar(char)).join('');

        return italicFont;
    }

    function getItalicChar(char) {
        const fontitalicMap = {
            'a': '𝘢',
            'b': '𝘣',
            'c': '𝘤',
            'd': '𝘥',
            'e': '𝘦',
            'f': '𝘧',
            'g': '𝘨',
            'h': '𝘩',
            'i': '𝘪',
            'j': '𝘫',
            'k': '𝘬',
            'l': '𝘭',
            'm': '𝘮',
            'n': '𝘯',
            'o': '𝘰',
            'p': '𝘱',
            'q': '𝘲',
            'r': '𝘳',
            's': '𝘴',
            't': '𝘵',
            'u': '𝘶',
            'v': '𝘷',
            'w': '𝘸',
            'x': '𝘹',
            'y': '𝘺',
            'z': '𝘻',
            'A': '𝘈',
            'B': '𝘉',
            'C': '𝘊',
            'D': '𝘋',
            'E': '𝘌',
            'F': '𝘍',
            'G': '𝘎',
            'H': '𝘏',
            'I': '𝘐',
            'J': '𝘑',
            'K': '𝘒',
            'L': '𝘓',
            'M': '𝘔',
            'N': '𝘕',
            'O': '𝘖',
            'P': '𝘗',
            'Q': '𝘘',
            'R': '𝘙',
            'S': '𝘚',
            'T': '𝘛',
            'U': '𝘜',
            'V': '𝘝',
            'W': '𝘞',
            'X': '𝘟',
            'Y': '𝘠',
            'Z': '𝘡',
        };

        return fontitalicMap[char] || char;
    }
</script>
@endpush