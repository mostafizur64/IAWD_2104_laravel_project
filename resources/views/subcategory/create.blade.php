@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="text-center">add subcategory form</h4>
                    </div>
                </div>

                <div class="card-body">

                    @if(session('insetdone'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('insetdone')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <form action="{{route('subcategory.store')}}" method="post">
                        @csrf
                        @error('category_id')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <select class="custom-select" name='category_id'>
                                <option value="">Select a Category</option>
                                @foreach($all_category as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('subcategory_name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror

                        <div class="me-3">
                            <input type="text" name="subcategory_name" class="form-control" placeholder="enter subcategory name">
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-info">Add Subcategory</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection