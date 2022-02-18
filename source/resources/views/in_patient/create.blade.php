@extends('layout.content')

@section('title', 'Admitted Patient Create')




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
                    <h3 class="text-themecolor pull-left">Admitted Patient Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admitted patient</a></li>
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
                <h4 class="m-b-0 text-white">Add Patient(<small>all field is required</small>)</h4>
                
            </div>
            @if(Session::has('response'))
                <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
                </div>
                @endif
            <div class="card-body">
                <form action="{{route(Session::get('identity').'.in-patient.store')}}" method="post" enctype="multipart/form-data">

                    @csrf
                    <div class="form-body">
                        <h3 class="card-title">Personal Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('name')) has-danger @endif">
                                    <label class="control-label" for="name">Full Name</label>
                                    <input type="text" id="name" class="form-control @if($errors->has('name')) form-control-danger @endif" name="name" placeholder="Full Name">
                                    @if ($errors->has('name'))
                                        <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('contact')) has-danger @endif">
                                    <label class="control-label" for="contact">Contact No</label>
                                    <input type="text" id="contact" name="contact" class="form-control @if($errors->has('contact')) form-control-danger @endif" placeholder="Contact No">
                                    @if ($errors->has('contact'))
                                        <span class="form-control-feedback">{{ $errors->first('contact') }}</span>
                                    @endif 
                                   
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('email')) has-danger @endif">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) form-control-danger @endif" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="form-control-feedback">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('b_date')) has-danger @endif">
                                    <label class="control-label" for="b_date">Date of Birth</label>
                                    <input type="date" id="b_date" name="b_date" class="form-control @if($errors->has('b_date')) form-control-danger @endif" placeholder="dd/mm/yyyy">
                                    @if ($errors->has('b_date'))
                                        <span class="form-control-feedback">{{ $errors->first('b_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('address')) has-danger @endif">
                                    <label for="address">Address</label>
                                    <textarea class="form-control @if($errors->has('address')) form-control-danger @endif" id="address" name="address" rows="9"></textarea>
                                    @if ($errors->has('address'))
                                        <span class="form-control-feedback">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('image')) has-danger @endif">
                                    <label for="input-file-now-custom-3">Upload your picture</label>
                                    <input type="file" id="input-file-now-custom-3" class="dropify @if($errors->has('image')) form-control-danger @endif" name="image" data-height="220" data-width="220" data-default-file="/images/1638331840.jpg" />
                                    @if ($errors->has('image'))
                                    <span class="form-control-feedback">{{ $errors->first('image') }}</span>
                                @endif
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        
                        
                        <h3 class="box-title m-t-40">Health Info</h3>
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('c_casuelty')) has-danger @endif">
                                    <label for="e_qualific">Core Casuuelty</label>
                                    <input type="text" id="e_qualific" name="c_casuelty" class="form-control @if($errors->has('c_casuelty')) form-control-danger @endif">
                                    @if ($errors->has('c_casuelty'))
                                        <span class="form-control-feedback">{{ $errors->first('c_casuelty') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('blood')) has-danger @endif">
                                    <label for="specialization">Blood</label>
                                    <input type="text" id="specialization" name="blood" class="form-control @if($errors->has('blood')) form-control-danger @endif">
                                    @if ($errors->has('blood'))
                                        <span class="form-control-feedback">{{ $errors->first('blood') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('height')) has-danger @endif">
                                    <label for="e_qualific">Height</label>
                                    <input type="text" id="e_qualific" name="height" class="form-control @if($errors->has('height')) form-control-danger @endif">
                                    @if ($errors->has('height'))
                                        <span class="form-control-feedback">{{ $errors->first('height') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('weight')) has-danger @endif">
                                    <label for="specialization">Weight</label>
                                    <input type="text" id="specialization" name="weight" class="form-control @if($errors->has('weight')) form-control-danger @endif">
                                    @if ($errors->has('weight'))
                                        <span class="form-control-feedback">{{ $errors->first('weight') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('room')) has-danger @endif">
                                    <label>Room</label>
                                    <select class="form-control custom-select @if($errors->has('room')) form-control-danger @endif" name="room">
                                        <option>--Select room--</option>
                                        @if($rooms)
                                       
                                            @foreach($rooms as $room)
                                                @if($room->status == 2)
                                                    <option value="{{$room->id}}">{{$room->room_no}}</option>
                                                @endif
                                            @endforeach
                                        @endif

                                        @if ($errors->has('room'))
                                            <span class="form-control-feedback">{{ $errors->first('room') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group @if($errors->has('doctor')) has-danger @endif">
                                    <label>Referred By</label>
                                    <select class="form-control custom-select @if($errors->has('doctor')) form-control-danger @endif" name="doctor">
                                        <option>--Select doctor--</option>
                                        @if($doctors)
                                       
                                            @foreach($doctors as $doc)
                                                <option value="{{$doc->id}}">{{$doc->name}}</option>
                                            @endforeach
                                        @endif

                                        @if ($errors->has('doctor'))
                                            <span class="form-control-feedback">{{ $errors->first('doctor') }}</span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        
                    </div>
                
                    <h3 class="box-title m-t-40">Account Setting</h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @if($errors->has('username')) has-danger @endif">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control @if($errors->has('username')) form-control-danger @endif">
                                @if ($errors->has('username'))
                                        <span class="form-control-feedback">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if($errors->has('password')) has-danger @endif">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control @if($errors->has('password')) form-control-danger @endif">
                                @if ($errors->has('password'))
                                        <span class="form-control-feedback">{{ $errors->first('password') }}</span>
                                @endif
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
<link rel="stylesheet" href="{{asset('asset/assets/plugins/dropify/dist/css/dropify.min.css')}}">
@endpush
@push('script')

<script src="{{asset('asset/assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<!-- Custom Theme JavaScript -->  
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
@endpush