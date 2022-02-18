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
                    <h3 class="text-themecolor">Appointment Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Appointment</a></li>
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
                <h4 class="m-b-0 text-white">Appointment Create(<small>all field is required</small>)</h4>
                
            </div>
            @if(Session::has('response'))
                <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
                </div>
                @endif
            <div class="card-body">
                <form class="form-material" action="{{route(Session::get('identity').'.appointment.store')}}" method="post" enctype="multipart/form-data">
                    
                    @csrf
                    <input type="hidden" name="p_id" id="p_id"> 
                    <div class="form-body">
                        <h3 class="card-title">Personal Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group  @if($errors->has('patient_id')) has-danger @endif">
                                    <label>Patient ID</label>
                                    <input name="patient_id" autocomplete="off" type="text" id="patit_id" class="form-control form-control-line @if($errors->has('patient_id')) form-control-danger @endif"  placeholder="Full Name"> 
                                    @if ($errors->has('patient_id'))
                                        <span class="form-control-feedback">{{ $errors->first('patient_id') }}</span>
                                    @endif
                                </div>
                                <div id="result" style="z-index:9999;"></div>
                                <div id="patient_name"></div>
                            </div>
                            <!--/span-->
                            
                        </div>
                        
                        
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('department')) has-danger @endif">
                                    <label>Department</label>
                                    <select name="department" id="department" class="form-control @if($errors->has('department')) form-control-danger @endif" name="department">
                                        <option>--Select department--</option>
                                        @if($deps)
                                       
                                            @foreach($deps as $dep)
                                                <option value="{{$dep->id}}">{{$dep->name}}</option>
                                            @endforeach
                                        @endif

                                        @if ($errors->has('department'))
                                            <span class="form-control-feedback">{{ $errors->first('department') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('doctor_id')) has-danger @endif">
                                    <label>Input Select</label>
                                    <select name="doctor_id" id="doctor" class="form-control @if($errors->has('doctor_id')) form-control-danger @endif">
                                        <option>-- Select doctor name --</option>
                                       
                                    </select>
                                    @if ($errors->has('doctor_id'))
                                        <span class="form-control-feedback">{{ $errors->first('doctor_id') }}</span>
                                    @endif
                                </div>
                                <div id="sch_data" style="z-index:9999;"></div>                              
                            </div>
                            <!--/span-->
                        </div>
                        
                    </div>
                
 ~                   <div class="row">
                        <div class="col-md-12">
                            <label class="m-t-20">Default Material Date Picker</label>
                            <input type="text" name="date" class="form-control" placeholder="Thusday 21-12-2021" id="mdate"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="m-t-20 text-danger" id="ee" style="display:none;">
                                No Schedule available
                            </div>
                            <div class="m-t-20 button-group" id="ss">
                                @for ($i=0; $i < 10; $i++)
                                <button selected type="button" class="btn waves-effect waves-light btn-rounded btn-success serial" id="serial{{$i+1}}">&nbsp;&nbsp;&nbsp;{{$i+1}}&nbsp;&nbsp;&nbsp;
                                </button>    
                                @endfor
                                <input type="hidden" name="serial" id="serial_div" /> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>probs</label>
                                <textarea class="form-control" name="prob" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="icheck-list">
                                <input type="radio" value="1" checked class="check d-inlne" style="display:inline-block;" name="approve" data-radio="iradio_line-green" data-label="Approved">
                                &nbsp;
                                <input type="radio" value="0" class="check" style="display:inline-block;"  {{Request::old('approve') == '0' ? 'checked' : ''}} name="approve" data-radio="iradio_line-green" data-label="Not Approved">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="form-actions m-t-20">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ URL::previous() }}" class="btn btn-inverse">Cancel</a>
                            </div>
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
    
			/*keyup function for patient name*/
	$('#patit_id').keyup(function(){
    //     var pa = '<div class="text-danger">Invalid patient ID</div>';
	// 			$('#patient_name').html('');
	// 			$('#patient_name').append(pa);
    // var name = $(this).val();
    // $.ajax({
    //     url: "{{route(Session::get('identity').'.findpatient')}}",
    //     type: "GET",
    //     data: {
    //         id:name,
    //     },
    //     success:function(data){
    //         if(data){
    //            var pa = '<div class="text-success">'+data[0].name+'</div>';
    //            $('#patient_name').html('');
	// 			$('#patient_name').append(pa);
    //             }
    //         }
    //     })
    })


    		/*keyup function for department name*/
	$('#department').change(function(){
    var department_id = $(this).val();
    $('#doctor').html('');
    oppp= "<option value='0' selected disabled>-- select doctor name --</option>";
    $('#doctor').append(oppp);
    $.ajax({
        url: "{{route(Session::get('identity').'.finddoctor')}}",
        type: "GET",
        data: {
            id:department_id,
        },
        success:function(data){
            if(data){
                var op= "<option value='0' selected disabled>-- Select doctor name --</option>"+data;
						$('#doctor').html('');
						$('#doctor').append(op);
                }
            }
        })
    })


    /*------select doctor name option and show schedule------*/
			$('#doctor').on('change', function(){
				var doctor = $(this).val();
				$.ajax({
					type:'get',
					url: "{{route(Session::get('identity').'.findschedule')}}",
					data:{'id':doctor},
					success:function(data){
						if(data==''){
							var err = '<div style="color:red">No Schedule Available</div>';
							$('#sch_data').html('');
							$('#sch_data').append(err);
                            $('#ss').css('display','none');
							$('#ee').css('display','block'); 
						}else{
							$('#sch_data').html('');
							$('#sch_data').append(data);
                            $('#ss').css('display','block');
							$('#ee').css('display','none');  
						}
					}
				});
			
			});



                                /*for keyup suggetion list*/
                            $('#patit_id').keyup(function(e) {

                            var formData = {
                                'id' : $(this).val()
                            };
                            if(formData['id'].length >= 1){

                            // process the form
                            $.ajax({
                                type        : "GET",
                                url         : "{{route(Session::get('identity').'.findpatientsug')}}",
                                data        : formData
                            })
                                .done(function(data) {
                                    $('#result').html(data).fadeIn();
                                    $('#result li').click(function() {
                                        $('#patit_id').val($(this).children("span.iiid").text());
                                        var a=$(this).children("span.hide").text();
                                        $('#p_id').val(a);
                                        $('#result').fadeOut(500);
                                        $('#patient_name').html('');
                                    });
                                    $("#patit_id").blur(function(){
                                        $("#result").fadeOut(500);
                                    });

                                });

                            } else {

                            $("#result").hide();

                            };

                    })
})

