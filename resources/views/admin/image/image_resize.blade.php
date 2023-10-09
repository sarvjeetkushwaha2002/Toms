@extends('admin.layouts.master')
@section('title')
CSS Gradient - Generator, Maker and Backgroud || Gradient Color Picker || Color Code ||
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Image Resizer Generator</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4 ">
        <div class="card">
            <h5 class="card-header text-center">Image Resizer Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label" for="image">Uploade Image</label>
                            <input type="file" id="imageInput" class="form-control" accept="image/*" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="resizeTypeSelect">Resize by</label>
                            <select id="resizeTypeSelect" class="select2 form-select" data-allow-clear="true" name="country_id" required>
                                <option value="pixels">Pixels</option>
                                <option value="percentage">Percentage</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                <label class="form-label" for="resizeWidth">Width</label>
                                <input type="number" id="resizeWidth" class="form-control" name="width" required>
                            </div>
                            <div class="mb-3 col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                <label class="form-label" for="resizeHeight">Height</label>
                                <input type="number" id="resizeHeight" class="form-control" name="height" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary waves-effect waves-light" id="resizeButton">Resize Generator</button>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-12 col-sm-12 mt-4">
                        <a id="downloadLink" style="display: none;">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Download Resized Image</button>
                            </div>
                        </a>
                        <div class="d-grid gap-2 mt-4">
                            <img id="preview" src="" alt="Preview" style="max-width: 100%;max-height: 400px;margin-bottom: 20px; display: none;">
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="card-title mb-0 text-center">
                                    <h5 class="mb-0 ">How To Use Image Resizer Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-0">Image Resizer Generator</h5>
                                            <small>Enter Value Automatic Generator </small><br><br>
                                            <p><b>1.</b> Upload Any One Image. <br><br>
                                                <b>2.</b>Choose Resize by Option pixels Or Percentage. <br><br>
                                                <b>3.</b> Fill The Fields Width And Height.<br><br>
                                                <b>4.</b>Click The Resize Generator Button.<br><br>
                                                <b>5.</b>Show Right Side Preview and live Update Your Width and Height Value Depand.<br><br>
                                                <b>6.</b>Click The Download Resize Image Button and Save It Foulder.
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
                    document.getElementById('imageInput').addEventListener('change', function() {
                        const input = this;
                        const preview = document.getElementById('preview');
                        preview.style.display = 'block';
                        if (input.files && input.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.src = e.target.result;
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    });

                    document.getElementById('resizeButton').addEventListener('click', function() {
                        const imageInput = document.getElementById('imageInput');
                        const resizeTypeSelect = document.getElementById('resizeTypeSelect');
                        const resizeWidth = document.getElementById('resizeWidth').value;
                        const resizeHeight = document.getElementById('resizeHeight').value;

                        if (!imageInput.files.length) {
                            const speechSynthesis = window.speechSynthesis;
                            const speech = new SpeechSynthesisUtterance('Please select an image!');
                            speechSynthesis.speak(speech);
                            alert('Please select an image.');
                            return;
                        }

                        if (!resizeWidth || !resizeHeight) {
                            const speechSynthesis = window.speechSynthesis;
                            const speech = new SpeechSynthesisUtterance('Please enter value for width and height!');
                            speechSynthesis.speak(speech);
                            alert('Please enter value for width and height.');
                            return;
                        }

                        const file = imageInput.files[0];
                        const image = new Image();
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        image.onload = function() {
                            let newWidth, newHeight;

                            if (resizeTypeSelect.value === 'pixels') {
                                newWidth = parseInt(resizeWidth);
                                newHeight = parseInt(resizeHeight);
                            } else if (resizeTypeSelect.value === 'percentage') {
                                newWidth = (image.width * resizeWidth) / 100;
                                newHeight = (image.height * resizeHeight) / 100;
                            }

                            canvas.width = newWidth;
                            canvas.height = newHeight;
                            ctx.drawImage(image, 0, 0, newWidth, newHeight);
                            const resizedDataUrl = canvas.toDataURL('image/jpeg');

                            const downloadLink = document.getElementById('downloadLink');
                            const preview = document.getElementById('preview');
                            downloadLink.href = resizedDataUrl;
                            downloadLink.download = 'resized_image.jpg';
                            downloadLink.style.display = 'block';
                            preview.style.display = 'block';
                            const speechSynthesis = window.speechSynthesis;
                            const speech = new SpeechSynthesisUtterance('Image resized successfully');
                            speechSynthesis.speak(speech);
                            alert('Image resized successfully. Click "Download" to save it.');
                            preview.src = resizedDataUrl;

                        };
                        image.src = URL.createObjectURL(file);
                    });
                </script>
                @endpush