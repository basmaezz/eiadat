@extends('site.web.app')
@section('content')


    <div class="listpgWraper">
        <div class="container">
            <div class="row">
                @include('site.user.menu')


            <!--Question-->
                    <div class="col-md-9 col-sm-8">
            <div class="faqs">
                <div class="panel-group" id="accordion">
                    <h3>السجل المرضى</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" class="collapsed" href="#collapse1">{{$patienthistory->disease}}</a> </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                 مضاعفات المرض :   <li>{{$patienthistory->complicationsDisease}}</li>
                                 التحاليل :   <li>{{$patienthistory->analyzes}}</li>
                                 الاشعه :   <li>{{$patienthistory->radiation}}</li>
                                 العمليات :   <li>{{$patienthistory->processes}}</li>
                                </ul>
                                </div>
                        </div>
                    </div>



                </div>
            </div>
            </div>
            </div>
        </div>
    </div>



@endsection




