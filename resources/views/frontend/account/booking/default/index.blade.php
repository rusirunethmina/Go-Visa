@extends('frontend.layouts.account')
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
                <h5 class="txt-dark">Booking</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="">Dashboard</a></li>
                    <li><a href=""><span>Booking</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('frontend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Booking</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
							<button type="button" class="btn btn-sm btn-default" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter">Filter</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body">
							<div class="table-wrap">
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
											<option value="cancelled">Cancelled</option>
											<option value="confirmed">Confirmed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" name="applyFilter" id="applyFilter" class="btn btn-primary">Apply</button>
                                        <button type="button" name="clearFilter" id="clearFilter" class="btn btn-default">Clear</button>
                                    </div>
                                </div> 
								<table id="dataTableElement" class="table pb-30" >
									<thead>
										<tr>
											<th>Provider</th>
											<th>Booked Date</th>
											<th>From</th>
											<th>To</th>
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
                    url: "{{ route('account.profile.user.booking.datatable') }}",
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
                        data:'booked_date',
                        name:'booked_date'
                    },
					{
                        data:'time_slot.start_time',
                        name:'from'
                    },
					{
                        data:'time_slot.end_time',
                        name:'to'
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
                        targets: [ 2 ], 
                        orderable: false,
                        searchable: false
                    },
					{ 
                        targets: [ 3 ], 
                        orderable: false,
                        searchable: false
                    },
					{ 
                        targets: [ 5 ], 
						orderable: false,
                        searchable: false
                    },
                    {
                        targets: [4], 
                        orderable: false,
                        render : function ( data, type, row, meta ) {
                            var css = "";
							if(data == "pending"){
								css = "primary";
							}else if(data == "cancelled"){
								css = "danger";
							}else{
								css = "default";
							}
                            return  '<span class="label label-'+css+'">'+data+'</span>';
                        }
                    },
                    {
                        targets: [ 6 ], 
                        orderable: false,
                        render : function ( data, type, row, meta ) {
							var template = '';
		                    if(row.status === "pending"){
								template = '<button class="btn btn-xs btn-default mr-10" id="update" data-id="'+data+'">Cancel</button>';
							}
                            return template;                            
                        }
                    },
	            ]
		    });

			
            $('#dataTableElement').delegate('#update', 'click', function(){
                    let id = $(this).attr('data-id');  
                    lnv.confirm({
                        title: 'Confirm',
                        content: 'Are you sure you want to cancel this booking?',
                        confirmBtnText: 'Yes',
                        confirmHandler: function(){
                            var url = '{{ route('account.profile.user.booking.update', ':id') }}';
							$.ajax({
                                type: 'POST',
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
