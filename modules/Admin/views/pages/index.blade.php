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
                                            <form action="{{route('page')}}" method="get" id="filter_data">
                                             
                                            <div class="col-md-3">
                                                <input value="{{ (isset($_REQUEST['search']))?$_REQUEST['search']:''}}" placeholder="Search " type="text" name="search" id="search" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <input type="submit" value="Search" class="btn btn-primary form-control">
                                            </div>
                                           
                                        </form>
                                         <div class="col-md-2">
                                             <a href="{{ route('page') }}">   <input type="submit" value="Reset" class="btn btn-default form-control"> </a>
                                        </div>
                                       
                                        </div>
                                    </div>
                                        
                                        <div class="col-md-2 pull-right">
                                            <div style="width: 150px;" class="input-group"> 
                                                <a href="{{ route('page.create')}}">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Create Page</button> 
                                                </a>
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
                                      
                                   <div class="box-body table-responsive no-padding" >
                                        <table class="table table-hover table-condensed">
                                            <thead><tr>
                                                    <th>Sno</th> 
                                                    <th>Page Title</th>
                                                    <th>Content description</th>
                                                    <th>image </th> 
                                                    <th>Created Date</th> 
                                                    <th>Action</th>
                                                </tr>
                                                @if(count($page )==0)
                                                    <tr>
                                                      <td colspan="7">
                                                        <div class="alert alert-danger alert-dismissable">
                                                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">Ã—</button>
                                                          <i class="icon fa fa-check"></i>  
                                                          {{ 'Record not found. Try again !' }}
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  @endif
                                                @foreach ($page  as $key => $result)  
                                             <thead>
                                              <tbody>    
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{!! ucfirst($result->title)     !!}

                                                    </td>
                                                   
                                                    <td>{!! substr($result->page_content,0,50) !!}...<a href="{{ route('page.edit',$result->id)}}">
                                                            <i class="glyphicon glyphicon-eye-open" title="view"></i> 
                                                        </a></td>
                                                     <td> 
                                                      <!--   {!!  substr(html_entity_decode($result->description, ENT_QUOTES, 'UTF-8'),0,50)  !!}.. -->
                                                      @if(file_exists(storage_path('files/banner_content/'.$result->images)))
                                                      <img src="{{url('storage/files/banner_content/'.$result->images)}}" width="100px"> 
                                                      @else
                                                       NA
                                                      @endif
                                                     </td>
                                                     <td>
                                                        {!! Carbon\Carbon::parse($result->created_at)->format('d-M-Y'); !!}
                                                    </td>
                                                    
                                                    <td> 
                                                        <a href="{{ route('page.edit',$result->id)}}">
                                                            <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                        </a>

                                                        {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('page.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                @endforeach 
                                            </tbody></table>
                                    </div><!-- /.box-body --> 
                                    <div class="center" align="center">  {!! $page->render() !!}</div>
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
