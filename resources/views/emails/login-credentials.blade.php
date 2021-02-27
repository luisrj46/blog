@component('mail::message')
# Tus credenciales para acceder a la plataforma {{config('app.name')}} es

Utiliza estas credenciales para acceder al sistema

@component('mail::table')

| Usuario | Contraseña |
|:---------|:------------|
|{{$user->email}}|{{$password}}|

@endcomponent

@component('mail::button', ['url' => 'login'])
Click para acceder al Sistema
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
