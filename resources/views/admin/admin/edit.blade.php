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
              action="{{ action('Admin\AdminController@update' ,  $editData->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-body">

                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Serial No') </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="serialNo" readonly   value="{{ $editData->serialNo }}"> </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name"   value="{{ $editData->name }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Email')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" value="{{ $editData->email }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Phone')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" value="{{ $editData->phone }}"> </div>
                </div>



                <div class="form-group ">
                    <label class="control-label col-md-3"> @lang('admin.Password')</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" value="">

                        <input type="hidden" class="form-control" name="oldPassword" value="{{ $editData->password }}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Group name') </label>
                    <div class="col-md-9">
                        <select name="groupId" class="form-control select2">

                            @foreach($allGroup as $data)
                                <option value="{{ $data->id }}" @if($data->id == $editData->groupId) selected @endif>
                                    {{ $data->name }}</option>
                            @endforeach

                        </select>
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




