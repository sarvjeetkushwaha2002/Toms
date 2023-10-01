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
<script src="{{asset('textconvertor/socialcode.js')}}"></script>
@endpush