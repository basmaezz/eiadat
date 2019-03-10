@extends('site.web.app')
<?php $page  = $blog->name; ?>
@section('pageTitle', $page)
@section('content')

    <?php $locale =  App::getLocale();    ?>
    
    <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">{{ $blog->name }}</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسية</a> / <span>{{ $blog->name }}</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container"> 
    
    <!-- Blog start -->
    <div class="row">
      <div class="col-md-8"> 
        <!-- Blog List start -->
        <div class="blogWraper">
          <div class="blogList blogdetailbox">
            <div class="postimg">
                <img src="{{ URL ::to ('public/images/'.$blog->imageName)}}" alt="{{ $blog->name}}">
              <div class="date"> <?php echo date_format( $blog->created_at ,"d M") ?> </div>
            </div>
            <div class="post-header margin-top30">
              <h4><a href="#.">{{ $blog->tittle }}</a></h4>
             
            </div>
            <p>   <?php echo  $blog->content ; ?> </p>
          </div>
        
        
        </div>
      </div>
      <div class="col-md-4"> 
        <!-- Side Bar -->
        <div class="sidebar"> 
         
          
          
          
          <!-- Recent Posts -->
          <div class="widget">
            <h5 class="widget-title">احدث المقالات</h5>
            <ul class="papu-post">
                
                @foreach($allBlogs as $data)
                
                  <li>
                <div class="media-left"> 
                <a href="{{ action('Site\IndexController@blog' , $data->id) }}"><img src="{{ URL ::to ('public/images/'.$data->imageName)}}" 
                alt="{{ $data->name }}"></a> </div>
                <div class="media-body"> 
                <a class="media-heading" href="{{ action('Site\IndexController@blog' , $data->id) }}">
                    {{ $data->name }}</a> 
                    <span><?php echo date_format( $data->created_at ,"M d , Y") ?></span>
                </div>
              </li>
                
            
              @endforeach
             
             
             
             
            </ul>
          </div>
          
          
         
         
        
          
        </div>
      </div>
    </div>
  </div>
</div>


@endsection