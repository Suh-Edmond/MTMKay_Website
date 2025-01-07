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

Best regards,<br>
MTMKay Training<br>
Atlaska Street Buea road, Kumba, Cameroon<br>
Email: mtmkay17@gmail.com<br>
Tel: +16122241176
</x-mail::message>
