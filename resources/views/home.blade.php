@extends('layouts.app')
@section('content')

<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ URL ::to ('/admin/home') }}">@lang('admin.Home') </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> @lang('admin.Control panel') </span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom"
             data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;

        </div>
    </div>
</div>
<!-- END PAGE BAR -->

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title" >
    <small>@lang('admin.Welcom to your dashboard')  </small>
</h3>
<!-- END PAGE TITLE-->


<div class="row">
    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <?php $patient = \App\UserWeb::where('type' , 2)->get(); ?>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ count($patient) }}"></span>
                </div>
                <div class="desc"> @lang('admin.Patient No')  </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-book"></i>
            </div>
            <div class="details">
                <?php $doctor = \App\UserWeb::where('type' , 1)->get(); ?>
                <div class="number">
                    <span data-counter="counterup" data-value="{{ count($doctor) }}">0</span></div>
                <div class="desc"> @lang('admin.Doctor No') </div>
            </div>
        </a>
    </div>

    <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="0"></span></div>
                <div class="desc"> @lang('admin.Applay by website')  </div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>


<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">احدث الحجوزات</span>
                </div>
               
            </div>
            <div class="portlet-body">
                <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                     <?php $all = \App\Reservations::take(10)->orderBy('id' , 'DESC')->get(); ?>
                    <ul class="feeds">
                       
                         @foreach($all as $data)
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>

                                        </div>

                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            

                                        {{@$data->Patient->name}}

                                        </div>
                                        <span class="label label-sm label-warning ">
                                                 <i class="fa fa-map-marker"></i>
                                                {{ @$data->Doctor->name }}
                                                </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> <?php echo date('M-d' , strtotime($data->reservDate) ); ?> </div>
                            </div>
                        </li>
                            @endforeach
                      
                     
                    </ul>
                </div>
               
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">

        <div id='calendarHome'></div>



    </div>
</div>









@endsection




