@extends('layout.content')

@section('title', 'Dutyshift Create')




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
                    <h3 class="text-themecolor">Department</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dutyshift</a></li>
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



<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            @if(Session::has('response'))
            <div class="alert alert-{{Session::get('response')['class']}}">
            {{Session::get('response')['message']}}
            </div>
            @endif
            <div class="card-header">
                <h4 class="m-b-0 text-white">With Border at Bottom (<small>Use class form-bordered</small>)</h4>
            </div>
            <div class="card-body">
                <form action="{{route(Session::get('identity').'.dutyshift.update',$shift->id)}}" method="post" enctype="multipart/form-data">                       
                    @csrf
                    @method('put');
                    <div class="form-body">
                        <h3 class="card-title">Duty Shift Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('name')) has-danger @endif">
                                    <label class="control-label" for="name">Shift Name</label>
                                    <input type="text" id="name" value="{{$shift->name}}" class="form-control @if($errors->has('name')) form-control-danger @endif" name="name" placeholder="Full Name">
                                    @if ($errors->has('name'))
                                        <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <label class="m-t-20">Start Time</label>
                                <div class="input-group clockpicker  @if($errors->has('start_time')) has-danger @endif">
                                    <input type="text" value="{{$shift->start_time}}" class="form-control @if($errors->has('start_time')) form-control-danger @endif" name="start_time" placeholder="22:30"> <span class="input-group-addon pt-1"> <span class="fa fa-clock-o"></span> </span>
                                </div>
                                @if ($errors->has('start_time'))
                                        <span class="form-control-feedback">{{ $errors->first('start_time') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label class="m-t-20">End Time</label>
                                <div class="input-group clockpicker @if($errors->has('end_time')) has-danger @endif">
                                    <input type="text" value="{{$shift->end_time}}" name="end_time" class="form-control @if($errors->has('end_time')) form-control-danger @endif" placeholder="23:30"> <span class="input-group-addon pt-1"> <span class="fa fa-clock-o"></span> </span>
                                </div>
                                @if ($errors->has('end_time'))
                                        <span class="form-control-feedback">{{ $errors->first('end_time') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <hr>
                
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        <a href="{{ URL::previous() }}" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection



@push('style')
<link href="{{asset('asset/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="{{asset('asset/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('asset/assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css"')}} rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('asset/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('asset/assets/plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endpush
@push('script')

<!-- Custom Theme JavaScript -->  
   
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
        // MAterial Date picker    
        $('#mdate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
             $('#timepicker').bootstrapMaterialDatePicker({ format : 'HH:mm', time: true, date: false });
        $('#date-format').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm' });
       
            $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });
        $('#check-minutes').click(function(e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
        // Colorpicker
        $(".colorpicker").asColorPicker();
        $(".complex-colorpicker").asColorPicker({
            mode: 'complex'
        });
        $(".gradient-colorpicker").asColorPicker({
            mode: 'gradient'
        });
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            format: 'MM/DD/YYYY h:mm A',
            timePickerIncrement: 30,
            timePicker12Hour: true,
            timePickerSeconds: false,
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2015',
            maxDate: '06/30/2015',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse',
            dateLimit: {
                days: 6
            }
        });
        </script>
@endpush