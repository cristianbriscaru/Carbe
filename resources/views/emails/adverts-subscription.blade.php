@component('mail::message',['advert'=>$advert,'user'=>$user])
# Introduction
{{$user->name}}
The body of your message.
{{$advert->price}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
