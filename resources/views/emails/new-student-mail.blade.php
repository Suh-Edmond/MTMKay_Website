<x-mail::message>
<img src="{{asset($data['program_image'])}}" alt="Program Image" width="100%" height="250px"/><br><br>
Hi <b>{{ $data['name'] }}<b>!<br>

Congratulations!<br>

You’ve successfully enrolled for {{$data['program']->title}} training program with MTMKay. Your enrollment is confirmed.
Our Training runs weekly from Monday to Friday, below is your training schedule

- Schedule Type: {{$data['trainingSlot']->name}}

- Start Time: {{date('h:i A', strtotime($data['trainingSlot']->start_time))}}

- End Time: {{date('h:i A', strtotime($data['trainingSlot']->end_time))}}

Please click the button below visit your program.

<x-mail::button :url="$data['program_link']">
    Click here to check the program
</x-mail::button>

If you have any questions or concerns, feel free to contact support at  <a class="dn_btn" href="mailto:support@mtmkay.com">support@mtmkay.com</a> or <a class="dn_btn" href="tel:+4400123654896">+1 612 224 1176.</a>

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
        <span style="display: flex; justify-content: center;font-weight: bold;margin-left: 2px"><a href="{{route('home')}}" style="text-decoration: none">MTMKay</a></span><br>
    </div>
    <div style="display: flex;justify-content: center; margin-bottom: 5px;padding: 10px">
        <span>Opposite Alaska Street Buea Road Kumba, Cameroon.</span>
    </div>
    <div style="display: flex;justify-content: center;padding: 10px">
        <span>This email was sent to <a class="dn_btn">{{$data['email']}}</a><br>You can subscribe to our newsletter to stay updated on news and events at MTMKay.</span>
    </div>
    <div style="display: flex;justify-content: center; padding: 10px">
        | <a class="dn_btn" style="display: flex; justify-content: center; padding-left: 5px;padding-right: 5px" href="{{$data['subscription_link']}}">Subscribe</a>
    </div>
</div>
</x-mail::message>



