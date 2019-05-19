
@extends('layouts.master')
@section('title', 'HOME')

@section('header')
<h1>Home</h1>
@stop
@section('content')
@include('partials/menu') 
@include('partials/titlebarBg')

<section id="about" class="padding">
  <div class="container aboutus">
    <div class="row">
      <div class="col-md-7 wow fadeInLeft animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
       <h2 class="heading heading_space"><span>{{$blogDetails->blog_title}} </span> <span class="divider-left"></span></h2>
       <h4 class="bottom25">Report</h4>
       <p class="bottom25" style="text-align: justify;">
         {!!$blogDetails->blog_description!!}

       </p>
      </div>
      <div class="col-md-5 wow fadeInRight animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
        <div class="image"> 
         @if(file_exists(storage_path('blog/'.$blogDetails->blog_image)))
                <img src="{{ asset('storage/blog/'.$blogDetails->blog_image)}}" alt="Services" class="border_radius" alt="{{$blogDetails->blog_title}}">
          @endif

        </div>
        <br>
        
      </div>
    </div>
  </div>
</section>
@stop