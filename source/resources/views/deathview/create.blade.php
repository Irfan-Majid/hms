@extends('layout.content')

@section('title', 'Doctor Create')




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
                    <h3 class="text-themecolor">Doctor Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                        <li class="breadcrumb-item active">Create</li>
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

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Other Sample Horizontal form</h4>
            </div>
            <div class="card-body">
                <form action="{{route(Session::get('identity').'.deathreg.store')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="form-body">
                        <h3 class="box-title">Person Info</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-4">PAtient Id</label>
                                    <div class="col-md-8">
                                        <input type="text" autocomplete="off" id="patit_id" class="form-control" placeholder="Search By id">
                                        <ul class="position-relative" style="list-style: none">
                                            <div id="result" class="position-absolute" style="z-index:9999;"></div>

                                        </ul>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6"></div>
                            <input type="hidden" id="id" name="patient_id">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-4">Patient Name</label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" autocomplete="off" class="form-control" placeholder="John doe">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Contact</label>
                                    <div class="col-md-9">
                                        <input type="text" id="contact" class="form-control" placeholder="12n">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="text" id="email" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input type="date" id="b_date" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="form-group row">
                            <label class="control-label text-right col-md-2">Address</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="address"></textarea>
                            </div>
                            <!--/span-->
                            <!--/span-->
                        </div>
                        <h3 class="box-title">Child Information</h3>
                        <hr class="m-t-0 m-b-40">
                        <!--/row-->
                        <!--/row-->
                        
               
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-4">Birth Date</label>
                                <div class="col-md-8">
                                    <input type="text" name="date" class="form-control" placeholder="Thusday 21-12-2021" id="mdate"> 
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-2">Doctor</label>
                                    <div class="col-md-10">
                                        <select name="doctor_id" class="form-control custom-select">
                                            <option>--Select your Doctor--</option>
                                            @foreach ($doctor as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--/span-->
                                    <!--/span-->
                                </div>
                                
                            </div>
                           
                        <!--/span-->
                    </div> 
                    <div class="form-group row">
                                <label class="control-label text-right col-md-2">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" id="address"></textarea>
                                </div>
                                <!--/span-->
                                <!--/span-->
                            </div>
                            
                    <!--/row-->     <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection


@push('style')

<link href="{{asset('asset/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('asset/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('asset/assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('asset/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('asset/assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/icheck/skins/all.css')}}" rel="stylesheet">
    @endpush
@push('script')
<script>

$(document).ready(function(){
    
   /*for keyup suggetion list*/
        $('#patit_id').keyup(function(e) {
            var formData = {
                'id' : $(this).val()
            };
            if(formData['id'].length >= 1){
            // process the form
            $.ajax({
                type        : "GET",
                url         : "{{route(Session::get('identity').'.findinpatientsug')}}",
                data        : formData
            })
                .done(function(data) {
                    $('#result').html(data).fadeIn();
                    $('#result li').click(function() {
                        var a=$(this).children("span.hide").text();
                        var formData = {'id' : a};
                        $.ajax({
                            type        : "GET",
                            url         : "{{route(Session::get('identity').'.findinpatientsugdet')}}",
                            data        : formData
                        }).done(function(data) {
                        $('#patit_id').val(data[0].patient_id);
                        $('#id').val(data[0].id);
                        $('#name').val(data[0].name);
                        $('#contact').val(data[0].contact);
                        $('#email').val(data[0].email);
                        $('#b_date').val(data[0].b_date);
                        $('#address').val(data[0].address);
                        })
                    });
                    $("#patit_id").blur(function(){
                        $("#result").fadeOut(500);
                    });
                });
            } else {
            $("#result").hide();
            };
        })


        //#------------------------------------
		//   STARTS OF DYNAMIC FORM 
		//#------------------------------------   
		//add row
	

     


        
})


</script>

<!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- Plugin JavaScript -->
    
    <script src="{{asset('asset/assets/plugins/moment/moment.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{asset('asset/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{asset('asset/assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('asset/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{asset('asset/assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script>
  
    /*MAterial Date picker*/    
    $('#mdate').bootstrapMaterialDatePicker({ weekStart : 0, time: false,format : 'dddd DD-MM-YYYY' });
    
</script>

<script src="{{asset('js/jasny-bootstrap.js')}}"></script>
 <!-- icheck -->
 <script src="{{asset('asset/assets/plugins/icheck/icheck.min.js')}}"></script>
 <script src="{{asset('asset/assets/plugins/icheck/icheck.init.js')}}"></script>
 <!-- ============================================================== -->
@endpush