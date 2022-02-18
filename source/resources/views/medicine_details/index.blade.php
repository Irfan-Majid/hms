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
                    <h3 class="text-themecolor">Medicine Details</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Medecine Details</a></li>
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

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title clearfix d-flex pull-left">Medicine Details List</h4>
                
               
                @if(Session::has('response'))
					<div class="alert alert-{{Session::get('response')['class']}}">
					{{Session::get('response')['message']}}
					</div>
				 @endif
                <div class="table-responsive">
                    <table class="table color-table muted-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Generic</th>
                                <th>Brand</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

              <tbody>@php $status=array('Unavailable','Available'); @endphp
                            @if($medics)
                                @foreach($medics as $i=>$de)
                                    <tr>
                                        <td>{{$de->id}}</td>
                                        <td>{{$de->name}}</td>
                                        <td>{{$de->description}}</td>
                                        <td>{{$de->medicinegeneric?->name}}</td>
                                        <td>{{$de->medicinebrand?->name}}</td>
                                        <td>{{$de->purchase_price}}</td>
                                        <td>{{$de->sale_price}}</td>
                                        <td>{{$de->stock}}</td>
                                        <td>{{$status[$de->status]}}</td>
                                        <td><img height="80" width="80" src='{{asset($de->image)}}'></td>
                                        <td class="text-nowrap">
                                            <a href="{{route(Session::get('identity').'.getmedicinedetail',$de->id)}}" class="btn waves-effect waves-light btn-rounded btn-xs btn-info">edit</a>
                                            {{-- <a href="#" onclick="edit({{$de->id}})">edit </a> --}}
                                            {{-- <a href="{{route(Session::get('identity').'.doctor.destroy',$de->id)}}"><i class="fa fa-close text-danger"></i> </a> --}}
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                {{-- <td colspan="2">
                                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Add New Department</button>
                                </td> --}}
                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add New Department</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                              </div>   
                                        <form id="add" class="form-horizontal form-material" method="post" action="#">
                                            @csrf
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" id="d_name" class="form-control" placeholder="Department name">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" onclick="add()" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <td colspan="7">
                                    {{$medics->links('pagination::bootstrap-4')}}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><div class="d-flex pull-right">
            <a href="{{route(Session::get('identity').'.addmedicinedetail')}}" class="btn btn-info btn-rounded mb-5">Add New</a>
        </div>
        </div>
        
    </div>
</div>
                               
                        <!-- for update model-->
                                <div id="update-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">update New Department</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                              </div>   
                                        <form id="add" class="form-horizontal form-material" method="post" action="#">
                                            @csrf
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="hidden" id="ed_id">
                                                            <input type="text" id="ed_name" class="form-control" placeholder="Department name">
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" onclick="update()" class="btn btn-info waves-effect" data-dismiss="modal">update</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
@endsection


@push('style')
    <link href="{{asset('asset/assets/plugins/footable/css/footable.core.css')}}" rel="stylesheet">
    <link href="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
@endpush
@push('script')

<script>
  
        //      function add() {
        //             var name = $('#d_name').val();
        //             var _token=$('input[name=_token]').val();
        //             $.ajax({
        //                 url: "{{route(Session::get('identity').'.department.store')}}",
        //                 type: "POST",
        //                 data: {
        //                     name:name,
        //                     _token:_token
        //                 },
        //                 success:function(response){
        //                     if(response.error==0){
                                
        //                         showAllPosts()
                               
        //                     }
        //                 }
        //             })
        //         }
        //         function showAllPosts() {
        //         location.reload();
        // }


        //    function edit(a){
        //     $('#update-contact').modal('show');
        //     $('#basicModal').empty();
        //         $.get( 's_id/'+a,function(response){ 
        //             $('#ed_name').val(response.data.name);
        //             $('#ed_id').val(response.data.id);
                    
        //         })
        //     }



        //     function update(){
        //         var name = $('#ed_name').val();
        //         var id = $('#ed_id').val();
        //         var _token=$('input[name=_token]').val();
        //         alert(_token);
        //         return;
        //         $.ajax({
        //                 url: '/department/' + id,
        //                 type: "PUT",
        //                 data:{
        //                     name:name,
        //                     _token:_token
        //                 },
        //                 success:function(response){
        //                     if(response.error==0){
                                
                                
                               
        //                     }
        //                 }

        //         })
        //     }
               
                  
</script>
    <script src="{{asset('asset/assets/plugins/footable/js/footable.all.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/js/footable-init.js')}}"></script>

    
@endpush