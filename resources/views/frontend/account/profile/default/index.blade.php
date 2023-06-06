@extends('frontend.layouts.account')
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
                             <form method="POST" action='{{ route("account.profile.user.update") }}'  enctype="multipart/form-data">
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
                                            <label class="control-label mb-10 col-sm-4" for="file">Avatar:</label>
                                            <div class="col-md-2">
                                                <div class="col-sm-6">
                                                    <input type="file" name="avatar">
                                                </div>
                                            </div>
                                        </div>
                                        @error('avatar')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    </br>
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
