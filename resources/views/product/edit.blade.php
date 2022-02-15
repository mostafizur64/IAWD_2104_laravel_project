@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="text-center">add category form</h4>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('InstErr'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('InstErr')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    @if(session('productUpdate'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('productUpdate')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <form action="{{route('product.update',$all_proInfo->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('product_name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <input type="hidden" name="id" value="{{$all_proInfo->id}}">
                            <label class="form-label">Name:</label>
                            <input type="text" name="product_name" class="form-control" value="{{$all_proInfo->product_name}}">
                        </div>
                        @error('old_price')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">old price</label>
                            <input type="text" name="old_price" class="form-control" value="{{$all_proInfo->old_price}}">
                        </div>

                        <div class="me-3">
                            <label class="form-label">new price</label>
                            <input type="text" name="new_price" class="form-control" value="{{$all_proInfo->new_price}}">
                        </div>
                        @error('product_image')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Imge</label>
                            <input type="file" name="product_image" class="form-control">
                            <small class="text-info d-block mt-2">image dimention:h-270 w-310 </small>
                        </div>
                        <div class="me-3">
                            <img src="{{asset('uploads/product_photo')}}/{{$all_proInfo->product_image}}" width="100" alt="">
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-info">Update </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection