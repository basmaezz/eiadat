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
                            <a href="{{url('addpatientrochta/'.$patient->id)}}"
                               class="btn sbold green ">
                                <i class="fa fa-plus"></i> @lang('admin.Add new item') </a>
                        </div>

                    </div>
                </div>

                <div class="timeline">
                    {{--@foreach ($rochtadata as $r){--}}
                    {{--@foreach ($r->details as $de){--}}
                      {{--{{$de->drug}}--}}
                   {{--@endforeach--}}
                   {{--@endforeach--}}

                        <!-- TIMELINE ITEM -->
                        @if(count($rochtadata) > 0)
                            @foreach($rochtadata as $data)

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
                                            <span class="timeline-body-time font-grey-cascade"></span>

                                            <br/>
                                            <span class="timeline-body-alerttitle font-red-intense">{{ auth('users-web')->user()->name }}</span>

                                        </div>

                                    </div>

                                    <div class="timeline-body-content">
                                        <br/>
                                        <div class="">
                                            <strong>@lang('admin.Patient Name') : {{$patient->name}}</strong>  </div>

                                        <div class="">
                                            <strong>@lang('admin.rochtadate') :{{ date('F d, Y', strtotime($data->created_at)) }} </strong>  </div>


                                        <br/>
                                        <table class="table table-bordered table-hover">

                                            <tbody>


                                            <tr >
                                                <th> @lang('admin.drugname') </th>
                                                    @foreach ($data->details as $de)
                                                        <td class="active"> {{$de->drug->name}} </td>
                                                    @endforeach

                                            </tr>

                                            <tr >
                                                <th> @lang('admin.usages') </th>
                                                    @foreach ($data->details as $de)
                                                        <td class="active"> {{$de->usages}} </td>
                                                    @endforeach

                                            </tr>

                                            <tr >
                                                <th> @lang('admin.notes') </th>

                                                    <td class="active"> {{$data->notes}}</td>

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

                        {{ $rochtadata->links() }}
                    </ul>
                </nav>
            </div>

            </div>
        </div>
    </div>


@endsection




