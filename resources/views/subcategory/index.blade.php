@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-12 m-auto">
            <table class="table table-bordered  ">
                <thead>
                    <th>sl</th>
                    <th>Category_name</th>
                    <th>Sub category Name</th>
                    <th>action</th>
                </thead>
                <tbody>

                    @forelse($all_subcategory as $subcategory)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$subcategory->category_name}}</td>
                        <td>{{$subcategory->subcategory_name}}</td>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('subcategory.editsubcategory',$subcategory->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('subcategory.deletesubcategory',$subcategory->id)}}" class="btn btn-danger">Delele</a>

                                </div>

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