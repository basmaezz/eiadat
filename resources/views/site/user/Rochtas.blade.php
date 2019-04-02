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
                        <h3> الروشته</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">اضافة دواء جديد</button>--}}

                                 الروشته</div>


                            <div class="panel-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-10"> </div>
                                        <div class="col-md-2">
                                            <div class="btn-group">
                                                <a href="{{ url('addpatients') }}" class="btn sbold green ">
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

                                        <th> @lang('admin.rochta') </th>
                                        <th> @lang('admin.Delete') </th>
                                        <th> @lang('admin.rochta') </th>
                                        <th> الروشتات </th>
                                        {{--<th> @lang('admin.Add new patient log') </th>--}}

                                    </tr>
                                    </thead>
                                    <tbody>




                                    @foreach($patients as $patient)
                                        <tr class="odd gradeX">
                                            <td>
                                                #
                                            </td>

                                            <td>{{ @$patient->name }} </td>

                                            <td>
                                                <a href="{{url('Rotchtapatient/'.@$patient->id)}}"value="السجل المرضى" class="btn btn-edit ">
                                                    <i class="fa fa-user"></i> </a>
                                                {{--<form action="{{url('history/'.$patient->id)}}" method="get">--}}
                                                {{--<input type="hidden" name="_method" value="edit">--}}
                                                {{--<input type="submit" value="السجل المرضى" class="btn btn-edit ">--}}
                                                {{--</form>--}}
                                            </td>


                                            <td>
                                                <form action="{{url('patients/'.$patient->id)}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="حذف" class="btn btn-danger ">
                                                </form>

                                            </td>

                                            <td>

                                                <form action="{{url('addpatientrochta/'.$patient->id)}}" method="get">
                                                   <input type="submit" value="اضافه جديد" class="btn btn-info ">
                                                </form>

                                            </td>
                                            <td>

                                                <form action="{{url('viewrochta/'.$patient->id)}}" method="get">
                                                    <input type="submit" value="view all" class="btn btn-info ">
                                                </form>

                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>

                            <div class="center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">

                                        {{ $patients->links() }}
                                    </ul>
                                </nav>
                            </div>


                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection