@extends('layout.content')

@section('title', 'Doctor')




@section('breadcumb')

<body class="fix-header fix-sidebar card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Doctor</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           
@endsection
<!-- Main content -->
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
            <div class="col-md-12">
                <div class="title">Appointment</div>
                    <div class="panel panel-default print-body">
                        <div style="color: #fff;background-color:#62d0f1; height:150px;padding:30px;overflow:hidden;border:1px solid #62d0f1;">
                            <div style="float:left;">
                                <table>
                                    <tr>
                                        <th style="text-align:right">Doctor</th>
                                        <td style="text-align:left;padding-left: 20px;">{{$appoint->doctor->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">Department</th>
                                        <td style="text-align:left;padding-left: 20px;">{{$appoint->doctor->department->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;" >Available Day</th>
                                        @if($appoint->doctor->doctorschedule)
                                        <td style="text-align:left;padding-left: 20px;">
                                            @foreach($appoint->doctor->doctorschedule as $a)
                                                <span>{{$a->weekday->name}}</span>
                                            @endforeach
                                        </td>
                                        @endif
                                        
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">Schedule Time</th>
                                        @if($appoint->doctor->doctorschedule)
                                        <td style="text-align:left;padding-left: 20px;">
                                            @foreach($appoint->doctor->doctorschedule as $a)
                                            <span>[ {{$a->dutyshift->start_time}} - {{$a->dutyshift->end_time}} ]</span>
                                        @endforeach
                                        </td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                            <div style="float:right;text-align:right">
                                <table>
                                    <tr>
                                        <th style="text-align:right;">Serial No</th>
                                        <td style="text-align:left;padding-left: 20px;">{{$appoint->serial}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">Appointment Date</th>
                                        <td style="text-align:left;padding-left: 20px;">{{$appoint->appoint_date}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:right;">Fees</th>
                                        <td style="text-align:left;padding-left: 20px;">{{$appoint->doctor->fee}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                        <div style="border:1px solid #62d0f1;">
                        <div style="text-align:center; color:#374767;font-size:30px;font-weight:bold;margin-top: 30px; ">
                            <p>Appointment Information</p>
                        </div>
                            <div style="padding:20px;">
                                <center>
                                    <table>
                                        <tr>
                                            <th style="text-align:right;">Full Name</th>
                                            <td style="text-align:left;padding-left: 20px;">{{$appoint->out_patient->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right;">Patient Id</th>
                                            <td style="text-align:left;padding-left: 20px;">{{$appoint->out_patient->patient_id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right;">Date of Birth</th>
                                            <td style="text-align:left;padding-left: 20px;">{{$appoint->out_patient->b_date}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right;">Sex</th>
                                            <td style="text-align:left;padding-left: 20px;">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right;">Mobile No</th>
                                            <td style="text-align:left;padding-left: 20px;">{{$appoint->out_patient->contact}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right;">Problem</th>
                                            <td style="text-align:left;padding-left: 20px;">{{$appoint->problem}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:right;">Status</th>
                                            <td style="text-align:left;padding-left: 20px;">
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </div>
                        </div>
                <div style="text-align:center;border:1px solid #62d0f1;padding:20px;">
                    <div>Demo Hospital Limited</div>
                    <div>98 Green Road, Farmgate, Dhaka-1215</div>
                </div>
            </div>	
            <a href="#" class="btn btn-md btn-danger print_btn"><i class="fa fa-print"></i></a>
            </div>
            <!--/.col (right) -->
    </div>
    <!-- /.row -->



@endsection
@push('style')
    <link href="{{asset('asset/assets/plugins/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
@endpush
@push('script')

<script>
  
        //      function add() {
        //             var name = $('#d_name').val();
        //             var _token=$('input[name=_token]').val();
        //             $.ajax({
        //                 url: "{{route(Session::get('identity').'.department.store')}}",
        //                 type: "POST",
        //                 data: {
        //                     name:name,
        //                     _token:_token
        //                 },
        //                 success:function(response){
        //                     if(response.error==0){
                                
        //                         showAllPosts()
                               
        //                     }
        //                 }
        //             })
        //         }
        //         function showAllPosts() {
        //         location.reload();
        // }


        //    function edit(a){
        //     $('#update-contact').modal('show');
        //     $('#basicModal').empty();
        //         $.get( 's_id/'+a,function(response){ 
        //             $('#ed_name').val(response.data.name);
        //             $('#ed_id').val(response.data.id);
                    
        //         })
        //     }



        //     function update(){
        //         var name = $('#ed_name').val();
        //         var id = $('#ed_id').val();
        //         var _token=$('input[name=_token]').val();
        //         alert(_token);
        //         return;
        //         $.ajax({
        //                 url: '/department/' + id,
        //                 type: "PUT",
        //                 data:{
        //                     name:name,
        //                     _token:_token
        //                 },
        //                 success:function(response){
        //                     if(response.error==0){
                                
                                
                               
        //                     }
        //                 }

        //         })
        //     }
               
                  
</script>
    <script src="{{asset('asset/assets/plugins/footable/js/footable.all.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/js/footable-init.js')}}"></script>

    
@endpush