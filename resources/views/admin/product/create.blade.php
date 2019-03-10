@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i> اضافه عنصر جديد
            </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                  action="{{ action('Admin\ProductController@store') }}">
                {{ csrf_field() }}
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

                            @foreach($allLang as $data)


                                <div class="tab-pane @if($data->symbol == 'ar') active @endif" id="tab_{{$data->id}}">

                                    <div class="form-body">


                                        @if($data->symbol == 'ar')



                                            <div class="form-group ">
                                                <label class="control-label col-md-3"> الصوره الاساسيه

                                                </label>
                                                <div class="col-md-9" id="imageContiner">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;"></div>
                                                        <div>
                                <span class="btn red btn-outline btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="mainImg"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                        </div>
                                                    </div>
                                                    <br/>

                                                </div>
                                            </div>


                                            <input type="hidden" value="1" id="img_itr" name="img_itr">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3"> الصور
                                                    <button type="button" id="addImage" class="btn blue">اضافه صوره جديده</button>
                                                </label>
                                                <div class="col-md-9" id="imageContiner">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;"></div>
                                                        <div>
                                <span class="btn red btn-outline btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="imageName[]"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                        </div>
                                                    </div>
                                                    <br/>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">اسم الفئه </label>
                                                <div class="col-md-9">
                                                    <select name="catId" class="form-control select2">
                                                        <option value="0" >لا يوجد ..</option>
                                                        @foreach($allCat as $m)
                                                            <option value="{{ $m->id }}">
                                                                {{ $m->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">  السعر  </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="price" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">   الكميه </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="quantity" >
                                                </div>
                                            </div>



                                        @endif


                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  الاسم

                                            </label>
                                            <div class="col-md-9">

                                                <input type="text" class="form-control"
                                                       name="name_{{$data->symbol}}" value="{{ old('name_'.$data->symbol) }}">

                                            </div>
                                        </div>


                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  عنوان

                                            </label>
                                            <div class="col-md-9">


                                                <input type="text" class="form-control"
                                                       name="tittle_{{$data->symbol}}" value="{{ old('tittle_'.$data->symbol) }}">

                                            </div>
                                        </div>



                                        <div class="form-group last">
                                            <label class="control-label col-md-3">  التفاصيل

                                            </label>
                                            <div class="col-md-9">
                                                    <textarea class="ckeditor form-control"
                                                              name="content_{{$data->symbol}}"
                                                              rows="6">{{ old('content_'.$data->symbol) }}</textarea>

                                            </div>
                                        </div>


                                            @if($data->symbol == 'ar')
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">اضافه تفاصيل اخرى
                                                    <br/>
                                                    <button type="button" id="addItem" class="btn blue">اضافه جديد</button>
                                                    <input type="hidden" id="itemCount" value="1">

                                                </label>
                                                <div class="col-md-9">
                                                    <table class="table table-bordered table-hover">

                                                        <th>الاسم </th>
                                                        <th>التفاصيل </th>

                                                        <th></th>

                                                        <tbody id="productContiner">

                                                            <tr>

                                                                <td><input type="text" class="form-control" name="name[]" ></td>
                                                                <td><input type="text" class="form-control" name="details[]" ></td>

                                                                <td></td>
                                                            </tr>



                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                                @endif




                                    </div>

                                </div>

                            @endforeach

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-8">
                                        <button type="submit" class="btn green">حفظ</button>
                                        <button type="button" class="btn default"
                                                onclick="window.history.back()">الغاء
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




