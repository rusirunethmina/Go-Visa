@extends('backend.layouts.admin')
@section('content')
<div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Reviews</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="">Dashboard</a></li>
                    <li><a href=""><span>Reviews</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('backend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">update review</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                          <form method="post" action="{{ route('admin.reviews.update', $review->id) }}" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="star">Ratings  :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="star" name="star" value="{{  $review->star }}">
                                        @error('star')
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
                                            <option value="pending"  {{ $review->status == 'pending'  ? 'selected' : '' }}>Pending</option>
                                            <option value="suspend"  {{ $review->status == 'suspend'  ? 'selected' : '' }}>Suspend</option>
                                            <option value="active"   {{ $review->status == 'active'  ? 'selected' : '' }}>Active</option>
                                        </select>
                                        @error('status')
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