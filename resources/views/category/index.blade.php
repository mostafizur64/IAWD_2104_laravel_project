@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-12 m-auto">
            <table class="table table-bordered  ">
                <thead>
                    <th>sl</th>
                    <th>Category_name</th>
                    <th>status</th>
                    <th>added_by</th>
                    <th>created at</th>
                    <th>action</th>
                </thead>
                <tbody>

                    @forelse($category as $category)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>
                            @if($category->status=='1')
                            <a class="btn btn-success">active</a>
                            @else
                            <a class="btn btn-warning">deactive</a>
                            @endif

                        </td>

                        <td>{{$category->relatationTouser->name}}</td>



                        <td>{{$category->created_at->diffForHumans()}}
                            <!-- 
                                  relationTopuser->name -->
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('category.editcategory',$category->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delele</a>

                                </div>
                                <!-- <button type="button" class="btn btn-info"><a href="{{url('/editcategory',$category->id)}}">Edit</a> </button>
                                <button type="button" class="btn btn-danger"><a href="{{url('/delete',$category->id)}}">Delete</a></button> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        @empty
                        <td colspan=" 10">
                            <h5 class="text-danger text-center"> no data added yet!!</h5>

                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>


@endsection