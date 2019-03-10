@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i> @lang('admin.Edit item')
            </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                  action="{{ action('Admin\PagesController@update' , $pages->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-body">


                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="tabbable-custom ">


                        <ul class="nav nav-tabs ">


                            @foreach($allLang as $data)
                                <li @if($data->symbol == 'ar') class="active" @endif>
                                    <a href="#tab_{{$data->id}}" data-toggle="tab">
                                        <img src="{{ URL ::to ('public/images/'.$data->flag)}}" width="20px;"
                                             height="20px;"/>
                                        {{$data->name}} </a>
                                </li>
                            @endforeach


                        </ul>
                        <div class="tab-content">
                            <?php $i =0 ?>
                            @foreach($allLang as $data)

                                <div class="tab-pane @if($data->symbol == 'ar') active @endif" id="tab_{{$data->id}}">
                                    <div class="form-body">
                                        @if($data->symbol == 'ar')
                                            <input type="hidden" name="oldImage" value="{{ $pages->imageName }}">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3"> @lang('admin.Image')</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;">

                                                            <img src="{{ URL ::to ('public/images/'.$pages->imageName)}}"/>
                                                        </div>
                                                        <div>
                               <span class="btn red btn-outline btn-file">
                                   <span class="fileinput-new"> Select image </span>
                                   <span class="fileinput-exists"> Change </span>
                                   <input type="file" name="imageName"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
                                                               data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">@lang('admin.Position') </label>
                                                <div class="col-md-9">
                                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" name="location"  value="1"  @if($pages->location == 1)checked @endif > header
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="location"  value="2" @if($pages->location == 2)checked @endif> Footer
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="location"  value="3" @if($pages->location == 3)checked @endif> Both
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>



                                        @endif



                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  @lang('admin.Name')

                                            </label>
                                            <div class="col-md-9">

                                                <input type="text" class="form-control"
                                                       name="name_{{$data->symbol}}"
                                                       @foreach($nameArr as $name)
                                                value="{{ $name }}"
                                                        @endforeach>

                                            </div>
                                        </div>


                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  @lang('admin.Tittel')

                                            </label>
                                            <div class="col-md-9">



                                                        <input type="text" class="form-control"
                                                               name="tittle_{{$data->symbol}}"

                                                        @foreach($tittleArr as $tittle)
                                                           value="{{ $tittle }}"
                                                                @endforeach>



                                            </div>
                                        </div>




                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  @lang('admin.Descrption')

                                            </label>
                                            <div class="col-md-9">
                                                    <textarea class="ckeditor form-control"
                                                              name="content_{{$data->symbol}}"
                                                              rows="6">

                                                         @foreach($contentsArr as $cont)
                                                            {{ $cont }}
                                                        @endforeach
                                                    </textarea>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                    <?php  $i++ ?>
                            @endforeach

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-8">
                                        <button type="submit" class="btn green">@lang('admin.Save')</button>
                                        <button type="button" class="btn default"
                                                onclick="window.history.back()">@lang('admin.Cancel')
                                        </button>
                                    </div>
                                </div>
                            </div>
            </form>

        </div>


    </div>


    </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
    </div>


@endsection




