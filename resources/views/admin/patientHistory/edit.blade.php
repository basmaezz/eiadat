@extends('layouts.app')
@section('content')

<!-- BEGIN SAMPLE FORM PORTLET -->
<div class="portlet box  green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil"></i>  @lang('admin.Edit item')</div>
        <div class="tools"></div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
              action="{{ action('Admin\PatientController@update' ,  $editData->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-body">

                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')</label>
                    <div class="col-md-9">
                        <select name="cityId"  class="form-control select2">
                            @foreach($allDoctors as $data)
                                <option value="{{ $data->id }}" > {{ $data->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label"> @lang('admin.Disease')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="disease" value=""> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"> @lang('admin.Complications Disease')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="complicationsDisease" value=""> </div>
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




