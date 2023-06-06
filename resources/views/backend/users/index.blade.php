@extends('backend.layouts.admin')
@push('scripts_head')  
     <link href="{{ asset('backend/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	 <link href="{{ asset('backend/css/responsive.dataTables.min.css') }}" rel="stylesheet">
	 <link href="{{ asset('backend/css/dialog.css') }}" rel="stylesheet">
     <link href="{{ asset('backend/css/datepicker.css') }}" rel="stylesheet">
@endpush
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
                            <h6 class="panel-title txt-dark">USER MANAGEMENT</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter">Filter</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
                           <div class="form-inline mb-30 collapse"  id="filter">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="start_date" name="start_date" placeholder="From" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="end_date" name="end_date"  placeholder="To" autocomplete="off">
                                </div>	
                                <div class="form-group">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" selected="selected">-Select Status-</option>
                                        <option value="pending">Pending</option>
                                        <option value="suspend">Suspend</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="button" name="applyFilter" id="applyFilter" class="btn btn-primary">Apply</button>
                                    <button type="button" name="clearFilter" id="clearFilter" class="btn btn-default">Clear</button>
                                </div>
                            </div> 
                           <table id="dataTableElement" class="table pb-30">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>	
            </div>
		</div>
	</div>
@endsection
@push('scripts_footer')  
    <script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/js/datepicker.js') }}"></script>
    <script src="{{ asset('backend/js/dialog.js') }}"></script>

    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		
			if($('#start_date').length > 0){
                $('#start_date').datepicker({
                    format: 'yyyy-mm-dd',
                }).on('changeDate', function(ev){
                    $('#start_date').datepicker('hide');
                });
            }

            if($('#end_date').length > 0){
                $('#end_date').datepicker({
                    format: 'yyyy-mm-dd',
                }).on('changeDate', function(ev){
                    $('#end_date').datepicker('hide');
                });
            }

			$('#dataTableElement').DataTable({
                responsive: true,
                processing: true, 
                serverSide: true, 
                ordering: true,
                ajax: {
                    url: "{{ route('admin.users.datatable') }}",
                    type: "GET",
                    data: function ( data ) {
                        data.start_date  = $('#start_date').val();
                        data.end_date    = $('#end_date').val();
						data.status    = $('#status').val();
                    }
                },
                columns: [
                    {
                        data:'name',
                        name:'name'
                    },
                    {
                        data:'email',
                        name:'email'
                    },
					{
                        data:'role',
                        name:'role'
                    },
                    {
                        data:'status',
                        name:'status'
                    },
                    {
                        data:'created_at',
                        name: 'created_at'
                    },
					{
                        data:'id',
                        name: 'id'
                    }
                ],
				columnDefs: [
					{ 
                        targets: [ 0 ], 
                        orderable: false,
                        searchable: false
                    },
					{ 
                        targets: [ 1 ], 
						orderable: false,
                        searchable: true
                    },
                    {
                        targets: [3], 
                        orderable: false,
                        render : function ( data, type, row, meta ) {
                            var css = "";
							if(data == "pending"){
								css = "primary";
							}else if(data == "suspend"){
								css = "danger";
							}else{
								css = "default";
							}
                            return  '<span class="label label-'+css+'">'+data+'</span>';
                        }
                    },
                    {
                        targets: [ 5 ], 
                        orderable: false,
                        render : function ( data, type, row, meta ) {
                            var url = AppHelper.baseUrl + '/admin/users/edit/'+ data;
                            var template = '<a class="btn btn-xs btn-primary mr-10" href="'+url+'">Edit</a>';
                            template +=   '<button class="btn btn-xs btn-default mr-10" id="delete" data-id="'+data+'">Delete</button>';
                            return template;                            
                        }
                    },
	            ]
		    });

			$('#applyFilter').click(function(){ 
                $('#dataTableElement').DataTable().ajax.reload(); 
            });

			$('#clearFilter').click(function(){ 
                $('#start_date').val("")
                $('#end_date').val("");
                $('#status').val("");
                $('#dataTableElement').DataTable().ajax.reload(); 
            });


    	});    		
	</script>
    
@endpush
