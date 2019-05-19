

@extends('layouts.master')
@section('title', 'HOME')

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
          <p><a href="mailto:{{$website_email}}">info@hybridresearch.in</a></p>
        </div>
         
      </div>    
      <div class="col-md-8 wow fadeInRight animated" data-wow-delay="450ms" style="visibility: visible; animation-delay: 450ms; animation-name: fadeInRight;">
        <h2 class="heading heading_space"> <span>Career</span> Form<span class="divider-left"></span></h2>
        @if($errors->first('successMsg', ' has-error'))
         <div class="alert alert-info">Thank you!.Request submitted successfully.We will reach you soon.</div>
        @endif
         
        {!! Form::model($career, ['route' => ['careerForm'],'class'=>'form-inline findus','id'=>'contact-form','files'=>true]) !!}
        
          <div class="row">
            <div class="col-md-12">
              <div id="result"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-4">
              <div class="form-group">
                <input type="text"  value="{{ old('name') }}"  class="form-control" placeholder="Name" name="name" id="name" required="required">
                 <span class="label label-danger">{{ $errors->first('name', ':message') }}</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-4">
              <div class="form-group">
                <input type="email"  value="{{ old('email') }}" class="form-control" placeholder="Email" name="email" id="email" required="required">
                 <span class="label label-danger">{{ $errors->first('name', ':message') }}</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-4">
              <div class="form-group">
                <input type="text"  value="{{ old('designation') }}" class="form-control" placeholder="Desgination" name="designation" id="desgination" required="">
                 <span class="label label-danger">{{ $errors->first('desgination', ':message') }}</span>
              </div>
            </div>
               <div class="col-md-6 col-sm-4">
              <div class="form-group">
                <input type="text"  value="{{ old('mobile') }}" class="form-control" placeholder="Mobile number" name="mobile" id="mobile" required="required">
                 <span class="label label-danger">{{ $errors->first('mobile', ':message') }}</span>
              </div>
            </div>
               <div class="col-md-6 col-sm-4">
                    <div style="position:relative;">
                        <a class='btn btn-primary' href='javascript:;'>
                            Upload Resume...
                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                         <span class="label label-danger">{{ $errors->first('file', ':message') }}</span>
                </div>
            </div>
             
             
              <div class="col-md-12 col-sm-4" style="margin-top: 10px">
               <hr>
              <button class="btn_common yellow border_radius" id="btn_submit">Submit</button>
            </div>
          </div>
        {!! form::close() !!}
       
      </div>
    </div>
    
  </div>
</section>
@stop