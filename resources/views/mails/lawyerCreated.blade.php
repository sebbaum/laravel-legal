@component('mail::message')

# Dear {{ $lawyer->title }} {{ $lawyer->firstname }} {{ $lawyer->surname }}

You have been granted access to edit legal pages of {{ config('app.name') }}.
Your login credentials are as follows:
Username: {{ $lawyer->email }}
Password: {{ $password }}

@component('mail::button', ['url' => url('/' . config('legal.uri') . '/editor')])
Login
@endcomponent

Thank you for contributing to our application

@endcomponent
