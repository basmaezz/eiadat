<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<?php  $locale = App::getLocale();  ?>
<?php $pageName =  basename(url()->current()) ?>

<head>
    <meta charset="utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if($locale =='ar')
    <title>لوحه التحكم | عياداتى </title>
    @elseif($locale =='en')
        <title> Cpanel </title>
        @endif

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />

    @if($locale =='ar')
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
   @else
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />

    @endif

    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
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
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
   @else
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
    @endif


    <!-- BEGIN THEME LAYOUT STYLES -->
    @if($locale =='ar')
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/themes/darkblue-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    @elseif($locale =='en')

    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ URL ::to ('assets/site/logo.jpg')}}">
</head>
<!-- END HEAD -->
@if (Auth::guest())
@else
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white"
    @if($locale =='ar')
        style="direction: rtl"
        @endif>
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">

                <a href="#" style="margin: 0 0 0px">

                    <h2 style="color: white ; "> عياداتى</h2>

                    <!--img src="{{ URL ::to ('assets/admin/logo.png')}}"
                         style="width: 160px; height: 60px;" alt="logo" class="logo-default"/-->
                </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                @if (Auth::guest())
                @else
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">

                                <span class="username username-hide-on-mobile"> @lang('admin.Change Language')   </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ action('Admin\SettingController@changeLang' , 'ar') }}">
                                        <i class="icon-globe"></i>@lang('admin.Arabic') </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="{{ action('Admin\SettingController@changeLang' , 'en') }}">
                                        <i class="icon-globe"></i> {{ __('admin.English') }}  </a>
                                </li>

                            </ul>

                        </li>


                    <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <img alt="" class="img-circle"
                                     src="{{ URL ::to ('assets/admin/en/assets/layouts/layout/img/avatar.png')}}"/>
                                <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <!--li>
                                    <a href="#">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li class="divider"> </li-->
                                <li>


                                    {{--<a href="{{ route('logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                   {{--document.getElementById('logout-form').submit();">--}}
                                        {{--<i class="icon-logout"></i>  {{ __('admin.Logout') }}--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                                          {{--style="display: none;">--}}
                                        {{--{{ csrf_field() }}--}}
                                    {{--</form>--}}
                                </li>
                            </ul>

                        </li>
                        <!-- END USER LOGIN DROPDOWN -->




                    @endif
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse" >
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->

                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper hide">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                    <li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
                        <a href="{{ URL :: to ('/admin/home')}}" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title"> @lang('admin.Home')  </span>
                            <span class="selected"></span>

                        </a>

                    </li>
                  @if (Auth::user()->groupId == 1)
                    <!--- Admin -->
                    <li class="nav-item {{ Request::is('admin/usergroups*') || Request::is('admin/menu*')|| Request::is('admin/admin*')
                    ? 'active' : '' }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-users"></i>
                            <span class="title"> @lang('admin.User & Groups')  </span>
                            <span class="selected"></span>
                            <span class="arrow open"></span>

                        </a>
                        <ul class="sub-menu">
                            <!--li class="nav-item start {{ Request::is('admin/menu*') ? 'active' : '' }}">
                                <a href="{{ action('Admin\MenuController@index') }}" class="nav-link ">
                                    <i class="fa fa-list"></i>
                                    <span class="title"> @lang('admin.Menu') </span>
                                    <span class="selected"></span>
                                </a>
                            </li-->
                            <li class="nav-item start {{ Request::is('admin/usergroups*') ? 'active' : '' }}">
                                <a href="{{ action('Admin\UsergroupsController@index') }}" class="nav-link ">
                                    <i class="fa fa-star"></i>
                                    <span class="title"> @lang('admin.User groups')</span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <li class="nav-item start {{ Request::is('admin/admin*') ? 'active' : '' }}">
                                <a href="{{ action('Admin\AdminController@index') }}" class="nav-link ">
                                    <i class="fa fa-users"></i>
                                    <span class="title"> @lang('admin.Users')</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php  $categories = \App\Menu::where('parentId', '=', 0)->get();?>
                    @foreach($categories as $category)
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="{{ $category->icon }}"></i>
                                <span class="title">{{ $category['name_'.$locale] }} </span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>

                            </a>
                            @if(count($category->childs))
                                @include('admin.sidebar.manageChild',['childs' => $category->childs])
                            @endif
                        </li>
                    @endforeach

                      @else
                          <?php  $userMenu = \App\UserMenu::where('groupId', '=', Auth::user()->groupId)->get();
                                 foreach ($userMenu as $m)
                                     {
                                         $mData = \App\Menu::find($m->menuId);
                                         $m->link = $mData->link;
                                         $m->icon = $mData->icon;
                                         $m->name_ar = $mData->name_ar;

                                     }?>
                          @foreach($userMenu as $mm)
                              <li class="nav-item ">
                                  <a href="{{ url('/'.$mm->link)  }}" class="nav-link nav-toggle">
                                      <i class="{{ $mm->icon }}"></i>
                                      <span class="title">{{ $mm['name_'.$locale] }} </span>
                                  </a>
                              </li>
                          @endforeach




                    @endif







                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">

                @yield('content')


            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>

        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">  </div>

        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>

    @endif
    <!-- END FOOTER -->
    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script>
    <![endif]-->
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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
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

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL ::to ('assets/admin/'.$locale.'/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
    <script src="{{ URL ::to ('assets/admin/'.$locale.'/custom.js')}}" type="text/javascript"></script>
    <script src="{{ URL ::to ('assets/admin/custom.js')}}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    <?php $all = \App\Reservations::all(); ?>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendarHome').fullCalendar({
                // put your options and callbacks here
                events : [
                        @foreach($all as $data)
                    {
                        title : '{{ $data->patientId }}',
                        start : '{{ $data->reservDate }}',
                        url : ''
                    },
                    @endforeach
                ]
            })
        });
    </script>
    </body>

</html>