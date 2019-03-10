@extends('site.app')
@section('content')

    <?php $locale =  App::getLocale();    ?>

    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{ action('Site\IndexController@index') }}">الرئيسية</a></li>
                <li class="active">  حسابى</li>
            </ol>
        </div>
    </div>
    <!-- /.breadcrumbs -->



    <div class="user-page common-wrapper">
        <div class="container">
            <div class="row profile">


                @include('site.user.sidebar')

                <div class="col-md-9">


                    <div class="panel panel-default">
                        <div class="panel-heading">اعدادات حسابي</div>
                        <div class="panel-body">
                            <form class="form-horizontal">


                                <div class="form-group">
                                    <label for="inputname3" class="col-sm-2 control-label">الاسم</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputname3" value=" {{ $userData->name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">البريد الالكتروني</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value=" {{ $userData->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> رقم الهاتف</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" value=" {{ $userData->phone }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">كلمة المرور</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" >
                                        <input type="hidden" name="oldPassword"  value=" {{ $userData->password }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-yellow">تحديث</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>




                </div>
            </div>
        </div>
    </div>


@endsection