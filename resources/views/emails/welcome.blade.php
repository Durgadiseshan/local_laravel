<x-mail::message>
# Welcome to my mailing course
I would like to thanks you for watching

<x-mail::button :url="'http://127.0.0.1:8000/api/endpoint'">
Visit Site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
