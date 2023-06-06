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
                    <li><a href=""><span>Change Password</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('frontend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Change Password</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                           <form method="POST" action="{{ route('account.settings.update.change_password') }}" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="password">New Password  :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" pattern="^.{8}.*$">
                                        <span class="help-block mt-10 mb-0"><small>at least 8 characters long</small></span>
                                        @error('password')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="password_confirmation">Confirm New Password :</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" pattern="^.{8}.*$">
                                        @error('password_confirmation')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>   
                                <div class="form-group mb-0"> 
                                    <div class="col-sm-offset-4 col-sm-8">
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
