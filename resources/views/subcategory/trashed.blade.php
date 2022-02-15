@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-12 m-auto">
            <table class="table table-bordered  ">
                <thead>
                    <th>sl</th>
                    <th>Category_name</th>
                    <th>action</th>
                </thead>
                <tbody>

                    @forelse($all_trashed as $trashed)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$trashed->subcategory_name}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('subcategory.restore',$trashed->id)}}" class="btn btn-primary">restore</a>
                                    <a href="{{route('subcategory.parmanentDelete',$trashed->id)}}" class="btn btn-danger">Delele</a>

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