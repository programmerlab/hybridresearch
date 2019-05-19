
<div class="col-md-12">

             @if(Session::has('flash_alert_notice2')) 
            
                <div class="alert alert-success">    {{ Session::get('flash_alert_notice2') }} </div>
            @endif
    
     <div class="form-group{{ $errors->first('title', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label"> File Title <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('title', ':message') }}</span>
           
        </div>
    </div>  
    
 
     <div class="form-group{{ $errors->first('files', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label">Upload Track Sheet File* </label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('files',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
              @if(isset($trackSheet->files))
              <a href="{!! Url::to('storage/files/'.$trackSheet->files) !!}" target="_blank">View File </a>
              @endif                                   
            <span class="label label-danger">{{ $errors->first('files', ':message') }}</span>
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

            <a href="{{route('trackSheet')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
