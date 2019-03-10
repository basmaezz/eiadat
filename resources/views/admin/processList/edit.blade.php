@extends('layouts.app')
@section('content')

<!-- BEGIN SAMPLE FORM PORTLET -->
<div class="portlet box  green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil"></i>@lang('admin.Edit item')</div>
        <div class="tools"></div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
              action="{{ action('Admin\ProcessListController@update' ,  $editData->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-body">

                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Doctor Name') </label>
                    <div class="col-md-9">
                        <select name="doctorId" class="form-control select2">
                            <option value=""> @lang('admin.Choose') </option>
                            @foreach($allDoctor as $data)
                                <option value="{{ $data->id }}"
                                @if($editData->doctorId == $data->id) selected  @endif> {{ $data->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Patient Name') </label>
                    <div class="col-md-9">
                        <select name="patientId" class="form-control select2">
                            <option value=""> @lang('admin.Choose') </option>
                            @foreach($allPatient as $data)
                                <option value="{{ $data->id }}"
                                        @if($editData->patientId == $data->id) selected  @endif> {{ $data->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Processes') </label>
                    <div class="col-md-9">
                        <select name="processId" class="form-control select2">
                            <option value=""> @lang('admin.Choose') </option>
                            @foreach($allProcess as $data)
                                <option value="{{ $data->id }}"
                                        @if($editData->processId == $data->id) selected  @endif> {{ $data->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="form-group last">
                    <label class="control-label col-md-3">  @lang('admin.Date')

                    </label>
                    <div class="col-md-9">

                        <input type="date" class="form-control" name="processDate" value="{{ $editData->processDate }}">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.State')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="state" value="{{ $editData->state }}">
                    </div>
                </div>


  <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Report')</label>
                        <div class="col-md-9">
                            <textarea type="text" class="form-control" name="report" value="{{ $editData->report }}"></textarea>
                            
                            </div>
                    </div>
                    
                    
                    <input type="hidden"  name="reportImgOld" value="{{ $editData->reportImg }}">
                      <div class="form-group ">
                        <label class="control-label col-md-3"> @lang('admin.Image') </label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail"
                                     data-trigger="fileinput"
                                     style="width: 200px; height: 150px;">
                                    
                                     <img src="{{ URL ::to ('public/images/'.$editData->reportImg)}}"/>
                                </div>
                                <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="reportImg"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists"
                                       data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>

                        </div>
                    </div>







            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-4 col-md-8">
                        <button type="submit" class="btn green">@lang('admin.Save') </button>
                        <button type="button" class="btn default" onclick="window.history.back()">@lang('admin.Cancel')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->

@endsection




