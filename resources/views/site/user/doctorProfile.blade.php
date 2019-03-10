@extends('site.web.app')
@section('content')

    <!-- Header end --> <!-- Page Title start -->
    <div class="pageTitle">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    {{--<h1 class="page-heading">دكتور احمد  </h1>--}}
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="#.">الرئيسيه</a> / <span>الصفحه الشخصيه </span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->
<?php
  $nameArr = json_decode($docData->special_id->name , true);
$Specail = $nameArr[Lang::getLocale()];


$nameArr2 = json_decode($docData->title_id->name , true);
$title_id = $nameArr2[Lang::getLocale()];
//dd($title_id);

?>
    <div class="listpgWraper">
        <div class="container">

            <!-- Job Header start -->
            <div class="job-header">
                <div class="jobinfo">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <!-- Candidate Info -->
                            <div class="candidateinfo">
                                <div class="userPic"><img src="{{ URL ::to ('assets/site/images/employers/emplogo1.jpg')}}" alt=""></div>
                                <div class="title"><?php echo $editData->name; ?></div>
                                <div class="desi"><?php echo (($Specail). "  -  " .($title_id)) ?> </div>

                                <div class="loctext"><i class="fa fa-history" aria-hidden="true"></i> Member Since, Aug 14, 2016</div>
                                <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php echo ((@$docData->city_id->name_ar). "  -  " .(@$docData->state_id->name_ar). "  -  " .($docData->address)) ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <!-- Candidate Contact -->
                            <div class="candidateinfo">
                                <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo ($docData->hotline)?></div>
                                <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> info@company.com</div>
                                <div class="loctext"><i class="fa fa-globe" aria-hidden="true"></i> www.company.com</div>
                                <div class="cadsocial"> <a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="http://www.plus.google.com" target="_blank"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> <a href="http://www.facebook.com" target="_blank"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="https://www.pinterest.com" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a> <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="jobButtons">
                    <a href="#." class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i>  احجز الان</a>
                    <a href="#." class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> ارسل رساله </a>
                    <a href="#." class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i>  تقيم الدكتور</a>
                    <a href="#." class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ابلغ عن دكتور</a> </div>
            </div>

            <!-- Job Detail start -->
            <div class="row">
                <div class="col-md-8">
                    <!-- About Employee start -->
                    <div class="job-header">
                        <div class="contentbox">
                            <h3>عن الدكتور</h3>
                            <p><?php echo ($docData->about)?> </p>
                        </div>
                    </div>

                    <!-- About Employee start -->
                    <div class="job-header">
                        <div class="contentbox">
                            <h3>مواعيد العياده </h3>
                            <p><?php echo ($docData->clinicTime)?> </p>
                        </div>
                    </div>



                    <!-- Portfolio start -->
                    <div class="job-header">
                        <div class="contentbox">
                            <h3>صور العياده</h3>
                            <ul class="row userPortfolio">


                                <li class="col-md-6 col-sm-6">
                                    <div class="imgbox"> <img src="{{ URL ::to ('public/images/'.$docData->doctorImage)}}"/>
                                        <div class="itemHover">
                                            <div class="zoombox"><a href="" title="images/portfolio/portfolio-img1" class="item-zoom fancybox-effects-a"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="" rel="nofollow" class="item-zoom" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a> </div>
                                            <div class="infoItem">
                                                <div class="itemtitle">
                                                    <h5>Title Here</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-6 col-sm-6">
                                    <div class="imgbox">     <img src="{{ URL ::to ('public/images/'.$docData->clinicImage)}}"/>
                                        <div class="itemHover">
                                            <div class="zoombox"><a href="" title="images/portfolio/portfolio-img2" class="item-zoom fancybox-effects-a"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="" rel="nofollow" class="item-zoom" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i></a> </div>
                                            <div class="infoItem">
                                                <div class="itemtitle">
                                                    <h5>Title Here</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>



                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <!-- Company Detail start -->
                    <div class="job-header">
                        <div class="jobdetail">
                            <h3>خدمات العياده</h3>
                            <ul class="jbdetail">
                                <li class="row">
                                    <div class="col-md-6 col-xs-6"><?php echo ($docData->clinicService); ?></div>
                                    <div class="col-md-6 col-xs-6"><span>10-50</span></div>
                                </li>
                                {{--<li class="row">--}}
                                {{--<div class="col-md-6 col-xs-6">Established In</div>--}}
                                {{--<div class="col-md-6 col-xs-6"><span>2008</span></div>--}}
                                {{--</li>--}}
                                {{--<li class="row">--}}
                                {{--<div class="col-md-6 col-xs-6">Current jobs</div>--}}
                                {{--<div class="col-md-6 col-xs-6"><span>10</span></div>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </div>

                    <!-- Google Map start -->
                {{--<div class="job-header">--}}
                {{--<div class="jobdetail">--}}
                {{--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d193572.19492844533!2d-74.11808565615137!3d40.70556503857166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1481975053066" allowfullscreen></iframe>--}}
                {{--</div>--}}
                {{--</div>--}}

                <!-- Contact Company start -->
                    {{--<div class="job-header">--}}
                    {{--<div class="jobdetail">--}}
                    {{--<h3>ارسل رساله للدكتور</h3>--}}
                    {{--<div class="formpanel">--}}
                    {{--<div class="formrow">--}}
                    {{--<input type="text" class="form-control" placeholder="Your Name">--}}
                    {{--</div>--}}
                    {{--<div class="formrow">--}}
                    {{--<input type="text" class="form-control" placeholder="Your Email">--}}
                    {{--</div>--}}
                    {{--<div class="formrow">--}}
                    {{--<input type="text" class="form-control" placeholder="Phone">--}}
                    {{--</div>--}}
                    {{--<div class="formrow">--}}
                    {{--<input type="text" class="form-control" placeholder="Subject">--}}
                    {{--</div>--}}
                    {{--<div class="formrow">--}}
                    {{--<textarea class="form-control" placeholder="Message"></textarea>--}}
                    {{--</div>--}}
                    {{--<input type="submit" class="btn" value="Submit">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>



@endsection