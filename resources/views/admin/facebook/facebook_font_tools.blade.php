@extends('admin.layouts.master')
@section('title')
Social Media(Facebook,WhatsApp,Instagram) || Facebook Font Generator || Convert Case ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Social Media(Facebook,Instagram) Text Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4 ">
        <div class="card">
            <h5 class="card-header text-center">Social Media(Facebook,WhatsApp,Instagram) Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
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
🅴🅽🆃🅴🆁 🆈 🅾🆄🆁 🆃🅴🆇🆃

🅔🅝🅣🅔🅡 🅨🅞🅤🅡 🅣🅔🅧🅣

Ⓔⓝⓣⓔⓡ Ⓨⓞⓤⓡ Ⓣⓔⓧⓣ

🄴🄽🅃🄴🅁 🅈🄾🅄🅁 🅃🄴🅇🅃

𝓔𝓷𝓽𝓮𝓻 𝓨𝓸𝓾𝓻 𝓣𝓮𝔁𝓽

ℰ𝓃𝓉ℯ𝓇 𝒴ℴ𝓊𝓇 𝒯ℯ𝓍𝓉

EᑎTEᖇ YOᑌᖇ TE᙭T

E₦₮ɆⱤ YØɄⱤ TɆӾ₮

EŇtＥя Yσ𝕌я TＥ𝐗t

E𝓝𝓉𝐄ℝ Yㄖ𝓤ℝ T𝐄ⓧ𝓉

E n t e r   Y o u r   T e x t

Eꋊ꓄ꏂꋪ Yꄲ꒤ꋪ Tꏂꉧ꓄

Eꋊꋖꈼꌅ Yꂦꐇꌅ Tꈼꇒꋖ

Eռȶɛʀ Yօʊʀ TɛӼȶ

Eɳƚҽɾ Yσυɾ Tҽxƚ

EภՇєг Y๏ยг TєאՇ

E几卞ヨ尺 Y回凵尺 Tヨメ卞

𝕰𝖓𝖙𝖊𝖗 𝖄𝖔𝖚𝖗 𝕿𝖊𝖝𝖙

