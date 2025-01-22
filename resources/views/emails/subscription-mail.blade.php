<x-mail::message>
# Congratulations!

You’ve successfully subscribed for news at MTMKay IT Training and Consulting Services.<br><br>
You will be amongst the first to receive updates and news on out Training programs and Blogs.


If you have any questions or concerns, feel free to contact support at  <a class="dn_btn" href="mailto:support@mtmkay.com">support@mtmkay.com</a> or <a class="dn_btn" href="tel:+16122241176">+1 612 224 1176.</a>
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
        <span>This email was sent to <a class="dn_btn">{{$data['email']}}.</a><br>You've received it because you've subscribed to our newsletter.</span>
    </div>
    <div style="display: flex;justify-content: center; padding: 10px">
        | <a class="dn_btn" style="display: flex; justify-content: center; padding-left: 5px" href="{{$data['unsubscription_link']}}">Unsubscribe</a>
    </div>
</div>
</x-mail::message>



