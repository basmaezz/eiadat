<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="images/user-avatar.png" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php $userData = \App\UserWeb::find(Session::has('userId')); ?>

                {{ $userData->name }}
            </div>
            <div class="profile-usertitle-job">
               عضويه عاديه
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-success ">ترقية العضوية</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="{{ Request::is('profile*') ? 'active' : '' }}">
                    <a href="{{ action('Site\UserController@profile') }}">
                        <i class="fa fa-home"></i>
                        الرئيسية </a>
                </li>
                <li class="{{ Request::is('editProfile*') ? 'active' : '' }}">
                    <a href="{{ action('Site\UserController@editProfile') }}">
                        <i class="fa fa-user"></i>
                         الملف  الشخصى </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                         طلبات المشتريات </a>
                </li>

                <li>
                    <a href="#" target="_blank">
                        <i class="fa fa-tree"></i>
                        الشجره </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-dollar"></i>
                        العموله </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-line-chart"></i>
                         التقارير </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>