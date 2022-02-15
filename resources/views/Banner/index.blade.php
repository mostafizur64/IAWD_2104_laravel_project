@extends('layouts.admin_master');
@section('content')
<div class="container">

    @if(session('deleteBanner'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('deleteBanner')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <div class="row">

        <div class="col-sm-12 m-auto">
            <table class="table table-bordered  ">
                <thead>
                    <th>sl</th>
                    <th>Banner Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action </th>

                </thead>
                <tbody>

                    @forelse($banner_data as $banner)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$banner->banner_title}}</td>
                        <td>
                            <img src="{{asset('uploads/banner_photo')}}/{{$banner->banner_images}}" alt="not found" height="100" width="140px">
                        </td>

                        <td>
                            @if($banner->status=='1')
                            <a href="" class="btn btn-primary">Active</a>
                            @else
                            <a href="" class="btn btn-danger">Unactive</a>

                            @endif

                        </td>

                        <td>{{$banner->created_at}}</td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('banner.delete',$banner->id)}}" class="btn btn-danger">Delele</a>

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