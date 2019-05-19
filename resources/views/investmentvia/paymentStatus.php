
@extends('layouts.master')
@section('title', 'HOME')

@section('header') 
@stop
@section('content')
@include('partials/menu')
 
<!--Page Header-->
@include('partials/titlebar')
<!--Page Header-->


<!--SERVICE SECTION-->
<section id="faq" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
         <h2 class="heading heading_space wow fadeInDown"><span>{{ucfirst($title)}}</span><span class="divider-left"></span></h2>   
          <div class="faq_content wow fadeIn" data-wow-delay="400ms">
                 <div class="alert alert-success">{{$msg}}</div>
        </div>

          <center>
            <table width='100%' cellpadding='0' cellspacing="0" ><tr><th width='90%'>&nbsp;</th></tr></table>
              <center><h3>Response</H3></center>
                <table width="600" cellpadding="2" cellspacing="2" border="0">
                    <tr>
                        <th colspan="2">Transaction Details</th>
                    </tr>
                  <?php
                      foreach( $response as $key => $value) {
                        if($key=='secureHash' || $key=='deliveryPhone'){
                            continue;
                        }
                  ?>      
                          <tr>
                              <td class="fieldName" width="50%"><?php echo $key; ?></td>
                              <td class="fieldName" align="left" width="50%"><?php echo $value; ?></td>
                          </tr>
                  <?php
                      }
                  ?>    
              </table>

            <table width='100%' cellpadding='0' cellspacing="0" ><tr><th width='90%'>&nbsp;</th></tr></table>
            </center>

      </div>
    </div>
  </div>
</section>
 
 @stop