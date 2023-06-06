<section id="sectionSeachForm">
        <div class="container">
            <form method="get" action="{{ route('search') }}" id="seachForm">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="cus-input-group p-0">
                            <div class="row m-0">
                                <div class="col-md-8 mt-1 pb-1">
                                    <input name="keyword" class="form-control fw-semibold" placeholder="What are you looking for?">
                                </div>
                                <div class="col-md-4 mt-1 pb-1">
                                    <button type="submit" class="btn btn-primary w-100">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="cus-input-group">
                            <select class="form-select" name="location">
                                <option value="" selected>Location</option>
                                @if($locations)
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="cus-input-group">
                            <select class="form-select">
                                <option selected>Sponsored</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="cus-input-group">
                            <select class="form-select">
                                <option selected>Recommendation</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>