
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
                <h2 class="heading heading_space"><span>Checkout </span><span class="divider-left"></span></h2>
                <div class="box-body table-responsive no-padding">
                    @if( $errors->count() && $errors->first('total_amount', ':message'))
                        <div class="alert alert-danger">Amount can't be less than 1 INR</div>
                    @endif   
                    {!! Form::open(['url' => url('paymentConfirm/'.str_slug($serviceName)), 'method' => 'post','class'=>'form-inline findus','id'=>'frmTransaction','name'=>'frmTransaction',"onSubmit"=>"return validate()"]) !!}
                            
                    
                <input name="account_id" type="hidden" value="27682" />
                <input type="hidden" name="mode" value="LIVE">  
                <input name="reference_no" type="hidden" value="2018" />
                <input name="channel" type="hidden" value="0" />
                <input name="display_currency_rates" type="hidden" value="1" />
                <input name="payment_option" type="hidden" value="" />
                <input name="bank_code" type="hidden" value="" />
                <input name="emi" type="hidden" value="" />
                <input name="page_id" type="hidden" value="" />
                <input name="return_url" type="hidden" size="1000" value="{{url('payment/response')}}" />
                <input name="country" type="hidden" value="IND" />
                <input name="ship_name" type="hidden" value="Shipping Name" />
                <input name="ship_address" type="hidden" value="Shipping Address" />

                <input name="ship_city" type="hidden" value="indore" />
                <input name="ship_state" type="hidden" value="mp" />
                <input name="ship_postal_code" type="hidden" value="600000" />   
                <input name="ship_country" type="hidden" value="IND" />
                <input name="ship_phone" type="hidden" value="" />
                <input name="card_brand" type="hidden" value="0" />
                <input name="display_currency" type="hidden" value="INR" />

                
                


    <h3>EBS Payment</h3>
    <br>
    <table width="100%" cellpadding="2" cellspacing="2" border="0" class="table table-striped table-hover table-bordered">
        <tr >
            <th colspan="2">Transaction Details</th>
        </tr>
        
      
        <tr>
            <td class="fieldName" ><span class="error">*</span> Sale Amount</td>
            <td  align="left" > <input name="amount" type="text" value="{{ intVal($amount) }}.00" class="form-control" /></td>
        </tr>
        <tr>
        <td class="fieldName"><span class="error">*</span>Currency</td>
        <td align="left"><select name="currency" class="form-control" >
                <option value="INR">INR</option>
                <option value="USD">USD</option>
                </select></td>
        </tr>
        <tr style="display: none;" >
            <td class="fieldName">Additional Currency</td>
            <td align="left"><select name="display_currency" class="form-control" >
                <option value="INR" selected>INR</option>
                <option value="USD" >USD</option>  

            </select></td>
        </tr>
         
        <tr>
            <td class="fieldName" ><span class="error">*</span> Description</td>
            <td  align="left" > <input name="description" type="text" class="form-control" value="Payment regarding Stocks" /></td>
        </tr>
        
        
        <tr>
            <td class="fieldName">Payment Mode</td>
            <td align="left">
                <select name="payment_mode" class="form-control" >
                <option value="0" selected="">All</option>
                <option value="3" >Net Banking</option>
                <option value="1">Credit Card</option>
                <option value="2">Debit Card</option>
                <option value="4">Cash Card</option>
                <option value="5">Credit Card - EMI</option> 
                <option value="6">Credit Card - Reward Point</option>
                <option value="7">Paypal</option>
            </select>
            </td>
        </tr>
        <tr style="display: none;">
            <td class="fieldName">Card Brand</td>

            <td align="left">
                <select name="card_brand" class="form-control" >
                <option value="">All</option>   
                <option value="1">VISA</option>
                <option value="2">MasterCard</option>
                <option value="3">Maestro</option>
                <option value="4">Diners Club</option>

                <option value="5">American Express</option>
                <option value="6">JCB</option>
            </select>
            </td>
        </tr>
         
         
        
 
        <tr>
            <th colspan="2">Billing Address</th>

        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span> Name</td>
            <td align="left">
                <input name="name" type="text" class="form-control" value="" placeholder="Enter Name" required="" /></td>
        </tr>
       
        <tr>

            <td class="fieldName"><span class="error">*</span>Address</td>
            <td align="left">
                <textarea name="address" placeholder="Billing Address" class="form-control" required="" ></textarea>
            </td>
        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span>City</td>

            <td align="left">
                <input name="city" type="text" value="" class="form-control"  placeholder="Billing City"  required="" />
            </td>
        </tr>

        <tr>
            <td class="fieldName">State/Province</td>
            <td align="left">
               <input name="state" type="text" value="" class="form-control" placeholder="Billing State" required="" /> 
            </td>
        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span>ZIP/Postal Code</td>
            <td align="left">
                <input name="postal_code" type="text" value="" class="form-control" placeholder="ZIP/Postal Code" required="" />
            </td>
        </tr>
 

        <tr>
            <td class="fieldName"><span class="error">*</span>Email</td>
            <td align="left">
                <input name="email" type="text" value="test@gmail.com" class="form-control" />
            </td>
        </tr>

        <tr>
            <td class="fieldName">Phone/Mobile</td>
            <td align="left"><input name="phone" type="text" value="9999999999" class="form-control" /></td>
        </tr> 

        <tr>

        <td valign="top" align="center" colspan="2">
                <input name="submitted" value="Submit" type="submit" class="btn btn-primary" />&nbsp; 
                 
                    <input value="Reset" type="reset" class="btn btn-primary" />
                            </td>
        </tr>
    
        <tr>
            <td valign="top" align="center" colspan="2">
                <span class="error">*</span> 
                <span>denotes required field</span>
            </td>
        </tr>
    </table>     


                    {!! Form::close()!!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>

{!!$jsUrl1!!}
{!!$jsUrl2!!}

</section>
@stop