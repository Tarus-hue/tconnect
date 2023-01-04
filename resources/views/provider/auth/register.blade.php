@extends('provider.layout.auth')

@section('content')
<div class="col-md-12">
    <a class="log-blk-btn" href="{{ url('/provider/login') }}">@lang('provider.signup.already_register')</a>
    <h3>@lang('provider.signup.sign_up')</h3>
</div>

<div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/provider/register') }}">

        <div id="first_step">
                            <div class="col-md-4">
                                <input value="+254" type="text" placeholder="" id="country_code" name="country_code" />
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
                                <input type="button" class="log-teal-btn small verify_btn" onclick="smsLoginTwilio();" value="Verify Phone Number"/>
                            </div>
							
							<div class="modal" id="verification_modal">
							<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-body">
							<div class="row">
							<div class="col-lg-12">
							<div class="result-message">
							</div>
							<div class="input-group input-group-lg">
							<input type="text" class="form-control input-lg" id="verification_code" placeholder="Enter the digits sent to your phone">
							<span class="input-group-btn">
							<button onclick="smsVerifyTwilio();" class="btn btn-primary btn-lg" type="submit">Verify</button>
							</span>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
							</div>
                            </div>
                            </div>
                            </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            
                        </div>

        {{ csrf_field() }}

        <div id="second_step" style="display: none;">
            <div>
                <input id="fname" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="@lang('provider.profile.first_name')" autofocus data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.first_name') can only contain alphanumeric characters and . - spaces">
                @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="lname" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="@lang('provider.profile.last_name')"data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.last_name') can only contain alphanumeric characters and . - spaces">            
                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('provider.signup.email_address')" data-validation="email">            
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <label class="checkbox"><input type="radio" name="gender" value="MALE" data-validation="required"  data-validation-error-msg="Please choose one gender">@lang('provider.signup.male')</label>
                <label class="checkbox"><input type="radio" name="gender" value="FEMALE" data-validation-error-msg="Please choose one gender">@lang('provider.signup.female')</label>
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>                        
            <div>
                <input id="password" type="password" class="form-control" name="password" placeholder="@lang('provider.signup.password')" data-validation="length" data-validation-length="min6" data-validation-error-msg="Password should not be less than 6 characters">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>    
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('provider.signup.confirm_password')" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Confirm Passsword is not matched">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>  
            @if (config('constants.paypal_adaptive') == 1)
            <div>
                <input id="service-model" type="text" class="form-control" name="paypal_email" value="{{ old('paypal_email') }}" placeholder="@lang('provider.profile.paypal_email')" data-validation="email">
                
                @if ($errors->has('paypal_email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('paypal_email') }}</strong>
                    </span>
                @endif
            </div>
            <span class="help-block">
                        <strong style="color: red; font-size: 10spx;">Please add verified Paypal Email, otherwise you won't receive the payment.</strong>
                    </span>
            @endif
            <div>
                <select class="form-control" name="service_type" id="service_type" data-validation="required">
                    <option value="">Select Service</option>
                    @foreach(get_all_service_types() as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('service_type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_type') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="service-number" type="text" class="form-control" name="service_number" value="{{ old('service_number') }}" placeholder="@lang('provider.profile.car_number')" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.car_number') can only contain alphanumeric characters and - spaces">
                
                @if ($errors->has('service_number'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_number') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="service-model" type="text" class="form-control" name="service_model" value="{{ old('service_model') }}" placeholder="@lang('provider.profile.car_model')" data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('provider.profile.car_model') can only contain alphanumeric characters and - spaces">
                
                @if ($errors->has('service_model'))
                    <span class="help-block">
                        <strong>{{ $errors->first('service_model') }}</strong>
                    </span>
                @endif
            </div>
            @if(config('constants.referral') == 1)
                <div>
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
            <button type="submit" class="log-teal-btn">
                @lang('provider.signup.register')
            </button>

        </div>
    </form>
</div>
@endsection


@section('scripts')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<script>
	var cc = null;
	var pn = null;

  function flashStatus(alertType, message) {
      var content = $(".result-message");
      content.empty();
      content.append('<div class="alert alert-${alertType}" role="alert">${message}</div>');
    }

    function smsLoginTwilio() {
      var countryCode = $("#country_code").val().replace(/\W/g, ''); // strip special characters
      var phoneNumber = $("#phone_number").val().replace(/\W/g, ''); // strip special characters

      // save for checking
      cc = countryCode;
      pn = phoneNumber;

      // Twilio functions do not accept multipart/form-data
      const data = new URLSearchParams();
      data.append("country_code", countryCode);
      data.append("phone_number", phoneNumber);

      // Create your own Twilio Function 
      // https://www.twilio.com/console/functions/manage
      // Template: https://github.com/robinske/fb-account-kit-migration/blob/master/start.js
      fetch("https://berserk-engine-4152.twil.io/start", {          
		  method: 'POST',
          body: data
        })
        .then(response => {
          var content = $(".result-message");
          content.empty();
          $(".modal").modal("show");
          return response.json()
        })
        .then((json) => {
          console.log(json);
          if (json.success) {
            console.log("Successfully sent token.")
          } else {
            console.log("Error sending token.")
          }
        })
        .catch((err) => {
          console.log(err);
        });
		}

    function smsVerifyTwilio() {
      var code = $("#verification_code").val();

      // Twilio functions do not accept multipart/form-data
      const data = new URLSearchParams();
      data.append("country_code", cc);
      data.append("phone_number", pn);
      data.append("verification_code", code);

      // Create your own Twilio Function 
      // https://www.twilio.com/console/functions/manage
      // Template: https://github.com/robinske/fb-account-kit-migration/blob/master/check.js
      fetch("https://coffee-fly-6129.twil.io/check", {
          method: 'POST',
          body: data
        })
        .then(response => response.json())
        .then((json) => {
          if (json.success) {
            flashStatus("success", "Success!");
            console.log("Successfully verified the token.");
          } else {
            flashStatus("danger", json.message);
            $("#verification_code").val("");
            console.log("Incorrect token.")
          }
        })
        .catch((err) => {
          var content = $(".result-message");
          console.log(err);
        });
    }
</script>

@endsection