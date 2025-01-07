<x-mail::message>
Hi <b>{{ $data['name'] }}<b>!<br>

Thank you for your Interest in {{$data['program']->title}} training program at MTMKay. Your registration is confirmed.

Please click the button below to complete registration.

<x-mail::button :url="$data['verificationUrl']">
    Click here to complete your registration
</x-mail::button>

If you have any questions or concerns, feel free to contact support at  <a class="dn_btn" href="mailto:mtmkay17@gmail.com">mtmkay17@gmail.com</a> or <a class="dn_btn" href="tel:+4400123654896">+1 612 224 1176.</a>
<br><br>
Best regards,<br>
MTMKay Training.<br>
Atlaska Street Buea road, Kumba, Cameroon<br>
Email: mtmkay17@gmail.com<br>
Tel: +16122241176
</x-mail::message>



