@extends('site.web.app')
@section('content')


    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil"></i>@lang('admin.Edit item')</div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">

            <form class="form-horizontal"   enctype="multipart/form-data"
                  action="{{url('docProfile/'.$editData->id)}}" method="post">
                {{ csrf_field() }}
                {{--{{ method_field('PATCH') }}--}}
                <div class="form-body">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name"   value="{{ $editData->name }}"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Email')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email"   value="{{ $editData->email }}"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Phone')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone"   value="{{ $editData->phone }}"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Password')</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password"   >

                            <input type="hidden"  value="{{ $editData->password }}" name="oldPassword"   >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Discount')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="discount"   value="{{ $detailsData->discount }}"> </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.City')</label>
                        <div class="col-md-9">
                            <select name="cityId" data-url="{{ action('Admin\CityController@getCity') }}"
                                    class="form-control select2 getCity">
                                @foreach($allCity as $city)
                                    <option value="{{ $city->id }}" @if($city->id == $editData->cityId) selected @endif> {{ $city->city }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">  @lang('admin.City Name') </label>
                        <div class="col-md-9">
                            <select name="stateId" class="form-control select2 getSubCity" id="stateId"
                                    data-url="{{ action('Admin\CityController@getSubCity') }}">

                                @foreach($allState as $stat)
                                    <option value="{{ $stat->id }}"
                                            @if($stat->id == $editData->stateId) selected @endif> {{ $stat->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">  @lang('admin.City State') </label>
                        <div class="col-md-9">
                            <select name="quarterId" class="form-control select2" id="stateId1">

                                @foreach($allQ as $qu)
                                    <option value="{{ $qu->id }}"
                                            @if($qu->id == $editData->stateId) selected @endif> {{ $qu->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">  @lang('admin.Gender') </label>
                        <div class="col-md-9">
                            <div class="mt-radio-inline">

                                <label class="mt-radio">
                                    <input type="radio" name="gender"  value="1" @if($editData->gender == 1) checked @endif> @lang('admin.Male')
                                    <span></span>
                                </label>

                                <label class="mt-radio">
                                    <input type="radio" name="gender"  value="2" @if($editData->gender == 2) checked @endif> @lang('admin.Female')
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
                                    <option value="{{ $sep->id }}" @if($sep->id == $detailsData->specialId) selected @endif> {{ $sep->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Title')</label>
                        <div class="col-md-9">
                            <select name="titleId" class="form-control select2">
                                @foreach($allTitle as $ti)
                                    <option value="{{ $ti->id }}" @if($ti->id == $detailsData->titleId) selected @endif> {{ $ti->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Address')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address"   value="{{ $detailsData->address }}"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.HotLine')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="hotline"   value="{{ $detailsData->hotline }}"> </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Price')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="price"   value="{{ $detailsData->price }}"> </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.About')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="about"   value="{{ $detailsData->about  }}"> </div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.clinicTime')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="clinicTime"   value="{{ $detailsData->clinicTime }}"> </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.DoctorService')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="doctorService"   value="{{ $detailsData->doctorService }}"> </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.ClinicService')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="clinicService"   value="{{ $detailsData->clinicService }}"> </div>
                    </div>


                    <div class="form-group ">
                        <input type="hidden" name="oldDoctorImage" value="{{ $detailsData->doctorImage }}">
                        <label class="control-label col-md-3"> @lang('admin.doctorImage')</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail"
                                     data-trigger="fileinput"
                                     style="width: 200px; height: 150px;">

                                    <img src="{{ URL ::to ('public/images/'.$detailsData->doctorImage)}}"/>
                                </div>
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
                        <input type="hidden" name="oldClinicImage" value="{{ $detailsData->clinicImage }}">
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail"
                                     data-trigger="fileinput"
                                     style="width: 200px; height: 150px;">

                                    <img src="{{ URL ::to ('public/images/'.$detailsData->clinicImage)}}"/>
                                </div>
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
                            <button type="button" class="btn default" onclick="window.history.back()">@lang('admin.Cancel')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection




