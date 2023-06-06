@extends('frontend.layouts.guest')
@push('scripts_head')
    <link rel="stylesheet" href="{{ asset('frontend/css/calendar-theme.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/calendar.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/rating.ui.css') }}" crossorigin="anonymous">
@endpush
@section('content')
    <section id="sectionProfile">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <img class="w-100 rounded-circle" src="{{ ($account->profile && $account->profile->avatar) ?   $account->profile->avatar :  asset('backend/images/avatar.png') }}" alt="User">
                </div>
                <div class="col-md-8 mb-3">
                    <div class="row m-0">
                        <div class="col-md-6 mb-3">
                            <h2 class="fw-bold">
                                <span>{{ ($account->profile->first_name) ? $account->profile->first_name : '-'  }} {{ ($account->profile->last_name) ? $account->profile->last_name : '-'  }}</span>
                                <i class="bi bi-patch-check-fill" style="color: #00D865;"></i>
                                <span class="h6 fw-semibold" style="color: #B1B1B1;">9.2/10</span>
                            </h2>
                            <p class="fw-semibold">{{ ($account->profile->tagline) ? Str::limit($account->profile->tagline, 75) : '-'  }}</p>
                        </div>

                        <div class="col-md-6 text-end mb-3">
                            @auth
                              <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Appointment</button>
                              <button  type="button" data-bs-toggle="modal" data-bs-target="#messageModal" class="btn btn-outline-primary rounded-circle m-1"><i class="bi bi-chat-left"></i></button>
                            @else
                              <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#notificationModal1">Book Appointment</button>
                              <button  type="button" data-bs-toggle="modal" data-bs-target="#notificationModal2" class="btn btn-outline-primary rounded-circle m-1"><i class="bi bi-chat-left"></i></button>
                            @endif
                         
                            @if($account->profile->phone)
                                <a class="btn btn-outline-primary rounded-circle m-1" target="_blank" href="tel:{{ $account->profile->phone }}">
                                    <i class="bi bi-telephone"></i>
                                </a>
                            @endif
                        </div>

                    </div>

                    @include('frontend.layouts.shared.notification')
                    <div id="descriptionList" class="row m-0">
                        <div class="col-md-6 mb-3">
                            <ul class="list-group rounded-0">
                                <li class="list-group-item">Years in Business: {{ ($account->profile->years_in_business) ? $account->profile->years_in_business : '-'  }}</li>
                                <li class="list-group-item">
                                    Locations:
                                    @if($account->locations)
                                        @foreach($account->locations as $location)
                                            {{ $location->name."," }}
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    Languages:
                                    @if($account->profile->languages)
                                        @php
                                            $languages = json_decode($account->profile->languages);
                                        @endphp
                                        @foreach($languages as $language)
                                            {{ $language."," }}
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="list-group-item">Business License:</li>
                                <li class="list-group-item">RCIC License:</li>
                                <li class="list-group-item">Social Score:</li>
                            </ul>
                        </div>
                        <div class="col-md-6 mb-3">
                            <ul class="list-group rounded-0">
                                <li class="list-group-item">PME course taken:</li>
                                <li class="list-group-item">CICC Membership Dues:</li>
                                <li class="list-group-item">Case Approval Rate:</li>
                                <li class="list-group-item">Client Reviews:</li>
                                <li class="list-group-item">References:</li>
                                <li class="list-group-item">Minimum 10 Approved Cases</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="fw-bold mb-5">Why should you hire me?</h2>

            <div class="row">
                <div class="col-md-6">
                    <div id="videoCardOnBio" class="card p-0">
                        <img class="w-100" src="{{ ($account->profile && $account->profile->hire_thumbnail) ?   $account->profile->hire_thumbnail :  asset('frontend/images/video-thumbnail.png') }}" alt="Thumbnail">
                        <button data-bs-toggle="modal" data-bs-target="#whyshouldhireModal"
                                class="btn btn-light rounded-circle"><i class="bi-play-circle h3"></i>
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <h3 class="fw-bold">Bio</h3>
                    <p class="fw-semibold">{{ ($account->profile->bio) ? Str::limit($account->profile->bio, 600) : '-'  }}</p>
                    <p>{{ ($account->profile->sub_bio) ? Str::limit($account->profile->sub_bio, 100) : '-'  }}</p>
                    @auth
                        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Appointment</button>
                        @if(!$has_reviewed)
                        <button type="button" class="btn btn-light m-1" data-bs-toggle="modal" data-bs-target="#ratingsModal">Rate this user</button>
                        @endif
                        <button data-bs-toggle="modal" data-bs-target="#messageModal" class="btn btn-outline-primary rounded-circle m-1"> <i class="bi bi-chat-left"></i></button>
                    @else
                        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#notificationModal1">Book Appointment</button>
                        @if(!$has_reviewed)
                          <button type="button" class="btn btn-light m-1" data-bs-toggle="modal" data-bs-target="#notificationModal3">Rate this user</button>
                        @endif
                        <button data-bs-toggle="modal" data-bs-target="#notificationModal2" class="btn btn-outline-primary rounded-circle m-1"><i class="bi bi-chat-left"></i></button>
                    @endif
                 
                    @if($account->profile->phone)
                        <a class="btn btn-outline-primary rounded-circle m-1" target="_blank" href="tel:{{ $account->profile->phone }}">
                            <i class="bi bi-telephone"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="fw-bold mb-5">Testimonials</h2>
            <div class="testimonial-card-row row testimonial">
                @if($account->featured_testimonials)
                    @foreach($account->featured_testimonials as $testimonial)
                        <div class="col-md-4">
                            <div class="card p-0">
                                <img class="w-100" src="{{ ($testimonial->thumbnail) ?  $testimonial->thumbnail  :  asset('frontend/images/video-thumbnail.png')}}" alt="Thumbnail">
                                <button id="testimonial" data-link="{{ $testimonial->link }}" class="btn btn-light rounded-circle">
                                    <i class="bi-play-circle h3"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="fw-bold">Local lawyers in {{ ($account->profile->location) ? $account->profile->location->name : '-'  }}</h2>
            <p class="mb-5">Experienced guides who can help you navigate your new neighbourhood.</p>
            <div class="cus-user-card-row row">
                @if($relevantProviders)
                    @foreach($relevantProviders as $providers)
                        <div class="col-md-3">
                            <div class="card d-flex justify-content-center p-3">
                                <div class="row m-0">
                                    <div class="col p-0 text-center">
                                        <img class="rounded-circle user-img" src="{{ ($providers->profile && $providers->profile->avatar) ?   $providers->profile->avatar :  asset('backend/images/avatar.png') }}" alt="User">
                                        <h5>{{$providers->name}}</h5>
                                        <p>{{ ($providers->profile->position) ? $providers->profile->position : '-' }} - {{ ($providers->profile->company) ? $providers->profile->company : '-' }}</p>
                                        <a class="w-100" href="{{ route('profile', $providers->slug) }}">View Listings</a><br>
                                        <button class="btn btn-pill btn-light rounded-pill cus-btn-user-card-1">
                                            <i class="bi-star-fill"></i><span>{{  $providers->review_positve() }} Recomendations</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @include('frontend.guest.modals.chat')
    @include('frontend.guest.modals.video_play', ['link' => $account->profile->why_should_you_hire_me])
    @include('frontend.guest.modals.booking')
    @include('frontend.guest.modals.testimonial')
    @include('frontend.guest.modals.notification', ['id' => 'notificationModal1', 'message' => 'You must be logged in to book appointment'])
    @include('frontend.guest.modals.notification', ['id' => 'notificationModal2', 'message' => 'You must be logged in to chat'])
    @include('frontend.guest.modals.notification', ['id' => 'notificationModal3', 'message' => 'You must be logged in to rate this user'])
    @include('frontend.guest.modals.ratings')
