@extends('layouts.app')
@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet box  green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-plus"></i>   @lang('admin.Add new item') </div>
        <div class="tools"></div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal"
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\CityQuarterController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>

                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.City Name') </label>
                    <div class="col-md-9">
                        <select name="cityId" data-url="{{ action('Admin\CityController@getCity') }}"
                                class="form-control select2 getCity">
                             <option>@lang('admin.Choose') </option>
                            @foreach($allCity as $data)
                                <option value="{{ $data->id }}" > {{ $data->city }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.City State') </label>
                    <div class="col-md-9">
                        <select name="stateId" class="form-control select2" id="stateId">
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name') (@lang('admin.Ar'))</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_ar"   value="{{ old('name_ar') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name') (@lang('admin.En'))</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_en"   value="{{ old('name_en') }}"> </div>
                </div>





            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-4 col-md-8">
                        <button type="submit" class="btn green">@lang('admin.Save') </button>
                        <button type="reset" class="btn default" onclick="window.history.back()">@lang('admin.Cancel')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->

@endsection




