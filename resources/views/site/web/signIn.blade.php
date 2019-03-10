@extends('site.web.app')
@section('pageTitle', ' تسجيل الدخول')
@section('content')

    <?php $locale =  App::getLocale();    ?>

    <!-- Page Title start -->
    <div class="pageTitle">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h1 class="page-heading">تسجيل الدخول</h1>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسية</a> / <span>تسجيل الدخول </span></div>
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
                <h5>تسجيل الدخول او التسجيل</h5>
                <a href="#." class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#." class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="#." class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div>


              <ul>
                @foreach ($errors->all() as $error)
                  <li class="alert alert-danger"> {{ $error }}</li>
                @endforeach
              </ul>
              </a> <a href="#." class="gp">
                <h5>بيانات الدخول</h5>
                <!-- login form -->
                <div class="formpanel">
                  <form action="{{ url('home')}}" method="post">
                    {{ csrf_field() }}
                    <div class="formrow">
                      <input type="text" class="form-control" name="name" placeholder="الاسم">
                    </div>
                    <div class="formrow">
                      <input type="password" class="form-control" name="password" placeholder="كلمه المرور">
                    </div>
                    <input type="submit" class="btn" value="تسجيل الدخول">

                    <!-- login form  end-->
                  </form>
                </div>
                <!-- sign up form -->
                <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> مستخدم جديد ؟ <a href="{{ action('Site\UserController@signUp')}}"> سجل من هنا</a></div>
                <!-- sign up form end-->


            </div>
          </div>
        </div>
      </div>
    </div>


@endsection