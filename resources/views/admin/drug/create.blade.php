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
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\DrugsController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Doctor Name')</label>
                    <div class="col-md-9">
                        <select name="doctorId" class="form-control select2">
                            @foreach($allDocotr as $doctor)
                            <option value="{{ $doctor->id }}"> {{ $doctor->name }}</option>
                                @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')
                        <br/>
                        <button type="button" id="addItem" class="btn blue"> @lang('admin.Add new item')</button>
                        <input type="hidden" id="itemCount" value="1">

                    </label>


                    <div class="col-md-9">
                        <table class="table table-bordered table-hover">
                            <tbody id="itemContiner">
                            <tr>
                                <td><input type="text" class="form-control" name="name[]" ></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
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




