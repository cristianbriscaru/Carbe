@component('mail::message')
Dear {{$user->name}},
<br>

@component('mail::panel')
Your user profile has been successfuly updated.
<br>
<br>
<br>

Want to have a look at your profile ?   <a href="{{ route('user.show') }}" class="button button-green" target="_blank">User Profile</a>
@endcomponent

Sincerely,<br>
{{ config('app.name') }} Team
@endcomponent