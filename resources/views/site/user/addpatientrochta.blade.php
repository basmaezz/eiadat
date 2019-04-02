@extends('site.web.app')
@section('content')
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil"></i>@lang('admin.Edit item')</div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal"role="form" method="post" action="{{ url('storerochtadata/'.$patientdata->id) }}">
                {{ csrf_field() }}

                <div class="form-body">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.patientname')</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="patientname" value="{{$patientdata->name}}">
                            <input type="hidden" class="form-control" name="patientId" value="{{$patientdata->id}}">
                            <input type="hidden" class="form-control" name="doctorId" value="{{auth()->guard('users-web')->user()->id}}">

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.drugname')
                            <br/>
                        </label>


                        <div class="col-md-9">
                            <table class="table table-bordered table-hover">
                                <tbody id="itemContiner">

                                @if(count(auth()->guard('users-web')->user()->drugs()->get()) > 0)
                                    @foreach(auth()->guard('users-web')->user()->drugs()->get() as $drug)
                                        <tr>
                                            <input type="hidden"  name="drugId" value="{{$drug->id}}">
                                            <td><input type="checkbox"  name="drugs[]" value="{{$drug->id}}"></td>

                                            <td><input type="text" class="form-control" name="drug" value="{{ $drug->name }}"></td>
                                            <td><input type="text" class="form-control" name="usages[]" value=""></td>
                                            {{--<td><a class="btn default removeItemEdit" data-id="{{$drug->id}}"--}}
                                            {{--data-url="" data-tableName="drugs">--}}
                                            {{--<i class="fa fa-times"></i> </a></td>--}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td><input type="text" class="form-control" name="name[]" ></td>
                                        <td><input type="text" class="form-control" name="usages[]" value=""></td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.notes')</label>
                        <div class="col-md-6">
                            <textarea type="text" class="form-control" name="notes" value=""></textarea>
                            {{--<input type="text" class="form-control" name="patientname" value="{{$patientdata->name}}"> </div>--}}
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
                </div>
            </form>
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->




@endsection




