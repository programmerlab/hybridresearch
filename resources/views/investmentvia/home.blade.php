
    @extends('layouts.master')
      @section('title', 'HOME')

        @section('header')
        <h1>Home</h1>
        @stop
        @section('content')
    @include('partials/menu')
<style>
/*side bar */
div#title {
position:absolute;
top:300px;
left:650px;
}
select {
padding:6px;
width:100%;
font-size:15px;
border-radius:2px;
border:3px solid #98d0f1;
}
textarea {
padding:6px;
font-size:15px;
border-radius:2px;
border:3px solid #98d0f1;
margin-top:10px;
height:80px;
width:100%;
}

input[type=text] {
margin-top:10px;
padding:6px;
width:100%;
font-size:15px;
border-radius:2px;
border:3px solid #98d0f1;
}
#slider {
width:500px;
top: 107px;
position:fixed;z-index: 999;
}
#header {
    width: 341px;
height:520px;
position:absolute;
right:0;
border:1px solid #d8d8d8;
margin-left:40px;
padding:20px 40px;
border-radius:3px;
box-shadow:0 0 8px gray;z-index: 999;
background: #b5f0f7;
}
#sidebar {
position:absolute;
top:180px;
left:113px;
box-shadow:0 0 8px gray;
}
#sidebar1 {
position:absolute;
top:180px;
left:113px;
box-shadow:0 0 8px gray;
}
.slideout {
  position: fixed;
      z-index: 9999999;
  top: 520px;
  left: 0;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
}

.slideout_inner {
	    background-color: #000;
    color: #fff;
	padding:10px;
  position: fixed;
  top: 520px;
  left: -140px;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
}

.slideout:hover {
  left: 150px;
}
.slideout:hover .slideout_inner {
  left: 0;
}

p{
    line-height: normal;
    font-size: 15px;
}
.home-feature h2 {
    color: #fff;
    font-size: 27px;
    margin-bottom: 40px;
}
.feature-box {
    position: relative;
    margin-bottom: 45px;
}
.feature-box h4 {
    color: #fff;
    margin-bottom: 15px;
}
.feature-box p
{
color:#fff;
}
span.feature-abs0, span.feature-abs1, span.feature-abs2, span.feature-abs3 {
    color: #fff;
    background: #07bfd5;
    padding: 24px;
    font-size: 18px;
    border-radius: 100%;
    border: none;
    right: 0;
    position: absolute;
	top:0;
	height: 70px;
    width: 70px;
    text-align: center;
}
span.feature-abs0 {
    right: -80px;
}
span.feature-abs1 {
    right: -58px;
}
span.feature-abs2 {
    right: -55px;
}
span.feature-abs3 {
    right: -90px;
}
.mobile-view-clone img
{
float:right;
}
.home-feature
{
background:url('public/assets/images/clone.png');
background-size:cover;
background-repeat:no-repeat;
padding:60px 0px;
height:680px;
}

.counter2{padding: 70px 0px; background-image: url('public/assets/images/parallax2.jpg') !important;}
</style>

<!-- <div class="loader">
<div class="spinner centered">
<img src="http://prestigeresearch.in/storage/images/loading.gif" width="100%">
</div>
</div>
 -->

 <!-- Modal -->
<!-- <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
 
    <div class="modal-content" style="    padding: 9px 15px;">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="border: 1px solid #16b9ed;font-size: 30px; padding: 5px; opacity:1; color:#16b9ed;">&times;</button>
     </div>
      <div class="modal-body"style="padding:0px;">
        <img src="{{ asset('public/assets/images/paytm-QR-code.png')}}" class="img-responsive">
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div> -->

  
<!--Slider-->
<section class="rev_slider_wrapper text-center" style="width:100%; position: fixed">            
<!-- START REVOLUTION SLIDER 5.0 auto mode -->
  <div id="rev_slider_full" class="rev_slider" data-version="5.0">
    <ul>    
    <!-- SLIDE  --> 
    @if($banner->count())
        @foreach($banner as $key => $value)  
            <li data-transition="fade">
            <!-- MAIN IMAGE -->
                <img src="{!! asset('storage/files/banner/'.$value->field_value) !!}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">
            <!-- LAYER NR. 1 -->
            </li>
        @endforeach
    @else
        <li data-transition="fade">
            <!-- MAIN IMAGE -->
            <img src="{{ asset('storage/assets/images/news3.jpg')}}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg">
            <!-- LAYER NR. 1 -->
        </li>
    @endif
      
    </ul>
  </div><!-- END REVOLUTION SLIDER -->
  <div class="over-content wow fadeInUp" data-wow-delay="100ms"">
            <h3 class="banner-heading">
                Favourable Business Practices Sustainable Profits.
            </h3>
            <p>
                Trading advice on Mobile Devices/IMs Purely based on Economic
