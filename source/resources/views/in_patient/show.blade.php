@extends('layout.content')

@section('title', 'Admitted Patient')




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
                    <h3 class="text-themecolor">Adnitted Patient</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admited Patient</a></li>
                        <li class="breadcrumb-item active">List</li>
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

{{-- <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12"> --}}
            <div class="{--card card-body --} printableArea">
                <h3><b>INVOICE</b> <span class="pull-right">#5669626</span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">Material Pro Admin</b></h3>
                                <p class="text-muted m-l-5">E 104, Dharti-2,
                                    <br/> Nr' Viswakarma Temple,
                                    <br/> Talaja Road,
                                    <br/> Bhavnagar - 364002</p>
                            </address>
                        </div>
                        <div class="pull-right text-right">
                            <address>
                                <h3>To,</h3>
                                <h4 class="font-bold">{{$inPatient->name}}</h4>
                                <p class="text-muted m-l-30">E 104, Dharti-2,
                                    <br/> Nr' Viswakarma Temple,
                                    <br/> Talaja Road,
                                    <br/> Bhavnagar - 364002</p>
                                <p class="m-t-30"><b>Admit Date Date :</b> <i class="fa fa-calendar"></i> {{ $inPatient->admit_date }}</p>
                                <p><b>Release Date Date :</b> <i class="fa fa-calendar"></i> {{Carbon\Carbon::now()->format('Y-m-d') }}</p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Description</th>
                                        {{-- <th class="text-right">Quantity</th>
                                        <th class="text-right">Unit Cost</th> --}}
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($MEDICINE)
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Medicine</td>
                                        {{-- <td class="text-right">2 </td>
                                        <td class="text-right"> $24 </td> --}}
                                        <td class="text-right"> {{$MEDICINE}}</td>
                                    </tr>
                                    @endif
                                    @if(isset($testtk[0]))
                                                                         <tr>
                                        <td class="text-center">2</td>
                                        <td>Test Fees</td>
                                        {{-- <td class="text-right"> 3 </td>
                                        <td class="text-right"> $500 </td> --}}
                                        <td class="text-right">
                                            {{$testtk[0]->Gtotal - $testtk[0]->paid}}.00 
                                        </td>
                                    </tr>
                                    @endif
                                    @if($operationtk)
                                     <tr>
                                        <td class="text-center">3</td>
                                        <td>Operation Fees</td>
                                        {{-- <td class="text-right"> 20 </td>
                                        <td class="text-right"> %600 </td> --}}
                                        <td class="text-right"> {{$operationtk}}.00</td>
                                    </tr>
                                    @endif
                           
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>Room rent ({{\Carbon\Carbon::parse( $inPatient->admit_date )->diffInDays( $inPatient->release_date )}} days)</td>
                                        {{-- <td class="text-right"> 60 </td>
                                        <td class="text-right">$5 </td> --}}
                                        <td class="text-right"> {{$inPatient->room->roomtype->price * \Carbon\Carbon::parse( $inPatient->admit_date )->diffInDays( $inPatient->release_date )}}.00 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right m-t-30 text-right">
                            <p>Sub - Total amount: $13,848</p>
                            <p>vat (10%) : $138 </p>
                            <hr>
                            <h3><b>Total :</b> {{$inPatient->bill_due}}</h3>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="text-right">
                            
                            <form action="{{route(Session::get('identity').'.in-patient.destroy',$inPatient->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger d-print-none" type="submit"> Proceed to payment </button>
                            <button id="print" class="btn btn-default btn-outline d-print-none" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                            </form>
                        </div>
                    </div>
                </div>
           </div>
         {{-- </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>               --}}
@endsection


@push('style')
@endpush
@push('script')

<script src="{{asset('asset/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
<script>
$(document).ready(function() {
    $("#print").click(function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });
});
</script>
@endpush