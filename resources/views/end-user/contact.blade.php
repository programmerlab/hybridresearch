
@extends('layouts.master')
    @section('title', 'HOME')
        
        @section('header')
        <h1>Home</h1>
        @stop

        @section('content') 

            @include('partials.menu')
            <div class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <ul class="list-inline list-unstyled">
                            <li><a href="home.html">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div><!-- /.breadcrumb-inner -->
                </div><!-- /.container -->
            </div>
            <div class="checkout-box faq-page">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="heading-title">Contact Us</h2>
                    <span class="title-tag">Last Updated on 2017 </span>
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
            <div class="panel panel-default checkout-step-01">

                <!-- panel-heading -->
                    <div class="panel-heading">
                    <h4 class="unicase-checkout-title">
                        <a data-toggle="collapse" class="" data-parent="#accordion" href="index.htm#collapseOne">
                          <span>Enquiry form</span> 
                        </a>
                     </h4>
                </div>
                <!-- panel-heading -->

                <div id="collapseOne" class="panel-collapse collapse in">

                    <!-- panel-body  -->
                    <div class="panel-body">
                        <div class="contact-page">
        <div class="row">
             
                <div class="col-md-9 contact-form">
    <div class="col-md-12 contact-title">
        <h4>Contact Form</h4>
    </div>
    <div class="col-md-4 ">
        <form class="register-form" role="form">
            <div class="form-group">
            <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
          </div>
        </form>
    </div>
    <div class="col-md-4">
        <form class="register-form" role="form">
            <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
          </div>
        </form>
    </div>
    <div class="col-md-4">
        <form class="register-form" role="form">
            <div class="form-group">
            <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Title">
          </div>
        </form>
    </div>
    <div class="col-md-12">
        <form class="register-form" role="form">
            <div class="form-group">
            <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
            <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
          </div>
        </form>
    </div>
    <div class="col-md-12 outer-bottom-small m-t-20">
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
    </div>
</div>
<div class="col-md-3 contact-info">
    <div class="contact-title">
        <h4>Mailing Address</h4>
    </div>
    <div class="clearfix address">
        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
         {!! isset($company_address->field_value)?$company_address->field_value:"Indore MP 452001" !!} 
        <span class="contact-span"  </span>  
    </div>
    <div class="clearfix phone-no">
        <span class="contact-i"><i class="fa fa-mobile"></i></span>
        <span class="contact-span">  {{ isset($contact_number->field_value)?$contact_number->field_value:"+91-9168518310" }} </span>
    </div>
    <div class="clearfix email">
        <span class="contact-i"><i class="fa fa-envelope"></i></span>
        <span class="contact-span"><a href="index.htm#"> {{ isset($website_email->field_value)?$website_email->field_value:"info@guruhomeshops.com" }}</a></span>
    </div>
</div>          </div><!-- /.contact-page -->
        </div>        
                    </div>
                    <!-- panel-body  -->

                </div><!-- row -->
            </div> 
                        
                    </div><!-- /.checkout-steps -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        @stop