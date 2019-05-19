

@extends('layouts.master')
@section('title', 'Contact')

@section('header')
<h1>Home</h1>
@stop
@section('content')
@include('partials/menu')
<!--Page Header-->
@include('partials/titlebarBg')
<!--Page Header-->


<!--SERVICE SECTION-->
<section id="contact" class="padding">
  <div class="container">
    <div class="row padding-bottom">
      <div class="col-md-4 contact_address heading_space wow fadeInLeft animated" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInLeft;">
        <h2 class="heading heading_space"><span>Get</span> in Touch <span class="divider-left"></span></h2>
        <p>Standard Certification Services</p>
        <div class="address">
          <i class="icon icon-map-pin border_radius"></i>
          <h4>Visit Us</h4>
          <p> {{$website_title or 'Research Infotech' }} </p>
        </div>
        <div class="address second">
          <i class="icon icon-envelope border_radius"></i>
          <h4>Email Us</h4>
          <p><a href="mailto:{{$website_email}}">{{$website_email or 'info@researchinfotech.co.in'}}</a></p>
        </div>
        <div class="address">
          <i class="icon icon-phone4 border_radius"></i>
          <h4>Call Us</h4>
          <p>+91-{{$contact_number or '8982890444'}}</p>
          <p>{!!$company_address or 'Indore' !!}</p>
        </div>
      </div>
      <div class="col-md-8 wow fadeInRight animated" data-wow-delay="450ms" style="visibility: visible; animation-delay: 450ms; animation-name: fadeInRight;">
        <h2 class="heading heading_space"> <span>Contact</span> Form<span class="divider-left"></span></h2>
       @if($errors->first('successMsg', ' has-error'))
         <div class="alert alert-info">Thank you!. Request submitted successfully.</div>
       @endif
         
        {!! Form::model($contact, ['route' => ['contactForm'],'class'=>'form-inline findus','id'=>'contact-form']) !!}
                                        
          <div class="row">
            <div class="col-md-12">
              <div id="result"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="form-group {{ $errors->first('name', ' has-error') }}">
                  <input  type="text" class="form-control {{ $errors->first('name', ' has-error') }}" placeholder="Name" name="name" id="name" >
                 <span class="label label-danger">{{ $errors->first('name', ':message') }}</span>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="form-group {{ $errors->first('email', ' has-error') }}">
                  <input value="{{ old('email') }}" type="email" class="form-control {{ $errors->first('email', ' has-error') }}" placeholder="Email" name="email" id="email" required="required">
                 <span class="label label-danger">{{ $errors->first('email', ':message') }}</span>
              </div>
            </div>
                <div class="col-md-4 col-sm-4">
              <div class="form-group {{ $errors->first('mobile', ' has-error') }}">
                <input value="{{ old('mobile') }}" type="text" class="form-control {{ $errors->first('mobile', ' has-error') }}" placeholder="Mobile number" name="mobile" id="email" required="required">
                 <span class="label label-danger">{{ $errors->first('mobile', ':message') }}</span>
              </div>
            </div>
            <div class="col-md-12">
                <textarea placeholder="Comment" name="comments" id="message" class="{{ $errors->first('comments', ' has-error') }}"></textarea>
                <span class="label label-danger" >{{ $errors->first('comments', ':message') }}</span>
              <br><br>
              <button class="btn_common yellow border_radius" id="btn_submit">Submit</button>
            </div>
            
          </div>
        {!! Form::close() !!}
       
      </div>
    </div>
    
  </div>
</section>
@stop