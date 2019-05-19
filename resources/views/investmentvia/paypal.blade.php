
@extends('layouts.master')
@section('title', 'HOME')

@section('header')
<h1>Home</h1>
@stop
@section('content')
@include('partials/menu') 
@include('partials/titlebar')

<style type="text/css">

    tr.hide{
        visibility: hidden;
    }
    td input[type="text"]{
        height: 40px !important;
    } 

</style>

<script>
    window.onload = function () {
        var d       = new Date().getTime();
        document.getElementById("tid").value = d;
        var tax     = 18;    
        var amount  = document.getElementById("total_amount").value;
        var tax     = document.getElementById("gst").value;
        if(tax==0){
            tax=0;
        }else{
            tax=18;
        }  
        var Payable = parseInt(amount) + amount * ( tax/ 100);

        document.getElementById("amount").value = Payable;
        
    };
    
    function updatePrice()
    {
        var amount  = document.getElementById("total_amount").value;
        var tax     = document.getElementById("gst").value;
        if(tax==0){
            tax=0;
        }else{
            tax=18;
        }  
        var amount = document.getElementById("total_amount").value;
        var Payable = parseInt(amount) + amount * (tax / 100);
        if(amount.length==0){
            Payable=0;
        }document.getElementById("amount").value = Payable;


    }
</script>

<section id="about" class="padding">
    <div class="container aboutus">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 wow fadeInLeft animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
                <h2 class="heading heading_space"><span>Checkout </span><span class="divider-left"></span></h2>
                <div class="box-body table-responsive no-padding">
                    @if( $errors->count() && $errors->first('total_amount', ':message'))
                        <div class="alert alert-danger">Amount can't be less than 1 INR</div>
                    @endif   
                    {!! Form::open(['url' => url('checkout/'.str_slug($serviceName)), 'method' => 'post','class'=>'form-inline findus','id'=>'contact-form']) !!}
                    <input type="hidden" name="integration_type">
                        <table width="40%" height="100" border='1' align="center" class="table table-striped table-hover table-bordered">
                            <tr>
                                <td colspan="2"><b> Payment information </b></td>
                            </tr>
                            <tr>
                                <td>Transaction ID :</td><td><input type="text" class="form-control"  name="tid" id="tid" readonly /></td>
                            </tr>
                            <tr class="hide">
                                <td></td><td><input type="hidden" name="merchant_id" value="{{$merchant_id}}"  class="form-control" /></td>
                            </tr>
                            <tr class="hide">
                                <td></td><td><input type="hidden" class="form-control"  name="order_id" value="{{ $order_id}}"/></td>
                            </tr>
                            <tr>
                                <td>Service Name</td>
                                <td>
                                    <input type="text" class="form-control"  name="service" value="{{$serviceName or ''}}"  /></td>
                            </tr>
                            <tr>
                                <td>Amount(INR)  :</td>
                                <td>
                                    <input type="text" class="form-control"  name="total_amount" value="{{$amount or old('total_amount')}}" min="1000" id="total_amount"   onkeyup="updatePrice()"   /></td>
                                   
             
                            </tr>
                            @if($defaultAmount!=0)
                            <tr>
                                <td>GST(INR)  :</td><td><input type="text" class="form-control"  value="18%" id="gst"  readonly="" /></td>
                            </tr>
                            @else
                            <input type="hidden" class="form-control"  value="0"  id="gst"   readonly="" />
                            @endif
                            
                            <tr>
                                <td>Payable Amount(INR)  :</td><td><input type="text" class="form-control"  name="amount" value="" id="amount" min="18" readonly="" /></td>
                            </tr>
                            <tr class="hide" style="visibility: hidden;">
                                <td></td><td><input type="hidden" name="currency" value="INR"/></td>
                            </tr>
                            <tr class="hide">
                                <td></td><td><input type="hidden" name="redirect_url" value="http://researchinfotech.co.in/paymentStatus/success"/></td>
                            </tr>
                            <tr class="hide">
                                <td></td><td><input type="hidden" name="cancel_url" value="http://researchinfotech.co.in/paymentStatus/failed"/></td>
                            </tr>
                            <tr class="hide">
                                <td></td><td><input type="hidden" name="language" value="EN"/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Billing information(optional):</b></td>
                            </tr>
                            <tr>
                                <td>Billing Name  :</td><td><input type="text" class="form-control"  name="billing_name" value="{{old('billing_name')}}"   placeholder="Enter Name" required="" /></td>
                            </tr>
                            <tr>
                                <td>Billing Address :</td><td><input type="text" class="form-control"  name="billing_address" value="{{old('billing_address')}}" placeholder="Enter Address" required="" /></td>
                            </tr>
                            <tr>
                                <td>Billing City  :</td><td><input type="text" class="form-control"  name="billing_city" value="{{old('billing_city')}}" placeholder="Enter City" required=""  /></td>
                            </tr>
                            <tr>
                                <td>Billing State :</td><td><input type="text" class="form-control"  name="billing_state" value="{{old('billing_state')}}" placeholder="Enter State" required="" /></td>
                            </tr>
                            <tr>
                                <td>Billing Zip :</td><td><input type="text" class="form-control"  name="billing_zip" value="{{old('billing_zip')}}" placeholder="Enter Zipcode" required="" /></td>
                            </tr>
                            <tr class="hide">
                                <td>Billing Country :</td><td><input type="hidden" class="form-control"  name="billing_country" value="India" /></td>
                            </tr>
                            <tr>
                                <td>Billing Tel :</td><td><input type="text" class="form-control" required=""  name="billing_tel" value="{{old('billing_tel')}}" placeholder="Enter Mobile number"  /></td>
                            </tr>
                            <tr>
                                <td>Billing Email :</td><td><input type="text" class="form-control"   name="billing_email" value="info@researchinfotech.co.in"/></td>
                            </tr>
                            <!-- <tr>
                                <td>Promo Code  :</td><td><input type="text" class="form-control"  name="promo_code" value="{{old('promo_code')}}"/></td>
                            </tr> -->
                            <tr>
                                <td></td><td><input type="submit" class="btn btn-primary" value="Make Payment"></td>
                            </tr>
                        </table>
                    {!! Form::close()!!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

{!!$jsUrl1!!}
{!!$jsUrl2!!}

</section>
@stop