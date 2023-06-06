@extends('backend.layouts.admin')
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
                @include('backend.layouts.shared.notification')
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
                            <form method="POST" action="{{ route('admin.users.update', $profile->id) }}" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="name">Name  :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $profile->name }}">
                                        @error('name')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="name">Email  :</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}">
                                        @error('email')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="category">Category  :</label>
                                    <div class="col-sm-8">
                                        <select name="category" id="category" class="form-control">
                                            <option value="consultant" {{ ($profile->category == "pending") ? 'selected' : '' }}>Consultants</option>
                                            <option value="lawyer" {{ ($profile->category == "lawyer") ? 'selected' : '' }}>Lawyers</option>
                                            <option value="private"  {{ ($profile->category == "private") ? 'selected' : '' }}>Private Colleges</option>
                                        </select>
                                        @error('category')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="status">Status  :</label>
                                    <div class="col-sm-8">
                                        <select name="status" id="status" class="form-control">
                                            <option value="active" {{ ($profile->status == "active") ? 'selected' : '' }}>Active</option>
                                            <option value="suspend" {{ ($profile->status == "suspend") ? 'selected' : '' }}>Suspend</option>
                                            <option value="pending"  {{ ($profile->status == "pending") ? 'selected' : '' }}>Pending</option>
                                        </select>
                                        @error('status')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="role">Role  :</label>
                                    <div class="col-sm-8">
                                        <select name="role" id="role" class="form-control">
                                            <option value="user" {{ ($profile->role == "user") ? 'selected' : '' }}>User</option>
                                            <option value="provider" {{ ($profile->role == "provider") ? 'selected' : '' }}>Provider</option>
                                            <option value="admin"  {{ ($profile->role == "admin") ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('status')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="is_featured">Featured?  :</label>
                                    <div class="col-sm-8">
                                       <div class="checkbox checkbox-primary">
                                            <input id="checkbox2" type="checkbox" {{ ($profile->is_featured == 1) ? "checked" : "" }} name="is_featured">
                                            <label for="checkbox2"></label>
                                        </div>
                                        @error('is_featured')
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
