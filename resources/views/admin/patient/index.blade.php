@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> @lang('admin.Show Data') </span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ action('Admin\PatientController@create') }}" class="btn sbold green ">
                                    <i class="fa fa-plus"></i>  @lang('admin.Add new item') </a>
                            </div>

                        </div>
                    </div>
                    <br/>
                    <br/>

                    <div class="row">
                        <form role="form" method="POST" action="{{ action('Admin\PatientController@patientSearch') }}">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="patientName" placeholder="@lang('admin.Name')">
                                </div>
                                <div class="col-md-3">

                                    <select name="cityId" class="form-control select2 getCity"  data-url="{{ action('Admin\CityController@getCity') }}">
                                        <option> @lang('admin.City') </option>
                                        @foreach($allCity as $city)
                                            <option value="{{ $city->id }}"> {{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-3">

                                    <select name="stateId" class="form-control select2 getSubCity"  id="stateId"
                                data-url="{{ action('Admin\CityController@getSubCity') }}">
                                        <option> @lang('admin.City Name') </option>
                                        @foreach($allCityState as $state)
                                            <option value="{{ $state->id }}"> {{ $state->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                
                                <div class="col-md-3">

                                    <select name="quarterId" class="form-control select2 " id="stateId1">
                                        <option> @lang('admin.City State') </option>
                                        @foreach($allCityQuarter as $quart)
                                            <option value="{{ $quart->id }}"> {{ $quart->name_ar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                
                                <br/>
                                
                                 <div class="row">
                                     
                                     
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="age" placeholder="@lang('admin.Age')">
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
                                     
                                     <br/>
                                     <div class="row">
                                         
                                    <div class="col-md-3">
                                     
                                </div>
                                
                                <div class="col-md-3">
                                     
                                </div>
                                
                                <div class="col-md-3">
                                     
                                </div>
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn green">@lang('admin.Search') </button>
                                     <div class="btn-group">
                                       
                                <a href="{{ action('Admin\PatientController@advancedSearch') }}" class="btn sbold green ">
                                    <i class="fa fa-search"></i>  @lang('admin.AdvancedSearch') </a>
                            </div>
                                </div>                     
                                
                            </div>
                        </form>
                    </div>

                </div>

                @if(count($allData) > 0)
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1" >
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th> @lang('admin.Name')  </th>
                            <th> @lang('admin.Email')  </th>
                            <th> @lang('admin.Phone')  </th>
                            <th> @lang('admin.Age')  </th>
                            <th> @lang('admin.History Patients') </th>
                            <th> @lang('admin.Edit') </th>
                            <th> @lang('admin.Delete') </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $data)
                        <tr class="odd gradeX">
                            <td>
                                #
                            </td>
                            <td><a href="{{ action('Admin\PatientController@edit' ,  $data->id) }}"> {{ $data->name }}  </a>  </td>

                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->age }}</td>
                            <td>
                                <a href="{{ action('Admin\PatientController@history' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-user"></i> </a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\PatientController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-pencil"></i> </a>

                            </td>

                            <td>
                                <a href="{{ action('Admin\PatientController@delUser' , $data->id) }}" class="btn sbold red ">
                                    <i class="fa fa-times"></i> </a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                
                <div class="alert alert-info"> لا يوجد نتائج بحث </div>
                @endif


                <div class="center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            {{ $allData->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

</div>

@endsection




