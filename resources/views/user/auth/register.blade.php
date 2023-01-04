@extends('user.layout.auth')
@section('content')
<?php $login_user = asset('asset/img/login-user-bg.jpg'); ?>
<div class="full-page-bg" style="background-image: url({{$login_user}});">
<div class="log-overlay"></div>
    <div class="full-page-bg-inner">
        <div class="row no-margin">
				<div class="col-md-6 log-left">
                <span class="login-logo"><img src="{{ config('constants.site_logo', asset('logo-black.png'))}}"></span>
                <h2>Create your account and get moving in minutes</h2>
                <p>Welcome to {{config('constants.site_title','t-connect')}}, the easiest way to get around at the tap of a button.</p>
            </div>
            <div class="col-md-6 log-right">
                <div class="login-box-outer">
                <div class="login-box row no-margin">
                    <div class="col-md-12">
                        <a class="log-blk-btn" href="{{url('login')}}">ALREADY HAVE AN ACCOUNT?</a>
                        <h3>Create a New Account</h3>
                    </div>
                    <form role="form" method="POST" action="{{ url('/register') }}">
					
                        <div id="first_step">
                            <div class="col-md-4">
                                <input value="254" type="text" placeholder="" id="country_code" name="country_code" />
                            </div> 
                            
                            <div class="col-md-8">
                                <input type="text" autofocus id="phone_number" class="form-control" placeholder="Enter Phone Number" name="phone_number" value="{{ old('phone_number') }}" data-stripe="number" maxlength="9" onkeypress="return isNumberKey(event);" />
                            </div>

                            <div class="col-md-8">
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12" style="padding-bottom: 10px;" id="mobile_verfication"></div>
                            <div class="col-md-12" style="padding-bottom: 10px;">
                               <a href="{{ url('/send-otp') }}" class="log-teal-btn small verify_btn" id="otpSubmit">Verify Phone Number</a>
                            </div>
							
                            
                        </div>

                        {{ csrf_field() }}

                        <div id="second_step" style="display: none;">

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="First Name can only contain alphanumeric characters and . - spaces">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="Last Name can only contain alphanumeric characters and . - spaces">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" data-validation="email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                        
                            </div>

                            <div class="col-md-12">
                                <label class="radio-inline"><input type="radio" name="gender" value="MALE" data-validation="required" data-validation-error-msg="Please choose one gender">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Male</label>
                                <label class="radio-inline"><input type="radio" name="gender"  value="FEMALE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Female</label>
                                <br><br>
								@if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif                        
                            </div>

                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Password" data-validation="length" data-validation-length="min6" data-validation-error-msg="Password should not be less than 6 characters">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <input type="password" placeholder="Re-type Password" class="form-control" name="password_confirmation" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Confirm Passsword is not matched">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if(config('constants.referral') == 1)
                            <div class="col-md-12">
                                <input type="text" placeholder="Referral Code (Optional)" class="form-control" name="referral_code" >

                                @if ($errors->has('referral_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referral_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @else
                                <input type="hidden" name="referral_code" >
                            @endif
                            
                            <div class="col-md-12">
                                <button class="log-teal-btn" type="submit">REGISTER</button>
                            </div>

                        </div>

                    </form>     

                    <div class="col-md-12">
                        <p class="helper">Or <a href="{{route('login')}}">Sign in</a> with your user account.</p>   
                    </div>

                </div>


                <div class="log-copy"><p class="no-margin">{{ config('constants.site_copyright', '&copy; '.date('Y').' t-connect') }}</p></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    @if (count($errors) > 0)
		$("#first_step").hide("fast");
        $("#second_step").show("slow");
    @endif
    $.validate({
        modules : 'security',
    });
    $('.checkbox-inline').on('change', function() {
        $('.checkbox-inline').not(this).prop('checked', false);  
    });

    function isNumberKey(evt)
    {
        var edValue = document.getElementById("phone_number");
        var s = edValue.value;
        if (event.keyCode == 13) {
            event.preventDefault();
            if(s.length>=10){
                smsLoginTwilio();
            }
        }
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
</script>
<script>
// Add the keyup event and check with the regex.
jQuery("#phone_number").keyup(function(ev){
    var x = $(this).val();
    
    // Allow Backspace and Delete
    if (ev.keyCode == 8 || ev.keyCode == 46) {
      return true;
    }
    
    if (!x.match(/^1|7+/)) {
      alert("The first digit should be 7 or 1");
      $(this).val(x.substr(0,-1));
    }

});
</script>

@endsection