/*------select serial number------*/
$('.serial').click(function(){
				var s = $(this).addClass('btn-danger').text().trim();
				$('.serial').attr('disabled',true);
				$('#serial_div').val('');
				$('#serial_div').val(s); 
			});

/*------select doctor name option and show serial number active or inactive------*/
$('#mdate').on('change', function(){
				$('.serial').removeClass('btn-danger').attr('disabled',false);
				var doctor_id = $('#doctor').val();
				var appoint_date = $(this).val();
                appoint_date=appoint_date.split(' ');
				var app_data=appoint_date[1];
                console.log(app_data);
				$.ajax({
					type:'GET',
					url:"{{route(Session::get('identity').'.findserial')}}",
					data:{'id':doctor_id, 'date':app_data},
					success:function(data){
						// console.log(data);
						if(data == 'daYnotfind'){
							$('#ss').css('display','none');
							$('#ee').css('display','block');
						}else if(data == 'rownotfind'){
							$('#ss').css('display','block');
							$('#ee').css('display','none');
						}else{
							$('#ss').css('display','block');
							$('#ee').css('display','none');
							var ser = '';
							for(var i=0;i<data.length;i++){
                                ser = data[i].serial;
                                if(ser){
                                    for(var j=1;j<11;j++){
                                        if(ser == j){
									    $('#serial'+j).addClass('btn-danger').attr('disabled','disabled');
                                        }
                                    }
                                }
								
							} 
						} 
					},
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }  
				}); 
			
			});




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