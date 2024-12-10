<x-mail::message>
Hi!
Name: {{$data['name']}}

Email: {{$data['name']}}

Message:<br>
{{$data['message']}}

<x-mail::button :url="mailto:{{$data['email']}}">
Click to here to response
</x-mail::button>

<br><br>
Best,<br>
MTMKay.<br>
</x-mail::message>
