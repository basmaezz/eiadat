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
              action="{{ action('Admin\DoctorAnalyzesController@update' ,  $doctorId) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
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
                                <option value="{{ $doctor->id }}"
                                @if($doctor->id  == $doctorId) selected @endif> {{ $doctor->name }}</option>
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

                            @if(count($editData) > 0)
                            @foreach($editData as $edit)
                            <tr>
                                <input type="hidden"  name="id[]" value="{{$edit->id}}">
                                <td><input type="text" class="form-control" name="name[]" value="{{ $edit->name }}"></td>
                                <td><a class="btn default removeItemEdit" data-id="{{$edit->id}}"
                                       data-url="{{ action('Admin\SettingController@delItem') }}" data-tableName="drugs">
                                        <i class="fa fa-times"></i> </a></td>
                            </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td><input type="text" class="form-control" name="name[]" ></td>
                                    <td></td>
                                </tr>
                            @endif


                            </tbody>
                        </table>


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




