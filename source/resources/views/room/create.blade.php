@extends('layout.content')

@section('title', 'Room Create')




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
                    <h3 class="text-themecolor">Room Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Room</a></li>
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
                <h4 class="m-b-0 text-white">Create Room Here(<small>all field is required</small>)</h4>
            </div>
            <div class="card-body">
                <form action="{{route(Session::get('identity').'.room.store')}}" method="post" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-body">
                        <div class="form-group row @if($errors->has('room_no')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Room No</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Room No" name="room_no" class="form-control @if($errors->has('room_no')) form-control-danger @endif">
                                @if ($errors->has('room_no'))
                                <span class="form-control-feedback">{{ $errors->first('room_no') }}</span>
                            @endif 
                            </div>
                        </div>
                        <div class="form-group row @if($errors->has('room_type')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Room Type</label>
                            <div class="col-md-9">
                                <select class="form-control @if($errors->has('room_type')) form-control-danger @endif custom-select" placeholder="Room Type" name="room_type">
                                    <option disabled value="">--select type--</option>
                                    @foreach ($roomtypes as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>    
                                    @endforeach
                                </select>
                                
                                @if ($errors->has('room_type'))
                                    <span class="form-control-feedback">{{ $errors->first('room_type') }}</span>
                                @endif 
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-9">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Save</button>
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
<!-- Row -->
@endsection


@push('style')
    
@endpush
@push('script')


<!-- Custom Theme JavaScript -->  
    
@endpush