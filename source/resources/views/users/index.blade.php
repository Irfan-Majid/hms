@extends('layout.content')

@section('title', 'Add user')




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
                    <h3 class="text-themecolor">User</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
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
            
                <h4 class="card-title">User List</h4>
                
                
            
                
                    @if(Session::has('response'))
					<div class="clearfix alert alert-{{Session::get('response')['class']}}">
					{{Session::get('response')['message']}}
					</div>
				@endif
                
                <div class="table-responsive">
                    <table class="table color-table muted-table">
                        <thead>
						<tr>
                    <th>#SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                        </thead>

              <tbody>
			  @php $status=array('Inactive','active','Pending','Freez','Block'); @endphp
                @if($users)
                    @foreach($users as $i=>$u)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->contact}}</td>
                            <td>{{$u->role?->type}}</td>
                            <td>{{$status[$u->status]}}</td>
                            <td><img height="80" width="80" src='{{asset($u->image)}}'></td>
                            <td>
                                <a href="{{route('users.edit',$u->id)}}" ><i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                
                            </td>
                        </tr>
                    @endforeach
                @endif
			  
			 
			 
			 
                        </tbody>
                        <tfoot>
                            <tr>
                               
                                
                                <td colspan="7">
                                    {{ $users->links('pagination::bootstrap-4') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div>
                    <a href="{{route('users.create')}}" class="btn btn-info btn-rounded mb-5">Add New User</a>
                </div>
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
   /* function add() {
alert("1")
        var name = $('#d_name').val();
        var _token=$('input[name=_token]').val();
        $.ajax({
            alert("2");
            url: "{{route(Session::get('identity').'.department.store')}}"
            type: "POST",
            data: {
                name:name,
                _token:_token
            },
            success:function(response){
                if(response){
                    alert();
                    console.log(response);
                }
            }
        })
    }
*/

</script>
    <script src="{{asset('asset/assets/plugins/footable/js/footable.all.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/js/footable-init.js')}}"></script>

    
@endpush