News and Technical & Fundamental Analysis
            </p>
            <div class="main-btn"> 
                <button style="
    width: 150px;
    height: 40px;
    font-size: larger;
    font-weight: bold;
    background: #ee5835;
    border: 0px;
" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Free Trial
                  </button> 
            </div>
          
            
            <div class="follow-us-banner">
                <p>Follow Us: <span><a href="{{$facebook_url->field_value or '#'}}" target="_blank"><i class="fa fa-facebook"></i></a> 
                    <a href="{{$twitter_url->field_value or '#'}}"  target="_blank"><i class="fa fa-twitter"></i></a>
                     <a href="{{$linkedin_url->field_value or '#'}}"  target="_blank"><i class="fa fa-linkedin"></i></a></span></p>
            </div>
           <!--  <div class="live-btn">
                <p>  <a href="https://easebuzz.in/pay/hybridresearch" target="_blank"><img src="{{ asset('storage/assets/images/pay-online.png')}}"></a>  --> 

                
                    <!-- a href="https://www.researchinfotech.co.in/checkOutEBS/payment-online?amount=1000" target="_blank"><img src="{{ asset('storage/assets/images/pay-online.png')}}"></a>  

                      <a href="https://www.instamojo.com/@researchinfotech1788/" rel="im-checkout" data-behaviour="remote" data-style="light" data-text="Checkout With Instamojo"></a>  --> 


                <!--     
                </p>
            </div> -->
        </div>
        <!-- Large modal -->

<!-- <div class="">
    <a data-toggle="modal" data-target="#myModal"><img id="" src="{{ asset('storage/assets/images/paytm.png')}}"style="    width: 50px;
    position: fixed;
    top: 400px;
    left: 2px;
    z-index: 999999;
    border: 1px solid #042e6f;
    border-radius: 8px;    width: 40px;     cursor: pointer;"></a>

</div> -->
        
        
</section>  
 



<div class="free-trial-section marqu">
    <p class="marq"><marquee>"We are SEBI Resisted Investment Advisor and Investments in stock and commodity market are subject to market risk and we are providing the Services of Equity & Commodity Market to our Client. We are not offering any D-mat services and we are not a Broker. All Disputes are Subject to Indore Jurisdiction. No refund policy."</marquee></p>
</div>


<!--ABout US-->
   <!--ABout US-->
    <section id="about" class="padding">
      <div class="container">
        <div class="row">
        <div class="col-sm-12 text-center">
          <h2 class="heading"><span>Our</span> Services <span class="divider-center"></span></h2>
        </div>
        <div class="icon_wrapclearfix">
          <div class="col-sm-4 icon_box text-center margin_tophalf wow fadeInUp" data-wow-delay="300ms">
             <img src="{{ asset('storage/assets/images/icon1.png')}}">
             <h4 class="text-capitalize bottom20 margin10">BULLION HNI</h4>
             <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
          </div>
          <div class="col-sm-4 icon_box text-center margin_tophalf wow fadeInUp" data-wow-delay="400ms">
              <img src="{{ asset('storage/assets/images/icon2.png')}}">
             <h4 class="text-capitalize bottom20 margin10">DERIVATIVES HNI</h4>
             <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
          </div>
          <div class="col-sm-4 icon_box text-center margin_tophalf wow fadeInUp" data-wow-delay="500ms">
              <img src="{{ asset('storage/assets/images/icon3.png')}}">
             <h4 class="text-capitalize bottom20 margin10">NCDEX</h4>
             <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
          </div>
          <div class="col-sm-4 icon_box text-center margin_tophalf wow fadeInUp" data-wow-delay="500ms">
             <img src="{{ asset('storage/assets/images/icon4.png')}}">
             <h4 class="text-capitalize bottom20 margin10">MCX BASIC</h4>
             <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
          </div>
          <div class="col-sm-4 icon_box text-center margin_tophalf wow fadeInUp" data-wow-delay="400ms">
              <img src="{{ asset('storage/assets/images/icon5.png')}}">
             <h4 class="text-capitalize bottom20 margin10">EQUITY BASIC</h4>
             <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
          </div>
          <div class="col-sm-4 icon_box text-center margin_tophalf wow fadeInUp" data-wow-delay="500ms">
              <img src="{{ asset('storage/assets/images/icon6.png')}}">
             <h4 class="text-capitalize bottom20 margin10">BTST/STBT NCDEX</h4>
             <p class="no_bottom">Keep away from people who try to belittle your ambitions. Small people always do that but the really great.</p>
          </div>
          </div>
        </div>
      </div>
    </section>
