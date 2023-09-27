@extends('admin.layouts.master')
@section('title')
Tech OnMediums || Contact Us
@endsection
@section('content-main')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{route('indexDashboard')}}">Home</a></span></h4>
<div class="row">
    <!-- Full Editor -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h2>Contact us for <b>Tech Onmediums</b></h2>

                    <p>Welcome to <b>Tech Onmediums</b>, if you want to contact us, then feel free to say anything about <b>https://tech.onmediums.com</b>. We'll appreciate your feedback.</p>
                    <p><b>You can contact us:</b></p>
                    - If you want to tell anything about the site.<br />
                    - If you have any doubt or any problems related to our content or anything you want to tell us.<br />
                    - If you want to say about our content that is incorrect or not in our post.<br />
                    - If you want to tell us about any changes in the site theme, colour etc.<br />
                    - If you want to give suggestions to improve <b>Tech Onmediums</b><br />
                    - If you face any error or any issues on our site.
                    <p>Don't hesitate to mail us on: <b>onmediums@gmail.com</b> </p>
                    <p>This Agreement shall begin on the date hereof. Our Contact Us were created with the help of the <a href="https://tech.onmediums.com/contact-us-page">Free Contact Us Generator</a>.</p>
                </div>

            </div>
        </div>
    </div>

    @endsection
    @push('scripts')

    @endpush