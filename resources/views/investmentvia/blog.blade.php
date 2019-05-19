@extends('layouts.master')
@section('title', 'HOME')

@section('header')
<h1>Home</h1>
@stop
@section('content')
@include('partials/menu')
    <!--Slider-->  
  
<!--Page Header-->
@include('partials/titlebarBg')
<!--Page Header-->

<section id="about" class="padding">
  <div class="container aboutus">
    <div class="row">
      <div class="col-md-12 wow fadeInLeft" data-wow-delay="300ms">
       <h2 class="heading heading_space text-center-service"><span>Our </span>Blogs </h2>
       <p class="bottom25">We are recommending Intraday / BTST/ STBT /Positional tips in various Product(Packages). Our Stock Cash , Derivatives (FnO) MCX/NCDEX Product are designed ideally to suit investors needs. Investors are advised to trade in multiple lots as per their trading capacity , investment amount as well as exposure suggested by your desired broker</p>
       
      </div>
        
    </div>
  </div>
</section>


<section id="course_all" class="padding-bottom">
  <div class="container">
    <div class="row">
        @if($blogs->count()<=0)
            <div class="col-sm-6 col-md-4 equalheight">
                <div class="course margin_top wow fadeIn" data-wow-delay="400ms">
                    Blog Page is in Maintainance
                </div>
            </div>
        @endif
        
        @foreach($blogs as $result)
        <div class="col-md-4 equalheight">
            <div class="course margin_top wow fadeIn" data-wow-delay="400ms" style="padding: 15px; min-height: 375px">
              <div class="image bottom25">
                <img src="{{ asset('storage/blog/'.$result->blog_image)}}" alt="Services" class="border_radius" style="width: 100%; height: 200px">
              </div>
                <h4 class="" id="title_{!! $result->id !!}" style="text-transform: capitalize;">{!! substr($result->blog_title,0,100) !!}</h4>


              <!-- <div class="bottom20" id="desc_{!! $result->id !!}">{!! substr($result->blog_description,0,100) !!}</div>
               --><input type="hidden" id="feature_{!! $result->id !!}" value="{!! $result->feature !!}">
              <a class="btn_common yellow border_radius" href="{{url('blog/'.$result->id.'/'.str_slug($result->blog_title))}}" id="{!! $result->id !!}" style="margin-top: 10px; margin-left: 0px;" >Read More</a>
            </div>
        </div>

        @endforeach
     
    </div>
  </div>
</section>




<!-- Modal -->
<div class="modal fade" id="modelpopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" >Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="desc"></div>
          <p id="modelFeature" style="margin-top: 10px; font-weight: bold"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
{!! $jsUrl !!}
<script> 
    function openModel(id){
        var title   =   $('h3#title_'+id).text();
        var desc    =   $('div#desc_'+id).text(); 
        var feature =   $('#feature_'+id).val();
        
        if(feature.length>0){
            feature = "Feature: "+feature;
        }
        
        $('#exampleModalLongTitle').html(title);
        $('#desc').html(desc);
        $('#modelFeature').html(feature);
    }
    $(function(){
        //function 
    });
</script>

@stop