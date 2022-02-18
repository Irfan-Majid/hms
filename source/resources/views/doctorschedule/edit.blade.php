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
<!-- Row -->

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
                <form action="{{route(Session::get('identity').'.doctorschedule.update',$shift->id)}}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="card-title">Personal Info</h3>
                        <hr>
                        <div class="row  p-t-20">
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Name</label>
                                    <select class="form-control custom-select " name="doctor_id">
                                        <option><center>--Select designation--</center></option>
                                        @if($doctors)
                                            @foreach ($doctors as $doctor)
                                            <option @if($doctor->id==$shift->doctor_id) selected @endif value="{{$doctor->id}}">{{$doctor->employee->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Designation</label>
                                    <select class="form-control custom-select " name="weekday_id">
                                        <option>--Select designation--</option>
                                    @if($weekdays)
                                        @foreach ($weekdays as $weekday)
                                        <option @if($weekday->id==$shift->weekday_id) selected @endif value="{{$weekday->id}}">{{$weekday->name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Department</label>
                                    <select class="form-control custom-select " name="dutyshift_id">
                                        <option>--Select designation--</option>
                                        @if($dutyshifts)
                                        @foreach ($dutyshifts as $dutyshift)
                                        <option @if($dutyshift->id==$shift->dutyshift_id) selected @endif value="{{$dutyshift->id}}">{{$dutyshift->name}} [{{$dutyshift->start_time}} -- {{$dutyshift->end_time}} ]</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
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
<!-- Row -->


@endsection



@push('style')

@endpush
@push('script')

@endpush