<!--ABout US-->

 

<div class="tracksheet">
    <div class="row">
        <div class="col-sm-5" style="padding-right: 0px">
            <img src="{{ asset('public/assets/images/googe-data-banner-600x400.jpg')}}"  style="width: 630px;min-height: 309px" width="630px" height="421px"> 
        </div>
        <div class="col-sm-7 track-content" style="height: 421px">
            <h3>Tracksheet and Reports</h3>
            <p class="track-para">Commodity Trading, Swing Trading, Future Trading and Option Trading in Stock,
Commodity & Bullion Market.</p>
            <div class="tracksheet-block">
                
                @if($trackSheet->count())
                    @foreach($trackSheet as $key=> $result)
                    <?php ++$key; $html = ' <p><img src="'.asset('storage/assets/images/excel.png').'" >'.ucfirst($result->title).'</p>';

                     ?>
                     <div class="block1 wow fadeInUp" data-wow-delay="500ms">
                       <a href="{{url('storage/files/'.$result->files)}}" target="_blank"> {!!$html!!} </a>
                     </div>
                    @endforeach   

                @else
                 <div class="block1 wow fadeInUp" data-wow-delay="500ms">
                    <p><img src="{{ asset('storage/assets/images/excel.png')}}"> HNI </p>
                        <p><img src="{{ asset('storage/assets/images/excel.png')}}"> Stock Cash</p>
                        <p><img src="{{ asset('storage/assets/images/excel.png')}}"> Option</p>
                        <p><img src="{{ asset('storage/assets/images/excel.png')}}"> Stock Future</p>
                                                                                                                            
                </div>
                 <div class="block1 wow fadeInUp" data-wow-delay="500ms">
                    <p><img src="{{ asset('storage/assets/images/excel.png')}}"> HNI </p>
                        <p><img src="{{ asset('storage/assets/images/excel.png')}}"> Stock Cash</p>
                        <p><img src="{{ asset('storage/assets/images/excel.png')}}"> Option</p>
                        <p><img src="{{ asset('storage/assets/images/excel.png')}}"> Stock Future</p>
                                                                                                                            
                </div>
               @endif
               
            </div>
           <!--  <div class="main-btn">
                <a href="#">View All</a>
            </div> -->
        </div>
    </div>
</div>

<!--Fun Facts-->

<!--Fun Facts-->



<!-- Gallery -->

<!-- Gallery -->

<!--Customers Review-->
<section id="reviews" class="padding bg_light">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow fadeInDown">
      <h2 class="heading heading_space"> <span>Client</span> Testimonials <span class="divider-center"></span> </h2>
      <div id="review_slider" class="owl-carousel text-center">
        <div class="item">
          
          <p class="review_text">I am quite impressed with their services. I like their strategies & resistance, support levels. With this I am able to earn more profit with less fund.</p>
          <h4>kandy</h4> 
        </div>
        <div class="item">
          
          <p class="review_text">I am very happy with their calls & proper follow ups. My experience with Research Infotech is just amazing. I hope they will be able to always maintain their accuracy & services. </p>
          <h4>Sanjay Rai</h4>
        </div>
       </div>
      </div>
    </div>
  </div>
