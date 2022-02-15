@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="text-center">Edit category form</h4>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('InstErr'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('InstErr')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    @if(session('categoryInst'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('categoryInst')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <form action="{{route('subcategory.updatesubcategory',$subcategory->id)}}" method="post">
                        @csrf
                        <div class="me-3">
                            <select class="custom-select" name='category_id'>
                                <option label="Choose category"></option>
                                @foreach($all_category as $category)
                                <option value="{{$category->id}}" {{$category->id==$subcategory->category_id ? "Selected": ""}}> {{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('category_name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <input type="text" name="subcategory_name" value="{{$subcategory->subcategory_name}}" class="form-control">
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-info">Add category</button>
                            <button type="submit" class="btn btn-primary "><a href="{{route('category.index')}}" class="text-dark">GoToIndex</a> </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection