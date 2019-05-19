
<div class="col-md-12">

             @if(Session::has('flash_alert_notice2')) 
            
                <div class="alert alert-success">    {{ Session::get('flash_alert_notice2') }} </div>
            @endif
    
     <div class="form-group{{ $errors->first('blog_title', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label"> Blog Title <span class="error">*</span></label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::text('blog_title',null, ['class' => 'form-control form-cascade-control input-small'])  !!} 
            <span class="label label-danger">{{ $errors->first('blog_title', ':message') }}</span>
           
        </div>
    </div> 
 

     <div class="form-group{{ $errors->first('blog_description', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label">Blog Description</label>
        <div class="col-lg-8 col-md-8"> 
            {!! Form::textarea('blog_description',null, ['class' => 'form-control ckeditor form-cascade-control input-small'])  !!}
            <span class="label label-danger">{{ $errors->first('blog_description', ':message') }}</span>
            @if(Session::has('flash_alert_notice')) 
            <span class="label label-danger">

                {{ Session::get('flash_alert_notice') }} 

            </span>@endif
        </div>
    </div> 
    

<hr> <center> <b> Image  (minimum size : 200x250) </b> </a><hr>
     <div class="form-group{{ $errors->first('blog_image', ' has-error') }}">
        <label class="col-lg-2 col-md-2 control-label">Image </label>
        <div class="col-lg-8 col-md-8">  

             {!! Form::file('blog_image',null,['class' => 'form-control form-cascade-control input-small'])  !!}
             <br>
              @if(isset($blog->blog_image))
              <img src="{!! Url::to('storage/blog/'.$blog->blog_image) !!}" width="150px">
              @endif                                   
            <span class="label label-danger">{{ $errors->first('blog_image', ':message') }}</span>
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

            <a href="{{url('admin/blog')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div> 
