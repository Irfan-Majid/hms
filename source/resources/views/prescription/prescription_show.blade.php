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

<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
				<div class="col-md-12">
					<div class="title">Prescription</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="btn-group">
							
									<a href="" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Prescription List</a>
									
									<a class="btn btn-md btn-danger list-btn divPrint"><i class="fa fa-print"></i></a>
									
								</div>
							</div>
							<div class="panel-body printableDiv">
								<div  style="margin:20px;">
									<center style="color: #367FA9;font-weight:bold">
										<div>Demo Hospital Limited</div>
										<div>98 Green Road, Dhaka</div>
										<div>Hospital.bd@gmail.com</div>
										<div>192295465</div>
									</center>
									<div style="overflow:hidden;text-transform: capitalize; margin: 20px 0;border-bottom:1px dotted #3A4651;">
										<div style="float:left;margin-bottom: 20px;">
											<table style="text-align:left">
												<tr>
													<th style="text-align:left">{{$appointment->doctor->name}}</th>
												</tr>
												<tr>
													<td style="padding-top:10px;padding-left:0px;text-align:left">{{$appointment->doctor->e_qualification}}</td>
												</tr>
												<tr>
													<th style="text-align:left">{{$appointment->doctor->department->name}}</th>
												</tr>
												<tr>
													<td style="text-align:left">{{$appointment->doctor->designation}}</td>
												</tr>
											</table>
										</div>
										<div style="float:right;">
											<table style="text-align:right">
												<tr>
													<th>Date: {{$appointment->appoint_date}}</th>
													<td></td>
												</tr>
												<tr>
													<th>Patient Id: {{$appointment->out_patient->patient_id}}</th>
													<td></td>
												</tr>
											</table>
										</div>
									</div>
									<div style="text-transform: capitalize;color: #367FA9;font-weight:bold;margin-bottom:20px;">
										<table style="width:100%">
											<tr>
												<td>Name: {{$appointment->out_patient->name}}</td>
												<td>Age: </td>
												<td>Sex: </td>
												<td>Problem: {{$appointment->problem}}</td>
											</tr>
										</table>
									</div>
									<div style="text-transform: capitalize">
										<table style="width:100%">
											<tr>
												<td>
													<table>
														<tr>
															<th>c/c: </th>
															<td> {{$appointment->prescription->cc}}</td>
														</tr>
														<tr>
															<th>INV: </th>
															<td>{{$appointment->prescription->investigation}}</td>
														</tr>
													</table>
												</td>
												<td style="border-left:1px dotted #000;">
													<div style="margin-left:20px">
													<div style="text-align:left;font-weight:bold; color: #4F5F6F">Rx:</div>
													<div style="text-align:left;font-weight:bold; color: #4F5F6F">Medicine:</div>
													<div>
														<table style="width:100%">
															@foreach($appointment->prescription->prescribmedicine as $a)
															<tr>
																<td  style="text-align:center">{{$a->medicine_name}} - {{$a->medicine_type}}</td>
																<td  style="text-align:center">{{$a->medicine_dose}}</td>
																<td  style="text-align:center">{{$a->medicine_note}} for {{$a->medicine_duration}} days</td>
															</tr>
															@endforeach
																	
															
														</table>
													</div>
													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
				</div>
				<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</section>
<script type="text/javascript"  src="{{asset('public/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.PrintArea.js')}}"></script>
<script>
     $(document).ready(function(){
		
		
		/*for print a page*/
		 $('.divPrint').click(function(){
			w=window.open();
			w.document.write($('.printableDiv').html());
			w.print();
			w.close(); 
		});
		
	 });
</script>



@endsection
@push('style')
    <link href="{{asset('asset/assets/plugins/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
@endpush
@push('script')

<script>
  
</script>
    <script src="{{asset('asset/assets/plugins/footable/js/footable.all.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/js/footable-init.js')}}"></script>

    
@endpush