 
<!-- News-->
<!-- News-->
<section id="news" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeInDown text-center">
       <h2 class="heading heading_space"><span>Current </span> Market Update <span class="divider-center"></span></h2>
      </div>
    </div>
    <div class="row">
  <ul class="list-inline">
      <li>
          <a href="https://www.nseindia.com" target="_blank">  <img src="{{ asset('storage/assets/images/nse.jpg')}}"> </a>
      </li>
       <li>
          <a href="https://www.marketwatch.com" target="_blank">  <img src="{{ asset('storage/assets/images/marketwatch.jpg')}}"></a>
      </li>
      <li>
          <a href="https://www.investing.com" target="_blank">  <img src="{{ asset('storage/assets/images/investing.jpg')}}"></a>
      </li>
      <li>
          <a href="https://www.www.moneycontrol.com" target="_blank"> <img src="{{ asset('storage/assets/images/moneycontrol.jpg')}}"></a>
      </li>
      <li>
          <a href="https://www.mcxcontrol.com" target="_blank">  <img src="{{ asset('storage/assets/images/mcx.jpg')}}"></a>
      </li>
      <li>
          <a href="https://www.cnbc.com" target="_blank"> <img src="{{ asset('storage/assets/images/cnbc.jpg')}}"> </a>
      </li>
      </ul>
    </div>
  </div>
</section>


<!--FOOTER-->
<footer class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 footer_panel bottom25">
        <h3 class="heading bottom25">About Us<span class="divider-left"></span></h3>
         <a class="navbar-brand" href="{{url('/')}}" style="margin-top: 13px;">
       <span style="color: #ce1a1a;font-size: -webkit-xxx-large;font-family: fantasy;">Hybrid</span> <span style="color: #fff;font-family: fantasy;position: absolute;top: 119px;left: 80px;font-size: x-large;">Research </span> </br> 
        </a>
        <br><br><br><br>
        <p>Welcome to Hybrid Research, We have been known for serving our customers with atmost care and dedication. Our motto has been always aligned with "Delivering Quality Services" and "Customer Satisfaction".</p>
        <ul class="social_icon top25">
          <li><a href="{{$facebook_url->field_value or '#'}}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="{{$twitter_url->field_value or '#'}}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="{{$linkedin_url->field_value or '#'}}" target="_blank" class="dribble"><i class="fa fa-dribbble"></i></a></li>
          
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 footer_panel bottom25">
        <h3 class="heading bottom25">Quick Links<span class="divider-left"></span></h3>
        <ul class="links">
          <li><a href="{{url('/')}}"><i class="fa fa-right"></i>Home</a></li>
          <li><a href="{!! url('about')!!}"><i class="fa fa-right"></i>About Company</a></li>
          <li><a href="{!! url('services')!!}"><i class="fa fa-right"></i>Services</a></li>
          <li><a href="{!! url('contact')!!}"><i class="fa fa-right"></i>Contact Us</a></li>
          <li><a href="{{url('free-trial')}}"><i class="fa fa-right"></i>Free Trial</a></li>
          <li><a href="{!! url('payment')!!}"><i class="fa fa-right"></i>Payment</a></li>
          <li><a href="{!! url('pricing')!!}"><i class="fa fa-right"></i>Pricing</a></li> 
          <li><a href="{!! url('risk-profiling')!!}"><i class="fa fa-right"></i>Risk profiling</a></li> 


          @foreach($pageMenu as $val)
          <li><a href="{!! url('page/'.str_slug($val->title))!!}"><i class="fa fa-right"></i>{!! ucfirst($val->title)!!}</a></li>
         @endforeach
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 footer_panel bottom25">
        <h3 class="heading bottom25">Keep in Touch <span class="divider-left"></span></h3>
         <p class=" address" style="float: left;"><i class="fa fa-map-marker" aria-hidden="true"></i>{!! $company_address !!}</p>
        <p class=" address" ><i class="fa fa-phone" aria-hidden="true"></i>{!! $contact_number !!}</p>
         <img src="{{ asset('storage/assets/images/footer-map.png')}}" class="img-responsive">
      </div>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>Copyright &copy; {{date('Y')}} <a href="#.">Hybrid Research</a>. all rights reserved. | SEBI REGISTRATION NO: XXXXXXXX</p>
      </div>
    </div>
  </div>
</div>
<!--FOOTER ends-->


 
<script src="{{ asset('public/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/assets/js/bootsnav.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.appear.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery-countTo.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.parallax-1.1.3.js')}}"></script>
<script src="{{ asset('public/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.cubeportfolio.min.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.matchHeight-min.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('public/assets/js/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{ asset('public/assets/js/revolution.extension.navigation.min.js')}}"></script>
<script src="{{ asset('public/assets/js/revolution.extension.parallax.min.js')}}"></script>
<script src="{{ asset('public/assets/js/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{ asset('public/assets/js/revolution.extension.video.min.js')}}"></script>
<script src="{{ asset('public/assets/js/wow.min.js')}}"></script>
<script src="{{ asset('public/assets/js/functions.js')}}"></script>
<script src="https://js.instamojo.com/v1/button.js"></script>
<script>
  $('.owl-carousel-2').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        300:{
            items:3,
            nav:false
        },
        500:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
</script>

 <script> 
        
  $(function () {
      $('body').show();
  }); 
  </script>

    <script type="text/javascript">
    jQuery(document).ready(function($){
      $('.menu').click(function(){
        $('body').toggleClass('show-menu');
      });
      $('.close-button').click(function(){
        $('body').removeClass('show-menu');
      });
      
    });
  </script>  

</body>
</html>