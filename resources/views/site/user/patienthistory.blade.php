@extends('site.web.app')
@section('content')
<div class="cocontainer">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i> @lang('admin.History Patients') </div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <div class="btn-group">
                        <a href="{{ url('addhistory' , $patientdata->id) }}"
                           class="btn sbold green ">
                            <i class="fa fa-plus"></i> @lang('admin.Add new item') </a>
                    </div>

                </div>
            </div>

            <div class="timeline">

            @if(count($patienthistory) > 0)
                @foreach($patienthistory as $data)
                    <!-- TIMELINE ITEM -->
                        <div class="timeline-item">
                            <div class="timeline-badge">
                                <div class="timeline-icon">
                                    <i class="icon-user-following font-green-haze"></i>
                                </div>
                            </div>
                            <div class="timeline-body">
                                <div class="timeline-body-arrow"></div>
                                <div class="timeline-body-head">
                                    <div class="timeline-body-head-caption">
                                        <span class="timeline-body-time font-grey-cascade"><?php echo date("d- M -Y  h:i  A ", strtotime(@$data->created_at));  ?></span>

                                        <br/>
                                        <span class="timeline-body-alerttitle font-red-intense">{{ auth('users-web')->user()->name }}</span>

                                    </div>

                                </div>
                                <div class="timeline-body-content">
                                    <br/>
                                    <div class="">
                                        <strong>@lang('admin.Disease') : </strong> {{ @$data->disease }} </div>

                                    <div class="">
                                        <strong>@lang('admin.Complications Disease') : </strong> {{ @$data->complicationsDisease }} </div>


                                    <br/>
                                    <table class="table table-bordered table-hover">

                                        <tbody>

                                        <?php $drugs = explode( ',' , @$data->drugs); ?>
                                        <tr >
                                            <th> @lang('admin.Drugs') </th>

                                            @foreach($drugs as $a)
                                                <td class="active"> {{ $a }} </td>
                                            @endforeach
                                        </tr>

                                        <?php $analyzes = explode( ',' , @$data->analyzes); ?>
                                        <tr >
                                            <th> @lang('admin.Analyzes') </th>
                                            @foreach($analyzes as $x)
                                                <td class="success"> {{ $x }} </td>
                                            @endforeach
                                        </tr>
                                        <?php $radiation = explode( ',' , @$data->radiation); ?>
                                        <tr >
                                            <th> @lang('admin.Radiation') </th>
                                            @foreach($radiation as $x)
                                                <td class="warning"> {{ $x }} </td>
                                            @endforeach
                                        </tr>

                                        <?php $processes = explode( ',' , @$data->processes); ?>
                                        <tr >
                                            <th> @lang('admin.Processes') </th>
                                            @foreach($processes as $x)
                                                <td class="danger"> {{ $x }} </td>
                                            @endforeach
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- END TIMELINE ITEM -->

                    @endforeach

                @else
                    <br/>
                    <div class="portlet-body">
                        <div class="alert alert-info"> عفوا لايوجد بيانات  </div>
                    </div>
                @endif


            </div>
            <div class="center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">

                        {{ $patienthistory->links() }}
                    </ul>
                </nav>
            </div>

        </div>
    </div>




</div>
@endsection




