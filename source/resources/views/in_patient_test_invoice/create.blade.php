@extends('layout.content')

@section('title', 'Doctor Create')




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
                    <h3 class="text-themecolor">Test Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Test</a></li>
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
                <h4 class="m-b-0 text-white">Test Invoice</h4>
            </div>
            <div class="card-body">
                <form action="{{route(Session::get('identity').'.intestinvoice.store')}}" class="form-horizontal" method="post">
                    @csrf
                    <div class="form-body">
                        <h3 class="box-title">Person Info</h3>
                        <hr class="m-t-0 m-b-40">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-4">PAtient Id</label>
                                    <div class="col-md-8">
                                        <input type="text" autocomplete="off" id="patit_id" class="form-control" placeholder="Search By id">
                                        <ul class="position-relative" style="list-style: none">
                                            <div id="result" class="position-absolute" style="z-index:9999;"></div>

                                        </ul>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6"></div>
                            <input type="hidden" id="id" name="patient_id">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-4">Patient Name</label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" autocomplete="off" class="form-control" placeholder="John doe">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Conatact</label>
                                    <div class="col-md-9">
                                        <input type="text" id="contact" class="form-control" placeholder="12n">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="text" id="email" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input type="date" id="b_date" class="form-control" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="form-group row">
                            <label class="control-label text-right col-md-2">Address</label>
                            <div class="col-md-10">
                            <textarea class="form-control" id="address"></textarea>
                        </div>
                            <!--/span-->
                            <!--/span-->
                        </div>
                        <h3 class="box-title">Patient Test Information</h3>
                        <hr class="m-t-0 m-b-40">
                        <!--/row-->
                        <!--/row-->
                        {{-- <div class="panel-group" style="margin-left:-16px; margin-right:-16px;">
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4></h4></div>
                                    <div class="panel-body"> --}}
                                         <table id="invoice" class="table table-striped"> 
                                            <thead>
                                                    <tr class="bg-theme text-white">
                                                        <th colspan="2">Investigation Catagory</th>
                                                        <th colspan="2">Investigation Name</th>
                                                        <th width="120">Price</th>  
                                                        <th width="160">Add / Remove</th> 
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <select class="form-control inv_cat_id dont-select-me" onChange="get_test(this)">
                                                                <option value="0"> -- Invest Category -- </option>
                                                            
                                                                 @foreach($data as $rc)
                                                                    <option value="{{$rc->id}}">{{$rc->name}}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>
                                                    <td colspan="2">
                                                        <select class="form-control test_name" id="test_name" name="inv_list_id[]" onChange="get_price(this)";>
                                                                <option value="0"> -- Investigation Name -- </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="price[]" required readonly class="form-control price" placeholder="Price" value="0.00">
                                                    </td> 
                                                    <td>
                                                      <div class="btn btn-group">
                                                        <button type="button" class="btn btn-sm btn-primary addBtn">Add</button>
                                                        <button type="button" class="btn btn-sm btn-danger removeBtn">Remove</button>
                                                       </div>
                                                    </td>									
                                                </tr>  
                                            </tbody>
                                            <tfoot> 
                                                <tr class="bg-theme text-white">  
                                                    <td colspan="3"></td> 
                                                    <th class="text-right align-middle">Total</th>  
                                                    <th><input type="text" name="total" id="total" class="form-control" readonly required placeholder="Total" value="0.00"></th>  
                                                    <td></td> 
                                                </tr>
                                                <tr>  
                                                    <th colspan="3" class="text-right align-middle">Vat</th> 
                                                    <td>
                                                        <div class="input-group">
                                                          <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                          <input type="text" id="vatParcent" required class="form-control" name="vat_percent" value="0" onKeyup="vat_discount()">
                                                        </div>
                                                    </td> 
                                                    <td><input type="text" id="vat" required class="vatDiscount paidDue form-control" placeholder="Vat" name="vat_tk" value="0.00" ></td>  
                                                    <td></td> 
                                                </tr>
                                                <tr>  
                                                    <th colspan="3" class="text-right align-middle">Discount</th> 
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                          <input type="text" name="discount_percent" id="discountParcent" required class=" form-control" value="0" onKeyup="vat_discount()" >
                                                        </div>
                                                    </td> 

                                                    <td><input type="text" required id="discount" class="vatDiscount paidDue form-control" placeholder="Discount" name="discount_tk" value="0.00" ></td> 
                                                    <td></td>  
                                                </tr> 
                                                <tr class="bg-theme text-white">  
                                                    <td colspan="3"></td>  
                                                    <th class="text-right align-middle">Grand Total</th>  
                                                    <th><input type="text" name="grand_total" readonly required  id="grand_total" class="paidDue form-control" placeholder="Grand Total" value="0.00" onKeyup="vat_discount()" ></th> 
                                                    <td></td>  
                                                </tr>
                                                <tr class="d-none">  
                                                    <td colspan="3"></td>  
                                                    <th class="text-right align-middle">Paid</th>
                                                    <td><input type="text" name="paid" id="paid" class="paidDue form-control" required placeholder="Paid"  value="0.00" onKeyup="get_due()"></td> 
                                                    <td></td>  
                                                </tr>
                                                <tr class="bg-theme text-white d-none">  
                                                    <td colspan="3"></td>  
                                                    <th class="text-right align-middle">Due</th> 
                                                    <td><input type="text" name="due" id="due" class="paidDue form-control" required placeholder="Due" value="0.00"></td> 
                                                    <td></td>  
                                                </tr>
                                                
                                            </tfoot>
                                        </table> 
                                    {{-- </div>
                            </div>
                        </div>
                    </div> --}}
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
                            <div class="col-md-6"> </div>
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
<script>

