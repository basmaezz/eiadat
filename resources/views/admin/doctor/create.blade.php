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
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\DoctorController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name"   value="{{ old('name') }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Email')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email"   value="{{ old('email') }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Phone')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone"   value="{{ old('phone') }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Password')</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password"   > </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Discount')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="discount"   value="5"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.City')</label>
                    <div class="col-md-9">
                        <select name="cityId" data-url="{{ action('Admin\CityController@getCity') }}"
                                class="form-control select2 getCity">
                            <option> @lang('admin.Choose') </option>
                            @foreach($allCity as $city)
                                <option value="{{ $city->id }}"> {{ $city->city }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.City Name') </label>
                    <div class="col-md-9">
                        <select name="stateId" class="form-control select2 getSubCity" id="stateId"
                                data-url="{{ action('Admin\CityController@getSubCity') }}">
                            <option> @lang('admin.Choose') </option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.City State') </label>
                    <div class="col-md-9">
                        <select name="quarterId" class="form-control select2" id="stateId1">
                            <option> @lang('admin.Choose') </option>
                        </select>
                    </div>
                </div>





                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Gender') </label>
                    <div class="col-md-9">
                        <div class="mt-radio-inline">

                            <label class="mt-radio">
                                <input type="radio" name="gender"  value="1" > @lang('admin.Male')
                                <span></span>
                            </label>

                            <label class="mt-radio">
                                <input type="radio" name="gender"  value="2" > @lang('admin.Female')
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <hr/>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Category')</label>
                    <div class="col-md-9">
                        <select name="specialId" class="form-control select2">
                            @foreach($allSpecail as $sep)
                                <option value="{{ $sep->id }}"> {{ $sep->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Title')</label>
                    <div class="col-md-9">
                        <select name="titleId" class="form-control select2">
                            @foreach($allTitle as $ti)
                                <option value="{{ $ti->id }}"> {{ $ti->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>




                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Address')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="address"   value="{{ old('address') }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.HotLine')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="hotline"   value="{{ old('hotline') }}"> </div>
                </div>




                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Price')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="price"   value="{{ old('price') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.About')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="about"   value="{{ old('about') }}"> </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.clinicTime')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="clinicTime"   value="{{ old('clinicTime') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.DoctorService')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="doctorService"   value="{{ old('doctorService') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.ClinicService')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="clinicService"   value="{{ old('clinicService') }}"> </div>
                </div>


                <div class="form-group ">
                    <label class="control-label col-md-3"> @lang('admin.doctorImage')</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail"
                                 data-trigger="fileinput"
                                 style="width: 200px; height: 150px;"></div>
                            <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="doctorImage"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists"
                                   data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="form-group ">
                    <label class="control-label col-md-3"> @lang('admin.clinicImage')</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail"
                                 data-trigger="fileinput"
                                 style="width: 200px; height: 150px;"></div>
                            <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="clinicImage"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists"
                                   data-dismiss="fileinput"> Remove </a>
                            </div>
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




