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
                <form action="{{route(Session::get('identity').'.testinvoice.update',$data->id)}}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('put')
                    <div class="form-body">
                        <h3 class="card-title">Payment Details</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Total</label>
                                    <input type="text" id="contact" readonly name="contact" value="{{$data->grand_total+$data->discount-$data->vat}}" class="col-md-10 form-control" placeholder="Contact No">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Vat (+)</label>
                                    <input type="text" id="contact" readonly value="{{$data->vat}}" class="col-md-10 form-control" placeholder="Contact No">
                                </div>
                            </div>

                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Discount (-)</label>
                                    <input type="text" id="contact" readonly value="{{$data->discount}}" class="col-md-10 form-control" placeholder="Contact No">
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        
                        <hr>
                        <div class="row">
                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Grand Total</label>
                                    <input type="text" id="contact" readonly value="{{$data->grand_total}}" class="col-md-10 form-control" placeholder="Contact No">
                                </div>
                            </div>
                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Paid</label>
                                    <input type="text" id="contact" readonly value="{{$data->paid}}" class="col-md-10 form-control" placeholder="Contact No">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Due</label>
                                    <input type="text" id="contact" readonly value="{{$data->grand_total-$data->paid}}" class="col-md-10 form-control" placeholder="Contact No">
                                </div>
                            </div>
                            <div class="col-md-7 offset-md-3">
                                <div class="form-group row">
                                    <label class="control-label col-md-2" for="contact">Payment</label>
                                    <input type="text" id="contact" name="payment" class="col-md-10 form-control" placeholder="Todays Payment">
                                </div>
                            </div>
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