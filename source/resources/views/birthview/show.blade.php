@extends('layout.content')

@section('title', 'Doctor Edit')




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
                    <h3 class="text-themecolor">Doctor Edit</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                <h4 class="m-b-0 text-white">Edit Doctor info</h4>
                
            </div>
            @if(Session::has('response'))
                <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
                </div>
                @endif
            <div class="card-body">
                <!-- Main content -->
				<section class="content">
					<div class="row">
						<!-- left column -->
							<div class="col-md-12">
								<div class="title">Birth Report</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="btn-group">
												<a href="" class="btn btn-md btn-success list-btn"><i class="fa fa-plus"></i> Add Birth Report</a>
												
												<a href="" class="btn btn-md btn-primary list-btn"><i class="fa fa-list"></i> Birth Report List</a>
												
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
													<div style="color:#655f5f;font-size:25px;">Birth Certificate</div>
												</center>
												
												
												<div style="width:50%;margin-top:30px;float:left;">
													<table style="margin:0 auto">
														<tr>
															<th style="text-align:left;padding-right:20px;">Birth Id</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">BRR{{$data->id}}</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Title</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->title}}</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Gender</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">
																@if($data->gender == 1)
																	{{"Male"}}
																@elseif($data->gender == 2)
																	{{"Female"}}
																@endif
															</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Date Of Birth</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->birth_date}}</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Doctor Ref</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->doctor->name}}</td>
														</tr>
													</table>
												</div>
												<div style="width:50%;margin-top:30px;float:right">
													<table style="margin:0 auto">
													<tr>
															<th style="text-align:left;padding-right:20px;">Patient Id</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->in_patient->patient_id}}</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Father Name</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left"></td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Mother Name</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->in_patient->name}}</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Present Address</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->in_patient->address}}</td>
														</tr>
														<tr>
															<th style="text-align:left;padding-right:20px;">Permanent Address</th>
															<td style="padding-right:30px;">:</td>
															<td style="text-align:left">{{$data->in_patient->address}}</td>
														</tr>
													</table>
												
												</div>
												<div style="text-align:left;margin-left:80px;">
													<span style="font-weight:bold">Description  : {{$data->description}}</span> 
												</div>
												
											</div>
										</div>
									</div>
							</div>
							<!--/.col (right) -->
					</div>
					<!-- /.row -->
				</section>
            </div>
        </div>
    </div>
</div>
<!-- Row -->
@endsection


@push('style')

@endpush
@push('script')


<!-- Custom Theme JavaScript -->  

@endpush