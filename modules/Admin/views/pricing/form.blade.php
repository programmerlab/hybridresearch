
<div class="col-md-10">

    
    <div class="form-group{{ $errors->first('title', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Service Name <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('title', ':message') }}</span>
        </div>
    </div>  
    
    <div class="form-group{{ $errors->first('monthly_price', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Monthly Price <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::number('monthly_price',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('monthly_price', ':message') }}</span>
        </div>
    </div>  
    
     <div class="form-group{{ $errors->first('quarterly_price', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Quaterly Price <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::number('quarterly_price',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('quarterly_price', ':message') }}</span>
        </div>
    </div>  
    
    <div class="form-group{{ $errors->first('half_yearly_price', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Halfyearly Price <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::number('half_yearly_price',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('half_yearly_pric', ':message') }}</span>
        </div>
    </div>  
     <div class="form-group{{ $errors->first('yearly_price', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Yearly Price <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::number('yearly_price',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('yearly_price', ':message') }}</span>
        </div>
    </div>  
  
  


      <div class="form-group{{ $errors->first('tax', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> GST tax (%)</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::number('tax',0, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!} 
            <span class="label label-danger">{{ $errors->first('tax', ':message') }}</span>
        </div>
    </div> 

    <div class="form-group{{ $errors->first('description', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Service Description</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('description', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 

 
     <div class="form-group{{ $errors->first('photo', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Service Image</label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('photo',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
             @if(!empty($product->photo))
                 <img src="{!! Url::to('storage/pricing/'.$product->photo) !!}" width="100px">
                 <input type="hidden" name="photo" value="{!! $product->photo !!}">
             @endif                                       
            <span class="label label-danger">{{ $errors->first('photo', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 
    
    
      <div class="form-group{{ $errors->first('features', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Feature </label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('features',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('features', ':message') }}</span>
        </div>
    </div> 
    <div class="form-group{{ $errors->first('payment_url', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Payment url </label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('payment_url',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('payment_url', ':message') }}</span>
        </div>
    </div> 
     
    
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('product')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
