
@extends('layouts.master')
@section('title', 'HOME')

@section('header') 
@stop
@section('content')
@include('partials/menu')
 

<!--Page Header-->
@include('partials/titlebarBg')
<!--Page Header-->


<!--SERVICE SECTION-->
<section id="faq" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h2 class="heading heading_space wow fadeInDown"><span>Frequently</span> Ask Question<span class="divider-left"></span></h2>   
          <div class="faq_content wow fadeIn" data-wow-delay="400ms">
              <ul class="items">
                @foreach($faq as $result)
                    <li><a href="#." >{{$result->question}}</a>
                      <ul class="sub-items">
                        <li>
                          <p>{!!$result->answer!!}</p>
                        </li>
                      </ul>
                    </li>
                @endforeach  
              </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@stop