@component('mail::message')
Dear {{$user->name}},
<br>

@component('mail::panel')
Your {{$advert->model->make->make_name." ".$advert->model->model_name." ".$advert->variant}} for sale car advert has been successfuly posted and is beeing viewed by buyers as we speak.
<br>
<br>
<br>

Want to have a look at your advert ?   <a href="{{ route('advert.show',['advert'=> $advert->id]) }}" class="button button-green" target="_blank">{{$advert->model->make->make_name." ".$advert->model->model_name}}</a>
@endcomponent

Sincerely,<br>
{{ config('app.name') }} Team
@endcomponent
