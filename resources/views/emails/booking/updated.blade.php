@component('mail::message')
# Your booking request has been {{ $booking->status }}
 
##### Agent
{{ $booking->agent->name }}

##### Date
{{ $booking->booked_date }}

##### Time
From {{ $booking->timeSlot->start_time }} - To {{ $booking->timeSlot->end_time }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent