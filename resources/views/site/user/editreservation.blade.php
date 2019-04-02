@extends('site.web.app')
@section('content')


    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i>   @lang('admin.Add new item') </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal"
                  role="form" enctype="multipart/form-data" method="post" action="{{ url('savereser') }}">
                {{ csrf_field() }}
                <div class="form-body">


                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Patient Name')</label>
                        <div class="col-md-9">
                            <input type="hidden" name="doctorId" value="{{Auth::guard('users-web')->user()->id}}" id="doctorId">
                            <select name="patientId" class="form-control select2">
                                <option> @lang('admin.Choose') .... </option>
                                @foreach($allPatient as $p)
                                    <option value="{{ $p->id }}"> {{ $p->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Resrvation Type')</label>
                        <div class="col-md-9">
                            <select name="type" class="form-control select2">
                                <option value="1"> @lang('admin.New')</option>
                                <option value="2"> @lang('admin.Replay')</option>
                            </select>

                        </div>
                    </div>


                    <div class="form-group last">
                        <label class="control-label col-md-3">  @lang('admin.Date')

                        </label>
                        <div class="col-md-9">

                            <div class="input-group input-medium date date-picker"
                                 data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                <input type="text" class="form-control" readonly="" name="reservDate">
                                <span class="input-group-btn">
                            <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>
                                </span>
                            </div>

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
