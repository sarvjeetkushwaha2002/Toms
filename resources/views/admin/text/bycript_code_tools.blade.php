@extends('admin.layouts.master')
@section('title')
Bycript Text Generator || Online Bcrypt Hash Generator & Checker ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span>Online Bcrypt Hash Generator & Checker</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Online Bcrypt Hash Generator & Checker By <a href="{{route('indexDashboard')}}" class="fw-semibold">Tech Onmediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>
                            <b>
                                <h3>Encrypt</h3>
                                Encrypt some text. The result shown will be a Bcrypt encrypted hash.
                            </b>
                        </p>
                        <form id="sendbydata">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-9 col-sm-8 col-6">
                                    <input type="text" id="chang_by_encript" class="form-control" name="chang_by_encript" placeholder="String"><br>
                                    <input type="text" id="encripted_code" class="form-control" name="encripted_code" hidden>
                                    <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2 waves-effect waves-light" id="clear-button" onclick="clearText()"><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-outline-info  mr-1 mb-1 mt-2 waves-effect waves-light" id="copy-button" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" id="encripted">Encrypt</button>
                                </div>
                            </div>
                        </form>

                    </div><br>
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>
                            <b>
                                <h3>Decrypt</h3>
                                Test your Bcrypt hash against some plaintext, to see if they match.
                            </b>
                        </p>
                        <form id="check_encript_code">
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-9 col-sm-8 col-6">
                                    <input type="text" id="chang_by_encript1" class="form-control" name="chang_by_encript1" placeholder="String To check against"><br>
                                    <input type="text" id="encript_code" class="form-control" name="encript_code" placeholder="Hash To Check"><br>
                                    <input type="text" id="matched_code" class="form-control" name="matched_code" hidden>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4">
                                    <button class="btn btn-primary waves-effect waves-light" type="button" id="check">Check</button>
                                </div>
                            </div>
                        </form>
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
                    <h5 class="mb-0 ">How To Use Online Bcrypt Hash Generator & Checker By <a href="{{route('indexDashboard')}}" class="fw-semibold">Tech Onmediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Online Bcrypt Hash Generator & Checker</h5>
                            <small>Enter Value and Click the Button after Generator </small><br><br>
                            <p><b>1.</b>You mentioned that when a value is entered in the "String" 'Tech Onmediums' input, the text will be generated in Hash formats '$2y$10$P3svB4ULnTdwj8tCB340t.QY3PxEtvSgCFq9GqyaU36R7KoCUFY6a' in the second input. <br><br>
                                <b>2.</b>Do you want to convert your text into an Hash Formate? Then use this simple and free Online Bcrypt Hash Generator. All you have to do is write the words that you want to be converted into hash in the down hand field of the Bycript generator, then as you write it out, you’re going to see the font get converted into Hash code on the up. Once you are done, simply copy the Hash Code and paste it where you want.
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
    $(document).ready(function() {
        $(document).on('click', '#encripted', function() {
            var formData = $("#sendbydata").serialize();
            var newurl = "{{route('textEncriptchange')}}";
            $.ajax({
                url: newurl,
                type: 'post',
                data: formData,
                success: function(response) {
                    $('#encripted_code').removeAttr('hidden');
                    $('#encripted_code').val(response);
                },
                error: function(error) {
                    // Handle any errors that occur during the AJAX request
                    console.error("Error:", error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#check', function() {
            var formData1 = $("#check_encript_code").serialize();
            var newurl = "{{ route('textEncriptcheck') }}";
            $.ajax({
                url: newurl,
                type: 'post',
                data: formData1,
                success: function(response) {
                    $('#matched_code').removeAttr('hidden');
                    $('#matched_code').val(response);
                },
                error: function(error) {
                    // Handle any errors that occur during the AJAX request
                    console.error("Error:", error);
                }
            });
        });
    });
</script>

<script>
    //Copy Text Start
    // function copyToClipboard() {
    //     const textarea = document.getElementById('encripted_code');
    //     const selectedText = textarea.innerText.substring(textarea.selectionStart, textarea.selectionEnd);
    //     const textToCopy = selectedText.length > 0 ? selectedText : textarea.innerText;

    //     copyTextToClipboard(textToCopy);
    // }

    // function copyTextToClipboard(text) {
    //     const dummyInput = document.createElement('textarea');
    //     dummyInput.style.position = 'absolute';
    //     dummyInput.style.left = '-9999px';
    //     dummyInput.textContent = text;
    //     document.body.appendChild(dummyInput);
    //     dummyInput.select();
    //     document.execCommand('copy');
    //     document.body.removeChild(dummyInput);
    // }

    function copyToClipboard() {
        const inputField = document.getElementById('encripted_code');
        const selection = window.getSelection();

        if (selection.toString().length > 0) {
            // If text is selected, copy the selected text
            document.execCommand('copy');
        } else {
            // If no text is selected, copy the entire input field value
            inputField.select();
            document.execCommand('copy');
        }
        alert('copy successfully !')
    }

    //Copy Text End

    function clearText() {
        const inputField = document.getElementById('encripted_code');
        const selection = window.getSelection();

        if (selection.toString().length > 0) {
            document.execCommand('delete');
        } else {
            inputField.value = ''; // Clear the entire input field
        }
    }
</script>

@endpush