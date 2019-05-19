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
                  <div class="portlet light portlet-fit bordered">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="box">
                                    <div class="box-header">
                                        
                                         
                                        <div class="col-md-2 pull-right">
                                            <div style="width: 150px;" class="input-group"> 
                                                <a href="{{ route('product.create')}}">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Create Pricing</button> 
                                                </a>
                                            </div>
                                        </div> 
                                    </div><!-- /.box-header -->

                                    
                                    @if(Session::has('flash_alert_notice'))
                                         <div class="alert alert-success alert-dismissable" style="margin:10px">
                                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                          <i class="icon fa fa-check"></i>  
                                         {{ Session::get('flash_alert_notice') }} 
                                         </div>
                                    @endif
                                      
                                   <div class="box-body table-responsive no-padding" >
                                       <table class="table table-striped table-hover table-bordered">
                                           <thead><tr>
                                                    <th>Sno</th> 
                                                    <th>Title</th>
                                                    <th>Monthy Price</th> 
                                                    <th>Quarterly Price </th> 
                                                    <th>Haly yearly Price </th> 
                                                    <th>Yearly Price</th> 
                                                    <th>Action</th>
                                                </tr>
                                                @if(count($products )==0)
                                                    <tr>
                                                      <td colspan="7">
                                                        <div class="alert alert-danger alert-dismissable">
                                                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                          <i class="icon fa fa-check"></i>  
                                                          {{ 'Record not found. Try again !' }}
                                                        </div>
                                                      </td>
                                                    </tr>
                                                  @endif
                                                @foreach ($products  as $key => $result)  
                                             <thead>
                                              <tbody>    
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{!! ucfirst($result->title)     !!}

                                                    </td>
                                                    <td>
                                                   INR {{ number_format($result->monthly_price, 2, '.', ',') }}
                                                    </td>
                                                    
                                                     <td> 
                                                      
                                                   INR {{ number_format($result->quarterly_price, 2, '.', ',') }}
                                                        
                                                     </td>
                                                    <td> INR {{ number_format($result->half_yearly_price, 2, '.', ',') }}</td>
                                                    <td>
                                                     INR   {{ number_format($result->yearly_price, 2, '.', ',') }}
<!--                                                        {!! Carbon\Carbon::parse($result->created_at)->format('d-M-Y'); !!}-->
                                                    </td>
                                                    
                                                    <td> 
                                                        <a href="{{ route('product.edit',$result->id)}}">
                                                            <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                        </a>

                                                        {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('product.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                @endforeach 
                                            </tbody></table>
                                    </div><!-- /.box-body --> 
                                    <div class="center" align="center">  {!! $products->render() !!}</div>
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
