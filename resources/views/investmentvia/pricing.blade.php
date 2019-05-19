
@extends('layouts.master')
@section('title', 'HOME')

@section('header') 
@stop
@section('content')
@include('partials/menu')
 
 <div id="search">
  <button type="button" class="close">×</button>
  <form>
    <input type="search" value="" placeholder="Search here...."  required/>
    <button type="submit" class="btn btn_common blue">Search</button>
  </form>
</div>

@include('partials/titlebarBg')
<!--Pricings-->
<section class="padding" id="pricing">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <div class="text-center"><h2 class="heading heading_space"><span>Our</span> Pricing <span class="divider-center"></span></h2></div>
        <div class="pricing three padding-bottom">
            @foreach($pricing as $result)
                <div class="pricing_item wow fadeInUp" data-wow-delay="400ms">
                    
                    <h3>{{$result->title}}</h3> 

                    <table class="table table-striped table-hover table-bordered">
                      <tr>
                        <th>Monthly</th>
                        <td><i class="fa fa-rupee"></i>{!! $result->monthly_price !!} </td>
                        <td><span class="pay-now">
                      <a href="@if($result->payment_url) {{ $result->payment_url }} @else https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{$result->monthly_price}} @endif" target="_blank">Pay Now</a></span></p>
                    </td>
                      </tr>
                      <!-- {{url('checkOutEBS/'.str_slug($result->title).'?amount='.$result->monthly_price)}} -->
                      <tr>
                        <th>Quarterly</th>
                        <td><i class="fa fa-rupee"></i>{!! $result->quarterly_price !!} </td>
                        <td><span class="pay-now">
                      <a href="@if($result->payment_url) {{ $result->payment_url }} @else https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{$result->quarterly_price}} @endif" target="_blank">Pay Now</a></span></p>
                    </td>
                      </tr>
                      <!-- {{url('checkOutEBS/'.str_slug($result->title).'?amount='.$result->quarterly_price)}} -->
                       <tr>
                        <th>Half Yearly</th>
                        <td><i class="fa fa-rupee"></i>{!! $result->half_yearly_price !!} </td>
                        <td><span class="pay-now">
                      <a href="@if($result->payment_url) {{ $result->payment_url }} @else https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{$result->half_yearly_price}} @endif" target="_blank">Pay Now</a></span></p>
                    </td>
                      </tr>
                        <!-- {{url('checkOutEBS/'.str_slug($result->title).'?amount='.$result->half_yearly_price)}} -->
                       <tr>
                        <th>Yearly</th>
                        <td><i class="fa fa-rupee"></i>{!! $result->yearly_price !!} </td>
                        <td><span class="pay-now">
                      <a href="@if($result->payment_url) {{ $result->payment_url }} @else
                        https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{ $result->yearly_price}} @endif"  target="_blank">Pay Now</a></span></p>
                    </td>
                    <!-- {{url('checkOutEBS/'.str_slug($result->title).'?amount='.$result->yearly_price)}} -->
                      </tr>
                    </table>
    
                </div>
            @endforeach
          
        </div>
        
      </div>
    </div>
  </div>
</section>
<!--Pricings-->

 @stop
 <?php
 /*
 
  https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{$result->quarterly_price}}
  https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{$result->half_yearly_price}}
  https://www.instamojo.com/@researchinfotech1788/?ref=onb_tasks&amount={{ $result->yearly_price}}
 */
  ?>