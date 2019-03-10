@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">  Show Data</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>  Name  </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Message </th>
                            <th> CV </th>
                            <th> Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $data)
                        <tr class="odd gradeX">
                            <td>
                                #
                            </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->email}} </td>
                            <td> {{ $data->phone}}</td>
                            <td> {{ $data->message}}</td>
                            <td> <a href="{{ URL ::to ('public/images/'.$data->cv)}}"><span> CV
                                    </span><i class="fa fa-download "></i></a> </td>
                            <td> <?php echo date("Y-m-d" , strtotime ($data->created_at)); ?> </td>
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




