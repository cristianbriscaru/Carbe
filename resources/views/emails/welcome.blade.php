@component('mail::message')
Dear {{$user->name}},
<br>

@component('mail::panel')
Welcome to Carbe and get ready to experience our car networking power.
<br>
<br>
<br>
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                    <a href="{{ route('advert.create') }}" class="button button-green" target="_blank">   Sell   </a>      
                                     <a href="{{ route('search.create') }}" class="button button-green" target="_blank">   Buy   </a>       
                                      <a href="{{ route('help') }}" class="button button-green" target="_blank">   Help   </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@endcomponent

Sincerely,<br>
{{ config('app.name') }} Team
@endcomponent