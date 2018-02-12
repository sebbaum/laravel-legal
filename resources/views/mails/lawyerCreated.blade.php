@component('mail::message')

# Dear {{ $lawyer->title }} {{ $lawyer->firstname }} {{ $lawyer->surname }}

You have been granted access to edit legal pages of {{ config('app.name') }}.<br>
Your login credentials are as follows:<br>

<p>
    Username: {{ $lawyer->email }}<br>
    Password: {{ $password }}
</p>

@component('mail::button', ['url' => url('/' . config('legal.uri') . '/editor')])
Login
@endcomponent

Thank you for contributing to our application.

@endcomponent
