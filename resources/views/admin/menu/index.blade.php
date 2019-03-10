@extends('layouts.app')
@section('content')



<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">  عرض البيانات </span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ action('Admin\MenuController@create') }}" class="btn sbold green ">
                                    <i class="fa fa-plus"></i>  اضافه عنصر جديد </a>
                            </div>

                        </div>
                    </div>
                </div>


                        <ul>
                            @foreach($categories as $category)
                                <li>
                                    <div style="margin: 40px;">
                                        <div style="float: left;">  <a href="{{ action('Admin\MenuController@delmenu' , $category->id) }}" class="btn sbold red ">
                                                <i class="fa fa-times"></i> </a></div>
                                        <div style="float: left;">  <a href="{{ action('Admin\MenuController@edit' ,  $category->id) }}" class="btn sbold blue ">
                                                <i class="fa fa-pencil"></i> </a></div>


                                    {{ $category->name_ar }}
                                    @if(count($category->childs))
                                        @include('admin.menu.manageChild',['childs' => $category->childs])
                                    @endif



                                    </div>
                                </li>
                            @endforeach
                        </ul>


            </div>
        </div>
    </div>


            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>





</div>



@endsection




