@extends('site.web.app')
@section('content')
    <!-- Page Title start -->
    <div class="pageTitle">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading">لوحه التحكم</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                </div>
            </div>
        </div>
    </div>


    <!-- Page Title End -->
    <div class="listpgWraper">
        <div class="container">
            <div class="row">
                @include('site.user.errors')
                @include('site.user.menu')
                <div class="col-md-9 col-sm-8">
                    <div class="myads">
                        <h3> الحجوزات</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                الحجوزات</div>
                            @foreach($reservationsData as $data)
                                {{$data->reservDate}}
                                @endforeach


                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1" >
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th> @lang('admin.Patient Name')  </th>
                                        <th> @lang('admin.Resrvation Type')  </th>
                                        <th> تاريخ الحجز  </th>
                                        <th> @lang('admin.Edit') </th>
                                        <th> @lang('admin.Delete')</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    {{--{{$reservations= auth()->guard('users-web')->user()->reservations()}}--}}
                                    @foreach(auth()->guard('users-web')->user()->reservations()->get() as $reservation)



                                        <tr class="odd gradeX">
                                            <td>
                                                #
                                            </td>

                                            <td>{{$reservation->name  }} </td>


                                            {{--<td>{{ $reservationsData->reservDate }}</td>--}}

                                            <td>{{$data->reservDate}}</td>
                                            <td>{{ $reservation->reservDate }}</td>
                                            <td>{{ $reservation->reservDate }}</td>


                                        </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection