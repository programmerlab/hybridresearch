
<div class="col-md-12">

             @if(Session::has('flash_alert_notice2')) 
            
                <div class="alert alert-success">    {{ Session::get('flash_alert_notice2') }} </div>
            @endif
    
     <div class="form-group{{ $errors->first('question', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label"> Question <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('question',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('question', ':message') }}</span>
           
        </div>
    </div> 
 

     <div class="form-group{{ $errors->first('answer', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label">Answer</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('answer',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('answer', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 
    
  
      
    
    <div class="form-group">
        <label class="col-lg-2 col-md-2 control-label"></label>
        <div class="col-lg-8 col-md-8">

            {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{url('admin/faq')}}">
            {!! Form::button(' Back ', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
