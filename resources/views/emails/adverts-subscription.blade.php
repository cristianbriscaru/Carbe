@component('mail::message')
Dear {{$user->name}},
<br>
@component('mail::panel')
We have a car advert matching your subscription : 
<br>
{{$advert->model->make->make_name." ".$advert->model->model_name." ".$advert->variant}} 
<br>
<br>
<br>

Want to have a look  ?   <a href="{{ route('advert.show',['advert'=> $advert->id]) }}" class="button button-green" target="_blank">{{$advert->model->make->make_name." ".$advert->model->model_name}}</a>
@endcomponent

Sincerely,<br>
{{ config('app.name') }} Team
@endcomponent

