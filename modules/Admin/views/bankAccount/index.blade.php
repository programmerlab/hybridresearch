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
                                                <a href="{{ route('bankAccount.create')}}">
                                                    <button class="btn  btn-primary"><i class="fa fa-user-plus"></i> Add Bank Details</button> 
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
                                                    <th>Bank Name</th>
                                                    <th>Account Name</th>
                                                    <th>Account Number</th>
                                                    <th>Ifsc Code</th>
                                                    <th>Branch</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                @if(count($bankAccount)==0)
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
                                                @foreach ($bankAccount as $key => $result)  
                                             <thead>
                                              <tbody>    
                                                <tr>
                                                    <td>{{ ++$key }}</td> 
                                                    <td>{{ $result->bank_name }}</td>
                                                    <td>{{ $result->account_name }} </td>
                                                    <td>{{ $result->account_number }} </td>
                                                     <td>{{ $result->ifsc_code }} </td>
                                                      <td>{{ $result->bank_branch }} </td>
                                                   
                                                    <td>
                                                        {!! Carbon\Carbon::parse($result->created_at)->format('m-d-Y H:i:s A'); !!}
                                                    </td>
                                                    
                                                    <td> 
                                                        <a href="{{ route('bankAccount.edit',$result->id)}}">
                                                            <i class="fa fa-fw fa-pencil-square-o" title="edit"></i> 
                                                        </a>

                                                        {!! Form::open(array('class' => 'form-inline pull-left deletion-form', 'method' => 'DELETE',  'id'=>'deleteForm_'.$result->id, 'route' => array('bankAccount.destroy', $result->id))) !!}
                                                        <button class='delbtn btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete" id="{{$result->id}}"><i class="fa fa-fw fa-trash" title="Delete"></i></button>
                                                        
                                                         {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                @endforeach 
                                            </tbody></table>
                                    </div><!-- /.box-body --> 
                                    <div class="center" align="center">  {!! $bankAccount->appends(['search' => isset($_GET['search'])?$_GET['search']:''])->render() !!}</div>
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
