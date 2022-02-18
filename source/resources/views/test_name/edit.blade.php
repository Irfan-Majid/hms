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
                <form action="{{route(Session::get('identity').'.testname.update',$Tests->id)}}" method="post" class="form-horizontal form-bordered">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{$Tests->id}}">
                    <div class="form-body">
                        <div class="form-group row @if($errors->has('name')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Department Name" name="name" value="{{$Tests->name}}" class="form-control @if($errors->has('name')) form-control-danger @endif">
                                @if ($errors->has('name'))
                                <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                            @endif 
                            </div>
                        </div>
                        <div class="form-group row @if($errors->has('category')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Test Category</label>
                            <div class="col-md-9">
                            <select class="form-control custom-select @if($errors->has('category')) form-control-danger @endif" name="category">
                                <option>--Select Category--</option>
                                @if($categories)
                                    @foreach($categories as $dep)
                                        <option @if($dep->id==$Tests->testcategory_id) selected @endif value="{{$dep->id}}">{{$dep->name}}</option>
                                    @endforeach
                                @endif
                                @if ($errors->has('category'))
                                    <span class="form-control-feedback">{{ $errors->first('category') }}</span>
                                @endif
                            </select>
                            </div>
                        </div>
                        <div class="form-group row @if($errors->has('description')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Description</label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Department description" name="description" value="{{$Tests->description}}" class="form-control @if($errors->has('description')) form-control-danger @endif">
                                @if ($errors->has('description'))
                                <span class="form-control-feedback">{{ $errors->first('description') }}</span>
                            @endif 
                            </div>
                        </div>
                        <div class="form-group row @if($errors->has('price')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Price</label>
                            <div class="col-md-9">
                                <input type="text" value={{$Tests->price}} placeholder="Department description" name="price" class="form-control @if($errors->has('price')) form-control-danger @endif">
                                @if ($errors->has('price'))
                                <span class="form-control-feedback">{{ $errors->first('price') }}</span>
                            @endif 
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
<!-- Row -->
@endsection


@push('style')
    
@endpush
@push('script')


<!-- Custom Theme JavaScript -->  
    
@endpush