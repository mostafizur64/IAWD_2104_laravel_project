@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto">
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
                    @if(session('instdone'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('instdone')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        @error('category_name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <input type="text" name="category_name" class="form-control">
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-info">Add category</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection