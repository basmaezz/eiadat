@extends('site.web.app')
@section('content')
    <?php $locale = App::getLocale();?>

    <!-- Page Title start -->
    <div class="pageTitle">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading">احجز معانا</h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسية</a> / <span>احجز معانا</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="listpgWraper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="userccount">
                        
                         <div class="socialLogin">
            <h5> احجز الان </h5>
            <a href="#." class="fb"><i class="fa fa-facebook" aria-hidden="true"></i>
            </a> <a href="#." class="whatsapp">
                <i class="fa fa-whatsapp" aria-hidden="true"></i></a> <a href="#." class="phone"><i class="fa fa-phone" aria-hidden="true"></i></a> </div>
                
                
                        <div class="formpanel">

                            <!-- Job Information -->
                            <h5>بيانات الحجز</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="formrow">
                                        <input type="text" name="jobtitle" class="form-control" placeholder="الاسم ">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="formrow">
                                        <input type="text" name="jobtitle" class="form-control"
                                               placeholder="رقم الهاتف ">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="formrow">
                                        <input type="text" name="jobtitle" class="form-control"
                                               placeholder="البريد الالكترونى  ">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="formrow">
                                        <select class="form-control" name="gender">
                                            <option>نوع التخصص</option>
                                            @foreach($allCateory as $cat)
                                                <option>{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

              
                                <div class="col-md-12">
                                    <div class="formrow">
                                        <textarea class="form-control" name="jobdetail"
                                                  placeholder="ملاحظات"></textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn" value="احجز الان">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection