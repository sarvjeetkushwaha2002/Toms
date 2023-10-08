@extends('admin.layouts.master')
@section('title')
CSS Gradient - Generator, Maker and Backgroud || Gradient Color Picker || Color Code ||
@endsection
@section('style')
<style>
    .color-stops {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .color-stop {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .color-stop input[type="color"] {
        margin-right: 10px;
    }

    .color-stop input[type="range"] {
        width: 100%;
    }
</style>
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home /</a></span><span class="text-muted fw-light"><a href="{{route('indexTextEditorall')}}">All Text Modification Formatting Tools/</a></span>Gradient Color Picker && Code</h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4 ">
        <div class="card">
            <h5 class="card-header text-center">Gradient Color Picker && Code Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="gradient-picker" style=" display: flex;flex-direction: column;align-items: center;margin: 20px;">
                            <h3>Gradient Color Picker && Code</h3>
                            <div class="gradient-box" id="gradient-box" style="width: 300px;height: 150px;background: linear-gradient(to right, #000, #fff);border: 1px solid #ccc;margin-bottom: 20px;"></div>
                            <div class="color-stops" id="color-stops">
                                <!-- Initial color stop -->
                                <div class="color-stop">
                                    <input type="color" class="color-input" value="#000000">
                                    <input type="range" class="position-input" min="0" max="100" step="1" value="0">
                                    <button class="remove-color-stop btn btn-danger mb-2">Remove</button>
                                    <span class="color-code">#000000</span>
                                </div>
                            </div>
                            <button class="add-color-stop btn btn-primary mb-3">Add Color Stop</button>
                            <div class="gradient-angle">
                                <label for="angle-input" class="form-label">Gradient Angle (0-360 degrees):</label>
                                <input type="number" id="angle-input" class="form-control" min="0" max="360" step="1" value="0">
                            </div>
                            <button id="generate-gradient" class="btn btn-success mt-2">Generate Gradient</button>
                            <button id="copy-gradient-code" class="btn btn-info mt-2"><i class="fa fa-clone"></i> Copy Gradient Code</button>
                        </div>
                    </div>
                    <!-- /Full Editor -->

                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <div class="card-title mb-0 text-center">
                                    <h5 class="mb-0 ">How To Use Gradient Color Picker && Code Generator By <a href="{{route('indexDashboard')}}" class="fw-semibold">OnMediums</a></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-title mb-0">
                                            <h5 class="mb-0">Gradient Color Picker && Code Generator</h5>
                                            <small>Enter Value Automatic Generator </small><br><br>
                                            <p><b>1.</b> Choose multiple colors. <br><br>
                                                <b>2.</b> Set the position or ratio for each color.<br><br>
                                                <b>3.</b> Select an angle for the gradient.<br><br>
                                                <b>4.</b> Generate the gradient.<br><br>
                                                <b>5.</b> Copy the generated gradient code.<br><br>
                                                <b>6.</b> Optionally, copy the code for a specific color.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
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
                    const gradientBox = document.getElementById("gradient-box");
                    const colorStops = document.getElementById("color-stops");
                    const addColorStopButton = document.querySelector(".add-color-stop");
                    const angleInput = document.getElementById("angle-input");

                    function updateGradient() {
                        const colorStopElements = colorStops.querySelectorAll(".color-stop");
                        const colorStopsArray = Array.from(colorStopElements);
                        const gradientColors = colorStopsArray.map(stop => {
                            const color = stop.querySelector(".color-input").value;
                            const position = stop.querySelector(".position-input").value + "%";
                            stop.querySelector(".color-code").textContent = color;
                            return `${color} ${position}`;
                        });
                        gradientBox.style.background = `linear-gradient(${angleInput.value}deg, ${gradientColors.join(', ')})`;
                    }

                    function addColorStop() {
                        const colorStopTemplate = document.createElement("div");
                        colorStopTemplate.className = "color-stop";
                        colorStopTemplate.innerHTML = `
                <input type="color" class="color-input" value="#000000">
                <input type="range" class="position-input" min="0" max="100" step="1" value="0">
                <button class="remove-color-stop btn btn-danger mb-2">Remove</button>
                <span class="color-code">#000000</span>
            `;
                        colorStops.appendChild(colorStopTemplate);

                        colorStopTemplate.querySelector(".color-input").addEventListener("input", updateGradient);
                        colorStopTemplate.querySelector(".position-input").addEventListener("input", updateGradient);
                        colorStopTemplate.querySelector(".remove-color-stop").addEventListener("click", () => {
                            colorStops.removeChild(colorStopTemplate);
                            updateGradient();
                        });

                        updateGradient();
                    }

                    addColorStopButton.addEventListener("click", addColorStop);
                    colorStops.addEventListener("input", updateGradient);

                    // Initialize with a color stop
                    addColorStop();

                    // Update gradient when angle changes
                    angleInput.addEventListener("input", updateGradient);

                    // Copy gradient code
                    const copyGradientCodeButton = document.getElementById("copy-gradient-code");
                    copyGradientCodeButton.addEventListener("click", () => {
                        const textArea = document.createElement("textarea");
                        const gradientColors = colorStops.querySelectorAll(".color-code");
                        const gradientColorCodes = Array.from(gradientColors).map(code => code.textContent);
                        const gradientCode = `linear-gradient(${angleInput.value}deg, ${gradientColorCodes.join(', ')})`;
                        textArea.value = gradientCode;
                        document.body.appendChild(textArea);
                        textArea.select();
                        document.execCommand("copy");
                        document.body.removeChild(textArea);
                        const speechSynthesis = window.speechSynthesis;
                        const speech = new SpeechSynthesisUtterance('Gradient code copied Successfully!');
                        speechSynthesis.speak(speech);
                        alert("Gradient code copied!");
                    });

                    // Generate gradient initially
                    updateGradient();
                </script>
                @endpush