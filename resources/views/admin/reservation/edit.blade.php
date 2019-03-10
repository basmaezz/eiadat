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
              action="{{ action('Admin\ReservationsController@update' ,  $editData->id) }}">
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
                                <option value="{{ $doctor->id }}" @if($editData->doctorId ==  $doctor->id) selected @endif> {{ $doctor->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Patient Name')</label>
                    <div class="col-md-9">
                        <select name="patientId" class="form-control select2">
                            @foreach($allPatient as $p)
                                <option value="{{ $p->id }}" @if($editData->patientId ==  $p->id) selected @endif> {{ $p->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Resrvation Type')</label>
                    <div class="col-md-9">
                        <select name="type" class="form-control select2">
                            <option value="1" @if($editData->type ==  1) selected @endif> @lang('admin.New')</option>
                            <option value="2" @if($editData->type ==  2) selected @endif> @lang('admin.Replay')</option>
                        </select>

                    </div>
                </div>


                <div class="form-group last">
                    <label class="control-label col-md-3">  @lang('admin.Date')

                    </label>
                    <div class="col-md-9">

                        <input type="date" class="form-control"  name="reservDate" value="{{ $editData->reservDate }}">

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




