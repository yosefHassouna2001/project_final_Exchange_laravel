@component('mail::message')
# Welcom In New System

You can Login in CP from here ,

@component('mail::button', ['url' => 'http://127.0.0.1:8000/cms/admin'])
Controle Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
