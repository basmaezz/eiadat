@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase"> عرض البيانات</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ action('Admin\ProductController@create') }}" class="btn sbold green ">
                                    <i class="fa fa-plus"></i>اضافه عنصر جديد</a>
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
                            <th> الاسم </th>
                            <th> تعديل </th>
                            <th> حذف </th>
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
                                <a href="{{ action('Admin\ProductController@edit' ,  $data->id) }}" class="btn sbold blue ">
                                    <i class="fa fa-pencil"></i> </a>

                            </td>

                            <td>
                                    <a href="{{ action('Admin\ProductController@deleteproduct' , $data->id) }}" class="btn sbold red ">
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




