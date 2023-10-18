@extends('admin.layouts.master')
@section('title')
Checker/Randon Password Generator || Online Checker/Randon Password Generator ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a><a href="{{route('allcodeDatatransalator')}}">All Coding & Data Translation Tools/</a></span>Online Checker/Randon Password Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <h5 class="card-header text-center">Online Checker/Randon Password Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>
                            <b>
                                <h3>Random Password</h3>
                                Generate some password. The result shown will be a random password.
                            </b>
                        </p>
                        <div class="row g-3">
                            <div class="col-lg-9 col-sm-8 col-6">
                                <label class="form-label" for="passwordLength">Enter Password Length:</label>
                                <input type="number" class="form-control" id="passwordLength" min="1" value="8">
                                <label class="form-label" for="passwordStrength">Choose Password Strength:</label>
                                <select id="passwordStrength" class="select2 form-select mb-2" data-allow-clear="true" name="country_id" required>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="strong">Strong</option>
                                </select>
                                <textarea id="generatedPassword" class="form-control" hidden></textarea>
                                <button type="button" class="btn btn-outline-danger mr-1 mb-1 mt-2 waves-effect waves-light" id="clear-button" onclick="clearText()"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-outline-info  mr-1 mb-1 mt-2 waves-effect waves-light" id="copy-button" onclick="copyToClipboard()"><i class="fa fa-clone"></i></button>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4 ">
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="generatePassword">Generate</button>
                            </div>
                        </div>
                    </div><br>
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <p>
                            <b>
                                <h3>Checker Password</h3>
                                Test your password some plaintext strength (low,medium,Strong).
                            </b>
                        </p>
                        <div class="row g-3">
                            <div class="col-lg-9 col-sm-8 col-6">
                                <label for="checkPassword">Check Password Strength:</label>
                                <input type="text" id="checkPassword" class="form-control"><br>
                                <textarea id="passwordStrengthResult" class="form-control" hidden></textarea>
                            </div>
                            <div class="col-lg-1 col-sm-2 col-4">
                                <button class="btn btn-primary waves-effect waves-light" type="button" id="checkStrength">Checker</button>
                            </div>
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
                    <h5 class="mb-0 ">How To Use Online Checker/Randon Password Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Online Checker/Randon Password Generator</h5>
                            <small>Enter Value and Click the Button after Generator </small><br><br>
                            <p><b>1.</b>To implement the functionality where you first select the password length and strength, and then generate the password by clicking the "Generate" button. <br><br>
                                <b>2.</b>If you want a check your password strength then you are pest password 'Check Password Strength:' field and click the checker button and show the your password strength(Low, Medium, Strong).
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
    function copyToClipboard() {
        const inputField = document.getElementById('generatedPassword');
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

    function clearText() {
        const inputField = document.getElementById('generatedPassword');
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
<script>
    document.getElementById("generatePassword").addEventListener("click", function() {
        const strength = document.getElementById("passwordStrength").value;
        const length = document.getElementById("passwordLength").value;
        const password = generateRandomPassword(strength, length);
        document.getElementById("generatedPassword").textContent = "Generated Password: " + password;
        const speechSynthesis = window.speechSynthesis;
        const speech = new SpeechSynthesisUtterance(password);
        speechSynthesis.speak(speech);
    });

    document.getElementById("checkStrength").addEventListener("click", function() {
        const password = document.getElementById("checkPassword").value;
        const strength = checkPasswordStrength(password);
        const strengthResult = document.getElementById("passwordStrengthResult");
        strengthResult.textContent = "Password Strength: " + strength;

        if (strength === "Low") {
            strengthResult.style.color = "red";
        } else if (strength === "Medium") {
            strengthResult.style.color = "yellow";
        } else if (strength === "Strong") {
            strengthResult.style.color = "green";
        }

        const speechSynthesis = window.speechSynthesis;
        const speech = new SpeechSynthesisUtterance(strength);
        speechSynthesis.speak(speech);
    });


    function generateRandomPassword(strength, length) {
        let charset = "";
        if (strength === "low") {
            charset = "abcdefghijklmnopqrstuvwxyz";
        } else if (strength === "medium") {
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        } else if (strength === "strong") {
            charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
        }

        let password = "";
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }
        $('#generatedPassword').removeAttr('hidden');
        return password;
    }

    function checkPasswordStrength(password) {
        const hasLowerCase = /[a-z]/.test(password);
        const hasUpperCase = /[A-Z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSpecial = /[!@#$%^&*]/.test(password);
        const length = password.length;
        $('#passwordStrengthResult').removeAttr('hidden');
        if (length > 12 && hasLowerCase && hasUpperCase && hasNumber && hasSpecial) {
            return "Strong";
        } else if (length >= 9 && length <= 12 && (hasLowerCase && hasUpperCase && hasNumber)) {
            return "Medium";
        } else {
            return "Low";
        }
    }
</script>
@endpush