$(document).ready(function(){
    
   /*for keyup suggetion list*/
        $('#patit_id').keyup(function(e) {
            var formData = {
                'id' : $(this).val()
            };
            if(formData['id'].length >= 1){
            // process the form
            $.ajax({
                type        : "GET",
                url         : "{{route(Session::get('identity').'.findinpatientsug')}}",
                data        : formData
            })
                .done(function(data) {
                    $('#result').html(data).fadeIn();
                    $('#result li').click(function() {
                        var a=$(this).children("span.hide").text();
                        var formData = {'id' : a};
                        $.ajax({
                            type        : "GET",
                            url         : "{{route(Session::get('identity').'.findinpatientsugdet')}}",
                            data        : formData
                        }).done(function(data) {
                        $('#patit_id').val(data[0].patient_id);
                        $('#id').val(data[0].id);
                        $('#name').val(data[0].name);
                        $('#contact').val(data[0].contact);
                        $('#email').val(data[0].email);
                        $('#b_date').val(data[0].b_date);
                        $('#address').val(data[0].address);
                        })
                    });
                    $("#patit_id").blur(function(){
                        $("#result").fadeOut(500);
                    });
                });
            } else {
            $("#result").hide();
            };
        })


        //#------------------------------------
		//   STARTS OF DYNAMIC FORM 
		//#------------------------------------   
		//add row
		var body      = $('#invoice > tbody');
		$('body').on('click','.addBtn' ,function() {
			
			$('#invoice > tbody >tr:last').clone().insertAfter('#invoice > tbody >tr:last');
			$("#invoice > tbody >tr:last input[type='text']").val('');
			$("#invoice > tbody >tr:last .test_name").html('');
			//$('.select2').select2();
		});


        //remove row
		$('body').on('click','.removeBtn' ,function() {
        $(this).parent().parent().parent().remove();
		var total = 0;
			$('.price').each(function(){
				total += parseFloat($(this).val());
				$('#total').val(total.toFixed(2));
			});
		});



        
})
function get_test(v){
			$(v).parent('td').siblings('td').find('select').html('');
			$.ajax({
				url:"{{route(Session::get('identity').'.findtestname')}}",
				type: 'GET',
				data: {'id': $(v).val()},
				success: function(data){
					if(data){
						$(v).parent('td').siblings('td').find('select').append("<option value=''> -- Investigation Name -- </option>");
						for(var i in data)
						$(v).parent('td').siblings('td').find('select').append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
					}
				}
			});
        }



        function get_price(v){
	$(v).parent('td').siblings('td').find('.price').html('');
	$.ajax({
		url:"{{route(Session::get('identity').'.findtestprice')}}",
		type: 'GET',
		data: {'id': $(v).val()},
		success: function(data){
			if(data){
				$(v).parent('td').siblings('td').find('.price').val(data[0].price);
				var total = 0;
			$('.price').each(function(){
				total += parseFloat($(this).val());
			});
				$('#total').val(total.toFixed(2));
				$('#grand_total').val(total.toFixed(2));
                vat_discount();
                get_due();
			}
		}
	});
}

function vat_discount(){
		var total = $('#total').val();
		var vatParcent = $('#vatParcent').val();
		$('#vat').val(parseFloat((total * vatParcent)/100).toFixed(2));
		var discountParcent = $('#discountParcent').val();
		$('#discount').val(parseFloat((total * discountParcent)/100));
		var vat = $('#vat').val();
		var discount = $('#discount').val();
		$('#grand_total').val(((parseFloat(total)+parseFloat(vat)-parseFloat(discount))));
        get_due();
	}
    
    
   

    function get_due(){
		 var grand_total =$('#grand_total').val();
		var paid =$('#paid').val();
		var due = ((parseFloat(grand_total)-parseFloat(paid)));
		if (due < 1){
			due = 0;
		}
		$('#due').val(due); 
	}
</script>

@endpush