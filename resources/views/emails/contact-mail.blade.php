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
Best,<br>
MTMKay IT Technologies,<br>
Kumba, Cameroon.
</x-mail::message>
