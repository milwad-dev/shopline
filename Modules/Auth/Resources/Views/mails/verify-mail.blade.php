@component('mail::message')
# Your account activation code in {{ config('app.name') }}

This email is because of your registration on the site {{ config('app.name') }} Sent to you.

@component('mail::panel')
Your activation code: {{ $code }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
