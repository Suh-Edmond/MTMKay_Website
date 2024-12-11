<x-mail::message>
    Hi <b>{{ $data['name'] }} !</b>,<br>
    <p>
        Congratulations!
    </p>
    <p>
        Congratulations!

        You’ve successfully enrolled for {{$data['program']->title}} training program with MTMKay. Your registration is confirmed.

        Please hint to button below to complete your enrollment to the program.
    </p>

    <x-mail::button url="{{$data['verificationUrl']}}">
        Click here to complete enrollment
    </x-mail::button>
    <br>
    If you have any questions or concerns, feel free to contact me at  <a class="dn_btn" href="mailto:mtmkay17@gmail.com">mtmkay17@gmail.com</a> or <a class="dn_btn" href="tel:+4400123654896">+1 612 224 1176.</a>

    Best,
    Your MTMKay Training Staff

    <div class="flex flex-row justify-between items-center">
        <a href="{{config('app.url')}}"><img src="{{asset('img/company/mtmkay_logo.png')}}" alt="YoupiJob logo" width="100" height="100"></a>
     </div>
</x-mail::message>
