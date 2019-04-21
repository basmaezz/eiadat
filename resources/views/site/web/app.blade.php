<!DOCTYPE html>
<html lang="en" class="rtl" dir="rtl">
<?php  $locale = App::getLocale();  ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $setting->siteName }} | @yield('pageTitle')</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ URL ::to ('assets/site/logo.jpg')}}">

    <!-- Owl carousel -->
    <link href="{{ URL ::to ('assets/site/css/owl.carousel.css')}}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ URL ::to ('assets/site/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ URL ::to ('assets/site/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Custom Style -->
    <link href="{{ URL ::to ('assets/site/css/main.css')}}" rel="stylesheet">
    <link href="{{ URL ::to ('assets/site/css/rtl-style.css')}}" rel="stylesheet">


    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />

    @if($locale == 'ar')
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />

@endif

    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/clockface/css/clockface.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    @if($locale =='ar')
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />--}}
    @else
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />--}}
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />--}}
        <!-- END THEME GLOBAL STYLES -->
@endif

    @if($locale =='ar')
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/themes/darkblue-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />--}}
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />--}}
    @elseif($locale =='en')

        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />--}}
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />--}}
        {{--<link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />--}}
    @endif
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<style>
    .icons-bar {
        position: fixed;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .icons-bar a {
        display: block;
        text-align: center;
        padding: 16px;
        transition: all 0.3s ease;
        color: white;
        font-size: 20px;
    }

    .icons-bar a:hover {
        background-color: #000;
    }


    .icons-bar a:hover {
        background-color: #000;
    }
    .whatsapp {
        background: #25d366;
        color: white;
    }


    .facebook {
        background: #3B5998;
        color: white;
    }

    .twitter {
        background: #55ACEE;
        color: white;
    }

    .google {
        background: #dd4b39;
        color: white;
    }


    .linkedin {
        background: #007bb5;
        color: white;
    }



    .youtube {
        background: #bb0000;
        color: white;
    }

    .phone {
        background: #cccccc;
        color: white;
    }

</style>
<body>

<div class="icons-bar hidden-xs">
    <a href="https://api.whatsapp.com/send?phone={{ $setting->phone }}" class="whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a>
    <a href="https://api.whatsapp.com/send?phone={{ $setting->phone }}" class="phone" target="_blank"><i class="fa fa-phone"></i></a>

    @foreach($social as $seo)
        <a href="{{$seo->link}}" class="{{$seo->name}}" target="_blank"><i class="{{$seo->icon}}"></i></a>
    @endforeach
</div>


<!-- Header start -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="{{ action('Site\IndexController@index') }}" class="logo">
                    <img src="{{ URL ::to ('public/images/'.$setting->logo)}}" alt="" /></a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <!-- Nav start -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-collapse collapse" id="nav-main">
                        <ul class="nav navbar-nav">
                            <li class="dropdown {{ Request::is(' ') ? 'active' : '' }}">
                                <a href="{{ action('Site\IndexController@index') }}">الرئيسيه </a>
                            </li>

                            @foreach($headerPages as $head)
                                <?php $nameHead = json_decode($head->name , true); ?>
                                <li class="{{ Request::is('page*') ? 'active' : '' }}"><a href="{{ action('Site\IndexController@page' , $head->id ) }}"> {{ $nameHead [Lang::getLocale()] }} </a></li>
                            @endforeach

                            <li class="{{ Request::is('blogs') ? 'active' : '' }}"><a href="{{ action('Site\IndexController@blogs') }}">نصائح طبيه </a>
                            </li>
                            <li class="{{ Request::is('contact-us') ? 'active' : '' }}"><a href="{{ action('Site\IndexController@contactUs') }}">اتصل بنا</a></li>
                            <li class="postjob"><a href="{{ action('Site\IndexController@book') }}"> احجز معانا </a></li>
                            <li class="jobseeker"><a href="{{ action('Site\UserController@signIn') }}"> دخول / تسجيل  </a></li>
                            <!--li class="dropdown userbtn"><a href=""><img src="images/candidates/01.jpg" alt="" class="userimg" /></a>
                                <ul class="dropdown-menu">
                                    <li><a href="dashboard.html"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                                    <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profilt</a></li>
                                    <li><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> My Jobs</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                                </ul>
                            </li-->
                        </ul>
                        <!-- Nav collapes end -->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- Nav end -->
            </div>
        </div>
        <!-- row end -->
    </div>
    <!-- Header container end -->
</div>
<!-- Header end -->

@yield('content')

<!--Footer-->
<div class="footerWrap">
    <div class="container">
        <div class="row">
            <!--About Us-->




            <!--Jobs By Industry-->
            <div class="col-md-3 col-sm-6">
                <h5>التخصصات</h5>


                <!--Industry menu Start-->
                <ul class="quicklinks">

                    @foreach($footerCateory as $cat)
                        <?php $nameArr1 = json_decode($cat->name , true); ?>
                        <li class="col-md-6 col-sm-6"><a href="#.">{{ $nameArr1[Lang::getLocale()] }}</a></li>
                    @endforeach

                </ul>
                <!--Industry menu End-->
                <div class="clear"></div>
            </div>



            <!--Jobs By Industry-->
            <div class="col-md-3 col-sm-6">
                <h5>المناطق</h5>
                <!--Industry menu Start-->
                <ul class="quicklinks">

                    @foreach($allCityFooter as $city)
                        <li class="col-md-6 col-sm-6"><a href="#.">{{ $city->city_ar  }}</a></li>
                    @endforeach

                </ul>
                <!--Industry menu End-->
                <div class="clear"></div>
            </div>




            <!--Quick Links-->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <h5>روابط سريعه</h5>
                <!--Quick Links menu Start-->
                <ul class="quicklinks">

                    @foreach($footerPage as $page)
                        <?php $nameArr = json_decode($page->name , true); ?>
                        <li><a href="{{ action('Site\IndexController@page' , $page->id ) }}">{{ $nameArr[Lang::getLocale()] }}</a></li>
                    @endforeach

                </ul>
            </div>
            <!--Quick Links menu end-->



            <div class="col-md-3 col-sm-12">
                <div class="ft-logo"><img src="{{ URL ::to ('public/images/'.$setting->logo)}}" alt="Your alt text here"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                <div class="social">
                    @foreach($social as $seo)
                        <a href="{{ $seo->link}}" target="_blank"> <i class="{{ $seo->icon}}" aria-hidden="true"></i></a>
                    @endforeach
                </div>
            </div>
            <!--About us End-->



            <!--Latest Articles-->
        <!--div class="col-md-4 col-sm-12">
                <h5>اخر المقالات</h5>
                <ul class="posts-list">

                @foreach($footerBlog as $blog)
            <?php $nameArrx = json_decode($blog->name , true); ?>
                    <!--Article 1-->
            <!--li>
                        <article class="post post-list">
                            <div class="entry-content media">
                                <div class="media-left">
                                <a href="#." title="" class="entry-image">
                                <img width="80" height="80" src="{{ URL ::to ('public/images/'.$blog->imageName)}}" alt="Your alt text here"> </a> </div>
                                <div class="media-body">
                                    <h4 class="entry-title"> <a href="#.">{{ $nameArrx [Lang::getLocale()] }}</a> </h4>
                                    <div class="entry-content-inner">
                                        <div class="entry-meta"> <span class="entry-date"><?php echo date(' M d , Y' , strtotime($blog->created_at)); ?></span> </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>
                    <!--Article end 1-->
                @endforeach



                </ul>
        </div>
    </div>
</div>
</div>
<!--Footer end-->

<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="bttxt"> جميع الحقوق محفوظه لشركه
            <a href="#" >emarkting-map.com</a></div>
    </div>
</div>

<!-- Bootstrap's JavaScript &copy;2019-->
<script src="{{ URL ::to ('assets/site/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{ URL ::to ('assets/site/js/bootstrap.min.js')}}"></script>

<!-- Owl carousel -->
<script src="{{ URL ::to ('assets/site/js/owl.carousel.js')}}"></script>

<!-- Custom js -->
<script src="{{ URL ::to ('assets/site/js/script.js')}}"></script>

<script src="{{ URL ::to ('assets/admin/custom.js')}}"></script>


<!-- BEGIN CORE PLUGINS -->
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>

<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/clockface/js/clockface.js')}}" type="text/javascript"></script>

<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>

<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{ URL ::to ('assets/admin/'.$locale.'/custom.js')}}" type="text/javascript"></script>
{{--<script src="{{ URL ::to ('assets/admin/custom.js')}}" type="text/javascript"></script>--}}


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5c574b456cb1ff3c14caf4eb/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
@stack('js1')


</body>
</html>