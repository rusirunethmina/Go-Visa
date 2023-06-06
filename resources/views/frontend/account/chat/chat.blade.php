<div class="chat-cmplt-wrap chat-for-widgets-1">
    <div class="chat-box-wrap">
        <div>
            {{-- <form role="search" class="chat-search">
                <div class="input-group">
                    <input id="example-input1-group21" name="example-input1-group2" class="form-control" placeholder="Search" type="text">
                    <span class="input-group-btn">
                    <button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
                    </span>
                </div>
            </form> --}}
            <div class="chatapp-nicescroll-bar">
                <ul class="chat-list-wrap">
                    <li class="chat-list">
                        <div class="chat-body">
                            @foreach ($chat_users as $user)
                            @php
                                $userData = \App\Models\User::where('id',$user->user_id)->first();
                            @endphp
                                
                        
                            <a href="{{('/account/load-chat/'.$userData->id)}}">
                                <div class="chat-data">
                                    <img class="user-img img-circle"  src="{{ asset('backend/images/avatar.png') }}" alt="user"/>
                                    <div class="user-data">
                                        <span class="name block capitalize-font">{{$userData->name}}</span>
                                        
                                    </div>
                                    <div class="status away"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            @endforeach
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @if(isset($messages))
    <input type="hidden" id="receiver_id" value="{{$chat_user_data->id}}">
    <div class="recent-chat-box-wrap">
        <div class="recent-chat-wrap">
            <div class="panel-heading ma-0 pt-15">
                <div class="goto-back">
                    <a  id="goto_back_widget_1" href="javascript:void(0)" class="inline-block txt-grey">
                        <i class="zmdi zmdi-account-add"></i>
                    </a>	
                    <span class="inline-block txt-dark">{{$chat_user_data->name}}</span>
                    <a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body pa-0">
                    <div class="chat-content">
                        <ul class="chatapp-chat-nicescroll-bar pt-20">
                            @foreach ($messages as $message)
                                
                       @if($current_user->id == $message->receiver_id)
                            <li class="friend">
                                <div class="friend-msg-wrap">
                                    <img class="user-img img-circle block pull-left"  src="{{ asset('backend/images/avatar.png') }}" alt="user"/>
                                    <div class="msg pull-left">
                                        <p>{{$message->message}}</p>
                                        <div class="msg-per-detail text-right">
                                            <span class="msg-time txt-light">{{$message->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>	
                            </li>
                            @else
                            <li class="self mb-10">
                                <div class="self-msg-wrap">
                                    <div class="msg block pull-right"> {{$message->message}}
                                        <div class="msg-per-detail text-right">
                                            <small class="msg-time txt-light" style="font-size: 10px;">{{ $message->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>	
                            </li>
                            @endif
                          
                            @endforeach
                        </ul>
                    </div>
                    <div class="input-group">
                        <input type="text" id="input_msg_send_chatapp" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
                        {{-- <div class="input-group-btn emojis">
                            <div class="dropup">
                                <button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li><a href="javascript:void(0)">Another action</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                </ul>
                            </div>
                        </div> --}}
                        {{-- <div class="input-group-btn attachment">
                            <div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
                                <input type="file" class="upload">
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>