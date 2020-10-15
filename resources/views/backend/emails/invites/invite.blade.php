@component('mail::message')
Hello   {{$event->user_name}}!<br>
We Are Happy To Invite You To Attend this Event

@component('mail::table')
    | Event Name| Event Date| Address  |
    | ------------- |:-------------:| --------:|
    | {{VarByLang(getData(collect($event),"event_name"))}}| {{$event->event_date}}| {{VarByLang(getData(collect($event),"address"))}}     |

@endcomponent

@component('mail::button', ['url' => asset("uploads/$event->agenda")])
        DownLoad Agenda
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
