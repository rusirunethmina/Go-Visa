@extends('backend.layouts.admin')
@push('scripts_head')  
     <link href="{{ asset('backend/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	 <link href="{{ asset('backend/css/responsive.dataTables.min.css') }}" rel="stylesheet">
	 <link href="{{ asset('backend/css/dialog.css') }}" rel="stylesheet">
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
                @include('backend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Testimonial MANAGEMENT</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
							<div class="table-wrap"> 
								<table id="dataTableElement" class="table pb-30" >
									<thead>
										<tr>
                                            <th>Provider</th>
											<th>Link</th>
                                            <th>Featured</th>
                                            <th>Created</th>
											<th>Manage</th>
										</tr>
									</thead>
                                    <tbody>
                                        @if($testimonials)
                                            @foreach($testimonials as $testimonial)
                                            <tr>
                                                <td>{{$testimonial->user->name}}</td>
                                                <td>{{$testimonial->link}}</td>
                                                <td><span class="label label-primary">{{ ($testimonial->is_featured == 1) ? "Yes" : "No"  }}</span></td>
                                                <td>{{$testimonial->created_at}}</td>
                                                <td>
                                                  <a href="{{ route('admin.testimonials.edit',   $testimonial->id) }}" class="btn btn-xs btn-default">Edit</a>  
                                                  <button type="button" id="delete" data-id="{{ $testimonial->id }}" class="btn btn-xs btn-primary btn-outline">Delete</button>  
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif 
                                    </tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>	
            </div>
		</div>
	</div>
@endsection

@push('scripts_footer')  
    <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>  
    <script src="{{ asset('backend/js/dialog.js') }}"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function(){
            
            $('#dataTableElement').DataTable();

            $('#dataTableElement').delegate('#delete', 'click', function(){
                    let id = $(this).attr('data-id');  
                    lnv.confirm({
                        title: 'Confirm',
                        content: 'Are you sure you want to delete this testimonial?',
                        confirmBtnText: 'Yes',
                        confirmHandler: function(){
                            var url = '{{ route('admin.testimonials.delete', ':id') }}';
							$.ajax({
                                type: 'DELETE',
                                url: url.replace(':id', id),    
                                dataType  : 'json',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                success: function(response){
                                    if(response.type == "success"){
                                        location.reload();
                                    }else{
                                        lnv.alert({
                                            title: 'Error',
                                            content: 'Something went wrong, Please try again later!'
                                        }); 
                                    }
                                },
                                error : function (error){
                                    lnv.alert({
                                        title: 'Error',
                                        content: 'Something went wrong, Please try again later!'
                                    }); 
                                }
                            });
                        },
                        cancelBtnText: 'No',
                        cancelHandler: function(){
                    
                        }
                    })	
            });
    	});    		
	</script>
    
@endpush
