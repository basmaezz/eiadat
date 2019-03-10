@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">  @lang('admin.Show Data')  </span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ action('Admin\DoctorController@create') }}" class="btn sbold green ">
                                    <i class="fa fa-plus"></i>  @lang('admin.Add new item') </a>
                            </div>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1" >
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th> @lang('admin.Name')  </th>
                            <th> @lang('admin.Email')  </th>
                            <th> @lang('admin.Phone')  </th>
                            <th> @lang('admin.Drugs')  </th>
                            <th> @lang('admin.Analyzes')  </th>
                            <th> @lang('admin.Radiation')  </th>
                            <th> @lang('admin.Processes')  </th>
                            <th> @lang('admin.Complications Disease')  </th>
                            <th> @lang('admin.Edit') </th>
                            <th> @lang('admin.Delete')</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $data)
                        <tr class="odd gradeX">
                            <td>
                                #
                            </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->phone }} </td>

                            <td>
                                <a href="{{ action('Admin\DrugsController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-fa fa-medkit"></i> </a></td>

                            <td>
                                <a href="{{ action('Admin\DoctorAnalyzesController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-list"></i> </a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\DoctorRadiationController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-heartbeat"></i> </a>

                            </td>
                            <td>

                                <a href="{{ action('Admin\DoctorProcessController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-user-md"></i> </a>

                            </td>


                            <td>

                                <a href="{{ action('Admin\DoctorDiseasesController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-ambulance"></i> </a>

                            </td>


                            <td>
                                <a href="{{ action('Admin\DoctorController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-pencil"></i> </a>

                            </td>

                            <td>
                                <a href="{{ action('Admin\DoctorController@delDoctor' , $data->id) }}" class="btn sbold red ">
                                    <i class="fa fa-times"></i> </a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>


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




