<x-mail::message>
Hi there!<br><br>
I am {{$data['name']}}, I do find interest in your training programs and services and want to know more <br>

Find below my request<br>

<b>My Request <b><br>


{{$data['message']}}

<br><br>
<x-mail::button :url="$data['response_url']">
Click to here to response
</x-mail::button>

<br><br>
Best regards,<br>
MTMKay Training.<br>
Atlaska Street Buea road, Kumba, Cameroon<br>
Email: mtmkay17@gmail.com<br>
Tel: +16122241176
</x-mail::message>
