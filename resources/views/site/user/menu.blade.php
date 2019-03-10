<div class="col-md-3 col-sm-4">
    <ul class="usernavdash">
        <li><a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> الرئيسيه</a></li>
        @if(Auth::guard('users-web')->check())
            <li>
                <a href="{{url('/userprofile/'.auth('users-web')->user()->id)}}">
                    <i class="fa fa-user" aria-hidden="true"></i> الملف الشخصى </a>
            </li>
        @elseif(Auth()->check())
            <li  class="{{ request()->segment(1) == 'userprofile'?'active':''}}">
                <a href="{{url('/userprofile/'.auth::user()->id)}}">
                    <i class="fa fa-user" aria-hidden="true"></i> الملف الشخصى </a>
            </li>                          @endif
        <li class="{{ request()->segment(1) == 'drugs'?'active':''}}"><a href="{{url('/drugs/'.auth('users-web')->user()->id)}}"><i class="fa fa-fa fa-medkit" aria-hidden="true"></i> الادويه  </a></li>
        <li class="{{ request()->segment(1) == 'analyzes'?'active':''}}"><a href="{{url('/analyzes/'.auth('users-web')->user()->id)}}"><i class="fa fa-list" aria-hidden="true"></i> التحاليل </a></li>
        <li class="{{ request()->segment(1) == 'radiations'?'active':''}}"><a href="{{url('/radiations/'.auth('users-web')->user()->id)}}"><i class="fa fa-heartbeat" aria-hidden="true"></i> الاشعه </a></li>
        <li class="{{ request()->segment(1) == 'processes'?'active':''}}"><a href="{{url('/processes/'.auth('users-web')->user()->id)}}"><i class="fa fa-user-md" aria-hidden="true"></i> العمليات </a></li>
        <li class="{{ request()->segment(1) == 'patients'?'active':''}}"><a href="{{url('/patients/'.auth('users-web')->user()->id)}}"><i class="fa fa-users" aria-hidden="true"></i> المرضى</a></li>
        <li class="{{ request()->segment(1) == 'reservations'?'active':''}}"><a href="{{url('/reservations/'.auth('users-web')->user()->id)}}"><i class="fa fa-users" aria-hidden="true"></i> الحجوزات</a></li>
        {{--<li><a href="#"><i class="fa fa-book" aria-hidden="true"></i> الحجوزات</a></l--}}
        <li><a href="#"><i class="fa fa-copy" aria-hidden="true"></i> الروشته</a></li>
        <li><a href="{{ URL('logout' ) }}"><i class="fa fa-copy" aria-hidden="true"></i> تسجيل خروج</a></li>
    </ul>
</div>