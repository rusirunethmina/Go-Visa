@extends('frontend.layouts.guest')

@section('content')
    <section id="homeSectionHero">
        <div class="container">
            <div id="heroContentRow" class="row">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold">Find the perfect freelance services for your business</h1>
                    <p class="lead mb-5 fw-semibold">Work with talented people at the most affordable price to get the
                        most out of your time and cost</p>
                    <form method="get" action="{{url('search')}}" class="row m-0 g-3 mb-3" style="border: 1px solid #969696; border-radius: 4px;">
                        <div class="col-md-8 mt-1 pb-1">
                            <input name="keyword" class="form-control fw-semibold" placeholder="What are you looking for?">
                        </div>
                        <div class="col-md-4 mt-1 pb-1">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </form>
                    <p class="fw-semibold">Popular Searches : <span class="text-muted fw-normal">Consultants, Lawyers ,Private Colleges</span></p>
                </div>
            </div>
        </div>

    </section>
   
    <section style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="fw-bold">Most recommended agents in</h2>
            <p class="mb-5">These agents have tons of clients who think they're simply the best.</p>
            <div class="cus-user-card-row row">
                @if($mostRecommendedProviders)
                    @foreach($mostRecommendedProviders as $data)
                        <div class="col-md-3">
                            <div class="card d-flex justify-content-center p-3">
                                <div class="row m-0">
                                    <div class="col p-0 text-center">
                                        <img class="rounded-circle user-img" src="{{ ($data->profile && $data->profile->avatar) ?   $data->profile->avatar :  asset('backend/images/avatar.png') }}" alt="{{$data->name}}">
                                        <h5>{{$data->name}}</h5>
                                        <p>{{ ($data->profile->position) ? $data->profile->position : '-' }} - {{ ($data->profile->company) ? $data->profile->company : '-' }}</p>
                                        <a class="w-100" href="{{route('profile', $data->slug)}}">View Listings</a><br>
                                        <button class="btn btn-pill btn-light rounded-pill cus-btn-user-card-1">
                                            <i class="bi-star-fill"></i><span>{{  $data->review_positve() }} Recomendations</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>


    <section style="background-color: #F1F1FE;">
        <div class="container">
            <h2 class="fw-bold">Local experts in Vancouver</h2>
            <p class="mb-5">Experienced guides who can help you navigate your new neighbourhood.</p>
            <div class="cus-user-card-row row">
                @if($mostRecommendedProviders2)
                    @foreach($mostRecommendedProviders2 as $data)
                        <div class="col-md-3">
                            <div class="card d-flex justify-content-center p-3">
                                <div class="row m-0">
                                    <div class="col p-0 text-center">
                                        <img class="rounded-circle user-img" src="{{ ($data->profile && $data->profile->avatar) ?   $data->profile->avatar :  asset('backend/images/avatar.png') }}" alt="{{$data->name}}">
                                        <h5>{{$data->name}}</h5>
                                        <p>{{ ($data->profile->position) ? $data->profile->position : '-' }} - {{ ($data->profile->company) ? $data->profile->company : '-' }}</p>
                                        <a class="w-100" href="{{ route('profile', $data->slug) }}">View Listings</a><br>
                                        <button class="btn btn-pill btn-light rounded-pill cus-btn-user-card-1">
                                            <i class="bi-star-fill"></i><span>{{  $data->review_positve() }} Recomendations</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>


    <section style="background-color: #FFFFFF;">
        <div class="container">
            <h2 class="fw-bold">Local experts in Vancouver</h2>
            <p class="mb-5">Experienced guides who can help you navigate your new neighbourhood.</p>
            <div class="cus-user-card-row row">
                @if($mostRecommendedProviders3)
                    @foreach($mostRecommendedProviders3 as $data)
                        <div class="col-md-3">
                            <div class="card d-flex justify-content-center p-3">
                                <div class="row m-0">
                                    <div class="col p-0 text-center">
                                        <img class="rounded-circle user-img" src="{{ ($data->profile && $data->profile->avatar) ?   $data->profile->avatar :  asset('backend/images/avatar.png') }}" alt="{{$data->name}}">
                                        <h5>{{$data->name}}</h5>
                                        <p>{{ ($data->profile->position) ? $data->profile->position : '-' }} - {{ ($data->profile->company) ? $data->profile->company : '-' }}</p>
                                        <a class="w-100" href="{{route('profile', $data->slug)}}">View Listings</a><br>
                                        <button class="btn btn-pill btn-light rounded-pill cus-btn-user-card-1">
                                            <i class="bi-star-fill"></i><span>{{  $data->review_positve() }} Recomendations</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
