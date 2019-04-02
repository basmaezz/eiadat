@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET -->
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil"></i> @lang('admin.Add new item')</div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                  action="{{ action('Admin\PatientHistoryController@store' ) }}">
                {{ csrf_field() }}
              
                <div class="form-body">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>
                    
                     <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Date')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>"></div>
                    </div>
                    
                  <input type="hidden" class="form-control"  name="patientId" value="{{ $id }}">
                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Name')</label>
                        <div class="col-md-9">
                            <select name="doctorId" class="form-control select2 ">
                                <option> @lang('admin.Choose') </option>
                                @foreach($allDoctors as $data)
                                    <option value="{{ $data->id }}"> {{ $data->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Disease')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="disease" value="{{ old('disease') }}"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Complications Disease')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="complicationsDisease" value="{{ old('complicationsDisease') }}"></div>
                    </div>
                    
                    
                    
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
                        <label class="col-md-3 control-label"> @lang('admin.Analyzes')</label>
                        <div class="col-md-9">
                            
                            <div class="input-group select2-bootstrap-append">
                                <select id="multi-append" class="form-control select2" multiple name="analyzes[]">
                                    <option></option>

                                    @foreach($Analyzes as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
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
                        <label class="col-md-3 control-label"> @lang('admin.Radiation')</label>
                        <div class="col-md-9">
                           
                            <div class="input-group select2-bootstrap-append">
                                <select id="multi-append" class="form-control select2" multiple name="radiation[]">
                                    <option></option>

                                    @foreach($Radiation as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
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
                        <label class="col-md-3 control-label"> @lang('admin.Processes')</label>
                        <div class="col-md-9">
                            
                            <div class="input-group select2-bootstrap-append">
                                <select id="multi-append" class="form-control select2" multiple name="processes[]">
                                    <option></option>

                                    @foreach($Process as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
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

                  

                    <div class="form-group ">
                        <label class="control-label col-md-3"> @lang('admin.Photo Radiation') 
                        <br/>
                        <button type="button" id="addImage" class="btn blue">@lang('admin.Add new item') </button>
                        
                        </label>
                        <div class="col-md-9" id="imageContiner">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail"
                                     data-trigger="fileinput"
                                     style="width: 200px; height: 150px;"></div>
                                <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="analyzesImg[]"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists"
                                       data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group ">
                        <label class="control-label col-md-3"> @lang('admin.Photo Analysis') 
                        
                        <br/>
                        <button type="button" id="addImage1" class="btn blue">@lang('admin.Add new item') </button>
                        
                        </label>
                        <div class="col-md-9" id="imageContiner1">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail"
                                     data-trigger="fileinput"
                                     style="width: 200px; height: 150px;"></div>
                                <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="radiationImg[]"> </span>
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
                            <button type="button" class="btn default"
                                    onclick="window.history.back()">@lang('admin.Cancel')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->

@endsection




