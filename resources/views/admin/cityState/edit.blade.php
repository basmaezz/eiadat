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
              action="{{ action('Admin\CityStateController@update' ,  $editData->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-body">

                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>

                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.City Name') </label>
                    <div class="col-md-9">
                        <select name="cityId" class="form-control select2">

                            @foreach($allCity as $data)
                                <option value="{{ $data->id }}"
                                @if($data->id == $editData->cityId) selected @endif> {{ $data->city }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name') (@lang('admin.Ar')) </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_ar" value="{{ $editData->name_ar }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name') (@lang('admin.En')) </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_en" value="{{ $editData->name_en }}"> </div>
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




