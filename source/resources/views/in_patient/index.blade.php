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
                    <h3 class="text-themecolor">Admitted Patient</h3>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title pull-left">Admitted Patient List</h4>
                
                
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
                                <th>phnoe</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>core_casualty</th>
                                <th>blood</th>
                                <th>weight</th>
                                <th>height</th>
                                <th>Admit Date</th>
                                <th>status</th>
                                <th>image</th>
                                <th>Action</th>
      
      
                            </tr>
                        </thead>

              <tbody>
                            @if($in_patients)
                                @foreach($in_patients as $i=>$in_patient)
                                    <tr>
                                        <td>{{$in_patient->id}}</td>
                                        <td>{{$in_patient->name}}</td>
                                        <td>{{$in_patient->contact}}</td>
                                        <td>{{$in_patient->email}}</td>
                                        <td>{{$in_patient->address}}</td>
                                        <td>{{$in_patient->core_casualty}}</td>
                                        <td>{{$in_patient->blood}}</td>
                                        <td>{{$in_patient->weight}}</td>
                                        <td>{{$in_patient->height}}</td>
                                        <td>{{$in_patient->admit_date}}</td>
                                        <td>
                                        @if($in_patient->status==1)
                                            Admitted
                                        @else
                                            Realesed
                                        @endif
                                        </td>
                                        <td><img height="80" width="80" src='{{asset($in_patient->image)}}'></td>
                                        <td class="text-nowrap">
                                            <a href="{{route(Session::get('identity').'.in-patient.edit',$in_patient->id)}}" class="btn waves-effect waves-light btn-rounded btn-xs btn-info">edit</a>
                                            
                                            {{-- <a href="{{route(Session::get('identity').'.in-patient.destroy',$in_patient->id)}}"><i class="fa fa-close text-danger"></i> </a> --}}
                                            @if($in_patient->status==1)
                                               
                                            <a href="{{route(Session::get('identity').'.in-patient.show',$in_patient->id)}}" class="btn waves-effect waves-light btn-rounded btn-xs btn-danger">Release</a>
                                            {{-- <a href="#" onclick="edit({{$de->id}})">edit </a> --}}
                                            @endif
                                            
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
                                
                                <td colspan="7">
                                    {{ $in_patients->links('pagination::bootstrap-4') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div>
                <a href="{{route(Session::get('identity').'.in-patient.create')}}" class="pull-right btn btn-info btn-rounded mb-5">Add New</a>
            </div>
        </div>
    </div>
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