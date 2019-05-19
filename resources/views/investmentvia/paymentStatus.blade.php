
@extends('layouts.master')
@section('title', 'HOME')

@section('header') 
@stop
@section('content')
@include('partials/menu')
 
<!--Page Header-->
@include('partials/titlebar')
<!--Page Header-->


<!--SERVICE SECTION-->
<section id="faq" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h2 class="heading heading_space wow fadeInDown"><span>{{ucfirst($title)}}</span><span class="divider-left"></span></h2>   
          <div class="faq_content wow fadeIn" data-wow-delay="400ms">
                 <div class="alert alert-success">{{$msg}}</div>

                 @if(isset($params) && count($params)>0)
                 <p>Payment Details</p>
                  <table class="table" id="contact" style="width: 100%" border="1px"  text-align="left">
                      <thead> 
                          @foreach($params as $key => $result)
                              @if($key=="bin_country" ||  empty($result) || $result==null || $key=="retry" || $key=="vault" || $key=="offer_type" || $key=="offer_code")
                              <?php continue; ?>
                              @else
                              <tr>
                                  <td> {{ucfirst(str_replace('_',' ',$key))}}</td> 
                                  <td> {{$result}}  </td> 
                              </tr>
                              @endif
                          @endforeach 
                      </thead>
                  </table>  
                 @endif 

        </div>
      </div>
    </div>
  </div>
</section>
 
 @stop