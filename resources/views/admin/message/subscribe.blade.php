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
                            <th> Email </th>
                            <th> Date </th>
                            <th> Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allData as $data)
                        <tr class="odd gradeX">
                            <td>
                                #
                            </td>
                            <td> {{ $data->email}} </td>
                            <td> <?php echo date("Y-m-d" , strtotime ($data->created_at)); ?> </td>
                            <td>


                                <a href="{{ action('Admin\MessageController@deletesubscribe' , $data->id) }}" class="btn sbold red ">
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




