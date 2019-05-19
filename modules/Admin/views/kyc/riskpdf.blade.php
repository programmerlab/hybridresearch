
            <style type="text/css">
                table {
                        border-collapse: collapse;
                    }

                    table, th, td {
                        border: 1px solid black;
                        padding-left: 5px;
                    }
            </style>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
             <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD--> 
                    <h3> <center>Research Infotech</center></h3>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <hr>
                                        <span class="caption-subject font-red sbold uppercase">Risk Profiling </span>
                                        <p>Name: <b>{{ $data->full_name }} </b></p>
                                    </div>
                                        
                                </div>
                                  
                                <div class="portlet-body2"> 

                                    <table class="table" id="contact" style="width: 100%" border="1px"  text-align="left">
                                        <thead>
                                        @if(isset($riskProfile) && $riskProfile!=null)
                                            @foreach($riskProfile as $key => $result)

                                                @if($key=="full_name") 
                                                @elseif($key=="term_conditions" || $key=="Score" || $key=="score" || $key=='total_score' || $key=='risk')
                                                <?php  continue; ?>
                                                @elseif($key=='Other_Expectations' && $result=="" || $key=='other_specification' && $result=="")
                                                   <?php continue; ?>
                                                @else
                                                <tr>
                                                    <td> {{ucfirst(str_replace('_',' ',$key))}}</td>  
                                                    <td> @if(is_array($result)) {{ implode(',',$result)}}@else{{ ucfirst($result)}} @endif  </td> 
                                                    <td> @if(isset($score_point->$key)) {{ $score_point->$key }} @elseif($key=='total_score' || $key=='risk' || $key=='score')  @endif  

                                                     </td> 
                                                </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        </thead>                                        
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                    <div class="score">
                    <p >Total Score :  @if($data->total_score=='NaN' && $data->risk=='Medium') Below 330 @elseif($data->total_score=='NaN' && $data->risk=='High')   Above 330 @elseif($data->total_score!='NaN')    {{ $data->total_score  }} @endif</p> 
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
                                    Stock Future ,
                                    Stock Future HNI,
                                    PSP<br>
                                </td>
                            </tr>
                        </table> 
                         <p>
                         Result : @if($data->total_score<=330 && $data->total_score!='NaN') <span style="color: green; font-weight: bold;"> Medium</span>     @elseif($data->total_score>330 && $data->total_score!='NaN') <span style="color: red;font-weight: bold;">High</span> 
                         @elseif($data->total_score=='NaN' && $data->risk=='Medium')  <span style="color: green; font-weight: bold;"> Medium</span>  @elseif($data->total_score=='NaN' && $data->risk=='High')    <span style="color: red;font-weight: bold;">High</span> 
                         @endif Risk 
                         </p>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            
            
            <!-- END QUICK SIDEBAR -->
        </div>
        
    