@extends('frontend.layouts.guest')
@push('scripts_head')  
    <link href="{{ asset('frontend/css/auth.ui.css') }}" rel="stylesheet">
@endpush
@section('content')

<section class="body">
    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                       Sign up to GoVisa
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <br>
                    <h3 class="header-title">Start For Free!</h3>

                    <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Type</label>

                                <div class="col-md-6">
                                    <input type="radio" class="btn-check" name="role" id="option1" value="user"  autocomplete="off" checked>
                                    <label class="btn btn-default" for="option1">User</label>

                                    <input type="radio" class="btn-check" name="role" id="option2" value="provider" autocomplete="off">
                                    <label class="btn btn-default" for="option2">Provider</label>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="categoryElement" class="row mb-3" style=" @error('category') display:block  @enderror display:none">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Category</label>
                                <div class="col-md-6">
                                   <select class="form-select" name="category" id="category"> 
                                        <option value="consultant">Consultants</option>
                                        <option value="lawyer">lawLawyersyer</option>
                                        <option value="private">Private Colleges</option>
                                    </select>
                                </div>
                            </div>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts_footer')  

    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		$('input[type=radio][name=role]').on('change', function() {
                var selectedValue = $(this).val();
                if(selectedValue === 'provider'){
                    $('#categoryElement').show();
                }else{
                    $('#categoryElement').hide();
                }
            });
    	});    		
	</script>
    
@endpush
