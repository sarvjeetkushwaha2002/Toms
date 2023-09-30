@extends('admin.layouts.master')
@section('title')
OnMediums || Contact Us
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home</a></span></h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h1>About<b>OnMediums</b></h1>
                    <p> Welcome to <b>OnMediums</b> where we share information related to Technology. We're dedicated to providing you the very best information and knowledge of the above mentioned topics. Our about us page is generated with the help of <a href="https://onmediums.com/contact-us-page">Free About Us Generator</a></p>

                    <p>We hope you found all of the information on <b>OnMediums</b> helpful, as we love to share them with you.</p>

                    <p>If you require any more information or have any questions about our site, please feel free to contact us by email at <b>onmediums@gmail.com</b>.</p>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @push('scripts')

    @endpush