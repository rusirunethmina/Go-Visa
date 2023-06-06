@extends('frontend.layouts.account')
@push('scripts_head')  
     <link href="{{ asset('backend/css/select2.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Settings</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="">Dashboard</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href=""><span>Profile</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('frontend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Update Profile</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                             <form method="POST" action='{{ route("account.profile.provider.update") }}'  enctype="multipart/form-data">
                                @csrf
                               <div class="row">
                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="first_name">First Name:</label>
                                            <input type="text" class="form-control required" id="first_name" name="first_name" value="{{ old('first_name') ?? $profile->first_name }}">
                                            @error('first_name')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="last_name">Last Name:</label>
                                            <input type="text" class="form-control required" id="last_name" name="last_name" value="{{ old('last_name') ?? $profile->last_name }}">
                                            @error('last_name')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="phone">Phone:</label>
                                            <input type="text" class="form-control required" id="phone" name="phone" value="{{ old('phone') ?? $profile->phone }}">
                                            @error('phone')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="tagline">Tagline:</label>
                                            <textarea class="form-control" rows="3" name="tagline" id="tagline">{{ $profile->tagline }}</textarea>
                                            @error('tagline')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="bio">Bio:</label>
                                            <textarea class="form-control" name="bio" rows="5" name="bio" id="bio">{{ old('bio') ?? $profile->bio }}</textarea>
                                            @error('bio')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="sub_bio">Bio Sub Heading:</label>
                                            <textarea class="form-control" rows="3" name="sub_bio" id="sub_bio">{{ $profile->sub_bio }}</textarea>
                                            @error('sub_bio')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="file">Avatar:
                                                @if($profile->avatar)
                                                  <i class="icon-check h3 text-success"></i>
                                                @else
                                                  <i class="icon-close h3 text-danger"></i>
                                                @endif
                                            </label>
                                            <input class="form-control" type="file" name="avatar">                                         
                                            @error('avatar')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="location_id">Primary Location:</label>
                                            <select class="form-control" id="location_id" name="location_id">
                                                @foreach($locations as $location)
                                                  <option value="{{ $location->id }}"  {{ isset($profile->location_id) &&  ($profile->location_id ==  $location->id) ? 'selected' : '' }}>{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('location_id')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div> 

                                    
                                    <div class="col-md-12">
                                        <h5>Business:</h5>
                                        <hr class="light-grey-hr">
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="years_in_business">Years In Business:</label>
                                            <input type="number" class="form-control required" id="years_in_business" name="years_in_business" value="{{ $profile->years_in_business }}">
                                            @error('years_in_business')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div> 

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="languages">Languages:</label>
                                            <select class="form-control languages" id="languages" name="languages[]" multiple>
                                                @foreach($languages as $language)
                                                  <option {{ isset($profile_languages) && in_array($language['name'], $profile_languages) ? 'selected' : '' }}>{{ $language['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('languages')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="locations">Business Locations:</label>
                                            <select class="form-control locations" id="locations" name="locations[]" multiple>
                                                @foreach($locations as $location)
                                                <option value="{{ $location->id }}"  {{ isset($current_user->locations) && $current_user->locations->contains($location) ? 'selected' : '' }}>{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('locations')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="position">Position:</label>
                                            <input type="text" class="form-control required" id="position" name="position" value="{{ $profile->position }}">
                                            @error('position')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="company">Company:</label>
                                            <input type="text" class="form-control required" id="company" name="company" value="{{ $profile->company }}">
                                            @error('company')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                    </div>

                                    <div class="col-md-12">
                                        <p>Why Should You Hire Me?:</p>
                                        <hr class="light-grey-hr">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="why_should_you_hire_me">Link:</label>
                                            <input type="text" class="form-control required" id="why_should_you_hire_me" name="why_should_you_hire_me" value="{{ $profile->why_should_you_hire_me }}">
                                            @error('why_should_you_hire_me')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div>   
                                        <span class="help-block mt-10 mb-0"><small>Youtube embed URL ex :  https://www.youtube.com/embed/7564574</small></span>  
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10" for="hire_thumbnail">Thumbnail:  
                                                @if($profile->hire_thumbnail)
                                                  <i class="icon-check h3 text-success"></i>
                                                @else
                                                  <i class="icon-close h3 text-danger"></i>
                                                @endif
                                           </label>
                                            <input type="file" class="form-control" id="hire_thumbnail" name="hire_thumbnail">
                                            @error('hire_thumbnail')
                                            <div class="alert alert-info alert-dismissable alert-style-1">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                            </div>
                                            @enderror
                                        </div> 
                                        <span class="help-block mt-10 mb-0"><small>ideal size 634 × 423 px</small></span>  
                                    </div>

                                    <div class="col-md-12">
                                         <button type="submit" class="btn btn-sm btn-primary"><span class="btn-text">Save</span></button>
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>	
            </div>
		</div>
	</div>
@endsection

@push('scripts_footer')  
    <script src="{{ asset('backend/js/select2.js') }}"></script>  
    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		$('.languages').select2({
                multiple : true
	        });    	
            
            $('.locations').select2({
                multiple : true
	        });   

            $('#location_id').select2(); 
    	});    		
	</script>
    
@endpush
