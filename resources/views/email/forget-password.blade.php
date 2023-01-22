@component('mail::message')
# Hello

Please click the following link to reset your password.

@component('mail::button', ['url' => url('/reset-password/'.$token)])
Click Here
@endcomponent

Thank you for using our application!<br>
{{ config('app.name') }}
@endcomponent
