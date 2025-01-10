<x-mail::message>
# {{$data['title']}}

<img src="{{asset($data['blog_image'])}}" alt="Blog Image" width="100%" height="200px"/><br><br>

#### Dear {{$data['subscriber']}}

I hope you’re having a wonderful day!

As we promised we'll keep you posted with the latest blog posts from MTMKay IT Training programs and Consultancy Services.

Today our focus is on <a class="dn_btn font-bold">{{$data['category']}}</a> as we dive deep on the topic <a class="dn_btn font-bold">{{$data['title']}}</a>.

<x-mail::button url="{{$data['blog_detail_url']}}" >
    Read the Full Blog Post
</x-mail::button>

You can read all the blogs directly from our website by clicking on the button below.

<x-mail::button url="{{route('blog')}}">
Read All Blog Post
</x-mail::button>

Thank you for your commitment in developing your IT skills and fostering community development through IT!

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
        <span>This email was sent to <a class="dn_btn">{{$data['subscriber']}}.</a><br>You've received it because you've subscribed to our newsletter.</span>
    </div>
    <div style="display: flex;justify-content: center; padding: 10px">
        | <a class="dn_btn" style="display: flex; justify-content: center; padding-left: 5px" href="mailto:mtmkay17@gmail.com">Unsubscribe</a>
    </div>
</div>
</x-mail::message>
