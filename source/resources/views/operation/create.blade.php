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
                    <h3 class="text-themecolor">Operation Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Operation</a></li>
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
                <h4 class="m-b-0 text-white">Add Operation Schedule(<small>all field is required</small>)</h4>
                
            </div>
            @if(Session::has('response'))
                <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
                </div>
                @endif
            <div class="card-body">
                <form class="form-material" action="{{route(Session::get('identity').'.operation.store')}}" method="post" enctype="multipart/form-data">
                    
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
                                <div class="form-group @if($errors->has('room')) has-danger @endif">
                                    <label>Room</label>
                                    <select name="room" id="doctor" class="form-control @if($errors->has('room')) form-control-danger @endif" name="room">
                                        <option>--Select Room--</option>
                                        @if($deps)
                                       
                                            @foreach($deps as $dep)
                                                <option value="{{$dep->id}}">{{$dep->name}}</option>
                                            @endforeach
                                        @endif

                                        @if ($errors->has('room'))
                                            <span class="form-control-feedback">{{ $errors->first('room') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <label class="">Date</label>
                                <input type="text" name="date" class="form-control" placeholder="Thusday 21-12-2021" id="mdate"> 
                            </div>
                            
                            <!--/span-->
                        </div>
                        
                    </div>
                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @if($errors->has('doctor')) has-danger @endif">
                                <label>Doctor</label>
                                <select name="doctor" id="doc" class="form-control @if($errors->has('doctor')) form-control-danger @endif">
                                    <option value="">-- Select Operation time --</option>
                                    @if($doctor)
                                       
                                    @foreach($doctor as $dep)
                                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                                @endif
                                
                                </select>
                                @if ($errors->has('doctor'))
                                    <span class="form-control-feedback">{{ $errors->first('doctor') }}</span>
                                @endif
                            </div>
                            <div id="sch_data" style="z-index:9999;"></div>                              
                        </div>

                     
                    </div>
                  <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @if($errors->has('operation_time')) has-danger @endif">
                                <label>Operation time</label>
                                <select name="operation_time" id="doc" class="form-control @if($errors->has('operation_time')) form-control-danger @endif">
                                    <option value="">-- Select Operation time --</option>
                                    @if($O_tm)
                                       
                                    @foreach($O_tm as $dep)
                                        <option class="oopp" id="oopp{{$dep->id}}" value="{{$dep->id}}">{{$dep->start_time}} -- {{$dep->end_time}}</option>
                                    @endforeach
                                @endif
                                
                                </select>
                                @if ($errors->has('operation_time'))
                                    <span class="form-control-feedback">{{ $errors->first('operation_time') }}</span>
                                @endif
                            </div>
                            <div id="sch_data" style="z-index:9999;"></div>                              
                        </div>

                     
                        <div class="col-md-6">
                            <div class="form-group @if($errors->has('operation_type')) has-danger @endif">
                                <label>Operation Type</label>
                                <select name="operation_type" id="op_type" class="form-control @if($errors->has('operation_type')) form-control-danger @endif">
                                    <option value="">-- Select Operation Type --</option>
                                    @if($O_type)
                                       
                                    @foreach($O_type as $dep)
                                        <option value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                                @endif
                                
                                </select>
                                @if ($errors->has('operation_type'))
                                    <span class="form-control-feedback">{{ $errors->first('operation_type') }}</span>
                                @endif
                            </div>                            
                        </div>
                    </div>
                    <table id="invoice" class="table table-striped"> 
                        <tfoot> 
                            <tr class="bg-theme text-white">  
                                <td colspan="3"></td> 
                                <th class="text-right align-middle">Total</th>  
                                <th><input type="text" name="total" id="total" class="form-control bg-light" readonly required placeholder="Total" value="0.00"></th>  
                                <td></td> 
                            </tr>
                            <tr>  
                                <th colspan="3" class="text-right align-middle">Vat</th> 
                                <td>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                    </div>
                                      <input type="text" id="vatParcent" required class="form-control" name="vat_percent" value="0" onKeyup="vat_discount()">
                                    </div>
                                </td> 
                                <td><input type="text" id="vat" required class="vatDiscount paidDue form-control" placeholder="Vat" name="vat_tk" value="0.00" ></td>  
                                <td></td> 
                            </tr>
                            <tr>  
                                <th colspan="3" class="text-right align-middle">Discount</th> 
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                        </div>
                                      <input type="text" name="discount_percent" id="discountParcent" required class=" form-control" value="0" onKeyup="vat_discount()" >
                                    </div>
                                </td> 

                                <td><input type="text" required id="discount" class="vatDiscount paidDue form-control" placeholder="Discount" name="discount_tk" value="0.00" ></td> 
                                <td></td>  
                            </tr> 
                            <tr class="bg-theme text-white">  
                                <td colspan="3"></td>  
                                <th class="text-right align-middle">Grand Total</th>  
                                <th><input type="text" name="grand_total" readonly required  id="grand_total" class="paidDue form-control bg-light" placeholder="Grand Total" value="0.00" onKeyup="vat_discount()" ></th> 
                                <td></td>  
                            </tr>
                            <tr>  
                                <td colspan="3"></td>  
                                <th class="text-right align-middle">Paid</th>
                                <td><input type="text" name="paid" id="paid" class="paidDue form-control" required placeholder="Paid"  value="0.00" onKeyup="get_due()"></td> 
                                <td></td>  
                            </tr>
                            <tr class="bg-theme text-white">  
                                <td colspan="3"></td>  
                                <th class="text-right align-middle">Due</th> 
                                <td><input type="text" name="due" id="due" class="paidDue form-control bg-light" required placeholder="Due" value="0.00"></td> 
                                <td></td>  
                            </tr>
                            
                        </tfoot>
                    </table> 
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



/*------select doctor name option and show serial number active or inactive------*/
$('#mdate').on('change', function(){
				var doctor_id = $('#doctor').val();
				var appoint_date = $(this).val();
                appoint_date=appoint_date.split(' ');
				var app_data=appoint_date[1];
				$.ajax({
					type:'GET',
					url:"{{route(Session::get('identity').'.findoperationserial')}}",
					data:{'ot_id':doctor_id, 'date':app_data},
					success:function(data){
						$('.oopp').removeAttr('disabled').removeClass('text-danger');
                        for(a in data){
                            $('#oopp'+data[a].operationtime_id).attr('disabled','true').addClass('text-danger');
                            console.log('#oopp'+data[a].operationtime_id);
                        }
						
					},
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }  
				}); 
			
			});


            $('#op_type').on('change', function(){
                var op_type = $(this).val();
				$.ajax({
					type:'GET',
					url:"{{route(Session::get('identity').'.findoperationtk')}}",
					data:{'op_type':op_type},
					success:function(data){
                        $('#total').val((data[0].price));
				$('#grand_total').val((data[0].price));
                vat_discount();
                get_due();
					},
                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }  
				}); 
			
			});   

            function vat_discount(){
		var total = $('#total').val();
		var vatParcent = $('#vatParcent').val();
		$('#vat').val(parseFloat((total * vatParcent)/100).toFixed(2));
		var discountParcent = $('#discountParcent').val();
		$('#discount').val(parseFloat((total * discountParcent)/100));
		var vat = $('#vat').val();
		var discount = $('#discount').val();
		$('#grand_total').val(((parseFloat(total)+parseFloat(vat)-parseFloat(discount))));
        get_due();
	}

     function get_due(){
		 var grand_total =$('#grand_total').val();
		var paid =$('#paid').val();
		var due = ((parseFloat(grand_total)-parseFloat(paid)));
		if (due < 1){
			due = 0;
		}
		$('#due').val(due); 
	}        



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

<script src="{{asset('asset/js/jasny-bootstrap.js')}}"></script>
 <!-- icheck -->
 <script src="{{asset('asset/assets/plugins/icheck/icheck.min.js')}}"></script>
 <script src="{{asset('asset/assets/plugins/icheck/icheck.init.js')}}"></script>
 <!-- ============================================================== -->
@endpush