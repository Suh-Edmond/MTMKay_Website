@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'MTMKay')
<img src="{{asset('img/company/mtmkay_logo.png')}}" class="logo" alt="MTMKay Logo" height="100px" width="100px">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
