<!DOCTYPE html>
<html lang="en" class="rtl" dir="rtl">
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


</body>
</html>