𝔈𝔫𝔱𝔢𝔯 𝔜𝔬𝔲𝔯 𝔗𝔢𝔵𝔱"></textarea>
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
                    <h5 class="mb-0 ">How To Use Social Media(Facebook,WhatsApp,Instagram) Text Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Social Media(Facebook,WhatsApp,Instagram) Text Generator</h5>
                            <small>Enter Value Automatic Generator </small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "Enter Your Text" textarea, the text will be generated in both "
                                🅴🅽🆃🅴🆁 🆈 🅾🆄🆁 🆃🅴🆇🆃

                                🅔🅝🅣🅔🅡 🅨🅞🅤🅡 🅣🅔🅧🅣

                                Ⓔⓝⓣⓔⓡ Ⓨⓞⓤⓡ Ⓣⓔⓧⓣ

                                🄴🄽🅃🄴🅁 🅈🄾🅄🅁 🅃🄴🅇🅃

                                𝓔𝓷𝓽𝓮𝓻 𝓨𝓸𝓾𝓻 𝓣𝓮𝔁𝓽

                                ℰ𝓃𝓉ℯ𝓇 𝒴ℴ𝓊𝓇 𝒯ℯ𝓍𝓉

                                EᑎTEᖇ YOᑌᖇ TE᙭T

                                E₦₮ɆⱤ YØɄⱤ TɆӾ₮

                                EŇtＥя Yσ𝕌я TＥ𝐗t

                                E𝓝𝓉𝐄ℝ Yㄖ𝓤ℝ T𝐄ⓧ𝓉

                                E n t e r Y o u r T e x t

                                Eꋊ꓄ꏂꋪ Yꄲ꒤ꋪ Tꏂꉧ꓄

                                Eꋊꋖꈼꌅ Yꂦꐇꌅ Tꈼꇒꋖ

                                Eռȶɛʀ Yօʊʀ TɛӼȶ

                                Eɳƚҽɾ Yσυɾ Tҽxƚ

                                EภՇєг Y๏ยг TєאՇ

                                E几卞ヨ尺 Y回凵尺 Tヨメ卞

                                𝕰𝖓𝖙𝖊𝖗 𝖄𝖔𝖚𝖗 𝕿𝖊𝖝𝖙

                                𝔈𝔫𝔱𝔢𝔯 𝔜𝔬𝔲𝔯 𝔗𝔢𝔵𝔱" formats in the second textarea. <br><br>
                                <b>2.</b>Create fonts for your Facebook profile or page with our easy-to-use font generator.<br><br>
                                <b>3.</b>This Social Media(Facebook,WhatsApp,Instagram) text generator is a handy online tool, where you can convert standard text (whether that’s Social Media(Facebook,WhatsApp,Instagram)) into text. The text options are 'Social Media(Facebook,WhatsApp,Instagram)'. Find out how to use the Social Media(Facebook,WhatsApp,Instagram) text generator above.
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
        const colorFont = text.split('').map(char => getColorscriptChar(char)).join('');
        const socialFont2 = text.split('').map(char => getSocial2Char(char)).join('');
        const socialFont3 = text.split('').map(char => getSocial3Char(char)).join('');
        const socialFont4 = text.split('').map(char => getSocial4Char(char)).join('');
        const socialFont5 = text.split('').map(char => getSocial5Char(char)).join('');
        const socialFont6 = text.split('').map(char => getSocial6Char(char)).join('');
        const socialFont7 = text.split('').map(char => getSocial7Char(char)).join('');
        const socialFont8 = text.split('').map(char => getSocial8Char(char)).join('');
        const socialFont9 = text.split('').map(char => getSocial9Char(char)).join('');
        const socialFont10 = text.split('').map(char => getSocial10Char(char)).join('');
        const socialFont11 = text.split('').map(char => getSocial11Char(char)).join('');
        const socialFont12 = text.split('').map(char => getSocial12Char(char)).join('');
        const socialFont13 = text.split('').map(char => getSocial13Char(char)).join('');
        const socialFont14 = text.split('').map(char => getSocial14Char(char)).join('');
        const smallCaps = text.split('').map(char => char === ' ' ? ' ' : char).join(' ');
        const socialFont15 = text.split('').map(char => getSocial15Char(char)).join('');
        const socialFont16 = text.split('').map(char => getSocial16Char(char)).join('');
        const socialFont17 = text.split('').map(char => getSocial17Char(char)).join('');
        const socialFont18 = text.split('').map(char => getSocial18Char(char)).join('');
        return `\n${colorFont}\n\n${socialFont2}\n\n${socialFont3}\n\n${socialFont4}\n\n${socialFont5}\n\n${socialFont6}\n\n${socialFont7}\n\n${socialFont8}\n\n${socialFont9}\n\n${socialFont10}\n\n${smallCaps}\n\n${socialFont11}\n\n${socialFont12}\n\n${socialFont13}\n\n${socialFont14}\n\n${socialFont15}\n\n${socialFont16}\n\n${socialFont17}\n\n${socialFont18}`;
    }

    function getColorscriptChar(char) {
        const colorfontscriptMap = {
            'A': '🅰',
            'B': ' 🅱',
            'C': '🅲',
            'D': '🅳',
            'E': '🅴',
            'F': '🅵',
            'G': '🅶',
            'H': '🅷',
            'I': '🅸',
            'J': '🅹',
            'K': '🅺',
            'L': '🅻',
            'M': '🅼',
            'N': '🅽',
            'O': ' 🅾',
            'P': ' 🅿',
            'Q': '🆀',
            'R': '🆁',
            'S': '🆂',
            'T': '🆃',
            'U': '🆄',
            'V': '🆅',
            'W': '🆆',
            'X': '🆇',
            'Y': '🆈',
            'Z': '🆉',
            'a': '🅰',
            'b': ' 🅱',
            'c': '🅲',
            'd': '🅳',
            'e': '🅴',
            'f': '🅵',
            'g': '🅶',
            'h': '🅷',
            'i': '🅸',
            'j': '🅹',
            'k': '🅺',
            'l': '🅻',
            'm': '🅼',
            'n': '🅽',
            'o': ' 🅾',
            'p': ' 🅿',
            'q': '🆀',
            'r': '🆁',
            's': '🆂',
            't': '🆃',
            'u': '🆄',
            'v': '🆅',
            'w': '🆆',
            'x': '🆇',
            'y': '🆈',
            'z': '🆉',
        };

        return colorfontscriptMap[char] || char;
    }

    function getSocial2Char(char) {
        const social2fontscriptMap = {
            'a': '🅐',
            'b': '🅑',
            'c': '🅒',
            'd': '🅓',
            'e': '🅔',
            'f': '🅕',
            'g': '🅖',
            'h': '🅗',
            'i': '🅘',
            'j': '🅙',
            'k': '🅚',
            'l': '🅛',
            'm': '🅜',
            'n': '🅝',
            'o': '🅞',
            'p': '🅟',
            'q': '🅠',
            'r': '🅡',
            's': '🅢',
            't': '🅣',
            'u': '🅤',
            'v': '🅥',
            'w': '🅦',
            'x': '🅧',
            'y': '🅨',
            'z': '🅩',
            'A': '🅐',
            'B': '🅑',
            'C': '🅒',
            'D': '🅓',
            'E': '🅔',
            'F': '🅕',
            'G': '🅖',
            'H': '🅗',
            'I': '🅘',
            'J': '🅙',
            'K': '🅚',
            'L': '🅛',
            'M': '🅜',
            'N': '🅝',
            'O': '🅞',
            'P': '🅟',
            'Q': '🅠',
            'R': '🅡',
            'S': '🅢',
            'T': '🅣',
            'U': '🅤',
            'V': '🅥',
            'W': '🅦',
            'X': '🅧',
            'Y': '🅨',
            'Z': '🅩',
        };

        return social2fontscriptMap[char] || char;
    }

    function getSocial3Char(char) {
        const social3fontscriptMap = {
            'a': 'ⓐ',
            'b': 'ⓑ',
            'c': 'ⓒ',
            'd': 'ⓓ',
            'e': 'ⓔ',
            'f': 'ⓕ',
            'g': 'ⓖ',
            'h': 'ⓗ',
            'i': 'ⓘ',
            'j': 'ⓙ',
            'k': 'ⓚ',
            'l': 'ⓛ',
            'm': 'ⓜ',
            'n': 'ⓝ',
            'o': 'ⓞ',
            'p': 'ⓟ',
            'q': 'ⓠ',
            'r': 'ⓡ',
            's': 'ⓢ',
            't': 'ⓣ',
            'u': 'ⓤ',
            'v': 'ⓥ',
            'w': 'ⓦ',
            'x': 'ⓧ',
            'y': 'ⓨ',
            'z': 'ⓩ',
            'A': 'Ⓐ',
            'B': 'Ⓑ',
            'C': 'Ⓒ',
            'D': 'Ⓓ',
            'E': 'Ⓔ',
            'F': 'Ⓕ',
            'G': 'Ⓖ',
            'H': 'Ⓗ',
            'I': 'Ⓘ',
            'J': 'Ⓙ',
            'K': 'Ⓚ',
            'L': 'Ⓛ',
            'M': 'Ⓜ',
            'N': 'Ⓝ',
            'O': 'Ⓞ',
            'P': 'Ⓟ',
            'Q': 'Ⓠ',
            'R': 'Ⓡ',
            'S': 'Ⓢ',
            'T': 'Ⓣ',
            'U': 'Ⓤ',
            'V': 'Ⓥ',
            'W': 'Ⓦ',
            'X': 'Ⓧ',
            'Y': 'Ⓨ',
            'Z': 'Ⓩ',
        };

        return social3fontscriptMap[char] || char;
    }

    function getSocial4Char(char) {
        const social4fontscriptMap = {
            'a': '🄰',
            'b': '🄱',
            'c': '🄲',
            'd': '🄳',
            'e': '🄴',
            'f': '🄵',
            'g': '🄶',
            'h': '🄷',
            'i': '🄸',
            'j': '🄹',
            'k': '🄺',
            'l': '🄻',
            'm': '🄼',
            'n': '🄽',
            'o': '🄾',
            'p': '🄿',
            'q': '🅀',
            'r': '🅁',
            's': '🅂',
            't': '🅃',
            'u': '🅄',
            'v': '🅅',
            'w': '🅆',
            'x': '🅇',
            'y': '🅈',
            'z': '🅉',
            'A': '🄰',
            'B': '🄱',
            'C': '🄲',
            'D': '🄳',
            'E': '🄴',
            'F': '🄵',
            'G': '🄶',
            'H': '🄷',
            'I': '🄸',
            'J': '🄹',
            'K': '🄺',
            'L': '🄻',
            'M': '🄼',
            'N': '🄽',
            'O': '🄾',
            'P': '🄿',
            'Q': '🅀',
            'R': '🅁',
            'S': '🅂',
            'T': '🅃',
            'U': '🅄',
            'V': '🅅',
            'W': '🅆',
            'X': '🅇',
            'Y': '🅈',
            'Z': '🅉',
        };

        return social4fontscriptMap[char] || char;
    }

    function getSocial5Char(char) {
        const social5fontscriptMap = {
            'a': '𝓪',
            'b': '𝓫',
            'c': '𝓬',
            'd': '𝓭',
            'e': '𝓮',
            'f': '𝓯',
            'g': '𝓰',
            'h': '𝓱',
            'i': '𝓲',
            'j': '𝓳',
            'k': '𝓴',
            'l': '𝓵',
            'm': '𝓶',
            'n': '𝓷',
            'o': '𝓸',
            'p': '𝓹',
            'q': '𝓺',
            'r': '𝓻',
            's': '𝓼',
            't': '𝓽',
            'u': '𝓾',
            'v': '𝓿',
            'w': '𝔀',
            'x': '𝔁',
            'y': '𝔂',
            'z': '𝔃',
            'A': '𝓐',
            'B': '𝓑',
            'C': '𝓒',
            'D': '𝓓',
            'E': '𝓔',
            'F': '𝓕',
            'G': '𝓖',
            'H': '𝓗',
            'I': '𝓘',
            'J': '𝓙',
            'K': '𝓚',
            'L': '𝓛',
            'M': '𝓜',
            'N': '𝓝',
            'O': '𝓞',
            'P': '𝓟',
            'Q': '𝓠',
            'R': '𝓡',
            'S': '𝓢',
            'T': '𝓣',
            'U': '𝓤',
            'V': '𝓥',
            'W': '𝓦',
            'X': '𝓧',
            'Y': '𝓨',
            'Z': '𝓩',
        };

        return social5fontscriptMap[char] || char;
    }

    function getSocial6Char(char) {
        const social6fontscriptMap = {
            'a': '𝒶',
            'b': '𝒷',
            'c': '𝒸',
            'd': '𝒹',
            'e': 'ℯ',
            'f': '𝒻',
            'g': 'ℊ',
            'h': '𝒽',
            'i': '𝒾',
            'j': '𝒿',
            'k': '𝓀',
            'l': '𝓁',
            'm': '𝓂',
            'n': '𝓃',
            'o': 'ℴ',
            'p': '𝓅',
            'q': '𝓆',
            'r': '𝓇',
            's': '𝓈',
            't': '𝓉',
            'u': '𝓊',
            'v': '𝓋',
            'w': '𝓌',
            'x': '𝓍',
            'y': '𝓎',
            'z': '𝓏',
            'A': '𝒜',
            'B': 'ℬ',
            'C': '𝒞',
            'D': '𝒟',
            'E': 'ℰ',
            'F': 'ℱ',
            'G': '𝒢',
            'H': 'ℋ',
            'I': 'ℐ',
            'J': '𝒥',
            'K': '𝒦',
            'L': 'ℒ',
            'M': 'ℳ',
            'N': '𝒩',
            'O': '𝒪',
            'P': '𝒫',
            'Q': '𝒬',
            'R': 'ℛ',
            'S': '𝒮',
            'T': '𝒯',
            'U': '𝒰',
            'V': '𝒱',
            'W': '𝒲',
            'X': '𝒳',
            'Y': '𝒴',
            'Z': '𝒵',
        };

        return social6fontscriptMap[char] || char;
    }

    function getSocial7Char(char) {
        const social7fontscriptMap = {
            'a': 'ᗩ',
            'b': 'ᗷ',
            'c': 'ᑕ',
            'd': 'ᗪ',
            'e': 'E',
            'f': 'ᖴ',
            'g': 'G',
            'h': 'ᕼ',
            'i': 'I',
            'j': 'ᒍ',
            'k': 'K',
            'l': 'ᒪ',
            'm': 'ᗰ',
            'n': 'ᑎ',
            'o': 'O',
            'p': 'ᑭ',
            'q': 'ᑫ',
            'r': 'ᖇ',
            's': 'ᔕ',
            't': 'T',
            'u': 'ᑌ',
            'v': 'ᐯ',
            'w': 'ᗯ',
            'x': '᙭',
            'y': 'Y',
            'z': 'ᘔ',
        };

        return social7fontscriptMap[char] || char;
    }

    function getSocial8Char(char) {
        const social8fontscriptMap = {
            'a': '₳',
            'b': '฿',
            'c': '₵',
            'd': 'Đ',
            'e': 'Ɇ',
            'f': '₣',
            'g': '₲',
            'h': 'Ⱨ',
            'i': 'ł',
            'j': 'J',
            'k': '₭',
            'l': 'Ⱡ',
            'm': '₥',
            'n': '₦',
            'o': 'Ø',
            'p': '₱',
            'q': 'Q',
            'r': 'Ɽ',
            's': '₴',
            't': '₮',
            'u': 'Ʉ',
            'v': 'V',
            'w': '₩',
            'x': 'Ӿ',
            'y': 'Ɏ',
            'z': 'Ⱬ',
        };

        return social8fontscriptMap[char] || char;
    }

    function getSocial9Char(char) {
        const social9fontscriptMap = {
            'a': 'Ａ',
            'b': 'ᵇ',
            'c': '𝓬',
            'd': '𝓭',
            'e': 'Ｅ',
            'f': 'ⓕ',
            'g': 'Ｇ',
            'h': '𝓱',
            'i': '𝐢',
            'j': 'נ',
            'k': '𝕂',
            'l': '𝔩',
            'm': '爪',
            'n': 'Ň',
            'o': 'σ',
            'p': 'ｐ',
            'q': 'ⓠ',
            'r': 'я',
            's': 'ş',
            't': 't',
            'u': '𝕌',
            'v': 'Ѷ',
            'w': 'Ⓦ',
            'x': '𝐗',
            'y': '𝕪',
            'z': '𝓏',
        };

        return social9fontscriptMap[char] || char;
    }

    function getSocial10Char(char) {
        const social10fontscriptMap = {
            'a': '𝒶',
            'b': '𝓫',
            'c': '𝓬',
            'd': '𝓭',
            'e': '𝐄',
            'f': '𝔽',
            'g': 'Ğ',
            'h': '𝓗',
            'i': 'เ',
            'j': 'ڶ',
            'k': 'Ҝ',
            'l': 'ᒪ',
            'm': '𝐦',
            'n': '𝓝',
            'o': 'ㄖ',
            'p': 'Ⓟ',
            'q': 'ợ',
            'r': 'ℝ',
            's': '𝕤',
            't': '𝓉',
            'u': '𝓤',
            'v': 'ᵛ',
            'w': 'Ŵ',
            'x': 'ⓧ',
            'y': 'ʸ',
            'z': 'ℤ',
        };

        return social10fontscriptMap[char] || char;
    }

    function getSocial11Char(char) {
        const social11fontscriptMap = {
            'a': 'ꋬ',
            'b': 'ꃳ',
            'c': 'ꉔ',
            'd': '꒯',
            'e': 'ꏂ',
            'f': 'ꊰ',
            'g': 'ꍌ',
            'h': 'ꁝ',
            'i': '꒐',
            'j': '꒻',
            'k': 'ꀘ',
            'l': '꒒',
            'm': 'ꂵ',
            'n': 'ꋊ',
            'o': 'ꄲ',
            'p': 'ꉣ',
            'q': 'ꆰ',
            'r': 'ꋪ',
            's': 'ꇙ',
            't': '꓄',
            'u': '꒤',
            'v': '꒦',
            'w': 'ꅐ',
            'x': 'ꉧ',
            'y': 'ꌦ',
            'z': 'ꁴ',
        };

        return social11fontscriptMap[char] || char;
    }

    function getSocial12Char(char) {
        const social12fontscriptMap = {
            'a': 'ꁲ',
            'b': 'ꋰ',
            'c': 'ꀯ',
            'd': 'ꂠ',
            'e': 'ꈼ',
            'f': 'ꄞ',
            'g': 'ꁅ',
            'h': 'ꍩ',
            'i': 'ꂑ',
            'j': '꒻',
            'k': 'ꀗ',
            'l': '꒒',
            'm': 'ꂵ',
            'n': 'ꋊ',
            'o': 'ꂦ',
            'p': 'ꉣ',
            'q': 'ꁷ',
            'r': 'ꌅ',
            's': 'ꌚ',
            't': 'ꋖ',
            'u': 'ꐇ',
            'v': 'ꀰ',
            'w': 'ꅏ',
            'x': 'ꇒ',
            'y': 'ꐞ',
            'z': 'ꁴ',
        };

        return social12fontscriptMap[char] || char;
    }

    function getSocial13Char(char) {
        const social13fontscriptMap = {
            'a': 'ǟ',
            'b': 'ɮ',
            'c': 'ƈ',
            'd': 'ɖ',
            'e': 'ɛ',
            'f': 'ʄ',
            'g': 'ɢ',
            'h': 'ɦ',
            'i': 'ɨ',
            'j': 'ʝ',
            'k': 'ӄ',
            'l': 'ʟ',
            'm': 'ʍ',
            'n': 'ռ',
            'o': 'օ',
            'p': 'ք',
            'q': 'զ',
            'r': 'ʀ',
            's': 'ֆ',
            't': 'ȶ',
            'u': 'ʊ',
            'v': 'ʋ',
            'w': 'ա',
            'x': 'Ӽ',
            'y': 'ʏ',
            'z': 'ʐ',
        };

        return social13fontscriptMap[char] || char;
    }

    function getSocial14Char(char) {
        const social14fontscriptMap = {
            'a': 'α',
            'b': 'Ⴆ',
            'c': 'ƈ',
            'd': 'ԃ',
            'e': 'ҽ',
            'f': 'ϝ',
            'g': 'ɠ',
            'h': 'ԋ',
            'i': 'ι',
            'j': 'ʝ',
            'k': 'ƙ',
            'l': 'ʅ',
            'm': 'ɱ',
            'n': 'ɳ',
            'o': 'σ',
            'p': 'ρ',
            'q': 'ϙ',
            'r': 'ɾ',
            's': 'ʂ',
            't': 'ƚ',
            'u': 'υ',
            'v': 'ʋ',
            'w': 'ɯ',
            'x': 'x',
            'y': 'ყ',
            'z': 'ȥ',
        };

        return social14fontscriptMap[char] || char;
    }

    function getSocial15Char(char) {
        const social15fontscriptMap = {
            'a': 'ค',
            'b': '๒',
            'c': 'ς',
            'd': '๔',
            'e': 'є',
            'f': 'Ŧ',
            'g': 'ﻮ',
            'h': 'ђ',
            'i': 'เ',
            'j': 'ן',
            'k': 'к',
            'l': 'ɭ',
            'm': '๓',
            'n': 'ภ',
            'o': '๏',
            'p': 'ק',
            'q': 'ợ',
            'r': 'г',
            's': 'ร',
            't': 'Շ',
            'u': 'ย',
            'v': 'ש',
            'w': 'ฬ',
            'x': 'א',
            'y': 'ץ',
            'z': 'չ',
        };

        return social15fontscriptMap[char] || char;
    }

    function getSocial16Char(char) {
        const social16fontscriptMap = {
            'a': '丹',
            'b': '日',
            'c': '亡',
            'd': '句',
            'e': 'ヨ',
            'f': '乍',
            'g': '呂',
            'h': '廾',
            'i': '工',
            'j': '勹',
            'k': '片',
            'l': 'し',
            'm': '冊',
            'n': '几',
            'o': '回',
            'p': '尸',
            'q': '甲',
            'r': '尺',
            's': '己',
            't': '卞',
            'u': '凵',
            'v': 'レ',
            'w': '山',
            'x': 'メ',
            'y': 'と',
            'z': '乙',
        };

        return social16fontscriptMap[char] || char;
    }

    function getSocial17Char(char) {
        const social17fontscriptMap = {
            'a': '𝖆',
            'b': '𝖇',
            'c': '𝖈',
            'd': '𝖉',
            'e': '𝖊',
            'f': '𝖋',
            'g': '𝖌',
            'h': '𝖍',
            'i': '𝖎',
            'j': '𝖏',
            'k': '𝖐',
            'l': '𝖑',
            'm': '𝖒',
            'n': '𝖓',
            'o': '𝖔',
            'p': '𝖕',
            'q': '𝖖',
            'r': '𝖗',
            's': '𝖘',
            't': '𝖙',
            'u': '𝖚',
            'v': '𝖛',
            'w': '𝖜',
            'x': '𝖝',
            'y': '𝖞',
            'z': '𝖟',
            'A': '𝕬',
            'B': '𝕭',
            'C': '𝕮',
            'D': '𝕯',
            'E': '𝕰',
            'F': '𝕱',
            'G': '𝕲',
            'H': '𝕳',
            'I': '𝕴',
            'J': '𝕵',
            'K': '𝕶',
            'L': '𝕷',
            'M': '𝕸',
            'N': '𝕹',
            'O': '𝕺',
            'P': '𝕻',
            'Q': '𝕼',
            'R': '𝕽',
            'S': '𝕾',
            'T': '𝕿',
            'U': '𝖀',
            'V': '𝖁',
            'W': '𝖂',
            'X': '𝖃',
            'Y': '𝖄',
            'Z': '𝖅',
        };

        return social17fontscriptMap[char] || char;
    }

    function getSocial18Char(char) {
        const social18fontscriptMap = {
            'a': '𝔞',
            'b': '𝔟',
            'c': '𝔠',
            'd': '𝔡',
            'e': '𝔢',
            'f': '𝔣',
            'g': '𝔤',
            'h': '𝔥',
            'i': '𝔦',
            'j': '𝔧',
            'k': '𝔨',
            'l': '𝔩',
            'm': '𝔪',
            'n': '𝔫',
            'o': '𝔬',
            'p': '𝔭',
            'q': '𝔮',
            'r': '𝔯',
            's': '𝔰',
            't': '𝔱',
            'u': '𝔲',
            'v': '𝔳',
            'w': '𝔴',
            'x': '𝔵',
            'y': '𝔶',
            'z': '𝔷',
            'A': '𝔄',
            'B': '𝔅',
            'C': 'ℭ',
            'D': '𝔇',
            'E': '𝔈',
            'F': '𝔉',
            'G': '𝔊',
            'H': 'ℌ',
            'I': 'ℑ',
            'J': '𝔍',
            'K': '𝔎',
            'L': '𝔏',
            'M': '𝔐',
            'N': '𝔑',
            'O': '𝔒',
            'P': '𝔓',
            'Q': '𝔔',
            'R': 'ℜ',
            'S': '𝔖',
            'T': '𝔗',
            'U': '𝔘',
            'V': '𝔙',
            'W': '𝔚',
            'X': '𝔛',
            'Y': '𝔜',
            'Z': 'ℨ',
        };

        return social18fontscriptMap[char] || char;
    }
</script>
@endpush