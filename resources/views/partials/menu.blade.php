<header>
  <nav class="navbar navbar-default navbar-fixed white no-background bootsnav pushy" >
    
    <div class="container"> 
       <div id="menu_bars" class="right">
        <span class="t1"></span>
        <span class="t2"></span>
        <span class="t3"></span>
      </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{url('/')}}" style="margin-top: 13px;">
       <span style="color: #ce1a1a;font-size: -webkit-xxx-large;font-family: fantasy;">Hybrid</span> <span style="color: #2a2e3c;font-family: fantasy;position: absolute;top: 45px;left: 80px;font-size: x-large;">Research </span> </br> 
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
          <li>
            <a href="{{url('/')}}">Home</a>
            
          </li>
          <li>
            <a href="{{url('about')}}">About</a>
            
          </li>
          <li>
            <a href="{{url('services')}}">Services</a>
            
        </li>
        <li>
            <a href="{{url('payment')}}">Payment</a>
        </li>
        <li><a href="{{url('pricing')}}">Pricing</a></li>
        <li><a href="{{url('free-trial')}}">Free Trial</a></li>
        <li><a href="{{url('life-at-research-infotech')}}">Life@HR</a></li>
        <li class="dropdown"><a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">More</a>
            <ul class="dropdown-menu animated fadeOut" style="display: none; opacity: 1;">
                
            <li><a href="{{url('contact')}}">Contact</a></li>
              <li><a href="{{url('faq')}}"> FAQ </a></li>
              <li><a href="{{url('career')}}"> Career </a></li>
              <li><a href="{{url('blog')}}"> Blog </a></li>
              <li><a href="{{url('kyc')}}"> KYC </a></li>
              <li><a href="{{url('risk-profiling')}}"> Risk Profiling </a></li>
              @foreach($pageMenu as $val)
                <li><a href="{!! url('page/'.str_slug($val->title))!!}"><i class="fa fa-right"></i>{!! ucfirst($val->title)!!}</a></li>
               @endforeach

            </ul>
          </li>      
        </ul>
      </div>
    </div>
    <div class="sidebar_menu">
        <nav class="pushmenu pushmenu-right">
         

          <a class="navbar-brand" href="{{url('/')}}" style="margin-top: 0px;">
       <span style="color: #ce1a1a;font-size: -webkit-xxx-large;font-family: fantasy;">Hybrid</span> <span style="color: #2a2e3c;font-family: fantasy;position: absolute;top: 57px;left: 105px;font-size: x-large;">Research </span> </br> 
        </a>

          <ul class="push_nav centered">
            <li>
            <a href="{{url('/')}}">Home</a>
            
          </li> 
           <li>
            <a href="{{url('about')}}">About</a>
            
          </li>
          <li>
             <a href="{{url('services')}}">Services</a> 
          </li>
          <li>
            <a href="{{url('payment')}}">Payment</a>
          </li>
          <li><a href="{{url('pricing')}}">Pricing</a></li> 
          <li><a href="{{url('contact')}}">Contact</a></li>
           <li><a href="{{route('tNc')}}"> T&C </a></li>
     
            <li><a href="{{url('faq')}}"> FAQ </a></li>
            <li><a href="{{url('career')}}"> Career </a></li>
            <li><a href="{{url('blog')}}"> Blog </a></li>
            <li><a href="{{url('kyc')}}"> KYC </a></li>
            <li><a href="{{url('risk-profiling')}}"> Risk Profiling </a></li>



              @foreach($pageMenu as $val)
                <li><a href="{!! url('page/'.str_slug($val->title))!!}"><i class="fa fa-right"></i>{!! ucfirst($val->title)!!}</a></li>
               @endforeach
          </ul>
          <div class="clearfix"></div>
          <ul class="social_icon black top25 bottom20">
          <li><a href="#." class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#." class="twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#." class="instagram"><i class="fa fa-instagram"></i></a></li>
        </ul>
        </nav>
      </div>   
  </nav>
</header>
    
    

    