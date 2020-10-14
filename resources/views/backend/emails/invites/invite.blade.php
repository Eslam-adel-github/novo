@component('mail::message')
Hello  !<br>
We Are Happy To Invite You To Attend this Event

@component('mail::table')
    | Event Name       | Event Date         | Address  |
    | ------------- |:-------------:| --------:|
    | {{VarByLang(getData(collect($event),"event_name"))}}      | {{$event->event_date}}      | {{VarByLang(getData(collect($event),"address"))}}     |

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
