@extends('layouts.master')
    @section('title', 'HOME')
    @section('header')
@stop
@section('content') 
    @include('partials/menu')

    <!--Page Header-->
    @include('partials/titlebar')
    <!--Page Header-->
    <style type="text/css">
      li span{
         float: right; 
         margin-right: 50px;"
      }
    </style>

<!--SERVICE SECTION-->
<section id="contact" class="padding">
    <div class="container">
        <div class="row padding-bottom">
            <div class="col-md-12 wow fadeInRight animated" data-wow-delay="500ms" style="visibility: visible; animation-delay: 4500ms; animation-name: fadeInRight;">
            <h2 class="heading heading_space"  style="margin-top: 20px;"> <span> {{$title}} </span>  <span class="divider-left"></span></h2>

            @if ($errors->any())
               {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif

            <p style="color:green; font-weight: 700"> Research Infotech Investment Advisory </p>

            <form class="form-inline findus" id="contact-form" action="{{url('riskProfiling')}}" method="post" >
                <div class="row">
                    <div class="col-md-12">
                        <div id="result"></div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-md-4 col-sm-4">
                        <label>Full Name (required)</label>
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name (required)" name="full_name" id="full_name" required="required">
                    </div>
                </div>
                  
                <div class="col-md-4 col-sm-4">
                    <label>Services</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Services" name="services" id="services" required="">
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <label>Risk Capacity</label>
                    <div class="form-group">
                        <input type="text" disabled="" class="form-control" placeholder="Risk Capacity"  name="risk_capacity" id="risk_capacity">
                    </div>
                </div> 
             
            <div class="col-md-12"> 
            
            <div class="col-md-4 col-sm-4">
                <label>(1) <b>What is your current age?</b><br></label>
                <div class="form-group">
                    <ul> 
                        <li> <input type="radio" name="age" value="0-25"  data_value="40" id="age"> Less than 25</ins> <span>40</span></li>
                        <li> <input type="radio" name="age" value="25-45" data_value="30" id="age"> 25-45</ins> <span>30</span></li>
                        <li> <input type="radio" name="age" value="45-55" data_value="20" id="age"> 45-55</ins> <span>20</span></li>
                        <li> <input type="radio" name="age" value="55-100" data_value="10" id="age"> Above 55</ins> <span>10</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <label class="control-label">(2) <b> Goal and Expectations </b> <br></label>
                <div class="form-group">
                    <ul> 
                        <li> <input type="radio" name="Expectations" value="Capital Appreciation"  data_value="0" id="Expectations"> Capital Appreciation <span>0</span></li>
                        <li> <input type="radio" name="Expectations" value="Regular Income"   data_value="20" id="Expectations"> Regular Inc <span>20</span></li>
                        <li><input type="radio" name="Expectations" value="Capital Appreciation and Regular Income" data_value="10" id="Expectations"> 
                        Capital Appreciation and Regular Income <span>10</span> </li> <br>
                        <li> <input type="radio" name="Expectations" value="If any other specific goal please specify" data_value="0" id="Expectations"> If any other specific goal please specify required
                        <input type="text" name="Other_Expectations" class="form-control" value=""> 
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <label>(3) <b>Proposed Investment Amount? </b><br></label>
                <div class="form-group">
                    <ul> 
                        <li> 
                          <input type="radio" name="Proposed_investment" value="0-3"  data_value="10" id="Proposed_investment"> 0-1 Lacs</ins><span>10
                          </span> 
                        </li>
                        <li> <input type="radio" name="Proposed_investment" value="1-3"  data_value="20" id="Proposed_investment"> 1-3 Lacs</ins><span>20
                        </span> </li>
                        <li> <input type="radio" name="Proposed_investment" value="3-5" data_value="30" id="Proposed_investment"> 3-5 Lacs</ins><span>30
                        </span> </li>
                        <li> <input type="radio" name="Proposed_investment" value="5>0"  data_value="40" id="Proposed_investment">Above 5 Lacs</ins><span>40
                        </span>   
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
              <label>(4) <b>Market Value of portfolio held </b><br></label>
                <div class="form-group">
                    <ul> 
                        <li> 
                            <input type="radio" name="market_value" value="0-3"  data_value="10" id="market_value"> 0-1 Lacs</ins>  <span>10</span> </li>
                        <li> 
                            <input type="radio" name="market_value" value="1-3" data_value="20" id="market_value"> 1-3 Lacs</ins>  <span>20</span> </li>
                        <li> 
                            <input type="radio" name="market_value" value="3-5" data_value="30" id="market_value"> 3-5 Lacs</ins>  <span>30</span> </li>
                        <li> 
                            <input type="radio" name="market_value" value="5>0" data_value="40" id="market_value">Above 5 Lacs</ins>  <span>40</span> </li>
                    </ul>
                </div>
            </div>


                 <div class="col-md-4 col-sm-4">
                  <label><b>(5) Short term Risk Attitudes</b><br></label>
                  <div class="form-group">
                  <label>(a)Which of these statements would best describe your attitudes about the next three years performance of this investment?</label>
                    <ul> 
                      <li> 
                      <input type="radio" name="Short_term_Risk_Attitudes" value="I don't mind if I lose money" data_value="40" id="Short_term_Risk_Attitudes"> I don't mind if I lose money
                      <span>40</span></li>
                       <li> <input type="radio" name="Short_term_Risk_Attitudes" value="I can tolerate a loss" data_value="30" id="Short_term_Risk_Attitudes"> I can tolerate a loss
                        <span>30</span></li>
                        <li> <input type="radio" name="Short_term_Risk_Attitudes" value="I'd have a hard time tolerating any loss" data_value="10" id="Short_term_Risk_Attitudes"> I'd have a hard time tolerating any loss<span>10</span></li>
                         <li> <input type="radio" name="Short_term_Risk_Attitudes" value="I need to see at least a little return" data_value="20" id="Short_term_Risk_Attitudes"> I need to see at least a little return <span>20</span></li>
                    </ul>
                  </div>
              </div>

               <div class="col-md-4 col-sm-4">
                  <label>(6) Annual Income details:-</b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> <input type="radio" name="Income" value="Below 3 lac"  data_value="10" id="Income">    Below 3 lacs    <span>10</span> </li>
                      <li> <input type="radio" name="Income" value="3-7 lac"      data_value="20" id="Income">    3-7 lacs        <span>20</span> </ins></li>
                      <li> <input type="radio" name="Income" value="7-15 lac"     data_value="30" id="Income">    7-15 Lacs       <span>30</span> </ins></li>
                      <li> <input type="radio" name="Income" value="Above 15 lac" data_value="40" id="Income">    Above 15 Lacs   <span>40</span> </ins></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(7) <b>What is your sources of Incomes? </b><br></label>
                  <div class="form-group">
                    <ul> 
                    <label>A. Primary Source</label>
                      <li> 
                        <input type="radio" name="sources" value="Salary"  data_value="0" id="sources"> Salary
                      </li>
                      <li>
                        <input type="radio" name="sources" value="Business" data_value="0" id="sources"> Business
                      </li>
                      <label>B. Secondary Source</label>
                      <li>
                        <input type="radio" name="sources" value="Royalties" data_value="0" id="sources"> Royalties
                      </li>
                      <li>
                        <input type="radio" name="sources" value="Rental" data_value="0" id="sources"> Rental
                      </li>
                      <li>
                        <input type="radio" name="sources" value="Dividend" data_value="0" id="sources"> Dividend
                      </li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(8) <b>Please tick your Occupation:-</b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="checkbox" name="Occupation[]" value="Private sector service" data_value="0">
                      Private sector service"
                       </li>
                       <li><input type="checkbox" name="Occupation[]" value="Government sector" data_value="0">
                        Government sector
                       </li>
                       <li><input type="checkbox" name="Occupation[]" value="Professional" data_value="0">Professional</li>
                       <li><input type="checkbox" name="Occupation[]" value="Retired" data_value="0">Retired</li>
                       <li><input type="checkbox" name="Occupation[]" value="Student" data_value="0">Student</li>
                       <li><input type="checkbox" name="Occupation[]" value="Public sector">Public sector
                       </li>
                       <li>
                         <input type="checkbox" name="Occupation[]" value="Business" data_value="0">Business
                       </li>
                       <li><input type="checkbox" name="Occupation[]" value="Agricultural" data_value="0">Agricultural</li>
                       <li><input type="checkbox" name="Occupation[]" value="Housewife" data_value="0">Housewife</li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(9) <b>How many dependents do you financially support? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                       <input type="radio" name="dependents" value="None" data_value="20" id="dependents" data_value="20" id="dependents"> None <span>20</span></li>
                       <li> <input type="radio" name="dependents" value="1-3" data_value="10" data_value="10" id="dependents"> Between 1-3<span>10</span></li>
                        <li> <input type="radio" name="dependents" value="3-5" data_value="0" data_value="0" id="dependents">   3+</li> <span>0</span></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(10) <b>What is the size of your emergency fund? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="emergency" value="< 1 month income" data_value="10" id="emergency">< 1 month income<span>10</span></li>
                       <li> <input type="radio" name="emergency" value="1-3 months income" data_value="20" id="emergency"> 1-3 months income<span>20</span></li>
                        <li> <input type="radio" name="emergency" value="3-6 months income" data_value="30" id="emergency"> 3-6 months income</ins><span>30</span></li>
                         <li> <input type="radio" name="emergency" value="> 6 months income" data_value="40" id="emergency"> 6 months income<span>40</span></li>
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(11) <b>Approx Value of assets held like property, FD, Shares, Mutual Fund etc. </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="ValApprox_value_of_assets" value="Below 10 lac" data_value="10" id="Approx_value_of_assets"> Below 10 lac<span>10</span></li>
                       <li> <input type="radio" name="Approx_value_of_assets" value="10-30 lac" data_value="20" id="Approx_value_of_assets"> 10-30 lac</ins><span>20</span></li>
                         <li> <input type="radio" name="Approx_value_of_assets" value="30-50 lac" data_value="30" id="Approx_value_of_assets"> 30-50 lac </ins><span>30</span></li> 
                         <li> <input type="radio" name="Approx_value_of_assets" value=">50 > lac" data_value="40" id="Approx_value_of_assets"> Above  50  lac </ins><span>40</span></li>
                    </ul>
                  </div>
              </div>


               <div class="col-md-4 col-sm-4">
                  <label>(12) <b> What percentage of Annual income is allocated to pay off debt [all EMIs]? </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> 
                      <input type="radio" name="percentage" value="None"  data_value="10" id="percentage"> None <span>10</span> </li>
                      <li><input type="radio" name="percentage" value="< 20 %" data_value="30" id="percentage"> Less than 20% <span>30</span></li>
                       <li> <input type="radio" name="percentage" value="20-50%" data_value="20" id="percentage"> 20-50% <span>20</span></li> 
                        <li> <input type="radio" name="percentage" value="> 50%" data_value="10" id="percentage"> > 50% <span>10</span></li>  
                    </ul>
                  </div>
              </div>
            

             

              <div class="col-md-4 col-sm-4">
                  <label>(13)  Investment Experience </b><br></label>
                  <div class="form-group">
                    <ul> 
                        <li> 
                      <input type="radio" name="Investment" value="0-3" data_value="10" id="Investment"> < 1 Years</ins> <span>10</span></li>
                       <li> <input type="radio" name="Investment" value="1-3" data_value="20" id="Investment"> 1-3 Years</ins> <span>20</span></li>
                        <li> <input type="radio" name="Investment" value="3-5" data_value="30" id="Investment"> 3 > Years</ins> <span>30</span></li>  
                    </ul>
                  </div>
              </div>

              <div class="col-md-4 col-sm-4">
                  <label>(14)  Experience in market products </b><br></label>
                  <div class="form-group">
                    <ul> 
                      <li> <input type="radio" name="Experience" value="Commodity" data_value="20" id="Experience"> Commodity <span>20</span></li>
                       <li> <input type="radio" name="Experience" value="Stock" data_value="10" id="Experience"> Stock <span>10</span></li>
                        <li> <input type="radio" name="Experience" value="Derivatives Stocks" data_value="20" id="Experience"> Derivatives Stocks <span>20</span></li>
                         <li> <input type="radio" name="Experience" value="None of the above" data_value="0" id="Experience"> None of the above <span>0</span></li>
                           <li> <input type="radio" name="Experience" value="All" data_value="30" id="Experience"> All <span>30</span></li>
                    </ul>
                  </div>
              </div>

                    <div class="col-md-4 col-sm-4">
                        <label>(15) <b>What is your experience with equity investments? </b><br></label>
                        <div class="form-group">
                            <ul> 
                                <li> 
                                    <input type="radio" name="equity" value="Extensive" data_value="0" id="equity"> Extensive</li>
                                <li> 
                                    <input type="radio" name="equity" value="Moderate" data_value="0" id="equity"> Moderate
                                </li>
                                <li>
                                    <input type="radio" name="equity" value="Very less" data_value="0" id="equity"> Very less
                                </li>
                                <li> <input type="radio" name="equity" value="No experience" data_value="0" id="equity"> No experience</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <label>(16) <b>What is your experience with Commodity investments? </b><br></label>
                        <div class="form-group">
                            <ul> 
                                <li> 
                                    <input type="radio" name="Commodity" value="Extensive" data_value="0" id="Commodity"> Extensive
                                </li>
                                <li> 
                                    <input type="radio" name="Commodity" value="Moderate" data_value="0" id="Commodity"> Moderate
                                </li>
                                <li>
                                    <input type="radio" name="Commodity" value="Very less" data_value="0" id="Commodity"> Very less
                                </li>
                                <li> 
                                    <input type="radio" name="Commodity" value="No experience" data_value="0" id="Commodity"> No experience
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4">
                        <label>(17)  <b>What is your capacity and willingness to take risk? </b><br></label>
                        <div class="form-group">
                            <ul> 
                                <li> 
                                    <input type="radio" name="capacity_willingness" value="High" data_value="20" id="capacity_willingness"> High <span>20</span>
                                </li>
                                <li> 
                                    <input type="radio" name="capacity_willingness" value="Medium"  data_value="10" id="capacity_willingness">   Medium   
                                    <span>10</span>    
                                </li>
                                <li>
                                    <input type="radio" name="capacity_willingness" value="Low" data_value="0" id="capacity_willingness"> Low<span>0</span>
                                </li> 
                            </ul>
                        </div>
                    </div> 

                    <div class="col-md-4 col-sm-4">
                        <label>(18) <b>What is your practice on saving money? </b><br></label>
                        <div class="form-group">
                            <ul> 
                                <li> 
                                    <input type="radio" name="practice_on_saving_money" value="I don't believe in saving" data_value="0" id="practice_on_saving_money"> 
                                    I don't believe in saving <span>0</span></li>
                                <li> 
                                    <input type="radio" name="practice_on_saving_money" value=" I'd like to save, but my expenses and other financial commitments do not permit me to" data_value="10" id="practice_on_saving_money">  
                                    I'd like to save, but my expenses and other financial commitments do not permit me to.    
                                    <span>10</span>    </li>
                                <li>
                                    <input type="radio" name="practice_on_saving_money" value="I try to save whenever and wherever possible" data_value="20" id="practice_on_saving_money">   
                                    I try to save whenever and wherever possible.                                                       
                                    <span>20</span>
                                </li> 
                                <li>
                                    <input type="radio" name="practice_on_saving_money" value="I save 15 percent or more of my take-home salary without exception less" data_value="30" id="practice_on_saving_money">
                                    I save 15 percent or more of my take-home salary without exception.
                                    <span>30</span>
                                </li> 
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-4">
                        <label>(19) <b>Which would best describe your awareness about finance? </b><br></label>
                        <div class="form-group">
                            <ul> 
                                <li> 
                                    <input type="radio" name="awareness_about_finance" value="I read most of the business and investment magazines and watch business updates on television daily." data_value="30" id="awareness_about_finance">
                                    I read most of the business and investment magazines and watch business updates on television daily. <span>30</span></li> <br>
                                <li> 
                                    <input type="radio" name="awareness_about_finance" value="I read a financial newspaper daily and regularly read at least one specialized business magazine" data_value="20" id="awareness_about_finance">I read a financial newspaper daily and regularly read at least one specialized business magazine <span>20</span>    </li> <br>
                                <li>
                                    <input type="radio" name="awareness_about_finance" value="I often look up the market prices of my shares in the newspaper." data_value="10" id="awareness_about_finance">I often look up the market prices of my shares in the  <span>10</span>newspaper.                                                       
                                </li>  <br>

                                <li>
                                    <input type="radio" name="awareness_about_finance" value="I never read the finance section of the newspaper" data_value="0" id="awareness_about_finance">
                                    I never read the finance section of the newspaper.
                                    <span>0</span>
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <p>
                            <input type="checkbox"  checked="" name="term_conditions"  required="" value="true"> 
                            I have read and agreed to the terms and conditions of this questionnaire
                        </p>
                        <button class="btn_common yellow border_radius" id="btn_submit">Submit</button>
                    </div>
                </div>
                <br>  
                <div class="score">
                    <p >Total Score –  <input type="text"    name="total_score" id="total_score" required="" value="500">  </p>
                    <span>Classification of Services</span>
                        <table border="1" width="100%" cellpadding="15px" cellspacing="15px">
                            <tr>
                                <td>Risk</td>
                                <td>Score</td>
                                <td>Services</td>
                            </tr>
                            <tr>
                                <td> <span class="Medium">Medium</span> <input type="hidden"    name="risk" id="risk"  value=""> 
                                <input type="hidden"    name="score" id="score"  value="0"></td>
                                <td>0-330</td>
                                <td>Intraday Cash and Stock Cash HNI</td>
                            </tr>
                            <tr>
                                <td  > <span class="High">High </span></td>
                                <td>Above 330</td>
                                <td>
                                    Stock Future </br>
                                    Stock Future HNI <br>
                                    PSP<br>
                                </td>
                            </tr>
                        </table> 
                    </div>
                    <input type="hidden" name="score_point"  id="score_point" value="">
                </form>
            </div>
        </div>
    </div>

  
    <style type="text/css">
        table tr td  {
            padding: 5px !important;
        }
        .score{
            border: 3px solid #ccc;padding: 30px;float: left;width: 100%;margin-top: 15px;
        }
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


<script type="text/javascript" src="{{ url('public/assets/js/jquery-2.2.3.js')}}"></script>
<script type="text/javascript">
    var arr =   [];
    var ids =   [];
    var j  =   {};
    jQuery(function($){
        var keyVal=[];
        $('input[type="radio"]').change(function () {
            var total   =  0;
            var data    = $(this).attr('data_value');
            var id      = $(this).attr('id'); 
             
            var a       = ids.indexOf(id);

            j[id]= data;

            if(a==-1){
              
              arr[id]   = data;
            } else{
               
              arr[id]   = data;
            }
            ids.push(id);
           
            var jData = JSON.stringify(j);

            $('#score_point').val(jData); 

            for(n1 in arr){
             total = total+Number(arr[n1]);
            } 
            $('#total_score').val(total);
            $('#score').val(total);
            $('span.Medium').html('Medium').css({"background-color": "#fff", "font-size": "100%"});
            $('span.High').html('High').css({"background-color": "#fff", "font-size": "100%"});
            if(total<=330){
                $('#risk').val('Medium');
                $('#risk_capacity').val('Medium');
                $('span.Medium').html('Medium').css({"background-color": "yellow", "font-size": "100%","font-weight":"bold","padding":"5px"});
            }else{
                $('#risk').val('High');
                $('#risk_capacity').val('High');
                $('span.High').html('High').css({"background-color": "red", "font-size": "100%","font-weight":"bold","padding":"5px"});
            }
        });
  });

</script>
@stop
