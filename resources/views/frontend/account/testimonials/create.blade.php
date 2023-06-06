@extends('frontend.layouts.account')
@push('scripts_head')  
     <link href="{{ asset('backend/css/switchery.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Testimonials</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="">Dashboard</a></li>
                    <li><a href=""><span>Testimonials</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('frontend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">create testimonial</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                          <form method="post" action="{{ route('account.testimonials.store') }}" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="link">Link  :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="link" name="link">
                                        @error('link')
                                        <div class="alert alert-info alert-dismissable alert-style-1">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <i class="zmdi zmdi-info-outline"></i>{{ $message }}
                                        </div>
                                        @enderror
                                        <span class="help-block mt-10 mb-0"><small>Youtube embed URL ex :  https://www.youtube.com/embed/7564574</small></span>  
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="control-label mb-10 col-sm-4" for="is_featured">Featured?  :</label>
                                    <div class="col-sm-8">
                                        <input type="checkbox" name="is_featured" value="1" class="js-switch js-switch-1"  data-color="#03233B" data-size="large"/>
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
@push('scripts_footer')  
    <script src="{{ asset('backend/js/switchery.min.js') }}"></script>  
    <script type="text/javascript">
    	jQuery(document).ready(function(){
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch-1').each(function() {
                new Switchery($(this)[0], $(this).data());
            });

    	});    		
	</script>
    
@endpush
