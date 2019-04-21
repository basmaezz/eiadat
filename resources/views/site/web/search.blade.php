@extends('site.web.app')
@section('content')

    <?php $locale =  App::getLocale();    ?>

    <!-- Page Title start -->
    <form action="{{ action('Site\IndexController@search')}}" method="POST">
        @csrf
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
                    <div class="col-md-3"><button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search" aria-hidden="true"></i> بحث</button></div>
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
                                    <select name="cityId" class="form-control getCity1" data-url="{{ route('getCity') }}">
                                        <option>اختر المحافظه </option>
                                        @foreach($allCity as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_ar}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-2 col-sm-3">
                                    <select name="stateId" class="form-control getSubCity" id="stateId" data-url="{{ route('getSubCity') }}">
                                        <option>اختر المركز </option>

                                        <option> كل المراكز </option>

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
                <input type="checkbox" name="gender[]" @if(!empty(request('gender')) && in_array(1,request('gender'))) checked @endif id="male" value="1" />
                <label for="male"></label>
                ذكر  <span></span> </li>
              <li>
                <input type="checkbox" name="gender[]" @if(!empty(request('gender')) && in_array(2,request('gender'))) checked @endif id="female" value="2"/>
                <label for="female"></label>
                انثى   <span></span> </li>
            
            </ul>
            </div>
            
            
             <div class="widget">
            <h4 class="widget-title">اللقب  </h4>

                 <ul class="optionlist">

              <li>
                <input type="checkbox" name="titleId[]" id="checkdr" value="استاذ"/>
                <label for="checkdr"></label>
                استاذ  <span ></span>
              </li>
              <li>

                <input type="checkbox" name="titleId[]" id="checkprof" value="استشارى" />
                <label for="checkprof"></label>
                استشارى   <span ></span> </li>
              <li>
                <input type="checkbox" name="titleId[]" id="checkmester" value="مدرس" />
                <label for="checkmester"></label>
                مدرس    <span ></span>
              </li>
                
                <li>
                <input type="checkbox" name="titleId[]" id="checkdoc" value="اخصائى"/>
                <label for="checkdoc"></label>
                اخصائى   <span ></span>
                </li>

            </ul>
            </div>
                        
             <div class="widget">
            <h4 class="widget-title">سعر الكشف </h4>
            <ul class="optionlist">
              <li>
                <input type="checkbox" name="price[]" id=100" value="100" />
                <label for="price100"></label>
                100  <span></span>
              </li>
              <li>
                <input type="checkbox" name="price[]" id="200" value="200" />
                <label for="price200"></label>
                200   <span></span>
              </li>

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

                            @php
                                $Specail ='';
                                $title_id='';
                                 if(isset($doctor->data->Specia) & !empty($doctor->data->Specia)){
                                    $Specail =$doctor->data->Special->id;

                                 }

                            @endphp
                        <!-- job start -->
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="jobimg"><img src="{{ URL ::to ('public/images/'.$doctor->imageName)}}" alt="{{$doctor->imageName}}" /></div>
                                    <div class="jobinfo">
                                        <h3><a href="{{ action('Site\UserController@doctorProfile') }}">{{ $doctor->name }}</a></h3>
                                        <div class="companyName"><a href="#.">Datebase Management Company</a></div>


                                        <div class="location"><label class="fulltime">@if(isset($doctor->data->Special) && !empty($doctor->data->Special)) {{json_decode($doctor->data->Special->name,true)[Lang::getLocale()]}} @endif
                                            </label>
                                            - <span>@if(isset($doctor->data->title_id) && !empty($doctor->data->title_id)) {{json_decode($doctor->data->title_id->name,true)[Lang::getLocale()]}} @endif</span></div>


                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a href="{{ action('Site\IndexController@book') }}">احجز الان</a></div>
                                </div>
                            </div>
                            <div class="candidateinfo" style="margin : 25px">
                           <div class="loctext" style="padding : 5px"><i class="fa fa-history" aria-hidden="true"></i> Member Since,{{ date('F d, Y',strtotime($doctor->created_at)) }}</div>

                           <div class="loctext" style="padding : 5px"><i class="fa fa-map-marker" aria-hidden="true"></i> @if(isset($doctor->data) && !empty($doctor->data)) {{$doctor->data->address}}
                               @else {{"no data"}}
                               @endif</div>
                           <div class="loctext" style="padding : 5px"><i class="fa fa-phone" aria-hidden="true"></i>@if(isset($doctor->data) && !empty($doctor->data)) {{$doctor->data->hotline}}
                               @else {{"no data"}}
                               @endif</div>

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

    </form>

@endsection