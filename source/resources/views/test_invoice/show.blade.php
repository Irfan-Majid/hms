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
					<div class="title">Invoice</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="btn-group">
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
													<th style="text-align:left;padding-right:15px;">Invoice Id</th>
													<td style="text-align:left">:{{'INV--0'.$data->id}} </td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Patient Id</th>
													<td style="text-align:left">:{{$data->out_patient->patient_id}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Patient Name</th>
													<td style="text-align:left">:{{$data->out_patient->name}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Mobile</th>
													<td style="text-align:left">:{{$data->out_patient->contact}} </td>
												</tr>
											</table>
										</div>
										<div style="float:right;">
											<table style="text-align:right">
												<tr>
													<th style="text-align:left;padding-right:15px;">Date</th>
													<td style="text-align:left">:{{$data->created_at->format('d/m/Y')}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Time</th>
													<td style="text-align:left">:{{$data->created_at->format('H:i:s')}}</td>
												</tr>
												<tr>
													<th style="text-align:left;padding-right:15px;">Created By</th>
													<td style="text-align:left">:{{$data->created_by}}</td>
												</tr>
											</table>
										</div>
									</div>
									<!--------------investigation information---------------->
									<div>
										<table style="width:100%;" border=1>
											<tr>
												<th>Category</th>
												<th>Investigation Name</th>
												<th>Price</th>
											</tr>
											@foreach($test_d as $t)
											<tr>
												<td>{{$t->testname->testcategory->name}}</td>
												<td>{{$t->testname->name}}</td>
												<td> {{$t->testname->price}}</td>
											</tr>
											@endforeach
										</table>
									</div>
									<div style="text-align:center;;margin: 20px 0;">
										---------------------------------- <span style="text-align:center;font-size:20px">Bill Summary</span>------------------------------
									</div>
									<div>
										<table style="text-align:center;width:50%;font-weight:bold;margin:0 auto">
											<tr>
												<td>Total Amount</td>
												<td >:</td>
												<td>Tk. {{($data->grand_total-$data->vat)+$data->discount}}</td>
											</tr>
											<tr>
												<td >Vat Amount</td>
												<td>:</td>
												<td >Tk.  {{$data->vat}} </td>
											</tr>
											<tr>
												<td>Discount Amount</td>
												<td>:</td>
												<td>Tk.  {{$data->discount}} </td>
											</tr>
										</table>
									</div>
									
									<div style="text-align:center;;margin: 20px 0;">
										---------------------------------- <span style="text-align:center;font-size:20px">Payment Details</span>------------------------------
									</div>
									
									<div>
										<table style="text-align:center;width:50%;font-weight:bold;margin:0 auto">
											<tr>
												<td>Grand Total</td>
												<td >:</td>
												<td>Tk. {{($data->grand_total)}}</td>
											</tr>
											<tr>
												<td >Paid</td>
												<td>:</td>
												<td >Tk. {{$data->paid}}</td>
											</tr>
											<tr>
												<td>Due</td>
												<td>:</td>
												<td>
													 @if($data->status==1)
														Tk. {{($data->grand_total-$data->paid)}}
													@else
														{{"Tk. 0.00"}}
													@endif 
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