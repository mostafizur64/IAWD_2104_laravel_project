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
                    @if(session('InstErr'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('InstErr')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    @if(session('banner'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('banner')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <form action="{{route('banner.update',$all_banner_info->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('banner_title')
                        <small class="text-danger">
                            {{$message}}

                        </small>
                        @enderror
                        <div class="me-3">
                            <input type="hidden" name="$banner_id" value="{{$all_banner_info->id}}">
                            <label class="form-label">Banner title:</label>
                            <input type="text" name="banner_title" class="form-control" value="{{$all_banner_info->banner_title}}">
                        </div>

                        @error('banner_images')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">

                            <label class="form-label">Banner Image</label>
                            <input type="file" name="banner_images" class="form-control">
                            <small class="text-info d-block mt-2">image dimention:h-270 w-310 </small>
                        </div>
                        <div class="me-3">

                            <img src="{{asset('uploads/banner_photo')}}/{{$all_banner_info->banner_images}}" height="120px" alt="">
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-info">update Banner</button>
                            <a href="{{route('banner.index')}}" class="btn btn-primary text-white">update Banner</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection