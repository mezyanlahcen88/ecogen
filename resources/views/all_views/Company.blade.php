<x-mail::message>
# Introduction

Your first Name is {{ $first_name }}.
Your last Name is {{ $last_name }}.
Your number is {{ $number }}.<br>
welcome hajib



<x-mail::button :url="'https://www.youtube.com/'">
go to youtube
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>