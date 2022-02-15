@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="text-center">Add Banner form</h4>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('bannerAdd'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('bannerAdd')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    @if(session('instdone'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('instdone')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('banner_title')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Banner title:</label>
                            <input type="text" name="banner_title" class="form-control">
                        </div>



                        @error('banner_image')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Banner Image</label>
                            <input type="file" name="banner_images" class="form-control">
                            <small class="text-info d-block mt-2">image dimention:h-270 w-310 </small>
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-info">Add Banner</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
@section('category_script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#CatId').select2();
    });
</script>

@endsection