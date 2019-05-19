@extends('layouts.master')
@section('title', 'HOME')

@section('header')
<h1>Free Trial</h1>
@stop
@section('content')
@include('partials/menu')  


<!--Page Header-->
@include('partials/titlebarBg')
<!--Page Header-->
<style>
    .banner{background: url(storage/assets/images/bouncer-banner.original.jpg) no-repeat top center;
                   background-attachment: fixed;
                   background-size: cover;
                   color: #fff;
                   padding-top: 0px;
        }
    #banner{
        padding:0px;

        color:#fff;
    }
    .banner-left{
        padding:60px 0;
    }
    .banner-left h1{
        font-weight:bold;
        font-size:42px;
    }
    .banner-left h2{
        font-weight:400;
        font-size:38px;
        margin-bottom:60px;
    }

    .banner-left p{
        margin:0;
        font-size:16px;
    }
    .banner-left h3{
        color:#fff;
        font-size:20px;
        font-family: 'Raleway';
    }
    .banner-left span{
        font-size:20px;
        font-weight:bold;
    }
    .banner-left li{
        margin:30px 0 0 20px;
    }
    .banner-right{
        background-color:rgba(0, 0, 0, 0.4);
        margin-top: 50px;
        border-radius:5px;
        text-align:center;  
    }
    .banner-right h2{
        font-size:40px !important;
        font-weight:900 !important;
        color: #fff;
    }
    input[type="text"],
    input[type="tel"],
    input[type="email"]{
        border-radius: 5px;
        height: 50px;
        margin-top: 20px;
        color:#747474;
        font-size:18px;
        width:100%;
        padding-left:10px;
        border:0;
    }
    <!-- .contact2{background: url(storage/assets/images/bouncer-banner.original.jpg) no-repeat top center; -->
                 <!-- background-attachment: fixed; -->
                 <!-- background-size: cover; -->
                 <!-- color: #fff;} -->
    textarea{
        border-radius: 5px;
        height: 80px;
        margin-top: 20px;
        color:#747474;
        font-size:18px;
        width:100%;
        border:0;
        padding-left:10px;
    }
    .submit{
        background-color:#2f383d;
        border:none;
        border-radius:5px;
        height: 50px;
        margin: 20px 0;
        font-size:26px !important;
        font-family: 'Lato';
        width:100%;
        transition: all 250ms ease-out;
    }
    .submit:hover{
        background-color:#e2371e;

    }
    .submit{background:#27ae60;}
    #logos{
        padding: 30px 0;
        background-color:#e6e6e6;	
    }
    #services{
        padding:20px 0;
        background-color:#fff;
    }
    .serviceBox{
        padding:30px 0;
    }
    .serviceBox:hover{
        cursor:crosshair;	
    }
    .serviceBox img{
        margin-top:24px;
        max-width:100%;
    }
    .serviceBox p{
        color:#3f3f3f;
        font-size:16px;
        font-family: 'Open Sans';	
    }
    #content-top{
        background-color:#f0f0f0;
        padding:80px 0;
    }
    #content-top h2{
        color: rgb(41, 41, 41);
        font-family: 'Lato';
        font-size:40px;
        margin-bottom:30px;
    }
    #content-top p{
        font-size: 16px;
        font-family:"open Sans";
        font-size: 16px;	
    }
    #content-top img{
        max-width:100%;	
    }
    #content{
        padding-top:20px;
        padding-bottom:50px;
        background-color:#fff;
    }
    #content p{
        font-size:16px;
        font-family:"open Sans";
        text-align:center;
        color:rgb(63, 63, 63);
    }
    #content h1{
        font-size:42px;
        color:#2a2a2a; 
        font-weight:lighter;
        font-family: 'Lato';
        text-align:center;
        margin-bottom:20px;

    }
    .contentBox{
        margin-top:80px;	
    }
    .contentBox h2{
        color: rgb(41, 41, 41);
        font-size: 36px;
        font-style: normal;
        font-weight: 400;
        margin-bottom:20px;
    }
    .contentBox p{
        color:#3f3f3f;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height:26px;
        text-align:left !important;
        font-family: 'Open Sans';
    }
</style>

  
<section id="contact" class="padding">
     <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInRight animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 4500ms; animation-name: fadeInRight;">
                <h2 class="heading heading_space"> <span>{{ucfirst($title)}} </span> <span class="divider-left"></span></h2>
            </div>
        </div>
         @if($errors->first('successMsg', ' has-error'))
            <div class="alert alert-info">Thank you!. Request submitted successfully.</div>
        @endif
    </div>
     <div class="container-fluid banner padding-bottom" id="whatsapp-page"> 

        <div id="banner">
            <div class="container">
                <div class="row">
                    <div class="banner-left col-md-7 col-sm-6 jw-animate-gen animated fadeInLeft" data-gen-offset="90%" data-gen="fadeInLeft">
                        <h1>Join us free trial and stay connected!</h1>
                        <h3>PROFITABLE TRADING TIPS, TEST US TO MAKE MORE PROFIT</h3>
                        <ul class="fa-ul">
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>
                            </li>
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>
                                <p><span style="color:#fff;">Up to 99.99% Secure calls</span></p>
                            </li>
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>
                                <p><span style="color:#fff;">24*7 Personalized Support</span></p>
                            </li>
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>
                            </li>
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>
                                <p><span style="color:#fff;">2 Days* Free, <span style="color:#fff;">Trading Tips</span></span></p>
                            </li>
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>

                            </li>
                            <li>
                                <i class="fa-li fa fa-check-circle fa-2x"></i>
                                <p><span style="color:#fff;">Fill The Form &amp; Join Our Services,</span><span style="color:#fff;">Its Free!</span></p>
                            </li>
                        </ul>
                    </div>
                    <div class="banner-right col-md-4 col-sm-6 col-lg-push-1 jw-animate-gen animated fadeInRight" data-gen-offset="90%" data-gen="fadeInRight">

                        <h2>2 Days Free Trial</h2> 

                        {!! Form::model($freeTrial, ['route' => ['free-trial'],'class'=>'form-inline findus','id'=>'contact-form']) !!}
         
                            <input value="{{ old('name') }}"  type="text" placeholder="Name" name="name" required="" autofocus="">
                             <span   class="label label-danger">{{ $errors->first('name', ':message') }}</span>
                            <input value="{{ old('email') }}"  type="email" id="field-email" name="email" placeholder="Email" >
                             <span class="label label-danger">{{ $errors->first('email', ':message') }}</span>
                            <input value="{{ old('phone') }}"  type="tel" placeholder="Phone" name="phone" required="">
                             <span class="label label-danger">{{ $errors->first('phone', ':message') }}</span>
                            <input value="{{ old('service_name') }}"  type="text" placeholder="Enter Services to get trial" name="service_name" required="">
                             <span class="label label-danger">{{ $errors->first('service_name', ':message') }}</span>
                           
                            <input value="{{ old('city') }}"  type="text" placeholder="City" name="city" required="">
                             <span class="label label-danger">{{ $errors->first('city', ':message') }}</span>
                            <input type="submit" class="submit" value="Start My Free Trial Now!">

                       {!! Form::close()!!}

                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
@stop
