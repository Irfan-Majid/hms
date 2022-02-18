@extends('layout.content')

@section('title', 'Department Create')




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
                    <h3 class="text-themecolor">Medicine Purchase</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Medicine Purchase</a></li>
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
    <div class="col-lg-12 h-100 d-flex align-items-stretch">
        <div class="card card-outline-info" Style="min-height: 80vh!important;">
            @if(Session::has('response'))
            <div class="alert alert-{{Session::get('response')['class']}}">
            {{Session::get('response')['message']}}
            </div>
            @endif
            <div class="card-header">
                <h4 class="m-b-0 text-white">Enter Description and details here</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{route(Session::get('identity').'.medpurchase.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="m-r-30">
                                        <div class="row text-center">
                                            <h6 class="col-sm-3">Name</h6>
                                            <h6 class="col-sm-3">Qty</h6>
                                            <h6 class="col-sm-3">Price</h6>
                                            <h6 class="col-sm-3">Total</h6>
                                        </div><br>
                                        <div class="product-data">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="float-right m-r-30">
                                        <input type="hidden" name="total_amount" class="total_amount_inp" value="0">
                                        <h3 class="mt-2 total_amount">Total: 0 tk</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-12 row ">
                                    <div class="col-6">
                                        <label for="inputAddress" class="col-form-label">Paid Amount </label>
                                    </div>
                                    <div class="float-right">
                                        <input type="hidden" name="total_amount" class="total_amount_inp" value="0">
                                        <input type="number" onchange="change_price()" name="pay_amount" class="form-control pay_amount" value="">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix p-t-5"></div>
                                <div class="col-12 row ">
                                    <div class="col-6">
                                        <label for="inputAddress" class="col-form-label">Due</label>
                                    </div>
                                    <div class="m-t-5">
                                        <input type="hidden" name="total_amount" class="total_amount_inp" value="0">
                                        <input type="number" name="due_amount" class="form-control due_amount float-right" value="">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                {{-- <div class="col-12 clearfix">
                                    <div class="row pt-2 clearfix">
                                        <div class="col-offset-6 row clearfix">
                                            <div class="col-md-8">
                                            <label for="inputAddress" class="col-form-label">Paid Amount </label>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="number" onchange="change_price()" name="pay_amount" class="form-control pay_amount" value="">
                                        </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-12 clearfix m-r-30">
                                    <div class="row pt-2 clearfix">
                                        <div class="col-offset-6 row clearfix">
                                            <div class="col-md-6">
                                            <label for="inputAddress" class="col-form-label">Due </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="number" name="due_amount" class="form-control due_amount float-right" value="">
                                        </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="hidden-print mt-2 mb-4 m-r-30">
                                <div class="text-right d-print-none">
                                    <button type="submit"class="btn btn-info w-20 waves-effect waves-light">Save </button>
                                </div>
                            </div>
                        </div>
                        <div class="row col-7">
                            <div class="col-12 row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Choose Medicine Brands</label>
                                    <select id="brands" name="brand_id" class="form-control" onChange='find_product(this.value)''>
                                        <option> Choose  </option>
                                        @foreach($brands as $sup)
                                        <option value="{{$sup->id}}">{{$sup->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Date </label>
                                    <input type="text" name="pur_date" value="<?= date('Y-m-d'); ?>" class="form-control datepicker">
                                </div>
                            </div>
                            @php 
                                $type=array(1=>"Tab",2=>"Cap",3=>"Syrup",4=>"Injection",5=>"supositor")
                                @endphp
                            <div class="row" id="product">
                                
                                @foreach ($medicinedetails as $item)
                                    <div class="col-lg-6 col-md-6">
                                        <!-- Card -->
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-bookmark ribbon-default">{{$type[$item->type]}}</div>
                                            <img class="card-img-top img-responsive ribbon-content" src='{{asset("$item->image")}}' alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$item->name}}</h4>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <span class="btn btn-primary" >Add</span>
                                            </div>
                                        </div>
                                        <!-- Card -->
                                    </div>
                                @endforeach
                            
                            </div>
                           
                        </div> <!-- end col -->
                       
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>
        
<!-- Row -->
@endsection


@push('style')

<link href="{{asset('asset/assets/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush


@push('script')
<script src="{{asset('asset/assets/plugins/toast-master/js/jquery.toast.js')}}"></script>
 <!-- bt-switch -->

<script>
function find_product(brand){


    $.ajax({
        url: "{{route(Session::get('identity').'.findproduct')}}",
        type: "GET",
        data: {
            brand:brand
        },
        success:function(data){
            if(data.vai!='jan'){
                $('#product').html('');
                $('#product').html(data)
                }else{
                    er = '<div class="alert alert-danger alert-rounded"><i class="ti-user"></i>Sorry no data found \
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>\
                                        </div>';
                    $('#product').html('');
                $('#product').html(er)
                    "use strict";
                    $.toast({
            heading: 'Oops...',
            text: 'No data found for your serach.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000
            
          });
                }
            }
        })
}
var productList = new Array();

function add_cart(id) {
$.ajax({
    type: 'GET',
    url: "{{route(Session::get('identity').'.findgetproduct')}}",
    data: {
        p_id: id
    }
}).done(function(data) {
    console.log(data);
    if (productList.indexOf(data[0].id) >= 0) {
        oldqty = parseFloat($('.row#' + data[0].id).find('.qty').val()) + 1;
        $('.row#' + data[0].id).find('.qty').val(oldqty);
        $('.row#' + data[0].id).find('.subtotal').val(oldqty * data[0].sale_price);
    } else {
        productList.push(data[0].id);
        $('.product-data').append('<div class="row" id="' + data[0].id + '">\
                      <div class="col-sm-3">\
                          <spnn class="name">' + data[0].name + '</spnn>\
                      </div>\
                      <div class="col-sm-3">\
                          <input type="text" class="form-control qty" onchange="update_price('+data[0].id+')" name="qty[]" value="1">\
                      </div>\
                      <div class="col-sm-3">\
                          <input type="text" disabled class="form-control price" onchange="total_cal()" name="price[]" value="' + data[0].sale_price + '">\
                      </div>\
                      <div class="col-sm-3">\
                      <input type="hidden" value="'+data[0].id+'" name="medicinedetail_id[]">\
                          <input type="text" class="form-control subtotal subt" onchange="change_price()" name="subtotal[]" value="' + data[0].sale_price + '">\
                      </div>\
                  </div>');
    }
    total_cal();
    
})
}


function total_cal(){
        var total=0;
        $('.subt').each(function(){
            total+=parseFloat($(this).val());
        })
        $('.total_amount').html("Total: "+total+" TK")
        $('.total_amount_inp').val(total);
        change_price();
    }
    function change_price(){
        $('.total_amount_inp').val();
       $('.pay_amount').val();
       var a = $('.total_amount_inp').val()-$('.pay_amount').val();
       $('.due_amount').val(a);
    }

    function update_price(id) {
            totalqty = parseFloat($('.row#' + id).find('.qty').val());
            price = parseFloat($('.row#' + id).find('.price').val());
            subtotal = totalqty * price;
            $('.row#' + id).find('.subtotal').val(subtotal);
            total_cal();
        }
</script>
<!-- Custom Theme JavaScript -->  
    
@endpush