@endsection

@push('scripts_footer')
    <script src="{{ asset('frontend/js/calendar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/js/moment-with-locale.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        const agentId = "{{$account->id}}";
        let selectedDate = '';
        $('#txtAgentId').val(agentId);


        jQuery(document).ready(function(){
            $('.calendar-container').calendar({
                onClickDate:function (date) {
                    $('#divTimeSlot').hide();
                    $('#loadTimeSlot').show();
                    $('#divTimeSlot').html('');
                    const dateFormat = moment(date, 'ddd MMM DD YYYY HH:mm:ss [GMT]ZZ');
                    selectedDate = dateFormat.format('YYYY-MM-DD');
                    var selectDate = moment(date);
                    var todayDate = moment();
                    var allow  = false;
                    var dDiff = selectDate.diff(todayDate, 'days');
                    if (dDiff > 0) {
                       allow = true;
                    } else if (dDiff < 0) { 
                       allow = false;
                        $('#divTimeSlot').hide();
                        $('#loadTimeSlot').hide();
                    } else { 
                       allow = true;
                    }
                    if(allow){
                        $.ajax({
                            url: BASE+'/get-available-time-slots',
                            type: 'POST',
                            data: {
                                agent_id: agentId,
                                date: dateFormat.format('YYYY-MM-DD')
                            },
                            dataType: 'json',
                            success: function(response) {
                                let html = "";
                                for (let i = 0; i < response.length; i++) {
                                    html += `<button onclick="selectTimeSlot(${response[i]["id"]},'${response[i]["label"]}')" type="button" class="btn btn-outline-primary mb-2 me-1">${response[i]["label"]}</button>`;
                                }
                                $('#divTimeSlot').html(html);
                                $('#loadTimeSlot').hide();
                                $('#divTimeSlot').show();
                            },
                            error: function(xhr, status, error) {
                                // handle error response
                            }
                        });
                        $('#selectedDateView').text(dateFormat.format('MMMM Do YYYY'));
                        $('#txtDateView').val(dateFormat.format('MMMM Do YYYY'));
                        $('#txtDate').val(dateFormat.format('YYYY-MM-DD'));
                        $('#selectedDateView').show();
                    }else{
                        $('#divTimeSlot').hide();
                        $('#loadTimeSlot').hide();
                    }
                }
            });

            $(".testimonial").delegate("#testimonial", "click", function() {
                var link = $(this).attr('data-link');
                var modal = new bootstrap.Modal(document.getElementById('testimonialModal'), {
                    keyboard: false
                });
                modal.show();
                $("#content").html('<iframe class="w-100"  width="100%" height="315" src="'+link+'" allowfullscreen></iframe>');
            });
        });


        let selectedTimeSlotId = 0;
        function selectTimeSlot(timeSlotId, label) {
            $('#txtTimeView').val(label);
            $('#txtTime').val(timeSlotId);
            selectedTimeSlotId = timeSlotId;
        }

        function onClickedConfirmBooking(){
            if (selectedTimeSlotId !== 0 && selectedDate !== '') {
                const form = document.getElementById('bookingForm');
                form.submit();

            } else {
                alert('Please select a date and time slot correctly!');
            }
        }

         $("input[type='radio']").click(function(){
            var sim =  $("input[type='radio']:checked").val();
            if (sim<3) {
            $('.myratings').css('color','red'); 
            $(".myratings").text(sim);
         }else{
            $('.myratings').css('color','green');
            $(".myratings").text(sim);
         }
         });

         $("#onClickSave").click(function(){
            var star = $("input[name='rating']:checked").val();
            if(star){
                $.ajax({
                    url: BASE+'/review/store/',
                    type: 'POST',
                    data: {
                        star: star,
                        provider_id: "{{ $account->id }}"
                    },
                    dataType: 'json',
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        $('#rating_message').html('<div class="alert alert-danger" role="alert">Something went wrong, please try again later.</div>')
                    }
                });
            }else{
              $('#rating_message').html('<div class="alert alert-danger" role="alert">Please select ratings</div>')
            }
         });

    </script>
@endpush

