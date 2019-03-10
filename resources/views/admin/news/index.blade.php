@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> @lang('admin.Show Data')</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ action('Admin\NewsController@create') }}" class="btn sbold green ">
                                    <i class="fa fa-plus"></i>@lang('admin.Add new item') </a>
                            </div>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th> @lang('admin.Name')  </th>
                            <th> @lang('admin.Edit') </th>
                            <th> @lang('admin.Delete') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $data)
                        <tr class="odd gradeX">
                            <td>
                                #
                            </td>
                            <td> {{ $data->name }} </td>

                            <td>
                                <a href="{{ action('Admin\NewsController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-pencil"></i> </a>

                            </td>

                            <td>
                                    <a href="{{ action('Admin\NewsController@deletenews' , $data->id) }}" class="btn sbold red ">
                                        <i class="fa fa-times"></i> </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>



@endsection




