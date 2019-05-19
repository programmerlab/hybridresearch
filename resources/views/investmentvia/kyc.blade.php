@extends('layouts.master')
@section('title', 'Kyc')

@section('header')
<h1>Home</h1>
@stop
@section('content')
@include('partials/menu')
<!--Page Header-->
@include('partials/titlebarBg')
<!--Page Header-->


<!--SERVICE SECTION-->
<section id="contact" class="padding">
  <div class="container">
    <div class="row padding-bottom">
       
      <div class="col-md-12 wow fadeInRight animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 4500ms; animation-name: fadeInRight;">
        <br><br>
        <h2 class="heading heading_space"> <span>{{$title }} </span> <span class="divider-left"></span></h2>
            
         @if($errors->first('successMsg', ' has-error'))
         <div class="alert alert-info">Thank you!.Kyc Form Submitted successfully.</div>
        @endif
         
        {!! Form::model($kyc, ['route' => ['kycForm'],'class'=>'form-inline findus','id'=>'contact-form','files'=>true]) !!}
        
          <div class="row">
            <div class="col-md-12">
              <div id="result"></div>
            </div>
          </div>
          <div class="row">
              
            <div class="col-md-4 col-sm-4">
                <label>Title</label>
                <div class="form-group">
                  <select name="title" class="form-control">
                      <option value="Mr">Mr.</option>
                      <option value="Mrs">Mrs.</option>
                      <option value="Ms">Ms</option>
                  </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
            <label>Full Name (required)</label>
              <div class="form-group">
                <input value="{{ old('name') }}"  type="text" class="form-control" placeholder="Full Name (required)" name="name" id="name" required="required">
                 <span class="label label-danger">{{ $errors->first('name', ':message') }}</span>
              </div>
            </div> 
           
             <div class="col-md-4 col-sm-4">
            <label>Father/Spouse Name (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Father/Spouse Name (required)
" name="father_spouse" id="father_spouse" required="" value="{{ old('name') }}" >
                 <span class="label label-danger">{{ $errors->first('father_spouse', ':message') }}</span>
              </div>
            </div>
              
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
               <label>DOB(required)</label>
                <input value="{{ old('dob') }}"  type="date" class="form-control" placeholder="date of birth" name="dob" id="date" required="required">
                 <span class="label label-danger">{{ $errors->first('dob', ':message') }}</span>
              </div>
            </div>
              
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
               <label>PAN(required)</label>
                <input type="text"  value="{{ old('pan') }}"  class="form-control" placeholder="PAN" name="pan" id="date" required="required">
                 <span class="label label-danger">{{ $errors->first('pan', ':message') }}</span>
              </div>
            </div>
              
              <div class="col-md-4 col-sm-4">
              <div class="form-group">
               <label>Occupation</label>
                <input type="text" value="{{ old('occupation') }}"  class="form-control" placeholder="Occupation" name="occupation" id="date" required="">
                 <span class="label label-danger">{{ $errors->first('occupation', ':message') }}</span>
              </div>
            </div>
             
              
              
             <div class="col-md-4 col-sm-4">
            <label>City</label>
              <div class="form-group">
                <input type="text" value="{{ old('city') }}"  class="form-control" placeholder="city" name="city" id="city" >
                 <span class="label label-danger">{{ $errors->first('city', ':message') }}</span>
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>State</label>
              <div class="form-group">
                <input type="text" value="{{ old('state') }}"  class="form-control" placeholder="state" name="state" id="name" required="">
              </div>
            </div>
               <div class="col-md-4 col-sm-4">
            <label>Pin Code</label>
              <div class="form-group">
                <input type="text" class="form-control" value="{{ old('pincode') }}"  placeholder="pincode" name="pincode" id="name" required="required">
                 <span class="label label-danger">{{ $errors->first('pincode', ':message') }}</span>
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>Residential Address (required)
</label>
              <div class="form-group">
               <textarea placeholder="Comment" value="{{ old('message') }}"  name="message" id="message" class="form-control"></textarea>
              
              </div>
            </div>
             
             <div class="col-md-4 col-sm-4">
            <label>Home / Mobile Telephone (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" value="{{ old('home_telephone') }}"  placeholder="Home / Mobile Telephone " name="home_telephone" id="home_telephone" required="required">
                 <span class="label label-danger">{{ $errors->first('home_telephone', ':message') }}</span>
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>Work Telephone (Optional)</label>
              <div class="form-group">
                <input type="text" class="form-control" value="{{ old('work_telephone') }}"  placeholder="work telephone" name="work_telephone" id="work_telephone" >
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>Email</label>
              <div class="form-group">
                <input type="text" class="form-control" value="{{ old('email') }}"  placeholder="Email" name="email" id="email" required="">
              </div>
            </div>
            
             <div class="col-md-4 col-sm-4">
            <label>Nationality (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" value="{{ old('nationality') }}"  placeholder="Nationality (required)" name="nationality" id="nationality" required="">
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
                <label>Segment</label>
                <div class="form-group">
                  <select name="segment" class="form-control">
                       <option value="" selected="selected">In which segment you trade ?</option><option value="Cash Market">Cash Market</option><option value="Derivatives Market">Derivatives Market</option><option value="Nifty Futures Only">Nifty Futures Only</option><option value="Option Trading">Option Trading</option>
                  </select>
                </div>
            </div>
              
            <div class="col-md-4 col-sm-4">
                <label>Stock Broker</label>
                <div class="form-group">
                  <select name="stock_broker" class="form-control">
                      <option value="" selected="selected">Your Existing Broker</option><option value="ANGEL BROKING">ANGEL BROKING</option><option value="INDIA INFOLINE">INDIA INFOLINE</option><option value="BMA WEALTH CREATORS">BMA WEALTH CREATORS</option><option value="INDIABULLS SECURITIES">INDIABULLS SECURITIES</option><option value="RELIGARE SECURITIES">RELIGARE SECURITIES</option><option value="SMC GLOBAL SECURITIES">SMC GLOBAL SECURITIES</option><option value="KOTAK SECURITIES">KOTAK SECURITIES</option><option value="ICICI SECURITIES">ICICI SECURITIES</option><option value="NIRMAL BANG SECURITIES">NIRMAL BANG SECURITIES</option><option value="MOTILAL OSWAL SECURITIES">MOTILAL OSWAL SECURITIES</option><option value="KARVY STOCK BROKING">KARVY STOCK BROKING</option><option value="SHAREKHAN">SHAREKHAN</option><option value="EDELWEISS BROKING">EDELWEISS BROKING</option><option value="ANAND RATHI">ANAND RATHI</option><option value="JRG SECURITIES">JRG SECURITIES</option><option value="RELIANCE SECURITIES">RELIANCE SECURITIES</option><option value="ADITYA BIRLA MONEY">ADITYA BIRLA MONEY</option><option value="UNICON SECURITIES">UNICON SECURITIES</option><option value="HSBC INVESTDIRECT SECURITIES">HSBC INVESTDIRECT SECURITIES</option><option value="GEOJIT BNP PARIBAS">GEOJIT BNP PARIBAS</option><option value="BONANZA PORTFOLIO">BONANZA PORTFOLIO</option><option value="HDFC SECURITIES">HDFC SECURITIES</option><option value="MASTER CAPITAL SERVICES">MASTER CAPITAL SERVICES</option><option value="SBICAP SECURITIES">SBICAP SECURITIES</option><option value="KASSA FINVEST PRIVATE">KASSA FINVEST PRIVATE</option><option value="C.D. EQUISEARCH PVT">C.D. EQUISEARCH PVT</option><option value="FAIRWEALTH SECURITIES">FAIRWEALTH SECURITIES</option><option value="TRUSTLINE SECURITIES">TRUSTLINE SECURITIES</option><option value="EDELWEISS FINANCIAL ADVISORS">EDELWEISS FINANCIAL ADVISORS</option><option value="VENTURA SECURITIES">VENTURA SECURITIES</option><option value="STANDARD CHARTERED SECURITIES">STANDARD CHARTERED SECURITIES</option><option value="WAY2WEALTH">WAY2WEALTH</option><option value="SHRIRAM INSIGHT SHARE BROKERS">SHRIRAM INSIGHT SHARE BROKERS</option><option value="OTHERS">OTHERS</option>
                  </select>
                </div>
            </div>
              
            <div class="col-md-4 col-sm-4">
                <label>Trading Style*</label>
                <div class="form-group">
                  <select name="trading_style" class="form-control">
                      <option value="" selected="selected">---Select---</option><option value="Trading Style">Trading Style</option><option value="Strictly Intraday">Strictly Intraday</option><option value="Intraday &amp; Positional">Intraday &amp; Positional</option><option value="Positional only">Positional only</option>
                  </select>
                </div>
            </div>
              
              <div class="col-md-4 col-sm-4">
                <label>Hedging</label>
                <div class="form-group">
                  <select name="hedging" class="form-control">
                    <option value="" selected="selected">Have you ever hedged your trading positions?</option><option value="Never">Never</option><option value="Rarely">Rarely</option><option value="Sometime">Sometime</option><option value="Always">Always</option>
                  </select>
                </div>
            </div>
              
              
              <div class="col-md-4 col-sm-4">
                <label>Stop Loss</label>
                <div class="form-group">
                  <select name="stop_loss" class="form-control">
                      <option value="" selected="selected">Have you ever hedged your trading positions?</option><option value="Never">Never</option><option value="Rarely">Rarely</option><option value="Sometime">Sometime</option><option value="Always">Always</option>
                  </select>
                </div>
            </div>
              
              
              <div class="col-md-4 col-sm-4">
                <label>Options</label>
                <div class="form-group {{ $errors->first('options', ' has-error') }}">
                  <select name="options" class="form-control">
                     <option value="" selected="selected">Did you ever short-sell options?</option><option value="Never">Never</option><option value="Rarely">Rarely</option>
                  </select>
                </div>
            </div>
              
              
              <div class="col-md-4 col-sm-4">
                <label>Exposure/Limit</label>
                <div class="form-group {{ $errors->first('exposure_limit', ' has-error') }}">
                  <select name="exposure_limit" class="form-control">
                     <option value="" selected="selected">How much exposure is generally available in your a/c?</option><option value="Upto Rs. 2 Lacs">Upto Rs. 2 Lacs</option><option value="Upto Rs. 5 Lacs">Upto Rs. 5 Lacs</option><option value="Upto Rs. 10 Lacs">Upto Rs. 10 Lacs</option><option value="Upto Rs. 20 Lacs">Upto Rs. 20 Lacs</option><option value="Upto Rs. 25 Lacs">Upto Rs. 25 Lacs</option><option value="Upto Rs. 50 Lacs">Upto Rs. 50 Lacs</option><option value="Upto Rs. 100 Lacs">Upto Rs. 100 Lacs</option><option value="Upto Rs. 5 Crores">Upto Rs. 5 Crores</option>
                  </select>
                </div>
            </div>
              
              
              <div class="col-md-4 col-sm-4">
                <label>Order Size</label>
                <div class="form-group {{ $errors->first('order_size', ' has-error') }}">
                  <select name="order_size" class="form-control">
                      <option value="" selected="selected">What is your average order size for every trade?</option><option value="1 Lot">1 Lot</option><option value="2 Lots">2 Lots</option><option value="3-5 Lots">3-5 Lots</option><option value="6-10 Lots">6-10 Lots</option><option value="11 Lots or more">11 Lots or more</option> 
                  </select>
                </div>
            </div>
              
              
              <div class="col-md-4 col-sm-4">
                <label>Maximum Profit</label>
                <div class="form-group {{ $errors->first('maximum_profit', ' has-error') }}">
                  <select name="maximum_profit" class="form-control">
                      <option value="" selected="selected">Maximum Profit in a single trade ever on your a/c?</option><option value="Upto Rs. 10000">Upto Rs. 10000</option><option value="Rs. 10000-25000">Rs. 10000-25000</option><option value="Rs. 25000-50000">Rs. 25000-50000</option><option value="Rs. 50000-1 Lac">Rs. 50000-1 Lac</option><option value="Rs. 1-2 Lacs">Rs. 1-2 Lacs</option><option value="Above Rs. 2 Lacs">Above Rs. 2 Lacs</option>
                  </select>
                </div>
            </div>
              
              
              <div class="col-md-4 col-sm-4">
                <label>Maximum Loss</label>
                <div class="form-group {{ $errors->first('maximum_loss', ' has-error') }}">
                  <select name="maximum_loss" class="form-control">
                      <option value="" selected="selected">Maximum Loss in a single trade ever on your a/c?</option><option value="Upto Rs. 10000">Upto Rs. 10000</option><option value="Rs. 10000-25000">Rs. 10000-25000</option><option value="Rs. 25000-50000">Rs. 25000-50000</option><option value="Rs. 50000-1 Lac">Rs. 50000-1 Lac</option><option value="Rs. 1-2 Lacs">Rs. 1-2 Lacs</option><option value="Above Rs. 2 Lacs">Above Rs. 2 Lacs</option>
                  </select>
                </div>
            </div>
              
               <div class="col-md-4 col-sm-4">
                <label>Ideal Monthly Target</label>
                <div class="form-group {{ $errors->first('ideal_monthly_target', ' has-error') }}">
                  <select name="ideal_monthly_target" class="form-control">
                      <option value="" selected="selected">What is your profit expectation?</option><option value="Upto Rs. 50000 per month">Upto Rs. 50000 per month</option><option value="Rs. 50000-1 Lac per month">Rs. 50000-1 Lac per month</option><option value="Rs. 1-2 Lac per month">Rs. 1-2 Lac per month</option><option value="Rs. 2-5 Lacs per month">Rs. 2-5 Lacs per month</option><option value="Rs. 5 Lacs per month or more">Rs. 5 Lacs per month or more</option>
                  </select>
                </div>
            </div>
              
            <div class="col-md-4 col-sm-4">
                <label>Existing Profile</label>
                <div class="form-group {{ $errors->first('existing_profile', ' has-error') }}">
                  <select name="existing_profile" class="form-control">
                     <option value="" selected="selected">What is your total all-time profit/loss in Stock Markets?</option><option value="Loss of upto Rs. 50000">Loss of upto Rs. 50000</option><option value="Loss of Rs. 50000-1 Lac">Loss of Rs. 50000-1 Lac</option><option value="Loss of Rs. 1-3 Lacs">Loss of Rs. 1-3 Lacs</option><option value="Loss of Rs. 3-5 Lacs">Loss of Rs. 3-5 Lacs</option><option value="Loss of Rs. 5-10 Lacs">Loss of Rs. 5-10 Lacs</option><option value="Loss of Rs. 10-25 Lacs">Loss of Rs. 10-25 Lacs</option><option value="Loss of Rs. 25 Lacs or more">Loss of Rs. 25 Lacs or more</option><option value="Profit of upto Rs. 50000">Profit of upto Rs. 50000</option><option value="Profit of Rs. 50000-1 Lac">Profit of Rs. 50000-1 Lac</option><option value="Profit of Rs. 1-3 Lacs">Profit of Rs. 1-3 Lacs</option><option value="Profit of Rs. 3-5 Lacs">Profit of Rs. 3-5 Lacs</option><option value="Profit of Rs. 5-10 Lacs">Profit of Rs. 5-10 Lacs</option><option value="Profit of Rs. 10-25 Lacs">Profit of Rs. 10-25 Lacs</option><option value="Profit of Rs. 25 Lacs or more">Profit of Rs. 25 Lacs or more</option>
                  </select>
                </div>
            </div>
              
           
              <div class="col-md-4 col-sm-4">
                <label>Adhar Number</label>
                <div class="form-group {{ $errors->first('adhar_number', ' has-error') }}">
                    <input type="text" class="form-control"  value="{{ old('adhar_number') }}" name="adhar_number" placeholder="Adhar number">
                     <span class="label label-danger">{{ $errors->first('adhar_number', ':message') }}</span>
                </div>
            </div>
              
             <!--   <div class="col-md-4 col-sm-4">
                <label>Upload signature</label>
                <div style="position:relative;">
                     <a class='btn btn-primary' href='javascript:;'>
                        Choose File...
                    <input name="file" type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'  size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                     <span class="label label-danger">{{ $errors->first('file', ':message') }}</span>
            </div>
            </div> -->
              
            <div class="col-md-12 col-sm-4">
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4">
                <label></label>
                <div class="form-group {{ $errors->first('adhar_number', ' has-error') }}">
                    <input type="submit" class="form-control btn btn-primary" value="Submit"> 
                </div>
                </div>
            </div> 
            
        {!! form::close() !!}
       
      </div>
    </div>
    
  </div>
  <style type="text/css">
    label b { 
    line-height: 26PX;  
    margin-bottom: 10px;
   }
   .padding{
    padding-top: 0px !important;
        padding-bottom: 40px;
   }
   .padding-bottom {
    padding-bottom: 30px;
}
.form-control{
    margin-bottom:15px !important;
}
label{
    margin: 3px !important;
}
  </style>
</section>
@stop