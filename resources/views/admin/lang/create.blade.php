@extends('layouts.app')
@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet box  green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-plus"></i>   @lang('admin.Add new item') </div>
        <div class="tools"></div>
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal"
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\LanguageController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>



                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name" nameAr = "الاسم"  value="{{ old('name') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Symbole')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="symbol" value="{{ old('symbol') }}"> </div>
                </div>





                <div class="form-group ">
                    <label class="control-label col-md-3"> @lang('admin.Image')</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail"
                                 data-trigger="fileinput"
                                 style="width: 200px; height: 150px;"></div>
                            <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="flag"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists"
                                   data-dismiss="fileinput"> Remove </a>
                            </div>
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




