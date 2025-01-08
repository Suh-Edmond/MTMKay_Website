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
MTMKay.<br>
Atlaska Street Buea road, Kumba, Cameroon<br>
Email: mtmkay17@gmail.com<br>
Tel: +16122241176
</x-mail::message>
