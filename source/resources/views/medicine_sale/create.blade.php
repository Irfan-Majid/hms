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
                    <h3 class="text-themecolor">Department</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Department</a></li>
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
                <form method="post" action="{{route(Session::get('identity').'.medsale.store')}}">
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
                                    <div class="float-right m-r-20">
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

                                
                                {{-- <div class="col-12 clearfix m-r-30">
                                    <div class="row pt-2 clearfix">
                                        <div class="col-offset-6 row clearfix">
                                            <div class="col-md-6">
                                            <label for="inputAddress" class="col-form-label">Paid Amount </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="number" onchange="change_price()" name="pay_amount" class="form-control pay_amount" value="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 clearfix m-r-30">
                                    <div class="row pt-2 clearfix">
                                        <div class="col-offset-6 row clearfix">
                                            <div class="col-md-6">
                                            <label for="inputAddress" class="col-form-label">Due </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="number" name="due_amount" class="form-control due_amount" value="">
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
                                    <div class="form-group  @if($errors->has('patient_id')) has-danger @endif">
                                        <label>Patient ID</label>
                                        <input name="patient_id" autocomplete="off" type="text" id="patit_id" class="form-control form-control-line @if($errors->has('patient_id')) form-control-danger @endif"  placeholder="Full Name"> 
                                        @if ($errors->has('patient_id'))
                                            <span class="form-control-feedback">{{ $errors->first('patient_id') }}</span>
                                        @endif
                                    </div>
                                    <input type="hidden" name="p_id" id="p_id"> 
                                    <div id="result" style="z-index:9999;"></div>
                                    <div id="patient_name"></div>
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
                                        @if($item->stock <= 0) 
                                        @continue
                                        @endif
                                    <div class="col-lg-6 col-md-6">
                                        <!-- Card -->
                                        <div class="ribbon-wrapper card">
                                            <div class="ribbon ribbon-bookmark ribbon-default">{{$type[$item->type]}}</div>
                                            <img class="card-img-top img-responsive ribbon-content" src='@if($item->image) {{asset("$item->image")}} @endif' alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$item->name}}</h4>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <span class="btn btn-primary" onclick='add_cart("{{$item->id}}")'>Add</span>
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
<link href="{{asset('asset/assets/plugins/bootstrap-switch/bootstrap-switch.min.css')}}" rel="stylesheet">
<style>
    .bootstrap-switch.bootstrap-switch-wrapper.bootstrap-switch-animate.bootstrap-switch-on {
    width: 107.188px!important;
}
.bootstrap-switch.bootstrap-switch-wrapper.bootstrap-switch-animate.bootstrap-switch-off {
    width: 111.188px!important;
}

.bootstrap-switch-container {
    width: 196.951px!important;
}
</style>
@endpush


@push('script')
<script>
    
</script>
<script src="{{asset('asset/assets/plugins/bootstrap-switch/bootstrap-switch.min.js')}}"></script>

<script type="text/javascript">
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    </script>
<script>
// function find_product(brand){


//     $.ajax({
//         url: "{{route(Session::get('identity').'.findproduct')}}",
//         type: "GET",
//         data: {
//             brand:brand
//         },
//         success:function(data){
//             if(data.vai!='jan'){
//                 $('#product').html('');
//                 $('#product').html(data)
//                 }else{
//                     er = '<div class="alert alert-danger alert-rounded"><i class="ti-user"></i>Sorry no data found fr your search \
//                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>\
//                                         </div>';
//                     $('#product').html('');
//                 $('#product').html(er)
//                     "use strict";
//                     $.toast({
//             heading: 'Oops...',
//             text: 'No data found for your serach.',
//             position: 'top-right',
//             loaderBg:'#ff6849',
//             icon: 'error',
//             hideAfter: 5000
            
//           });
//                 }
//             }
//         })
// }
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
                          <input type="text" disabled class="form-control price" name="price[]" value="' + data[0].sale_price + '">\
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
         /*for keyup suggetion list*/
         $('#patit_id').keyup(function(e) {

var formData = {
    'id' : $(this).val()
};
if(formData['id'].length >= 1){

// process the form
$.ajax({
    type        : "GET",
    url         : "{{route(Session::get('identity').'.findpatientsug')}}",
    data        : formData
})
    .done(function(data) {
        $('#result').html(data).fadeIn();
        $('#result li').click(function() {
            $('#patit_id').val($(this).children("span.iiid").text());
            var a=$(this).children("span.hide").text();
            $('#p_id').val(a);
            $('#result').fadeOut(500);
            $('#patient_name').html('');
        });
        $("#patit_id").blur(function(){
            $("#result").fadeOut(500);
        });

    });

} else {

$("#result").hide();

};

})
</script>
<!-- Custom Theme JavaScript -->  
    
@endpush