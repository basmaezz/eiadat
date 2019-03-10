@extends('site.web.app')
@section('pageTitle', 'اتصل بنا')
@section('content')
    <?php $locale =  App::getLocale();    ?>


    <!-- Header end --> <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">اتصل بنا</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسية</a> / <span>
            اتصل بنا</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

<!-- Contact us -->
<div class="inner-page">
  <div class="container">
    <div class="contact-wrap">
      <div class="row">
        <div class="col-md-12 column">
          <div class="title"> <span></span>
            <h2>ابق على تواصل معانا </h2>
            <p></p>
          </div>
        </div>
        
        <!-- Contact Info -->
        <div class="col-md-4 column">
          <div class="contact-now">
            <div class="contact"> <span><i class="fa fa-home"></i></span>
              <div class="information"> <strong>العنوان:</strong>
                <p>{{ $setting->address}}</p>
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-envelope"></i></span>
              <div class="information"> <strong>البريد الالكترونى:</strong>
                <p>{{ $setting->email }}</p>
                
              </div>
            </div>
            <!-- Contact Info -->
            <div class="contact"> <span><i class="fa fa-phone"></i></span>
              <div class="information"> <strong>التليفون:</strong>
                <p>{{ $setting->phone }}</p>
                
              </div>
            </div>
            <!-- Contact Info --> 
          </div>
          <!-- Contact Now --> 
        </div>
        
        <!-- Contact form -->
        <div class="col-md-8 column">
          <div class="contact-form">
            <div id="message"></div>
            <form action="{{ action('Site\IndexController@contactForm') }}" method="post" name="contactform" id="contactform">
                  {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <input name="name" type="text" id="name" value="{{ old('name') }}" placeholder="الاسم بالكامل">
                   @if($errors->has('name'))
                                <p style="color:red">{{ $errors->first('name') }}</p> @endif
                </div>
                <div class="col-md-6">
                  <input type="text" name="phone" value="{{ old('phone') }}" placeholder="رقم الهاتف">
               
                @if($errors->has('phone'))
                                <p style="color:red">{{ $errors->first('phone') }}</p> @endif
               
                </div>
                <div class="col-md-12">
                  <input name="email" type="text" value="{{ old('email') }}" id="email" placeholder="البريد الالكترونى">
                @if($errors->has('email'))
                                <p style="color:red">{{ $errors->first('email') }}</p> @endif
                </div>
                <div class="col-md-12">
                  <textarea rows="4" name="message" value="{{ old('message') }}" id="comments" placeholder="تفاصيل الرساله"></textarea>
                
                @if($errors->has('message'))
                                <p style="color:red">{{ $errors->first('message') }}</p> @endif
                </div>
                <div class="col-md-12">
                  <button title="" class="button" type="submit" id="submit">ارسال </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection