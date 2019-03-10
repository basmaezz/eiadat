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
                  action="{{ action('Admin\SpecializationController@update' , $editData->id) }}">
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

                                        @endif



                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  @lang('admin.Name')

                                            </label>
                                            <div class="col-md-9">

                                                <input type="text" class="form-control"  name="name_{{$data->symbol}}"

                                                value="{{ $editData->name }}"
                                                       >

                                            </div>
                                        </div>






                                    </div>

                                </div>
                                    <?php  $i++ ?>
                            @endforeach

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-8">
                                        <button type="submit" class="btn green">@lang('admin.Save') </button>
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




