@extends('frontend.layouts.account')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Chat</h5>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="">Dashboard</a></li>
                    <li><a href=""><span>Chat</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('frontend.layouts.shared.notification')
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Chat</h6>
                        </div>
                        <div class="pull-right">
                            <a href="" class="btn btn-sm btn-primary"><span class="btn-text">Back</span></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper">
                        <div class="panel-body" id="chat_panel">
							@include('frontend.account.chat.chat')
                        
                        </div>
                    </div>
                </div>	
            </div>
		</div>
	</div>
@endsection

@push('scripts_footer')  
    <script type="text/javascript">
    	jQuery(document).ready(function(){
			var height,width,clickAllowed;
			
			height = $(window).height();
			width = $(window).width();
			
			// flag to allow clicking
			clickAllowed = true;
			
			$('.full-height').css('height', (height));
			$('.page-wrapper').css('min-height', (height));
			
			/*Right Sidebar Scroll Start*/
			if(width<=1007){
				$('#chat_list_scroll').css('height', (height - 267));
				$('.fixed-sidebar-right .chat-content').css('height', (height - 280));
				$('.fixed-sidebar-right .set-height-wrap').css('height', (height - 220));
				clickAllowed = true;
			}else {
				$('#chat_list_scroll').css('height', (height - 221));
				$('.fixed-sidebar-right .chat-content').css('height', (height - 230));
				$('.fixed-sidebar-right .set-height-wrap').css('height', (height - 170));
				clickAllowed = false;
			}	

			$('.users-chat-nicescroll-bar').slimscroll({height:'257px',size: '4px',color: '#878787',disableFadeOut : true,borderRadius:0});
			$('.chatapp-nicescroll-bar').slimscroll({height:'543px',size: '4px',color: '#878787',disableFadeOut : true,borderRadius:0});
			$('.chatapp-chat-nicescroll-bar').slimscroll({height:'483px',size: '4px',color: '#878787',disableFadeOut : true,borderRadius:0});

			/*Chat*/
			$(document).on("keypress","#input_msg_send",function (e) {
				if ((e.which == 13)&&(!$(this).val().length == 0)) {
					$('<li class="self mb-10"><div class="self-msg-wrap"><div class="msg block pull-right">' + $(this).val() + '<div class="msg-per-detail mt-5"><span class="msg-time txt-grey">3:30 pm</span></div></div></div><div class="clearfix"></div></li>').insertAfter(".fixed-sidebar-right .chat-content  ul li:last-child");
					$(this).val('');
				} else if(e.which == 13) {
					alert('Please type somthing!');
				}
				return;
			});
			$(document).on("keypress","#input_msg_send_widget",function (e) {
				if ((e.which == 13)&&(!$(this).val().length == 0)) {
					$('<li class="self mb-10"><div class="self-msg-wrap"><div class="msg block pull-right">' + $(this).val() + '<div class="msg-per-detail mt-5"><span class="msg-time txt-grey">3:30 pm</span></div></div></div><div class="clearfix"></div></li>').insertAfter(".chat-for-widgets .chat-content  ul li:last-child");
					$(this).val('');
				} else if(e.which == 13) {
					alert('Please type somthing!');
				}
				return;
			});
			$(document).on("keypress","#input_msg_send_chatapp",function (e) {
				if ((e.which == 13)&&(!$(this).val().length == 0)) {
					var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

					var receiver_id = document.getElementById('receiver_id').value;
					// Define your data
							var data = {
								message: $(this).val(),
								receiver_id:receiver_id
							};

							// Create a new XMLHttpRequest object
							var xhr = new XMLHttpRequest();

							// Set up the AJAX POST request
							xhr.open('POST', '/account/send-message', true);
							xhr.setRequestHeader('Content-Type', 'application/json');
							xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
							xhr.onload = function() {
								if (xhr.status === 200) {
									// Handle the response
									loadChat(receiver_id);
									console.log(xhr.responseText);
								} else {
									// Handle the error
									console.log(xhr.statusText);
								}
							};
							xhr.onerror = function() {
								// Handle the error
								console.log('An error occurred while sending the request.');
							};

							// Send the AJAX POST request
							xhr.send(JSON.stringify(data));

					$(this).val('');
				} else if(e.which == 13) {
					alert('Please type somthing!');
				}
				return;
			});
			function myFunction() {
			// Your code here
			if(document.getElementById('receiver_id')){
				
				var receiver_id = document.getElementById('receiver_id').value;
				loadChat(receiver_id);
			}
			}

			setInterval(myFunction, 2000); 

			function loadChat(receiver_id){
				var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

				$.ajax({
						url: '/account/load-chat-ajax/'+receiver_id,
						type: 'GET',
						headers: {
							'X-CSRF-TOKEN': csrfToken
						},
						success: function(response) {
							if(response.html){
								// Handle the response
								var html = response.html;

// Insert the HTML string into the desired element
								$('#chat_panel').html(html);
							}
							// Handle the success response
						},
						error: function(jqXHR, textStatus, errorThrown) {
							// Handle the error
						}
					});
								

						// Send the AJAX POST request
					
			}
		
			$(document).on("click",".fixed-sidebar-right .chat-cmplt-wrap .chat-data",function (e) {
				$(".fixed-sidebar-right .chat-cmplt-wrap").addClass('chat-box-slide');
				return false;
			});
			$(document).on("click",".fixed-sidebar-right #goto_back",function (e) {
				$(".fixed-sidebar-right .chat-cmplt-wrap").removeClass('chat-box-slide');
				return false;
			});
			
			/*Chat for Widgets*/
			$(document).on("click",".chat-for-widgets.chat-cmplt-wrap .chat-data",function (e) {
				$(".chat-for-widgets.chat-cmplt-wrap").addClass('chat-box-slide');
				return false;
			});
			$(document).on("click","#goto_back_widget",function (e) {
				$(".chat-for-widgets.chat-cmplt-wrap").removeClass('chat-box-slide');
				return false;
			});

		/***** Chat App function Start *****/
			var chatAppTarget = $('.chat-for-widgets-1.chat-cmplt-wrap');
			var chatApp = function() {
				$(document).on("click",".chat-for-widgets-1.chat-cmplt-wrap .chat-data",function (e) {
					var width = $(window).width();
					if(width<=1007) {
						chatAppTarget.addClass('chat-box-slide');
					}
					return false;
				});
				$(document).on("click","#goto_back_widget_1",function (e) {
					var width = $(window).width();
					if(width<=1007) {
						chatAppTarget.removeClass('chat-box-slide');
					}	
					return false;
				});
			};
			/***** Chat App function End *****/

    	});    		
	</script>
    
@endpush
