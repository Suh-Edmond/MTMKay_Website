<x-mail::message>
Hi <b>{{ $data['name'] }}<b>!<br>

Thank you for your Interest in {{$data['program']->title}} training program at MTMKay. Your registration is confirmed.

Please click the button below to complete registration.

<x-mail::button :url="$data['verificationUrl']">
    Click here to complete your registration
</x-mail::button>

If you have any questions or concerns, feel free to contact support at  <a class="dn_btn" href="mailto:mtmkay17@gmail.com">mtmkay17@gmail.com</a> or <a class="dn_btn" href="tel:+4400123654896">+1 612 224 1176.</a>

<br>

Best regards,<br>
MTMKay Team.<br>


<div style="display: flex;justify-content: center; margin-bottom: 30px">
    <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/facebook-logo.png')}}" alt="facebook logo" width="30px" height="30px"></a>
    <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/instagram-logo.png')}}" alt="instagram logo" width="30px" height="30px"></a>
    <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/twitter-logo.png')}}" alt="twitter logo" width="30px" height="30px"></a>
    <a href="#" style="padding: 10px"><img src="{{asset('/img/blog/whatsapp-logo.png')}}" alt="whatsapp logo" width="30px" height="30px"></a>
</div>
<div style="background-color: #e2e8f0;">
    <div style="display: flex;justify-content: center;padding: 10px">
        <span style="display: flex; justify-content: center;font-weight: bold;margin-left: 2px">MTMKay Technology Solutions Ltd</span><br>
    </div>
    <div style="display: flex;justify-content: center; margin-bottom: 5px;padding: 10px">
        <span>Atlaska Street Buea road Kumba, Cameroon.</span>
    </div>
    <div style="display: flex;justify-content: center;padding: 10px">
        <span>This email was sent to <a class="dn_btn">{{$data['email']}}</a><br>You Subscribe to our newsletter.</span>
    </div>
    <div style="display: flex;justify-content: center; padding: 10px">
        | <a class="dn_btn" style="display: flex; justify-content: center; padding-left: 5px;padding-right: 5px" href="{{$data['subscription_link']}}">Subscribe</a>
    </div>
</div>
</x-mail::message>



