<x-mail::message>
<img src="{{asset($data['program_image'])}}" alt="Program Image" width="100%" height="130px"/><br><br>
Hi <b>{{ $data['name'] }}<b>!<br>

Congratulations!<br>

You’ve successfully enrolled for {{$data['program']->title}} training program with MTMKay. Your enrollment is confirmed.

Please click the button below visit your program.

<x-mail::button :url="$data['program_link']">
    Click here to check program
</x-mail::button>

If you have any questions or concerns, feel free to contact support at  <a class="dn_btn" href="mailto:mtmkay17@gmail.com">mtmkay17@gmail.com</a> or <a class="dn_btn" href="tel:+4400123654896">+1 612 224 1176.</a>
<br><br>
Best regards,<br>
MTMKay Training.<br>
Atlaska Street Buea road, Kumba, Cameroon<br>
Email: mtmkay17@gmail.com<br>
Tel: +16122241176
</x-mail::message>



