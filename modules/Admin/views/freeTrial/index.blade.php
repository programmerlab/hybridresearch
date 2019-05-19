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
                <div class="col-md-12">
                    <div class="portlet light portlet-fit bordered">
                        <div class="panel-body ">
                            <div class="row">
                                <div class="box">
                                    <div class="box-header">
                                        <div class="table-toolbar">
                                        <div class="row">
                                            <form action="{{url('admin/freeTrial')}}" method="get" id="filter_data">
                                             
                                            <div class="col-md-3">
                                                <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="Search " type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="{{ url('admin/freeTrial') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                          <div class="col-md-2">
                                             <a class="btn btn-info" href="{{ url('donwloadFreeTrial') }}"> Download All FreeTrial Data </a>
                                        </div>
                                       
                                        </div>
                                    </div>
                                        
                                        
                                    </div><!-- /.box-header -->
<hr>
                                    
                                    @if(Session::has('flash_alert_notice'))
                                         <div class="alert alert-success alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                          <i class="icon fa fa-check"></i>  
                                         {{ Session::get('flash_alert_notice') }} 
                                         </div>
                                    @endif
                                      
                                     <div class="portlet-body">
                                    
         
        <table class="table table-striped table-hover table-bordered" id="contact">
            <thead>
                <tr>
                 <th>   Sno </th>  
                    <th> Name </th>
                    <th> Email </th> 
                    <th> Phone </th>
                    <th> City </th>
                    <th> Service Name </th>    
                    <th>Created date</th> 
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
            @foreach($freeTrial as $key => $result)
                <tr>
                 <th> {{++$key}} </th>
                    <td> {{$result->name}} </td>
                     <td> {{!empty($result->email)?$result->email:'NA'}} </td>
                     <td> {{$result->phone}} </td> 
                     <td> {{$result->city}} </td> 
                     <td> {{!empty($result->service_name)?$result->service_name:'NA'}} </td>  
                         <td>
                            {!! Carbon\Carbon::parse($result->created_at)->format('d-M-Y'); !!}
                        </td>
                        
                        <td> 
                            
                            {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('freeTrial.destroy', $result->id))) !!}
                            <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                            
                             {!! Form::close() !!}

                        </td>
                   
                </tr>
               @endforeach
                
            </tbody>
        </table>
       

         <div class="center" align="center">  {!! $freeTrial->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div> 
        <!-- Main row --> 
    </section><!-- /.content -->
</div> 

@stop
