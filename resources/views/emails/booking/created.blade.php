@component('mail::message')
# New booking request
 
##### User
{{ $booking->bookedUser->name }}

##### Date
{{ $booking->booked_date }}

##### Time
From {{ $booking->timeSlot->start_time }} - To {{ $booking->timeSlot->end_time }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent