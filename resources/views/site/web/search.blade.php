@extends('site.web.app')
@section('content')

    <?php $locale =  App::getLocale();    ?>

    <?php
    $nameArr = json_decode($allDoctor->special_id->name , true);
    $Specail = $nameArr[Lang::getLocale()];

    $nameArr2 = json_decode($allDoctor->title_id->name , true);
    $title_id = $nameArr2[Lang::getLocale()];
    dd($title_id);

    ?>

    @foreach($docData as $doc)
       {{$doc->clinicService}}
        @endforeach

    <!-- Page Title start -->
    <div class="pageTitle">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h1 class="page-heading">نتائج البحث </h1>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسيه</a> / <span> بحث</span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="listpgWraper">
        <div class="container">

            <!-- Page Title start -->
            <div class="pageSearch">
                <div class="row">
                    <div class="col-md-3"><a href="#." class="btn"><i class="fa fa-search" aria-hidden="true"></i> بحث</a></div>
                    <div class="col-md-9">
                        <div class="searchform">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <input type="text" class="form-control" placeholder="اسم الدكتور" />
                                </div>
                                <div class="col-md-3 col-sm-2">
                                    <select class="form-control">
                        <option>اختر التخصص </option>
                        @foreach($allCateory as $cat)
                        <option>{{ $cat->name }} </option>
                        @endforeach
                    </select>
                                </div>
                                <div class="col-md-3 col-sm-2">
                                     <select class="form-control getCity" data-url="{{ action('Admin\CityController@getCity') }}">
                        <option>اختر المحافظه </option>
                        @foreach($allCity as $city)
                        <option value="{{ $city->id }}">{{ $city->city_ar}}</option>
                        @endforeach
                        
                    </select>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <select class="form-control" id="stateId">
                        <option>اختر المنطقه </option>
                       <option> كل المناطق </option>
                    </select>
                                </div>
                                <div class="col-md-1 col-sm-2">
                                    <button class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Title end -->

            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Side Bar start -->
                    <div class="sidebar">
                        <!-- Jobs By Title -->
                         <div class="widget">
            <h4 class="widget-title">النوع </h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="webdesigner" />
                <label for="webdesigner"></label>
                ذكر  <span></span> </li>
              <li>
                <input type="checkbox" name="checkname" id="3dgraphic" />
                <label for="3dgraphic"></label>
                انثى   <span></span> </li>
            
            </ul>
            </div>
            
            
             <div class="widget">
            <h4 class="widget-title">اللقب  </h4>


                 <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="webdesigner" />
                <label for="webdesigner"></label>
                  استاذ  <span class="glyphicon glyphicon-user"></span> </li>
              <li>
                <input type="checkbox" name="checkname" id="3dgraphic" />
                <label for="3dgraphic"></label>
                استشارى   <span></span> </li>
            <li>
                <input type="checkbox" name="checkname" id="3dgraphic" />
                <label for="3dgraphic"></label>
                مدرس    <span></span> </li>
                
                <li>
                <input type="checkbox" name="checkname" id="3dgraphic" />
                <label for="3dgraphic"></label>
                اخصائى   <span></span> </li>
            
            
            </ul>
            </div>
            
            
             <div class="widget">
            <h4 class="widget-title">سعر الكشف </h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="checkname" id="webdesigner" />
                <label for="webdesigner"></label>
                100  <span></span> </li>
              <li>
                <input type="checkbox" name="checkname" id="3dgraphic" />
                <label for="3dgraphic"></label>
                200   <span></span> </li>
            
            </ul>
            </div>

                       

                        
            
                        <!-- button -->
                        <div class="searchnt">
                            <button class="btn"><i class="fa fa-search" aria-hidden="true"></i> ابحث </button>
                        </div>
                        <!-- button end-->
                    </div>
                    <!-- Side Bar end -->
                </div>
                <div class="col-md-3 col-sm-6 pull-right">
                    <!-- Social Icons -->
                    <div class="sidebar">
                        <h4 class="widget-title">تابعنا على</h4>
                        <div class="social">
                         @foreach($social as $seo)
                         <a href="{{$seo->link}}" target="_blank"><i class="{{$seo->icon}}" aria-hidden="true"></i></a> 
                         @endforeach
                         
                          </div>
                        <!-- Social Icons end -->
                    </div>

                    <!-- Sponsord By -->
                    <div class="sidebar">
                   
                        <div class="gad"><img src="{{ URL ::to ('assets/site/images/googlead.jpg')}}" alt="your alt text" /></div>
                        <div class="gad"><img src="{{ URL ::to ('assets/site/images/googlead.jpg')}}" alt="your alt text" /></div>
                        <div class="gad"><img src="{{ URL ::to ('assets/site/images/googlead2.jpg')}}" alt="your alt text" /></div>
                       
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <!-- Search List -->
                    <ul class="searchList">
                        
                        
                        @foreach($allDoctor as $doctor)
                        <!-- job start -->
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg"><img src="{{ URL ::to ('public/images/'.$doctor->imageName)}}" alt="{{$doctor->imageName}}" /></div>
                                    <div class="jobinfo">
                                        <h3><a href="{{ action('Site\UserController@doctorProfile') }}">{{ $doctor->name }}</a></h3>
                                        <div class="companyName"><a href="#.">Datebase Management Company</a></div>


                                        <div class="location"><label class="fulltime">التخصص</label>   - <span>

                                            </span></div>
                                        <div class="location"><label class="fulltime">التخصص</label>   - <span>الدرجه العلميه</span></div>
                                        <div class="desi"><?php echo (($Specail). "  -  " .($title_id)) ?> </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="{{ action('Site\IndexController@book') }}">احجز الان</a></div>
                                </div>
                            </div>
                            <div class="candidateinfo" style="margin : 25px">
                           <div class="loctext" style="padding : 5px"><i class="fa fa-history" aria-hidden="true"></i> Member Since, Aug 14, 2016</div>
                           <div class="loctext" style="padding : 5px"><i class="fa fa-map-marker" aria-hidden="true"></i> 123 Boscobel Street, NW8 8PS</div>
                           <div class="loctext" style="padding : 5px"><i class="fa fa-phone" aria-hidden="true"></i> (+1) 123.456.7890</div>
                           <div class="loctext" style="padding : 5px"><i class="fa fa-envelope" aria-hidden="true"></i> info@mywebsite.com</div>
                           </div>
                        </li>
                        <!-- job end -->
                        @endforeach

                        
                        

                    </ul>

                    <!-- Pagination Start -->
                    <div class="pagiWrap">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="showreslt"></div>
                            </div>
                            <div class="col-md-8 col-sm-8 text-right">
                                <ul class="pagination">
                                   {{ $allDoctor->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end -->
                </div>
            </div>
        </div>
    </div>



@endsection