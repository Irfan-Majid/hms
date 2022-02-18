@extends('layout.content')

@section('title', 'Dashboard')




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
                    <h3 class="text-themecolor">Test NAME</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Test Name</a></li>
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
                <h4 class="card-title">Test Name List</h4>
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
                                <th>Category</th>
                                <th>price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                           @if($Tests)
                                @foreach($Tests as $i=>$de)
                                    <tr>
                                        <td>{{$de->id}}</td>
                                        <td>{{$de->name}}</td>
                                        <td>{{$de->description}}</td>
                                        <td>{{$de->testcategory?->name}}</td>
                                        <td>{{$de->price}}</td>
                                        <td class="text-nowrap">
                                            <a href="{{route(Session::get('identity').'.testname.edit',$de->id)}}" class="btn waves-effect waves-light btn-rounded btn-xs btn-info">edit</a>
                                            {{-- <a href="#" onclick="edit({{$de->id}})">edit </a> --}}
                                            {{-- <a href="{{route(Session::get('identity').'.department.destroy',$de->id)}}"><i class="fa fa-close text-danger"></i> </a> --}}
                                           <form action="{{route(Session::get('identity').'.testname.destroy',$de->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn waves-effect waves-light btn-rounded btn-xs btn-danger d-inline"  type="submit">delete</button>
                                            </form>
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
                                
                                {{-- <td colspan="7">
                                    {{ $dep->links('pagination::bootstrap-4') }}
                                    <div class="text-right">
                                        <ul class="pagination">
                                                
                                        </ul>
                                    </div>
                                </td> --}}
                            </tr>
                        </tfoot>
                        
                    </table>
                    <div>
                        <a href="{{route(Session::get('identity').'.testname.create')}}" class="btn btn-info btn-rounded mb-5">Add New</a>
                    </div>
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
               
                  
</script>
    <script src="{{asset('asset/assets/plugins/footable/js/footable.all.min.js')}}"></script>
    <script src="{{asset('asset/assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/js/footable-init.js')}}"></script>

    
@endpush