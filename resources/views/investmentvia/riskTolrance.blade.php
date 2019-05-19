

@extends('layouts.master')
@section('title', 'HOME')

@section('header')
<h1>Home</h1>
@stop
@section('content')
@include('partials/menu')
<!--Page Header-->
@include('partials/titlebar')
<!--Page Header-->


<!--SERVICE SECTION-->
<section id="contact" class="padding">
  <div class="container">
    <div class="row padding-bottom">
       
      <div class="col-md-12 wow fadeInRight animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 4500ms; animation-name: fadeInRight;">
        <h2 class="heading heading_space"  style="margin-top: 20px;"> <span>Risk </span> Tolrance<span class="divider-left"></span></h2>

            @if ($errors->any())
               {{ implode('', $errors->all('<div class="alert alert-danger">:message</div>')) }}
            @endif

        <form class="form-inline findus" id="contact-form" action="{{url('riskTolrance')}}" method="post" >
          
          <div class="row">
            <div class="col-md-12">
              <div id="result"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
            <label>Referred by (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="referred by: google,friend and Other" name="referred_by" id="referred_by"   required="">
              </div>
            </div>
             
             <div class="col-md-4 col-sm-4">
            <label>Full Name (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Full Name (required)" name="full_name" id="full_name" required="required">
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>Father/Spouse Name (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Father/Spouse Name (required)
" name="father_spouse" id="father_spouse" required="">
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>City</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="city" name="city" id="city" required="">
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>State</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="state" name="state" id="name" required="">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
            <label>Work Telephone (optional)</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="work telephone" name="phone" id="phone">
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
              <label>Residential Address (required)</label>
                <div class="form-group">
                 <textarea placeholder="Address" rows="4" name="address" id="address" class="form-control"></textarea>
                </div>
            </div>
             
             <div class="col-md-4 col-sm-4">
            <label>Home / Mobile Telephone (required)</label>
              <div class="form-group">
                <input type="text" class="form-control"  placeholder="Home / Mobile Telephone " name="mobile" id="mobile" required="">
              </div>
            </div>
             
             <div class="col-md-4 col-sm-4">
            <label>Email</label>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required="">
              </div>
            </div>
             <div class="col-md-4 col-sm-4">
            <label>Date of Birth (required)</label>
              <div class="form-group">
                <input type="date" class="form-control" placeholder="MM-DD-YYYY" name="dob" id="dob" required="">
              </div>
            </div>
             
             <div class="col-md-4 col-sm-4">
            <label>Nationality (required)</label>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nationality (required)" name="nationality" id="nationality" required="">
              </div>
            </div>
             
             <div class="col-md-12"> 
             <P style="color:green; font-weight: 700">Tolerance for risk is a key consideration in determining your probable level of comfort with
varying investing choices.</P>
            <div class="col-md-4 col-sm-4">
              <label>(1) <b>What is your current age?</b><br></label>
                <div class="form-group">
                  <ul>
                    
                    <li> <input type="radio" name="age" value="0-25"> Less than 25</ins></li>
                     <li> <input type="radio" name="age" value="25-45"> 25-45</ins></li>
                      <li> <input type="radio" name="age" value="45-55"> 45-55</ins></li>
                       <li> <input type="radio" name="age" value="55-100"> Above 55</ins></li>
                  </ul>
              </div>
              </div>
               <div class="col-md-4 col-sm-4">
                <label class="control-label">(2) <b> Goal and Expectations </b> <br></label>
                  <div class="form-group">
                    <ul> 
                      <li> <input type="radio" name="Expectations" value="Capital Appreciation"> Capital Appreciation</li>
                       <li> <input type="radio" name="Expectations" value="Regular Income"> Regular Inc</li>
                        <li><input type="radio" name="Expectations" value="Capital Appreciation and Regular Income"> Capital Appreciation and Regular Income</li>
                         <li> <input type="radio" name="Expectations" value="If any other specific goal please specify"> If any other specific goal please specify required
                         <input type="text" name="other_specification" class="form-control" > 
                         </li>
                    </ul>
                  </div>
              </div>
               <div class="col-md-4 col-sm-4">
                  <label>(3) <b>Proposed Investment Amount? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="Proposed_investment" value="0-3"> 0-1 Lacs</ins></li>
                       <li> <input type="radio" name="Proposed_investment" value="1-3"> 1-3 Lacs</ins></li>
                        <li> <input type="radio" name="Proposed_investment" value="3-5"> 3-5 Lacs</ins></li>
                         <li> <input type="radio" name="Proposed_investment" value="5>0"> 5>0 Lacs</ins></li>
                    </ul>
                  </div>
              </div>



              <div class="col-md-4 col-sm-4">
                  <label>(3) <b>Proposed Investment Amount? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="Proposed_investment" value="0-3"> 0-1 Lacs</ins></li>
                       <li> <input type="radio" name="Proposed_investment" value="1-3"> 1-3 Lacs</ins></li>
                        <li> <input type="radio" name="Proposed_investment" value="3-5"> 3-5 Lacs</ins></li>
                         <li> <input type="radio" name="Proposed_investment" value="5>0"> 5>0 Lacs</ins></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label><b>(4) Preferred Investment time horizon</b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="Proposed_investment" value="0-3"> 0-1 Lacs</ins></li>
                       <li> <input type="radio" name="Proposed_investment" value="1-3"> 1-3 Lacs</ins></li>
                        <li> <input type="radio" name="Proposed_investment" value="3-5"> 3-5 Lacs</ins></li>
                         <li> <input type="radio" name="Proposed_investment" value="5>0"> 5>0 Lacs</ins></li>
                    </ul>
                  </div>
              </div>
               <div class="col-md-4 col-sm-4">
                  <label><b>(5) Short term Risk Attitudes</b><br></label>
                  <div class="form-group">
                  <label>(a)Which of these statements would best describe your attitudes about the next three years performance of this investment?</label>
                    <ul> 
                      <li> 
                      <input type="radio" name="Attitudes" value="I don't mind if I lose money"> I don't mind if I lose money</li>
                       <li> <input type="radio" name="Attitudes" value="I can tolerate a loss"> I can tolerate a loss</li>
                        <li> <input type="radio" name="Attitudes" value="I'd have a hard time tolerating any loss"> I'd have a hard time tolerating any loss</li>
                         <li> <input type="radio" name="Attitudes" value="I need to see at least a little return"> I need to see at least a little return</li>
                    </ul>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4">
                  <label>(b) Which of these statements would best describe your attitudes aboutthe next three months performance of this investment?</label>
                  <div class="form-group">
                  
                    <ul> 
                      <li> 
                      <input type="radio" name="Attitudes" value="Who cares? One calendar quarter means nothing."> Who cares? One calendar quarter means nothing.</li>
                       <li> <input type="radio" name="Attitudes" value="I wouldn't worry about losses in that time frame"> I wouldn't worry about losses in that time frame</li>
                        <li> <input type="radio" name="Attitudes" value="If I suffered a loss of greater than 10%, I'd get concerned"> If I suffered a loss of greater than 10%, I'd get concerned</li>
                         <li> <input type="radio" name="Attitudes" value="I can only tolerate small short-term losses"> I can only tolerate small short-term losses</li>
                         <li> <input type="radio" name="Attitudes" value="I'd have a hard time accepting any losses"> I'd have a hard time accepting any losses</li>

                    </ul>
                  </div>
              </div>

               <div class="col-md-4 col-sm-4">
                  <label><b>(6) Annual Income details:-</b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="Income" value="Below 3 lac">Below 3 lac,</li>
                       <li> <input type="radio" name="Income" value="3-5 lac"> 3-5 lac,</ins></li>
                        <li> <input type="radio" name="Income" value="3-5"> 3-5 Lacs</ins></li>
                         <li> <input type="radio" name="Income" value="5>0"> 5>0 Lacs</ins></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(7) <b>What is your sources of Incomes? </b><br></label>
                  <div class="form-group">
                    <ul> 
                    <label>A. Primary Source</label>
                      <li> 
                        <input type="radio" name="sources" value="Salary"> Salary
                      </li>
                      <li>
                        <input type="radio" name="sources" value="Business"> Business
                      </li>
                      <label>B. Secondary Source</label>
                      <li>
                        <input type="radio" name="sources" value="Royalties"> Royalties
                      </li>
                      <li>
                        <input type="radio" name="sources" value="Rental"> Rental
                      </li>
                      <li>
                        <input type="radio" name="sources" value="Dividend"> Dividend
                      </li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(8) <b>Please tick your Occupation:-</b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="checkbox" name="Occupation[]" value="Private sector service">
                      Private sector service"
                       </li>
                       <li><input type="checkbox" name="Occupation[]" value="Government sector">
                        Government sector
                       </li>
                       <li><input type="checkbox" name="Occupation[]" value="Professional">Professional</li>
                       <li><input type="checkbox" name="Occupation[]" value="Retired">Retired</li>
                       <li><input type="checkbox" name="Occupation[]" value="Student">Student</li>
                       <li><input type="checkbox" name="Occupation[]" value="Public sector">Public sector
                       </li>
                       <li>
                         <input type="checkbox" name="Occupation[]" value="Business">Business
                       </li>
                       <li><input type="checkbox" name="Occupation[]" value="Agricultural">Agricultural</li>
                       <li><input type="checkbox" name="Occupation[]" value="Housewife">Housewife</li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(9) <b>How many dependents do you financially support? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                       <input type="radio" name="dependents" value="None"> None </li>
                       <li> <input type="radio" name="dependents" value="1-3"> Between 1-3</li>
                        <li> <input type="radio" name="dependents" value="3-5">   3+</li> </li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(10) <b>What is the size of your emergency fund? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="emergency" value="< 1 month income">< 1 month income</li>
                       <li> <input type="radio" name="emergency" value="1-3 months income"> 1-3 months income</li>
                        <li> <input type="radio" name="emergency" value="3-6 months income"> 3-6 months income</ins></li>
                         <li> <input type="radio" name="emergency" value="> 6 months income"> 6 months income</li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(11) <b>Approx Value of assets held like property, FD, Shares, Mutual Fund etc. </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="Value" value="Below 10 lac"> Below 10 lac,</li>
                       <li> <input type="radio" name="Value" value="10-20 lac"> 10-20 lac</ins></li>
                        <li> <input type="radio" name="Value" value="20-30 lac"> 20-30 lac,</ins></li>
                         <li> <input type="radio" name="Value" value="30-50 lac"> 30-50 lac </ins></li>

                         <li> <input type="radio" name="Value" value=">50 lac"> >50 lac </ins></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(12) <b>Market Value of portfolio held </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="market" value="> 3 lacs"> < 3 Lacs</ins></li>
                       <li> <input type="radio" name="market" value="3-5 lacs"> 3-5 Lacs</ins></li>
                        <li> <input type="radio" name="market" value="5-10 lacs"> 5-10 Lacs</ins></li>
                         <li> <input type="radio" name="market" value="> 10 lacs"> > 10 Lacs</ins></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(13) <b> Please list your major financial obligations and planned expenditures.

</b><br></label>

                  <div class="form-group">
                  <label>Present (within the next 2 years)</label>
                     <p>major (required) </p>
                     <input type="text" class="form-control" name="goal">
                     <p>major (required) </p>
                     <input type="text" class="form-control" name="goal">
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(14) <b> What percentage of Annual income is allocated to pay off debt [all EMIs]? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="percentage" value="None"> None </li>
                      <li><input type="radio" name="percentage" value="0-3"> Less than 20% </li>
                       <li> <input type="radio" name="percentage" value="1-3"> 20-30% </li>
                        <li> <input type="radio" name="percentage" value="3-5"> 30-50% </li>  
                        <li> <input type="radio" name="percentage" value="3-5"> > 50% </li>  
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(15) <b>Investment Experience </b><br></label>
                  <div class="form-group">
                    <ul> 
                        <li> 
                      <input type="radio" name="Investment" value="0-3"> < 1 Years</ins></li>
                       <li> <input type="radio" name="Investment" value="1-3"> 1-3 Years</ins></li>
                        <li> <input type="radio" name="Investment" value="3-5"> 3 > Years</ins></li>  
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(16) <b>Experience in market products </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> <input type="radio" name="Experience" value="Commodity"> Commodity</li>
                       <li> <input type="radio" name="Experience" value="Stock"> Stock</li>
                        <li> <input type="radio" name="Experience" value="Derivatives Stocks"> Derivatives Stocks</li>
                         <li> <input type="radio" name="Experience" value="None of the above"> None of the above</li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(17) <b>What is your experience with equity investments? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="equity" value="Extensive"> Extensive</li>
                       <li> <input type="radio" name="equity" value="Moderate"> Moderate</li>
                        <li>
                          <input type="radio" name="equity" value="Very less"> Very less
                        </li>
                         <li> <input type="radio" name="equity" value="No experience"> No experience</li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(18) <b>What is your experience with Commodity investments? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="Commodity" value="Extensive"> Extensive</li>
                       <li> <input type="radio" name="Commodity" value="Moderate"> Moderate</li>
                        <li>
                          <input type="radio" name="Commodity" value="Very less"> Very less
                        </li>
                         <li> <input type="radio" name="Commodity" value="No experience"> No experience</li>
                    </ul>
                  </div>
              </div>

              <br><br>
            <div class="col-md-12">
              <p> <br><br>
              <input type="checkbox"  checked="" name="term_conditions"  required="" value="true"> 
              I have read and agreed to the terms and conditions of this questionnaire
              </p>
              <button class="btn_common yellow border_radius" id="btn_submit">Submit</button>
            </div>
          </div>
        </form>
       
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
    
  </style>
</section>
@stop