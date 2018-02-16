@component('mail::message')
# Dear {{ $lawyer->title }} {{ $lawyer->firstname }} {{ $lawyer->surname }}

Your password has been reset successfully. You can now login using your email address and your new password.

@component('mail::button', ['url' => url('/' . config('legal.uri') . '/editor')])
    Login
@endcomponent

Thank you for contributing to our application.
@endcomponent
