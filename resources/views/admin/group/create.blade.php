@extends('layouts.app')
@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet box  green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-plus"></i> @lang('admin.Add new item')  </div>
        <div class="tools"></div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal"
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\UsergroupsController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>



                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name') </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" nameAr = "الاسم"  value="{{ old('name') }}"> </div>
                </div>

                <hr/>

                 <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Permission') </label>
                    <div class="col-md-9">


                        <div class="mt-checkbox-list">
                            <ul class="nested" id="nested">
                            @foreach($allMenu as $menu)
                            
                                <li> <input type="checkbox" name="menu[]" value="{{  $menu->id }}" > {{ $menu->name_ar  }} 
                              
                                     
                                   <ul >
                                       <li> <input  type="checkbox"  name="permission_{{  $menu->id }}[]"  value="index"> عرض الكل  </li>
                                                        
                                       <li> <input  type="checkbox"  name="permission_{{  $menu->id }}[]" value="store"> اضافه </li>
                                       
                                        <li> <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="show" > عرض العنصر </li>
                                        
                                        
                                         <li> <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="update" > تعديل </li>
                                         
                                          <li> <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="destroy" > حذف  </li>
                                   </ul>
                                     
                                     
                                     
                                     
                                    <!--div class="form-group">
                                               
                                                <div class="col-md-12">
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="permission_{{  $menu->id }}[]"  value="index"> Index  
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="store"> Store
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="show" > Show
                                                            <span></span>
                                                        </label>
                                                        
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="update" > Update
                                                            <span></span>
                                                        </label>
                                                        
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="permission_{{  $menu->id }}[]" value="destroy" > Destroy
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div-->
                                    
                                </li>
                                
                            
                            
                        
                                @endforeach
                                </ul>
                        </div>


                    </div>
                </div>


            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-4 col-md-8">
                        <button type="submit" class="btn green">@lang('admin.Save') </button>
                        <button type="reset" class="btn default" onclick="window.history.back()">@lang('admin.Cancel')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->

@endsection




