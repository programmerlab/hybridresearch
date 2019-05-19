
@extends('layouts.master')
@section('title', 'HOME')

@section('header') 
@stop
@section('content')
@include('partials/menu')
 


@include('partials/titlebar')


<!--SERVICE SECTION-->
<section id="faq" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h2 class="heading heading_space wow fadeInDown"><span>Frequently</span> Payment<span class="divider-left"></span> </h2> 
           
          <div class="faq_content wow fadeIn" data-wow-delay="400ms">
              <ul class="items">
                 <li><a href="#.">Online Payment</a>
                  <ul class="sub-items">
                   <!--  <li style="display: inline;">
                       <a href="{{ url('checkOutEBS/stock?amount=1000') }}" class="btn btn-info"  target="_blank" >
                          EBS payment
                       </a>
                    </li> -->

                   <li style="display: inline;">
                        
                      <!--    <a href="https://www.instamojo.com/@researchinfotech1788" target="_blank"><img src="{{ asset('storage/assets/images/pay-online.png')}}"></a>   -->

                    </li> 

                  <!--   <li style="display: inline;">
                       <a href="{{ url('checkout/stock?amount=0') }}" class="btn btn-success"   target="_blank">
                          Ccavenue payment
                       </a>
                    </li> -->
                       <a href="http://easybuzz.co.in" target="_blank" class="btn btn-primary"  target="_blank">
                         
                         Easebuzz payment
                       </a>
                  </ul>
                </li>

                 @foreach($bankAccount as $result)
                  <li><a href="#.">{{$result->bank_name}}</a>
                  <ul class="sub-items">
                    <li>
                        ACCOUNT NAME	: {{$result->account_name or 'Researchinfotech' }}</br>
                        A/C NO	: {{$result->account_number}} </br>     
                        IFSC CODE	{{$result->ifsc_code}} </br>
                        {{$result->bank_branch}}</br>
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