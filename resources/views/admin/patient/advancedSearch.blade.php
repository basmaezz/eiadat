@extends('layouts.app')
@section('content')


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered ">
        <div class="portlet-title green">
            <div class="caption">
                <i class="icon-share font-dark"></i>
                <span class="caption-subject font-dark bold uppercase">@lang('admin.AdvancedSearch')</span>
            </div>
            <div class="actions">

            </div>
        </div>
        <div class="portlet-body">
            <form class="" role="form">
                
                <div class="row">  
                
                <div class="col-md-3">  <div class="form-group">
                  
                    <input type="text" class="form-control" name="patientName" placeholder="@lang('admin.Name')">

                </div> </div>
                
                
                 <div class="col-md-3">
                     
                     
                    
                    
                     <select name="cityId" class="form-control input-medium select2 getCity"  data-url="{{ action('Admin\CityController@getCity') }}">
                                        <option> @lang('admin.City') </option>
                                        @foreach($allCity as $city)
                                            <option value="{{ $city->id }}"> {{ $city->city }}</option>
                                        @endforeach
                                    </select>
                    
                    
                   
                     
                 </div>
                 
                 
                 
                 <div class="col-md-3"><select name="stateId" class="form-control select2 getSubCity"  id="stateId"
                                data-url="{{ action('Admin\CityController@getSubCity') }}">
                                        <option> @lang('admin.City Name') </option>
                                        @foreach($allCityState as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name_ar }}</option>
                                        @endforeach
                                    </select></div>
                
                
                
                <div class="col-md-3">
                    
                    <select name="quarterId" class="form-control select2 " id="stateId1">
                                        <option> @lang('admin.City State') </option>
                                        @foreach($allCityQuarter as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name_ar }}</option>
                                        @endforeach
                                    </select>
                </div>
                
                
                </div>
                <hr>
                
                <div class="row">
                    
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="patientName" placeholder="@lang('admin.Age')">
                        
                    </div>
                    
                    <div class="col-md-3">
                         <select name="gender" class="form-control select2 ">
                                        <option> @lang('admin.Gender') </option>
                                        <option value="1">@lang('admin.Male') </option>
                                        <option value="2">@lang('admin.Female') </option>

                                    </select>
                    </div>
                    
                    
                    <div class="col-md-3">
                         <select name="stateId" class="form-control select2 " >
                                        <option> @lang('admin.Disease') </option>
                                        @foreach($allPatientHistroy  as $data)
                                            <option value="{{ $data->disease }}"> {{ $data->disease }}</option>
                                        @endforeach
                                    </select>
                        
                        
                    </div>
                    
                    
                    <div class="col-md-3">
                        
                         <select name="stateId" class="form-control select2 " >
                                        <option> @lang('admin.Complications Disease') </option>
                                        @foreach($allDiseases  as $data)
                                            <option value="{{ $data->name }}"> {{ $data->name }}</option>
                                        @endforeach
                                    </select>
                        
                        
                    </div>
                    
                    
                </div>
                
                
                
               
                


            <hr>


                <div class="row">
                    
                    <div class="col-md-3">  <select name="quarterId" class="form-control select2 " >
                                        <option> @lang('admin.Drugs') </option>
                                        @foreach($allDrug as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                        @endforeach
                                    </select> </div>
                    
                    
                    <div class="col-md-3">  <select name="quarterId" class="form-control select2 " >
                                        <option> @lang('admin.Analyzes') </option>
                                        @foreach($allAnalyzes as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                        @endforeach
                                    </select> </div>
                    
                    
                    
                    <div class="col-md-3">  <select name="quarterId" class="form-control select2 " >
                                        <option> @lang('admin.Radiation') </option>
                                        @foreach($allRadiation as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                        @endforeach
                                    </select> </div>
                    
                    
                    
                    <div class="col-md-3">  <select name="quarterId" class="form-control select2 " >
                                        <option> @lang('admin.Processes') </option>
                                        @foreach($allProcess as $city)
                                            <option value="{{ $city->id }}"> {{ $city->name }}</option>
                                        @endforeach
                                    </select> </div>
                    
                    
                    
                </div>
               

            <hr>
            <div class="row">
                
                 <div class="col-md-3"></div>
                 <div class="col-md-3"></div>
                 
                <div class="col-md-3">
                    
                    <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        
                        <button type="button" class="btn blue">
                            <i class="fa fa-search"></i>
                            @lang('admin.Search')</button>
                    </div>
                </div>
                
                </div> 
            </div>
                
            </form>

        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->


@endsection




