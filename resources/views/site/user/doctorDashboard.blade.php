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
                    <div class="breadCrumb"><span>اهلا بك دكتور احمد</span></div>
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
                    <ul class="row profilestat">
                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <div class="inbox"> <i class="fa fa-eye" aria-hidden="true"></i>
                                <h6>1</h6>
                                <strong>الملف الشخصى </strong> </div>
                        </li>
                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <div class="inbox"> <i class="fa fa-user-o" aria-hidden="true"></i>
                                <h6>21</h6>
                                <strong>المرضى</strong> </div>
                        </li>
                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <div class="inbox"> <i class="fa fa-tachometer" aria-hidden="true"></i>
                                <h6>2 <span></span></h6>
                                <strong> عمليات اليوم</strong> </div>
                        </li>
                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <div class="inbox"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <h6>10</h6>
                                <strong> الكشوفات</strong> </div>
                        </li>

                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <div class="inbox"> <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <h6>2</h6>
                                <strong> الاستشارات </strong> </div>
                        </li>
                        <li class="col-md-2 col-sm-4 col-xs-6">
                            <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h6>8</h6>
                                <strong>الرسائل</strong> </div>
                        </li>
                    </ul>

                    <!--div class="instoretxt">
                        <div class="credit">Your on site available credit is: <strong>$99.00</strong></div>
                        <a href="#.">Update Package</a> <a href="#." class="history">Payment History</a> </div-->

                    <div class="myads">
                        <h3>احدث الانشطه </h3>
                        <ul class="searchList">
                            <!-- start -->
                            <li>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <div class="jobimg"><img src="{{ URL ::to ('assets/site/images/jobs/jobimg.jpg')}}" alt="Job Name"></div>
                                        <div class="jobinfo">
                                            <h3><a href="#.">اسم المريض</a></h3>
                                            <div class="companyName"><a href="#.">16 - 02 - 2019</a></div>
                                            <div class="location">نوع النشاط   - <span> كشف جديد</span></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="listbtn"><a href="#.">التفاصيل </a></div>
                                    </div>
                                </div>

                            </li>
                            <!-- end -->




                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection