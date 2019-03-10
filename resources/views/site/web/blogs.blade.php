@extends('site.web.app')
@section('pageTitle', 'نصائح طبيه')
@section('content')

    <?php $locale =  App::getLocale();    ?>

    <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"> نصائح طبيه</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="{{ action('Site\IndexController@index') }}">الرئيسيه</a> / <span>نصائح طبيه </span></div>
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
              <ul class="blogList">
                @foreach($blogs as $blog)

                <li>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="postimg"><img src="{{ URL ::to ('public/images/'.$blog->imageName)}}" alt="Blog Title">
                        <div class="date"> <?php echo date( "d M" , strtotime($blog->created_at)) ?></div>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="post-header">
                        <h4><a href="{{ action('Site\IndexController@blog' , $blog->id) }}">{{ $blog->name }}</a></h4>

                      </div>
                      <p>{{ $blog->tittle }}...</p>
                      <a href="{{ action('Site\IndexController@blog' , $blog->id) }}" class="readmore">أقرا المزيد</a> </div>
                  </div>
                </li>

                @endforeach

              </ul>
            </div>

            <!-- Pagination -->
            <div class="pagiWrap">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="showreslt"></div>
                </div>
                <div class="col-md-8 col-sm-6 text-right">
                  <ul class="pagination">
                    {{ $blogs->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- Side Bar -->
            <div class="sidebar">
             
              <!-- Categories -->
              <div class="widget">
                <h5 class="widget-title">التخصصات</h5>
                <ul class="categories">
                
                @foreach($allCateory as $cat)
                  <li><a href="#.">{{ $cat->name }}</a></li>
                  @endforeach
               
               
                </ul>
              </div>
              <!-- Recent Posts -->
              <div class="widget">
                <h5 class="widget-title">احدث المقالات</h5>
                <ul class="papu-post">
                
                @foreach($allBlogs as $blog)
                  <li>
                    <div class="media-left"> <a href="{{ action('Site\IndexController@blog' , $blog->id) }}"><img src="{{ URL ::to ('public/images/'.$blog->imageName)}}" alt="Blog Title"></a> </div>
                    <div class="media-body"> <a class="media-heading" href="{{ action('Site\IndexController@blog' , $blog->id) }}">{{ $blog->name }}</a> 
                    
                    <span><?php echo date( "M d , Y" , strtotime($blog->created_at)) ?> </span> </div>
                  </li>
                  @endforeach
                  
                
                 
                 
                </ul>
              </div>
             
            
              <!-- Tags -->
              <div class="widget">
                <h5 class="widget-title">Tags</h5>
                <ul class="tags">
                  <li><a href="#.">Amazing </a></li>
                  <li><a href="#.">Envato </a></li>
                  <li><a href="#.">Themes </a></li>
                  <li><a href="#.">Responsiveness </a></li>
                  <li><a href="#.">Developer </a></li>
                  <li><a href="#.">Mobile </a></li>
                  <li><a href="#.">IOS </a></li>
                  <li><a href="#.">Design </a></li>
                  <li><a href="#.">Jobs </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection