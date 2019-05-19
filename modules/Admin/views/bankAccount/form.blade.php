
<div class="col-md-6">

    <div class="form-group{{ $errors->first('bank_name', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label"> Bank Name <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('bank_name',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('bank_name', ':message') }}</span>
        </div>
    </div> 

    <div class="form-group{{ $errors->first('account_name', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Account Holder Name</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('account_name',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('account_name', ':message') }}</span>
        </div>
    </div>

    <div class="form-group{{ $errors->first('account_number', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Account Number</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('account_number',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('account_number', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div>
    
    <div class="form-group{{ $errors->first('ifsc_code', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">IFSC Code</label>
        <div class="col-lg-8 col-md-8">   
             {!! Form::text('ifsc_code',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('ifsc_code', ':message') }}</span>
        </div>
    </div> 
    
    <div class="form-group{{ $errors->first('bank_branch', ' has-error') }}">
        <label class="col-lg-4 col-md-4 control-label">Bank Branch</label>
        <div class="col-lg-8 col-md-8">   
           {!! Form::text('bank_branch',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('bank_branch', ':message') }}</span>
        </div>
    </div> 
     
    
    <div class="form-group">
        <label class="col-lg-4 col-md-4 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('user')}}">
            {!! Form::button('bankAccount', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 