@extends('layout.content')

@section('title', 'Add Room')




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
                    <h3 class="text-themecolor">Room</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Room</a></li>
                        <li class="breadcrumb-item active">Add</li>
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
                @if(Session::has('response'))
					<div class="alert alert-{{Session::get('response')['class']}}">
					{{Session::get('response')['message']}}
					</div>
				@endif
                
                <div class="table-responsive">
                    <table class="table full-color-table full-muted-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room no</th>
                                <th>Room Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($room)
                                @foreach($room as $i=>$de)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$de->room_no}}</td>
                                        <td>{{$de->roomtype?->name}}</td>
                                        <td>@if($de->status==1)
                                            reserved
                                            @else
                                           available
                                           @endif 
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="{{route(Session::get('identity').'.room.edit',$de->id)}}" class="btn waves-effect waves-light btn-rounded btn-xs btn-info">edit</a>
                                            {{-- <a href="{{route(Session::get('identity').'.room.destroy',$de->id)}}"><i class="fa fa-close text-danger"></i> </a> --}}
                                            <form action="{{route(Session::get('identity').'.room.destroy',$de->id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn waves-effect waves-light btn-rounded btn-xs btn-danger d-inline" type="submit">delete</button>
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
                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add New Room</h4>
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
                                                <button type="submit" {{--onclick="add()"--}} class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <td colspan="7">
                                    {{ $room->links('pagination::bootstrap-4') }}
                                    
                                </td>
                            </tr>
                        </tfoot>
                        
                    </table>
                   
                </div>
            </div>
            <div>
                <a href="{{route(Session::get('identity').'.room.create')}}" class="btn btn-info btn-rounded mb-5">Add New Room</a>
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