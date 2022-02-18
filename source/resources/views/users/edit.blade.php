@extends('layout.content')

@section('title', 'Department Edit')




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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Department</a></li>
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
                <form action="{{route('users.update',$user->id)}}" method="post" class="form-horizontal form-bordered">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <div class="form-body">
                        <div class="form-group row @if($errors->has('name')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Department Name" name="name" value="{{$user->name}}" class="form-control @if($errors->has('name')) form-control-danger @endif">
                                @if ($errors->has('name'))
                                <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                            @endif 
                            </div>
                            
                        </div>
                        <div class="form-group row @if($errors->has('email')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Room Type" name="email" value="{{$user->email}}" class="form-control @if($errors->has('email')) form-control-danger @endif">
                                @if ($errors->has('email'))
                                <span class="form-control-feedback">{{ $errors->first('email') }}</span>
                            @endif 
                            </div>
                            
                        </div>
						<div class="form-group row @if($errors->has('contact')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Contact</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Room Type" name="contact" value="{{$user->contact}}" class="form-control @if($errors->has('contact')) form-control-danger @endif">
                                @if ($errors->has('contact'))
                                <span class="form-control-feedback">{{ $errors->first('contact') }}</span>
                            @endif 
                            </div>
                            
                        </div>
						<div class="form-group row @if($errors->has('username')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Contact</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Room Type" name="username" value="{{$user->username}}" class="form-control @if($errors->has('username')) form-control-danger @endif">
                                @if ($errors->has('username'))
                                <span class="form-control-feedback">{{ $errors->first('username') }}</span>
                            @endif 
                            </div>
                            
                        </div>
						<div class="form-group row @if($errors->has('password')) has-danger @endif">
                            <label class="control-label text-right col-md-3">password</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Room Type" name="password" class="form-control @if($errors->has('password')) form-control-danger @endif">
                                @if ($errors->has('contact'))
                                <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                            @endif 
                            </div>
                            
                        </div>
						<div>
                                <div class="form-group row @if($errors->has('role_id')) has-danger @endif">
								<label class="control-label text-right col-md-3">Role</label>
								<div class="col-md-9">
                                    <select class="form-control custom-select @if($errors->has('role_id')) form-control-danger @endif" name="role_id">
                                        <option>--Select role--</option>
										@if($role)
												@foreach($role as $r)
											<option value="{{$r->id}}" @if($r->id==$user->role_id) selected @endif>{{$r->type}}</option>
												@endforeach
											
                                    </select>
									@endif
											@if($errors->has('role_id')) 
											<span class="form-control-feedback">{{ $errors->first('role_id') }}</span>
								@endif
								</div>
                                </div>
                            </div>

							<div>
                                <div class="form-group row @if($errors->has('status')) has-danger @endif">
								<label class="control-label text-right col-md-3">Status</label>
								<div class="col-md-9">
                                    <select class="form-control custom-select @if($errors->has('status')) form-control-danger @endif" name="status">									
										<option value="">Select Status</option>
                                        <option value="0" @if(($user->status)==0) selected @endif >inactive</option>
                                        <option value="1" @if(($user->status)==1) selected @endif >active</option>
                                        <option value="2" @if(($user->status)==2) selected @endif >pending</option>
                                        <option value="3" @if(($user->status)==3) selected @endif >freeze</option>
                                        <option value="4" @if(($user->status)==4) selected @endif >block</option>
                                                
                                    </select>
									@if($errors->has('status')) 
											<span class="form-control-feedback">{{ $errors->first('status') }}</span>
										@endif
										<div>
							
                                </div>
                            </div>
                        
                        
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-9">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                        <a href="{{ URL::previous() }}" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@push('style')
    
@endpush
@push('script')


<!-- Custom Theme JavaScript -->  
    
@endpush



