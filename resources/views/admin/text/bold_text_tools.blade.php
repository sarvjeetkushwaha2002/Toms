@extends('admin.layouts.master')
@section('title')
Bold Text Generator || Bold Font || Bold Generator || Bold Converter ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Bold Text Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Bold Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
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
                            <textarea name="generated-description" class="form-control form-control-lg" cols="30" rows="10" id="generated-text" contenteditable="true" placeholder="𝗘𝗻𝘁𝗲𝗿 𝗬𝗼𝘂𝗿 𝗧𝗲𝘅𝘁"></textarea>
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
                    <h5 class="mb-0 ">How To Use Bold Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Bold Text Generator</h5>
                            <small>Enter Value Automatic Generator </small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "Enter your text" 'Enter your text' textarea, the text will be generated in Reverse text formats '𝗘𝗻𝘁𝗲𝗿 𝗬𝗼𝘂𝗿 𝗧𝗲𝘅𝘁' in the second textarea. <br><br>
                                <b>2.</b>Do you want to convert your text into an bold font? Then use this simple and free online bold text generator. All you have to do is write the words that you want to be converted into bolds in the left hand field of the bold generator, then as you write it out, you’re going to see the font get converted into bold text on the right. Once you are done, simply copy the bold text and paste it where you want.
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
        const boldFont = text.split('').map(char => getBoldChar(char)).join('');

        return boldFont;
    }

    function getBoldChar(char) {
        const fontboldMap = {
            '1': '𝟭',
            '2': '𝟮',
            '3': '𝟯',
            '4': '𝟰',
            '5': '𝟱',
            '6': '𝟲',
            '7': '𝟳',
            '8': '𝟴',
            '9': '𝟵',
            '0': '𝟬',
            'a': '𝗮',
            'b': '𝗯',
            'c': '𝗰',
            'd': '𝗱',
            'e': '𝗲',
            'f': '𝗳',
            'g': '𝗴',
            'h': '𝗵',
            'i': '𝗶',
            'j': '𝗷',
            'k': '𝗸',
            'l': '𝗹',
            'm': '𝗺',
            'n': '𝗻',
            'o': '𝗼',
            'p': '𝗽',
            'q': '𝗾',
            'r': '𝗿',
            's': '𝘀',
            't': '𝘁',
            'u': '𝘂',
            'v': '𝘃',
            'w': '𝘄',
            'x': '𝘅',
            'y': '𝘆',
            'z': '𝘇',
            'A': '𝗔',
            'B': '𝗕',
            'C': '𝗖',
            'D': '𝗗',
            'E': '𝗘',
            'F': '𝗙',
            'G': '𝗚',
            'H': '𝗛',
            'I': '𝗜',
            'J': '𝗝',
            'K': '𝗞',
            'L': '𝗟',
            'M': '𝗠',
            'N': '𝗡',
            'O': '𝗢',
            'P': '𝗣',
            'Q': '𝗤',
            'R': '𝗥',
            'S': '𝗦',
            'T': '𝗧',
            'U': '𝗨',
            'V': '𝗩',
            'W': '𝗪',
            'X': '𝗫',
            'Y': '𝗬',
            'Z': '𝗭',
        };

        return fontboldMap[char] || char;
    }
</script>
@endpush