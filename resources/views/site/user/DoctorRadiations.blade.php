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
                @include('site.user.menu')
                <div class="col-md-9 col-sm-8">
                    <div class="myads">
                        <h3> التحاليل</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading"> التحاليل الحالية</div>
                            <div class="panel-body">
                                @foreach(auth()->guard('users-web')->user()->radiations()->get() as $radiation)
                                    <div class="col-md-3">
                                        {{$radiation->name}}
                                        <form action="{{url('radiations/'.$radiation->id)}}" method="post">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" value="حذف" class="btn btn-danger">
                                        </form>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                                <hr />
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">اضافة أشعه جديد</button>
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">أشعه جديد</h4>
                                            </div>
                                            <form action="{{url('radiations')}}" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                                    <div class="form-group">
                                                        <label class="col-md-3 " for="radiationname" >اسم الأشعه</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="name" id="radiationname" required value="{{old('radiationname')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">الغاء الامر</button>
                                                    <input type="submit" value="اضافة"  class="btn btn-success">
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
    </div>
@endsection