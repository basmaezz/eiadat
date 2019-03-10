@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET  -->
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil"></i>@lang('admin.Edit item')
            </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                  action="{{ action('Admin\SettingController@update' ,$setting->id ) }}">
                {{ csrf_field() }}

                <div class="form-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>

                    <input type="hidden" name="oldImage" value="{{ $setting->logo }}">
                    <div class="form-group ">
                        <label class="control-label col-md-3">   @lang('admin.Logo')</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 200px; height: 150px;">

                                    <img src="{{ URL ::to ('public/images/'.$setting->logo)}}"/>
                                </div>
                                <div>
                                <span class="btn red btn-outline btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="imageName"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                        Remove </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">  @lang('admin.Site Name')  </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="siteName" value="{{ $setting->siteName }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Phone') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Email')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="{{ $setting->email }}"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Address')  </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" value="{{ $setting->address }}">
                        </div>
                    </div>


                    <hr/>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Social media setting')
                            <br/>
                            <button type="button" id="addSocial" class="btn blue"> @lang('admin.Add new item') </button>
                            <input type="hidden" id="socialCount" value="1">

                        </label>
                        <div class="col-md-9">
                            <table class="table table-bordered table-hover">

                                <th>@lang('admin.Name') </th>
                                <th>@lang('admin.Icon')</th>
                                <th>@lang('admin.Link')</th>
                                <th></th>

                                <tbody id="productContiner">
                                @foreach($social as $data)
                                <tr>
                                    <input type="hidden"  name="id[]" value="{{$data->id}}">
                                    <td><input type="text" class="form-control" name="name[]" value="{{$data->name}}" readonly></td>
                                    <td><input type="text" class="form-control iconClass" name="icon[]" value="{{$data->icon}}"></td>
                                    <td><input type="text" class="form-control" name="link[]" value="{{$data->link}}"></td>

                                    <td><a class="btn default removeItemEdit" data-id="{{$data->id}}"
                                           data-url="{{ action('Admin\SettingController@delItem') }}" data-tableName="socials">
                                            <i class="fa fa-times"></i> </a></td>
                                </tr>
                                    @endforeach


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




