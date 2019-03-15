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
                        <h3> المرضى</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">اضافة دواء جديد</button>--}}

                                سجل المرضى</div>


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
                                        <th> @lang('admin.Email')  </th>
                                        <th> @lang('admin.Phone')  </th>
                                        <th> @lang('admin.Age')  </th>
                                        <th> @lang('admin.History Patients') </th>
                                        <th> @lang('admin.Edit') </th>
                                        <th> @lang('admin.Delete') </th>
                                        <th> @lang('admin.Add new patient log') </th>

                                    </tr>
                                    </thead>
                                    <tbody>




                                   @foreach($patienthistory as $patient)
                                        <tr class="odd gradeX">
                                            <td>
                                                #
                                            </td>

                                            <td>{{ @$patient['patient']->name }} </td>
                                            <td>{{ @$patient['patient']->email }}</td>
                                            <td>{{ @$patient['patient']->phone }}</td>
                                            <td>{{ @$patient['patient']->age }}</td>
                                            <td>
                                                <a href="{{url('history/'.@$patient['patient']->id)}}"value="السجل المرضى" class="btn btn-edit ">
                                                    <i class="fa fa-user"></i> </a>
                                                {{--<form action="{{url('history/'.$patient->id)}}" method="get">--}}
                                                {{--<input type="hidden" name="_method" value="edit">--}}
                                                {{--<input type="submit" value="السجل المرضى" class="btn btn-edit ">--}}
                                                {{--</form>--}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn sbold blue open-editPatient" data-toggle="modal"
                                                        data-age="{{ @$patient['patient']->age }}" data-target="#editModal"
                                                        data-id="{{$patient['patient']->id}}" data-name="{{$patient['patient']->name}}"
                                                        data-phone="{{$patient['patient']->phone}}" data-email="{{$patient['patient']->email}}">
                                                    <i class="fa fa-user">
                                                        تعديل
                                                    </i>
                                                </button>
                                            </td>



                                            <td>
                                                <form action="{{url('patients/'.$patient['patient']->id)}}" method="post">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="submit" value="حذف" class="btn btn-danger ">
                                                </form>

                                            </td>

                                            <td>
                                                <button type="button" class="btn sbold blue open-editPatient" data-toggle="modal"
                                                        data-age="{{ @$patient['patient']->age }}" data-target="#editModal"
                                                        data-id="{{$patient['patient']->id}}" data-name="{{$patient['patient']->name}}"
                                                        data-phone="{{$patient['patient']->phone}}" data-email="{{$patient['patient']->email}}">
                                                    <i class="fa fa-user">
                                                        @lang('admin.Add new patient log')

                                                    </i>
                                                </button>
                                            </td>



                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>

                            <div class="center">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">

                                        {{ $patienthistory->links() }}
                                    </ul>
                                </nav>
                            </div>


                     <!-- Modal -->
                            <div id="editModal"  class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تعديل بيانات المريض</h4>
                                        </div>
                                        {{--<form action="{{url('patients/')}}"  method="PUT" id="updateform" >--}}
                                        <form action="{{url('patientupdate')}}" class="form-horizontal" id="form_update" method="post">


                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                            <div class="modal-body">


                                                <div class="form-group">
                                                    <label class="col-md-3 " for="name" >اسم المريض</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="اسم المريض" name="name" id="name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 " for="email" >البريد الالكترونى</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="البريد الالكترونى" name="email" id="email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3" for="phone" >التليفون</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="التليفون" name="phone" id="phone" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 " for="age" >السن</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="التليفون" name="age" id="age" required>
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




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on("click", ".open-editPatient", function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var phone = $(this).data('phone');
            var age = $(this).data('age');
            $(".modal-body #id").val(id);
            $(".modal-body #name").val(name);
            $(".modal-body #email").val(email);
            $(".modal-body #phone").val(phone);
            $(".modal-body #age").val(age);
            $('#form_update').attr('action','{{url('patientupdate')}}/'+id);
        });
    </script>
@endsection