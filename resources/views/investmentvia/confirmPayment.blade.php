
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
                <h2 class="heading heading_space"><span>Confirm Payment </span><span class="divider-left"></span></h2>
                <div class="box-body table-responsive no-padding"> 
                    {!! $btn !!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>
 

</section>
@stop