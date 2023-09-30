@if ($data['email'] !=null)
<div>
    <h1>About<b>{{$data['website_name']}}</b></h1>
    <p> Welcome to <b>{{$data['website_name']}}</b> where we share information related to {{$data['website_category']}}. We're dedicated to providing you the very best information and knowledge of the above mentioned topics. Our about us page is generated with the help of <a href="https://onmediums.com/contact-us-page">Free About Us Generator</a></p>

    <p>We hope you found all of the information on <b>{{$data['website_name']}}</b> helpful, as we love to share them with you.</p>

    <p>If you require any more information or have any questions about our site, please feel free to contact us by email at <b>{{$data['email']}}</b>.</p>
</div>
@endif
@if($data['phone'] !=null)
<div>
    <h1>About<b>{{$data['website_name']}}</b></h1>
    <p> Welcome to <b>{{$data['website_name']}}</b> where we share information related to {{$data['website_category']}}. We're dedicated to providing you the very best information and knowledge of the above mentioned topics. Our about us page is generated with the help of <a href="https://onmediums.com/contact-us-page">Free About Us Generator</a></p>

    <p>We hope you found all of the information on <b>{{$data['website_name']}}</b> helpful, as we love to share them with you.</p>

    <p>If you require any more information or have any questions about our site, please feel free to contact us by phone at <b>{{$data['phone']}}</b>.</p>
</div>
@endif
@if($data['phone'] ==null && $data['email'] ==null)
<div>
    <h1>About<b>{{$data['website_name']}}</b></h1>
    <p> Welcome to <b>{{$data['website_name']}}</b> where we share information related to {{$data['website_category']}}. We're dedicated to providing you the very best information and knowledge of the above mentioned topics. Our about us page is generated with the help of <a href="https://onmediums.com/contact-us-page">Free About Us Generator</a></p>

    <p>We hope you found all of the information on <b>{{$data['website_name']}}</b> helpful, as we love to share them with you.</p>
</div>
@endif