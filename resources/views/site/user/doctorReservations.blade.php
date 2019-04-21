@extends('site.web.app')
@section('content')
    <!-- Page Title start -->
    <div class="pageTitle">
        {{--<div class="container">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-6 col-sm-6">--}}
        {{--<h1 class="page-heading">لوحه التحكم</h1>--}}
        {{--</div>--}}
        {{--<div class="col-md-6 col-sm-6">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>


    <!-- Page Title End -->
    <div class="listpgWraper">
        <div class="container">
            <div class="row">
                @include('site.user.errors')
                @include('site.user.menu')
                <div class="col-md-9 col-sm-8">
                    <div class="myads">
                        <h3> المرضى</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                سجل الحجوزات</div>


                            <div class="panel-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-10"> </div>
                                        <div class="col-md-2">
                                            <div class="btn-group">
                                                <a href="{{ url('addreservation') }}" class="btn sbold green ">
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
                                        <th> @lang('admin.Patient Name')  </th>
                                        <th> @lang('admin.Resrvation Type')  </th>
                                        <th> تاريخ الحجز  </th>
                                        <th> @lang('admin.Edit') </th>
                                        <th> @lang('admin.Delete')</th>

                                       </tr>
                                    </thead>
                                    <tbody>




                                    @foreach($reservationsData as $reservation)
                                        <tr class="odd gradeX">
                                            <td>
                                                #
                                            </td>

                                            <td>{{@$reservation['Patient']->name }} </td>
                                            <td> @if(@$reservation['Patient']->type == 1) @lang('admin.New') @elseif(@$reservation['Patient']->type == 2) @lang('admin.Replay') @endif </td>
                                            <td>{{ @$reservation->reservDate }}</td>

                                            <td>
                                                <button type="button" class="btn sbold blue open-docreservation" data-toggle="modal"
                                                        data-patientid="{{@$reservation['Patient']->id }}"
                                                        data-name="{{@$reservation['Patient']->name }}" data-target="#editreserModa{{$reservation->id}}"
                                                        data-type="{{@$reservation['Patient']->type}}"
                                                        data-reservDate="{{ @$reservation['Patient']->reservDate }}" >
                                                    <i class="fa fa-user">
                                                        تعديل
                                                    </i>
                                                </button>
                                                <!-- Edit Modal -->
                                                <!-- Modal -->
                                                <div id="editreserModa{{$reservation->id}}"  class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">تعديل بيانات الحجز</h4>
                                                            </div>

                                                            <form action="{{url('updatereser/'.$reservation->id)}}" class="form-horizontal" id="form_update" method="post">


                                                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                               

                                                                <div class="modal-body">


                                                                    <div class="form-group">
                                                                        <label class="col-md-3 " for="name" >اسم المريض</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" placeholder="اسم المريض" name="name" id="name">
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label class="col-md-3 " for="type" >نوع الحجز</label>
                                                                        <div class="col-md-9">
                                                                            <select name="type" class="form-control ">
                                                                                <option value="1" @if(@$reservation['Patient']->type ==  1) selected @endif> @lang('admin.New')</option>
                                                                                <option value="2" @if(@$reservation['Patient']->type ==  2) selected @endif> @lang('admin.Replay')</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group last">
                                                                        <label class="control-label col-md-3">  @lang('admin.Date') </label>
                                                                        <div class="input-group input-medium date date-picker"
                                                                             data-date-format="dd-mm-yyyy" data-date-start-date="+0d">

                                                                            <input type="text" class="form-control" autocomplete="Off" name="reservDate" id="reservDate">
                                                                            <span class="input-group-btn">
                                             <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>
                                                  </span>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-info" data-dismiss="modal">الغاء الامر</button>
                                                                    <input type="submit" value="تعديل"  class="btn btn-success">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Edit Modal -->

                                            </td>

                                            <td>
                                                <form action="{{url('reservations/'.@$reservation->id)}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="حذف" class="btn btn-danger ">
                                                </form>
                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>

                            {{--<div class="center">--}}
                                {{--<nav aria-label="Page navigation">--}}
                                    {{--<ul class="pagination">--}}

                                        {{--{{ $reservationsData->links() }}--}}
                                    {{--</ul>--}}
                                {{--</nav>--}}
                            {{--</div>--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on("click", ".open-docreservation", function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var type = $(this).data('type');
            var reservDate = $(this).data('reservDate');
            $(".modal-body #id").val(id);
            $(".modal-body #name").val(name);
            $(".modal-body #type").val(type);
            $(".modal-body #reservDate").val(reservDate);
            $('#form_update').attr('action','{{url('updatereser')}}/'+id);
        });
    </script>


@endsection