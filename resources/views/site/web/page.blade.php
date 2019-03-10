@extends('site.web.app')
<?php $page  = $onePage->name; ?>
@section('pageTitle', $page)
@section('content')
    <?php $locale =  App::getLocale();?>

    <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">{{ $onePage->name }}</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسيه</a> / <span>{{ $onePage->name }}</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="about-wraper"> 
  <!-- About -->
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>{{ $onePage->tittle }}</h2>
        <p>  <?php echo  $onePage->content ; ?> </p>
      </div>
      <div class="col-md-5">
        <div class="postimg"><img src="{{ URL ::to ('public/images/'.$onePage->imageName)}}" alt="your alt text" /></div>
      </div>
    </div>
  </div>
  
 
 
</div>

@endsection