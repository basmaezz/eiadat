@extends('site.web.app')
@section('pageTitle', ' تسجيل حساب جديد')

@section('content')

    <?php $locale =  App::getLocale(); ?>

    <!-- Header end --> <!-- Page Title start -->
    <div class="pageTitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h1 class="page-heading">تسجيل حساب جديد</h1>
          </div>



          <div class="col-md-6 col-sm-6">
            <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسية</a> / <span>تسجيل حساب جديد</span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Title End -->

    <div class="listpgWraper">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="userccount">
              <div class="socialLogin">
                <h5> تسجيل الدخول او التسجيل</h5>
                <a href="#." class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#." class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#." class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div>


              <ul>
                @foreach ($errors->all() as $error)
                  <li class="alert alert-danger"> {{ $error }}</li>
                @endforeach
              </ul>

              <div class="userbtns">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#patient">حساب مريض</a></li>
                  <li><a data-toggle="tab" href="#doctor">حساب دكتور</a></li>
                </ul>
              </div>

              <div class="tab-content">
                {{--<form action="{ action('Site\UserController@store')}}" method="post">--}}
                <div id="patient" class="formpanel tab-pane fade in active">
                  <form class="form-horizontal" role="form"  method="post" action="{{ url('usersave') }}">
                    {{ csrf_field() }}

                    <div class="formrow">
                      <input type="text" name="name" class="form-control" placeholder="الاسم الكامل">
                      <input type="hidden" name="type" class="form-control" value="2" >

                    </div>
                    <div class="formrow">
                      <input type="text" name="phone" class="form-control" placeholder="رقم التليفون">
                    </div>
                    <div class="formrow">
                      <input type="text" name="email" class="form-control" placeholder="البريد الالكترونى">
                    </div>
                    <div class="formrow">
                      <input type="password" name="password" class="form-control" placeholder="كلمه المرور">
                    </div>
                    <div class="formrow">
                      <input type="password" name="conpass" class="form-control" placeholder="تاكيد كلمه المرور ">
                    </div>

                    {{--<input type="submit" class="btn" value="سجل الان" data-action="{{ action('Site\UserController@store')}}">--}}
                    <input type="submit" class="btn" value="سجل الان">
                  </form>
                </div>
                {{--</form>--}}


                {{--<form action="{ action('Site\UserController@store')}}" method="post">--}}
                <div id="doctor" class="formpanel tab-pane fade in">
                  <form class="form-horizontal"role="form"  method="post" action="{{url('usersave')}}">
                    {{ csrf_field() }}

                    <ul>
                      @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                      @endforeach
                    </ul>


                    <div class="formrow">
                      <input type="text" name="name" class="form-control" placeholder="الاسم بالكامل">
                      <input type="hidden" name="type" class="form-control" value="1">

                    </div>
                    <div class="formrow">
                      <input type="text" name="phone" class="form-control" placeholder="رقم التليفون">
                    </div>
                    <div class="formrow">
                      <input type="text" name="email" class="form-control" placeholder="البريد الالكتورنى">
                    </div>
                    <div class="formrow">
                      <input type="password" name="password" class="form-control" placeholder="كلمه المرور">
                    </div>
                    <div class="formrow">
                      <input type="password" name="conpass" class="form-control" placeholder="تأكيد كلمه المرور ">
                    </div>

                    <input type="submit" class="btn" value="سجل الان">
                  </form>
                </div>
                {{--</form>--}}
              </div>
              <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> انت مسجل بالفعل ؟
                <a href="{{ action('Site\UserController@signIn')}}">تسجيل دخول </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection