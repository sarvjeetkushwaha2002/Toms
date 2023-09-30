@if ($data['email'] !=null)
<div>
    <h2>Contact us for <b>{{$data['company_name']}}</b></h2>

    <p>Welcome to <b>{{$data['website_name']}}</b>, if you want to contact us, then feel free to say anything about <b>{{$data['website_url']}}</b>. We'll appreciate your feedback.</p>
    <p><b>You can contact us:</b></p>
    - If you want to tell anything about the site.<br />
    - If you have any doubt or any problems related to our content or anything you want to tell us.<br />
    - If you want to say about our content that is incorrect or not in our post.<br />
    - If you want to tell us about any changes in the site theme, colour etc.<br />
    - If you want to give suggestions to improve <b>{{$data['website_name']}}</b><br />
    - If you face any error or any issues on our site.
    <p>Don't hesitate to mail us on: <b>{{$data['email']}}</b> </p>
    <p>This Agreement shall begin on the date hereof. Our Contact Us were created with the help of the <a href="https://onmediums.com/contact-us-page">Free Contact Us Generator</a>.</p>
</div>
@endif
@if($data['phone'] !=null)
<div>
    <h2>Contact us for <b>{{$data['company_name']}}</b></h2>

    <p>Welcome to <b>{{$data['website_name']}}</b>, if you want to contact us, then feel free to say anything about <b>{{$data['website_url']}}</b>. We'll appreciate your feedback.</p>
    <p><b>You can contact us:</b></p>
    - If you want to tell anything about the site.<br />
    - If you have any doubt or any problems related to our content or anything you want to tell us.<br />
    - If you want to say about our content that is incorrect or not in our post.<br />
    - If you want to tell us about any changes in the site theme, colour etc.<br />
    - If you want to give suggestions to improve <b>{{$data['website_name']}}</b><br />
    - If you face any error or any issues on our site.
    <p>Don't hesitate to message on: <b>{{$data['phone']}}</b> </p>
    <p>This Agreement shall begin on the date hereof. Our Contact Us were created with the help of the <a href="https://onmediums.com/contact-us-page">Free Contact Us Generator</a>.</p>
</div>
@endif
@if($data['phone'] ==null && $data['email'] ==null)
<div>
    <h2>Contact us for <b>{{$data['company_name']}}</b></h2>

    <p>Welcome to <b>{{$data['website_name']}}</b>, if you want to contact us, then feel free to say anything about <b>{{$data['website_url']}}</b>. We'll appreciate your feedback.</p>
    <p><b>You can contact us:</b></p>
    - If you want to tell anything about the site.<br />
    - If you have any doubt or any problems related to our content or anything you want to tell us.<br />
    - If you want to say about our content that is incorrect or not in our post.<br />
    - If you want to tell us about any changes in the site theme, colour etc.<br />
    - If you want to give suggestions to improve <b>{{$data['website_name']}}</b><br />
    - If you face any error or any issues on our site.
    <p>Don't hesitate to message or mail us on: <b>No</b></p>
    <p>This Agreement shall begin on the date hereof. Our Contact Us were created with the help of the <a href="https://onmediums.com/contact-us-page">Free Contact Us Generator</a>.</p>
</div>
@endif