</section>
<!--Customers Review-->

<!-- <div id="counter" class=" padding">
  <div class="container">
    <h2 class="hidden">hidden</h2>
    <div class="row number-counters">
      <div class="col-md-3 col-sm-6 col-xs-6 counters-item text-center wow fadeInUp" data-wow-delay="300ms">
       <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
        <strong data-to="5000">5000</strong>
        <p>SOCIAL MEDIA FOLLOWERS</p>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6 counters-item text-center wow fadeInUp" data-wow-delay="400ms">
        <i class="fa fa-trophy"></i>
        <strong data-to="100">0</strong>
        <p>NATIONAL/INTERNATIONAL STATE COVERED</p>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6 counters-item text-center wow fadeInUp" data-wow-delay="500ms">
       <i class="fa fa-globe" aria-hidden="true"></i>
        <strong data-to="50">0</strong>
        <p>NATIONAL/INTERNATIONAL RESEARCH SOURCES</p>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6 counters-item text-center wow fadeInUp" data-wow-delay="600ms">
      <i class="fa fa-user-plus" aria-hidden="true"></i>
        <strong data-to="2000">0</strong>
        <p>Satisfied Clients</p>
      </div>
    </div>
  </div>
</div> -->

<!--Paralax -->
<div id="counter" class="counter2">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center wow bounceIn">
       <p class="bottom25 whitecolor">Lets Know About Our Expertise</p>
       <h1 class="bottom25 whitecolor">We Have More Than 1000+ Satisfied Clients</h1>
       <a href="#." class="border_radius btn_common white_border">Get a Quote</a>
      </div>
    </div>
  </div>
</div>
<!--Paralax -->
<!-- News-->
 
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">2 Days Free Trial</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="
                            position: absolute;
                            top: 10px;
                        ">&times;</span>
                    </button>
            </div>
            <div class="modal-body"> 

                <div class="banner-right col-md-12 col-sm-12 jw-animate-gen animated fadeInRight" data-gen-offset="90%" data-gen="fadeInRight">
                    <form method="post" action="{{url('freeTrial')}}">
                        <input type="text" placeholder="Enter Name" name="name" required="" autofocus="true"> 
                        <input type="number" placeholder="Enter 10 Digit Phone Number" name="phone" required="" maxlength="10" size="10" min="999999999">
                        <input type="text" placeholder="Enter service name for trial. Example: Commodity" name="service_name" required="" >
                        <input type="submit" class="submit trai-btn" value="Start My Free Trial Now!">
                    </form> 
                </div> 
            </div>
        </div>
    </div>
</div>

<script>
		    /*
------------------------------------------------------------
Function to activate form button to open the slider.
------------------------------------------------------------
*/
function open_panel() {
slideIt();
var a = document.getElementById("sidebar");
a.setAttribute("id", "sidebar1");
a.setAttribute("onclick", "close_panel()");
}
/*
------------------------------------------------------------
Function to slide the sidebar form (open form)
------------------------------------------------------------
*/
function slideIt() {
var slidingDiv = document.getElementById("slider");
var stopPosition = 0;
if (parseInt(slidingDiv.style.right) < stopPosition) {
slidingDiv.style.right = parseInt(slidingDiv.style.right) + 2 + "px";
setTimeout(slideIt, 1);
}
}
/*
------------------------------------------------------------
Function to activate form button to close the slider.
------------------------------------------------------------
*/
function close_panel() {
slideIn();
a = document.getElementById("sidebar1");
a.setAttribute("id", "sidebar");
a.setAttribute("onclick", "open_panel()");
}
/*
------------------------------------------------------------
Function to slide the sidebar form (slide in form)
------------------------------------------------------------
*/
function slideIn() {
var slidingDiv = document.getElementById("slider");
var stopPosition = -342;
if (parseInt(slidingDiv.style.right) > stopPosition) {
slidingDiv.style.right = parseInt(slidingDiv.style.right) - 2 + "px";
setTimeout(slideIn, 1);
}
}
		</script>
        <style type="text/css">
            .item{
                padding-top: 20px;
            }
        </style>
    <!--Paralax --> 
 @stop
