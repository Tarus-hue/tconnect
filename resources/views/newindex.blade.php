@extends('user.layout.app')

@section('content')
<!-- <div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Get there</span><br>Your day belongs to you</h2>
        </div>
        <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>Sign up to Ride</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{ url('/provider/register') }}">
                            <h3>Sign up to Drive</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <p class="note-or">Or <a href="{{ url('/provider/login') }}">sign in</a> with your rider account.</p>
            </div>
        </div>
    </div>
</div> -->
<div class="banner row no-margin" style="background-position: center; background-image: url('{{ asset('asset/img/slider-bg-1.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container slider pad-60">
        <div class="row">
        <div class="col-md-12 center ">

            <h2 class="banner-head">A prompt link to the nearest<br> available veterinary officer </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-md-offset-3">
             <div class="row no-margin fields banner-ride-drive">
                    <div class="btn-icon">
                        <img src="{{ asset('asset/img/destination.png') }}">
                    </div>
                    <div class="btn-txt">
                        <a href="{{url('login')}}">
                            <h3 class="btn-title">Client</h3>
                            <!-- <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5> -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
             <div class="row no-margin fields banner-ride-drive">
                    <div class="left">
                        <img src="{{ asset('asset/img/taxi-car.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{ url('/provider/login') }}">
                            <h3 class="btn-title">Veterinary</h3>
                            <!-- <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="banner-form">
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{url('login')}}">
                            <h3>Sign up to Ride</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="row no-margin fields">
                    <div class="left">
                        <img src="{{ asset('asset/img/ride-form-icon.png') }}">
                    </div>
                    <div class="right">
                        <a href="{{ url('/provider/register') }}">
                            <h3>Sign up to Drive</h3>
                            <h5>SIGN UP <i class="fa fa-chevron-right"></i></h5>
                        </a>
                    </div>
                </div>
                <p class="note-or">Or <a href="{{ url('/provider/login') }}">sign in</a> with your rider account.</p>
            </div>
        </div> -->
    </div>
</div>
<div class="row white-section pad-60">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/screen-bg.png') }}">
        </div>
        <div class="col-md-6">
             <div class="content-block">
              <div class="icon"><img src="{{ asset('asset/img/taxi-app.png') }}"></div>
            <h2>Tap the app, get connected</h2>
            <div class="title-divider"></div>
            <p>{{ config('constants.site_title', 't-connect')  }} is the smartest way to get around. One tap and a veterinary officer will be directed to your farm. You can pay with either cash or M-pesa.</p>
            <a class="content-more more-btn" href="{{url('/ride')}}">MORE REASONS TO USE THE SERVICE <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
    </div>
</div>

<div class="row gray-section pad-60">
    <div class="container">                
        <div class="col-md-6">
            <div class="content-block">
            <div class="icon"><img src="{{ asset('asset/img/destination.png') }}"></div>
            <h2>Ready anywhere, between 7:30am-6:30pm </h2>
            <div class="title-divider"></div>
            <p>One of the main benefits that we see in going online is that getting a good veterinary at the right time is a real struggle. Count on {{ config('constants.site_title', 't-connect') }} </p>
            <a class="content-more more-btn" href="{{url('/ride')}}">MORE REASONS TO RIDE <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/screen-bg-3.png') }}">
        </div>
    </div>
</div>

<div class="row white-section pad-60">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/screen-bg-4.png') }}">
        </div>
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/budget.png') }}"></div>
            <h2>Convenience</h2>
            <div class="title-divider"></div>
            <p>With {{ config('constants.site_title', 't-connect') }}, you can make a request at your farm and wait for the veterinary officer to arrive. This can save you a lot of hassle and time.</p>
            <a class="content-more more-btn" href="{{url('/ride')}}">MORE REASONS TO RIDE <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row gray-section pad-60 full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/car-wheel.png') }}"></div>
            <h5>Behind the Wheel</h5>
            <h2>They’re people like you, going your way</h2>
            <div class="title-divider"></div>
            <p>What makes the {{ config('constants.site_title', 't-connect') }} experience truly great is going online. Today, with increased internet connectivity we cannot deny that digital transformation is already an unstoppable process. This is why we have worked to adapt and take advantage of what it has to offer.</p>
            <a class="content-more more-btn" href="{{ url('/drive') }}">WHY DRIVE WITH {{ config('constants.site_title', 't-connect')  }} <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/behind-the-wheel.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

<div class="row white-section pad-60 ">
    <div class="container">
        <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/cost-cities.png') }}">
        </div>
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/taxi-location.png') }}"></div>
            <h2>Helping counties for the good of all</h2>
            <div class="title-divider"></div>
            <p>{{ config('constants.site_title', 't-connect') }} selects qualified & experienced veterinary officers. You should therefore have the peace of mind that you are getting the best professional service.</p>
            <a class="content-more more-btn" href="{{ url('/login') }}">OUR LOCAL IMPACT <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
</div>

<div class="row gray-section pad-60 full-section">
    <div class="container">
        <div class="col-md-6 content-block">
              <div class="icon"><img src="{{ asset('asset/img/seat-belt.png') }}"></div>
            <h2>Putting clients first</h2>
            <div class="title-divider"></div>
            <p>Many a time, getting AI services when the need arises is a real struggle. {{ config('constants.site_title', 't-connect') }} links you to the nearest officer </p>
            <a class="content-more more-btn" href="{{ url('/login') }}">HOW WE KEEP YOU SAFE <i class="fa fa-chevron-right"></i></a>
        </div>
        <!-- <div class="col-md-6 img-box text-center"> 
            <img src="{{ asset('asset/img/seat-belt.jpg') }}">
        </div> -->
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/safty-bg.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>
<div class="row find-city">
    <div class="container pad-60 content-block center">
        <h2>Find out if {{ config('constants.site_title','t-connect') }} is in your county</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
        <form>
            <div class="input-group find-form">
                <input type="text" class="form-control" placeholder="Search" id="origin-input">
                <div id="map" style="display: none;"></div>
                <span class="input-group-addon">
                    <button type="button" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-2x fa-arrow-right"></i>
                    </button>  
                </span>
            </div>           
        </form>
    </div>
</div>
    </div>
</div>
<!-- <div class="row app-dwon pad-60">
    <div class="container pad-60"">
        <div class="row center">
            <h2>Get App on</h2>
            <div class="col-md-3 col-md-offset-3">
                 
             <a href="{{config('constants.store_link_ios','#')}}">
            <img src="{{asset('asset/img/appstore.png')}}">
                                        </a>
            </div>
            <div class="col-md-3">
             <a href="{{config('constants.store_link_android','#')}}">
                                            <img src="{{asset('asset/img/playstore.png')}}">
                                        </a>
                                    </div>
        </div>
    </div>
</div>

    <div class="container footer-social content-block pad-60"">
        <div class="row center">
            <h2>Get Connect with Scoical Media</h2>
            <div class="col-md-6 col-md-offset-3">
                 <div class="socil-media">
                   <ul>
                                    <li><a href="#"><i class="fa fa-2x fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-2x fa-twitter"></i></a></li>
                                </ul>
                 </div>
             </div>
    </div>
</div> -->



<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection