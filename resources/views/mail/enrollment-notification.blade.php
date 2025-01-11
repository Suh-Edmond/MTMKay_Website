<x-mail::message>
# Hello Micheal!

A new student just enrollment for the {{$data['program']}} programme at MTMKAY.

- Name : {{$data['studentName']}}.

- Email : {{$data['studentEmail']}}.

- Phone : {{$data['studentPhone']}}.

- Address : {{$data['studentAddress']}}.

Please log in to your dashboard to view this enrollment.
<x-mail::button url="{{config('app.login_url')}}">
Login to Dashboard
</x-mail::button>

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
        <span>Opposite Alaska Street Buea Road Kumba, Cameroon.</span>
    </div>
    <div style="display: flex;justify-content: center;padding: 10px">
        <span>This email was sent to <a class="dn_btn">{{$data['adminEmail']}}.</a><br>You've received it because you're the administrator of MTMKay Technology Solutions.</span>
    </div>
</div>
</x-mail::message>
