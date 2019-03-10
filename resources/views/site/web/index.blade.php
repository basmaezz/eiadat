@extends('site.web.app')
@section('pageTitle', 'الرئيسيه')
@section('content')




    <!-- Search start -->
    <div class="searchwrap">
        <div class="container">
            <h3>اسهل واسرع طريقه للحجز<!--span>Start yours today.</span--></h3>
            <div class="searchbar row">
               <form action="{{ action('Site\IndexController@search')}}" method="POST">
                    {{ csrf_field() }}
                 <div class="col-md-3 col-xs-12">
                    <select class="form-control">
                        <option>اختر التخصص </option>
                        @foreach($allCateory as $cat)
                        <option>{{ $cat->name }} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 col-xs-12">
                    <select class="form-control getCity" data-url="{{ action('Admin\CityController@getCity') }}">
                        <option>اختر المحافظه </option>
                        @foreach($allCity as $city)
                        <option value="{{ $city->id }}">{{ $city->city_ar}}</option>
                        @endforeach
                        
                    </select>
                </div>
                  <div class="col-md-3 col-xs-12">
                    <select class="form-control" id="stateId">
                        <option>اختر المنطقه </option>
                       <option> كل المناطق </option>
                    </select>
                </div>
                 <div class="col-md-2 col-xs-8">
                    <input type="text" class="form-control" placeholder="اكتب اسم الدكتور" />
                </div>
               
                <div class="col-md-1 col-xs-4">
                    <input type="submit" class="btn" value="بحث ">
                </div>
                
                </form>
            </div>
            <!-- button start -->
            <div class="getstarted"><a href="{{ action('Site\IndexController@book') }}"><i class="fa fa-user" aria-hidden="true"></i>   احجز معانا</a></div>
            <!-- button end -->

        </div>
    </div>
    <!-- Search End -->

    <!-- How it Works start -->
    <div class="section howitwrap">
        <div class="container">
            <!-- title start -->
            <div class="titleTop">
                <!--div class="subtitle">Here You Can See</div-->
                <h3>احجز دكتورك <span>
                    الان
                    </span></h3>
            </div>
            <!-- title end -->
            <ul class="howlist row">
                
                @foreach($indexPage as $index)
                <!--step 1-->
                <li class="col-md-4 col-sm-4">
                    <div class="iconcircle"><i class="fa fa-user" aria-hidden="true"></i></div>
                    <h4>{{ $index->name }}</h4>
                    <p>{{ $index->tittle }}</p>
                </li>
                <!--step 1 end-->
                @endforeach


            </ul>
        </div>
    </div>
    <!-- How it Works Ends -->
    
    
    <!-- Top Employers start -->
    <div class="section greybg">
        <div class="container">
            <!-- title start -->
            <div class="titleTop">
                <!--div class="subtitle">الاطباء الاعلى تقيم</div>
                -->
                <h3>الاكثر <span>تقيم</span></h3>
            </div>
            <!-- title end -->

            <ul class="employerList">

            @foreach($lastDr as $dr)
                <!--employer-->
                    <li data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$dr->name}}">
                        
                        <?php // dd($dr->image); ?>

                        @if(!empty($dr->image))
                            <a href="#">
                                <img src="{{ URL ::to ('public/images/'.$dr->image)}}" alt="{{$dr->name}}" />
                            </a>
                        @else
                            <a href="#">
                                <img src="{{ URL ::to ('assets/site/images/employers/emplogo1.jpg')}}" alt="{{$dr->name}}" />
                            </a>
                        @endif
                    </li>
                @endforeach


            </ul>
        </div>
    </div>
    <!-- Top Employers ends -->


   <!-- Popular Searches start -->
    <!--div class="section">
        <div class="container">

            <div class="titleTop">
               
                <h3>التخصصات و  <span>المناطق</span></h3>
            </div>

            <div class="topsearchwrap row">
                <div class="col-md-6">

                    <h4>التخصصات</h4>
                    <ul class="row catelist">
                        @foreach($allCateory as $cat)
                            <li class="col-md-6 col-sm-6"><a href="#.">{{ $cat->name }} <span>({{ $cat->countDr}})</span></a></li>
                        @endforeach

                    </ul>

                </div>
                <div class="col-md-6">

                    <h5>المناطق</h5>
                    <ul class="row catelist">
                        @foreach($allCity1 as $city)
                            <li class="col-md-4 col-sm-4 col-xs-6"><a href="#.">{{ $city->city }}</a></li>
                        @endforeach

                    </ul>

                </div>
            </div>
        </div>
    </div>
    <!-- Popular Searches ends -->
    
    
    
     <!-- Featured Jobs start greybg-->
    <div class="section ">
        <div class="container">
            <!-- title start -->
            <div class="titleTop">
                <!--div class="subtitle">Here You Can See</div-->
                <h3>اخر <span>المقالات</span></h3>
            </div>
            <!-- title end -->

            <!--Featured Job start-->
            <ul class="jobslist row">

            @foreach ($allBlog as $row)
                <!--Job start-->
                    <li class="col-md-6">
                        <div class="jobint">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <img src="{{ URL ::to ('public/images/'.$row->imageName)}}" alt="{{ $row->name }}" /></div>
                                <div class="col-md-7 col-sm-7">
                                    <h4><a href="#.">{{ $row->name }}</a></h4>
                                    <!--div class="company"><a href="#.">Datebase Management Company</a></div-->
                                    <div class="jobloc"><label class="fulltime">Full Time</label>   - <span>New York</span></div>
                                </div>
                                <div class="col-md-3 col-sm-3"><a href="#." class="applybtn">قراءه المزيد</a></div>
                            </div>
                        </div>
                    </li>
                    <!--Job end-->
                @endforeach






            </ul>
            <!--Featured Job end-->

            <!--button start-->
            <div class="viewallbtn"><a href="{{ action('Site\IndexController@blogs')}}">اخر المقالات</a></div>
            <!--button end-->
        </div>
    </div>
    <!-- Featured Jobs ends -->
    
    
    
    <!-- Top Employers start -->
    <div class="section greybg">
        <div class="container">
            <!-- title start -->
            <div class="titleTop">
                <!--div class="subtitle">الاطباء الاعلى تقيم</div>
                -->
                <h3> شركائنا</h3>
            </div>
            <!-- title end -->

            <ul class="employerList">

            @foreach($lastDr as $dr)
                <!--employer-->
                    <li data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$dr->name}}">
                        
                        <?php // dd($dr->image); ?>

                        @if(!empty($dr->image))
                            <a href="#">
                                <img src="{{ URL ::to ('public/images/'.$dr->image)}}" alt="{{$dr->name}}" />
                            </a>
                        @else
                            <a href="#">
                                <img src="{{ URL ::to ('assets/site/images/employers/emplogo1.jpg')}}" alt="{{$dr->name}}" />
                            </a>
                        @endif
                    </li>
                @endforeach


            </ul>
        </div>
    </div>
    <!-- Top Employers ends -->

@endsection