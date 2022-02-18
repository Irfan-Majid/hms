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
                    <h3 class="text-themecolor">Doctor Create</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
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
                <h4 class="m-b-0 text-white">With Border at Bottom (<small>Use class form-bordered</small>)</h4>
            </div>
            <div class="card-body">
                @if(Session::has('response'))
                <div class="alert alert-{{Session::get('response')['class']}}">
                {{Session::get('response')['message']}}
                </div>
                @endif
                <form action="{{route(Session::get('identity').'.updatemedicinedetail')}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <input type="hidden" value="{{$medic->id}}" name="id">
                    <div class="form-body">
                        <div class="form-group row @if($errors->has('name')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Medicine Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{$medic->name}}" name="name" placeholder="medicine name" class="form-control @if($errors->has('name')) form-control-danger @endif">
                                @if ($errors->has('name'))
                                        <span class="form-control-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row @if($errors->has('description')) has-danger @endif">
                            <label class="control-label text-right col-md-3">Medecine description</label>
                            <div class="col-md-9">
                                <input type="text" name="description" value="{{$medic->description}}" placeholder="details" class="form-control @if($errors->has('description')) form-control-danger @endif">
                                @if ($errors->has('description'))
                                        <span class="form-control-feedback">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row @error('medicinebrand_id') has-danger @enderror">
                            <label class="control-label text-right col-md-3">Brand</label>
                            <div class="col-md-9">
                                <select name="medicinebrand_id" class="form-control custom-select @error('medicinebrand_id') form-control-danger @enderror">
                                    <option value="">---select Brand---</option>
                                    @if($brands)
                                        @foreach($brands as $brand)
                                            <option @if(($brand->id)==($medic->medicinebrand_id)) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('medicinebrand_id')
                                 <span class="form-control-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('medicinegeneric_id') has-danger @enderror">
                            <label class="control-label text-right col-md-3">Generic</label>
                            <div class="col-md-9">
                                <select name="medicinegeneric_id"class="form-control custom-select @error('medicinegeneric_id') form-control-danger @enderror">
                                    <option value="">---select Generic---</option>
                                    @if($generics)
                                        @foreach($generics as $generic)
                                            <option @if(($generic->id)==($medic->medicinegeneric_id)) selected @endif value="{{$generic->id}}">{{$generic->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('medicinegeneric_id')
                                    <span class="form-control-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row @error('purchase_price') has-danger @enderror">
                            <label class="control-label text-right col-md-3">Purchase Price</label>
                            <div class="col-md-9">
                                <input type="text" name="purchase_price" value="{{$medic->purchase_price}}" class="form-control @error('purchase_price') form-control-danger @enderror">
                                @error('purchase_price')
                                    <span class="form-control-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-group row @error('sale_price') form-control-danger @enderror">
                            <label class="control-label text-right col-md-3">Sale Price</label>
                            <div class="col-md-9">
                                <input name="sale_price" value="{{$medic->sale_price}}" type="text" class="form-control @error('sale_price') form-control-danger @enderror">
                                @error('sale_price')
                                    <span class="form-control-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="form-group row @if($errors->has('image')) has-danger @endif">
                            <label for="input-file-now-custom-3" class="col-md-3 text-right">Upload product picture</label>
                            <div class="col-md-9">
                                <input type="file" name="image" id="input-file-now-custom-3" class="dropify @if($errors->has('image')) form-control-danger @endif" name="image" data-height="220" data-width="220" data-default-file="/{{$medic->image}}" />
                                @if ($errors->has('image'))
                                    <span class="form-control-feedback">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="offset-sm-3 col-md-9">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                    </div>
                                </div>
                            </div>
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