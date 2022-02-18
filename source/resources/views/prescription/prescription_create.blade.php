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
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add Nurse</h4>
                
            </div>
            	@if(Session::has('response'))
                <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
                </div>
                @endif
            	<div class="card-body">
					<form action="{{route(Session::get('identity').'.prescription.store')}}" class="form-horizontal form-material" method="post">
						@csrf
						<div class="form-body">
							<h3 class="box-title">Person Info</h3>
							<hr class="m-t-0 m-b-40">
							<div class="row">
								<!--/span-->
								<div class="col-md-4 offset-md-4">
									<div>Doctors Name: {{$appointment->doctor->name}}<span></span></div>
									<div>Department: {{$appointment->doctor->department->name}}<span></span></div>
									<div>Contact: {{$appointment->doctor->contact}}<span></span></div>
									<div>Email: {{$appointment->doctor->email}}<span></span></div>
								</div>
								<!--/span-->
							</div>
							<input type="hidden" class="form-control" name="appointment_id" value="{{$appointment->id}}">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group row">
										<label class="control-label text-right col-md-4">Patient id</label>
										<div class="col-md-8">
											<input type="text" class="form-control" value="{{$appointment->out_patient->patient_id}}">
											<input type="hidden" class="form-control" name="patient_id" value="{{$appointment->out_patient->id}}">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-4 offset-md-4">
									<div class="form-group row">
										<label class="control-label text-right col-md-4">Date</label>
										<div class="col-md-8">
											<input type="text" class="form-control" name="prescribe_date" placeholder="12n" value={{date("Y-m-d")}}>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="control-label text-right col-md-2">Name</label>
										<div class="col-md-10">
											<input type="text" class="form-control" value="{{$appointment->out_patient->name}}">
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-3">
									<div class="form-group row">
										<label class="control-label text-right col-md-6">Age</label>
										<div class="col-md-6">
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group row">
										<label class="control-label text-right col-md-6">Gender</label>
										<div class="col-md-6">
											<input type="text" class="form-control">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<!--/span-->
								<div class="col-md-6">
									<div class="form-group row">
										<label class="control-label text-right col-md-2">Date of Birth</label>
										<div class="col-md-10">
											<input value="{{$appointment->out_patient->b_date}}" type="text" class="form-control" placeholder="dd/mm/yyyy">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<div class="row">
								<!--/span-->
								<div class="col-md-12">
									<div class="form-group row">
										<label class="control-label text-right col-md-1">Address</label>
										<div class="col-md-11">
											<input type="text" class="form-control" value="{{$appointment->out_patient->address}}">
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group row">
										<label class="control-label text-right col-md-2">DX</label>
										<div class="col-md-10">
											<textarea name="" id="" cols="30" class="form-control"></textarea>
										</div>
									</div>
								</div>
								<!--/span-->
								<div class="col-md-3">
									<div class="form-group row">
										<label class="control-label text-right col-md-6">Phone</label>
										<div class="col-md-6">
											<input type="text" class="form-control" value="{{$appointment->out_patient->contact}}">
										</div>
									</div>
								</div>
								
								<!--/span-->
							</div>
								<!--/span-->
								<!--/span-->
							</div>
							<h3 class="box-title">Address</h3>
							<hr class="m-t-0 m-b-40">
							<!--/row-->
							<div class="row">
								<div class="col-md-5 clearfix">
								
									<div class="">
										<div class="">
											<div class="form-group">
												<label class="control-label text-right clearfix">CC</label>
												<div class="">
													<textarea name="cc" id="" cols="45" rows="10" class=""></textarea>
												</div>
											</div>
										</div>
										<div class="">
											<div class="form-group">
												<label class="control-label text-right clearfix">Investigation</label>
												<div class="">
													<textarea name="investigation" id="" cols="45" rows="10" class=""></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								

								<div class="col-md-7 vertical p-l-20">
								
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label class="control-label col-md-3">Medicine</label>
												<div class="col-md-9">
													<input type="text" placeholder="Name" id="m_name" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-md-9">
													<input type="text" class="form-control" placeholder="Type" id="m_type">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<label class="control-label col-md-3">Dose</label>
										<div class="col-md-3">
											<div class="form-group row">
												
												<div class="col-md-12">
													<input type="text" class="form-control" placeholder="dose" id="m_dose">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group row">
												
												<div class="col-md-12">
													<select type="text" class="form-control" id="note">
														<option value="1">Before Food</option>
														<option value="2">After Food</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group row">
												<div class="col-md-12">
													<input type="text" class="form-control" id="duration" placeholder="Duration">
												</div>
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-success btn-rounded add"><i class="fa fa-check"></i> Add</button>
									<div class="table-responsive col-md-12">
										<table class="table table-responsive" style="width:100%;">
											<thead>
												<tr>
													<th>Medicine</th>
													<th>Dose</th>
													<th>Note</th>
													<th>Duration</th>
												</tr>
											</thead>
											<tbody id="list">
												
											</tbody>
										</table>
									</div>
										<!--/span-->
										<div class="col-md-12 position-absolute" style="bottom:0%;">
											<div class="form-group row">
												<label class="control-label col-md-2">Advice</label>
												<div class="col-md-10">
													<input type="text" name="advice" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-2">Next visit</label>
												<div class="col-md-6 row">
													<div class="col-md-4">After </div>
													<input type="number" name="nxt_visit" class="form-control col-md-4" value="{{$appointment->out_patient->address}}">
													<div class="col-md-4"> Days</div>
												</div>
											</div>
										</div>
									
								</div>
							</div>
							
							
						
							<!--/row-->
						</div>
						<hr>
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
								<div class="col-md-6"></div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Row -->


@endsection
@push('style')
    <link href="{{asset('asset/assets/plugins/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
	<style> 
		.vertical { 
			border-left: 2px dotted black; 
			height: 620px; 
			position:absolute; 
			left: 33%; 
		} 
	</style>
@endpush
@push('script')

<script>
		$(document).ready(function(){
			$('.table').css('display','none');
			
			/*append row in table for medicine list*/
			
			
			$('.add').click(function(){
				
				$('.table').css('display','block');	
				var div="<tr><td>" + "<input type='hidden' name='m_name[]' value='"+ $('#m_name').val() + "'>" + "<input type='hidden' name='m_type[]' value='" + $('#m_type').val() + "'>" + "<a href='javascript:void(0)'>" + $('#m_name').val() + " - ( "+ $('#m_type').val() +" )" + "</a></td><td>" + "<input type='hidden' name='dose[]' value='" + $('#m_dose').val() + "'>" + $('#m_dose').val() + "</td><td>" + "<input type='hidden' name='note[]' value='" + $('#note option:selected').val() + "'><span class='text-muted'>" + " <i class='fa fa-clock-o'></i> " + $('#note option:selected').text() + "</span></td><td>" + "<input type='hidden' name='duration[]' value='" + $('#duration').val() + "'>" + $('#duration').val() + "</td><td>"+ "<i class='fa fa-times btn btn-sm btn-default dlt' style='color:red;'></i>"+"</td></tr>";
					console.log(div);
				
				
				$('#list').append(div);
				$('#m_name').val('');
				$('#m_type').val('');
				$('#m_dose').val('');
				$('#duration').val('');
			});
			
			$(document).on('click', '.dlt', function(){
				$(this).parent('td').parent('tr').remove();
			});
			
		});
                  
</script>
    <script src="{{asset('asset/assets/plugins/footable/js/footable.all.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/js/footable-init.js')}}"></script>

    
@endpush