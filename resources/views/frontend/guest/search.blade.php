@extends('frontend.layouts.guest')
@section('content')
    @include('frontend.layouts.shared.search_form')
    <section style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="fw-bold">Local lawyers in Vancouver</h2>
            <p class="mb-5">Experienced guides who can help you navigate your new neighbourhood.</p>
            <div class="cus-user-card-row row">
             @if($providers)
                @foreach($providers as $provider)
                    <div class="col-md-3">
                        <div class="card d-flex justify-content-center p-3">
                            <div class="row m-0">
                                <div class="col p-0 text-center">
                                    <img class="rounded-circle user-img" src="{{ ($provider->profile && $provider->profile->avatar) ?   $provider->profile->avatar :  asset('backend/images/avatar.png') }}" alt="User">
                                    <h5>{{$provider->name}}</h5>
                                    <p>{{ ($provider->profile->position) ? $provider->profile->position : '-' }} - {{ ($provider->profile->company) ? $provider->profile->company : '-' }}</p>
                                    <a class="w-100" href="{{route('profile', $provider->slug)}}">View Listings</a><br>
                                    <button class="btn btn-pill btn-light rounded-pill cus-btn-user-card-1">
                                        <i class="bi-star-fill"></i><span>{{  $provider->review_positve() }} Recomendations</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="d-flex justify-content-center mt-5">
                    <h2>No data available, Please try again later!</h2>
                </div>
                @endif
               @if($providers)
                <div class="d-flex justify-content-center mt-5">
                    {{ $providers->links() }}
                </div>
               @endif
            </div>
        </div>
    </section>
@endsection
