@extends('packages::layouts.master') 
    @section('content') 
      @include('packages::partials.main-header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('packages::partials.main-sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper"> 
       @include('packages::partials.breadcrumb')
        <!-- Main content -->
          <section class="content">
            <!-- Small boxes (Stat box) -->
              <div class="row">
                  <div class="col-md-12">
                       <div class="panel panel-cascade">
                          <div class="panel-body ">
                              <div class="row">  

                                {!! Form::model($faq, ['method' => 'PATCH', 'route' => ['faq.update', $faq->id],'class'=>'form-horizontal','id'=>'users_form','files' => true]) !!}
                                    @include('packages::faq.form', compact('faq'))
                                {!! Form::close() !!}
                              </div>
                          </div>
                    </div>
                </div>            
              </div>  
            <!-- Main row --> 
          </section><!-- /.content -->
      </div> 
       <style>
          .panel {
  background-color: #fff;
  border: 0px solid #ccc;
  border-radius: 0px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  margin-bottom: 20px;
}
      </style>
@stop