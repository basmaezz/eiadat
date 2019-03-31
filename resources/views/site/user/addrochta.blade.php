@extends('site.web.app')
@section('content')


    <div class="listpgWraper">

        <div class="container">

            <div class="row">
            {{--@include('site.user.errors')--}}
            {{--@include('site.user.menu')--}}



            <!--Question-->

                <div class="portlet box  green ">
                    <div class="portlet-title">

                        <div class="tools"></div>
                    </div>
                    <div class="portlet-body form">
                        <form class="form-horizontal"
                              role="form" enctype="multipart/form-data" method="post" action="{{ url('storerochta/'.$id) }}">
                            {{ csrf_field() }}
                            <div class="form-body">

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger"> {{ $error }}</div>
                                    @endforeach
                                </ul>



                                <div class="form-group">
                                    <label class="col-md-3 control-label"> @lang('admin.RochtaDate')</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>"></div>
                                    <input type="hidden" class="form-control" name="patientId" readonly value="{{$id}}"></div>
                                <input type="hidden" class="form-control" name ="doctorId" readonly value="{{auth('users-web')->user()->id}}">
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> @lang('admin.Patient Name')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" value="{{ $patientdata->name }}"></div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label"> @lang('admin.Disease')</label>--}}
                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" class="form-control" name="disease" value="{{ old('disease') }}"></div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-3 control-label"> @lang('admin.Complications Disease')</label>--}}
                                {{--<div class="col-md-9">--}}
                                    {{--<input type="text" class="form-control" name="complicationsDisease" value="{{ old('complicationsDisease') }}"></div>--}}
                            {{--</div>--}}



                            <div class="form-group">
                                <label class="col-md-3 control-label"> @lang('admin.Drugs')</label>
                                <div class="col-md-9">
                                    <div class="input-group select2-bootstrap-append">
                                        <select id="multi-append" class="form-control select2" multiple name="drugs[]">
                                            <option></option>

                                            @foreach($drugs as $drug)
                                                <option value="{{ $drug->name }}">{{ $drug->name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"
                                                        data-select2-open="multi-append">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                    </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"> @lang('admin.usages')</label>
                                <div class="col-md-9">
                                    <div class="input-group select2-bootstrap-append">
                                        <select id="multi-append" class="form-control select2" multiple name="drugs[]">
                                            <option></option>

                                            @foreach($drugs as $drug)
                                                <option value="{{ $drug->usages }}">{{ $drug->usages }}</option>
                                            @endforeach


                                        </select>
                                        <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"
                                                        data-select2-open="multi-append">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                    </div>


                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label"> @lang('admin.notes')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="notes" ></div>
                            </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-5">
                                <button type="submit" class="btn green">@lang('admin.Save') </button>
                                <button type="reset" class="btn default" onclick="window.history.back()">@lang('admin.Cancel')</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->


        </div>
    </div>
    </div>


@endsection




