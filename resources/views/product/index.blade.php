@extends('layouts.admin_master');
@section('content')
<div class="container">
    <div class="row">

        <div class="col-sm-12 m-auto">
            <table class="table table-bordered  ">
                <thead>
                    <th>sl</th>
                    <th>Category_name</th>
                    <th>Old Price</th>
                    <th>new Price</th>
                    <th>product iamge</th>
                    <th>category_name</th>
                    <th>sub category name</th>
                    <th>created at</th>
                    <th>action</th>
                </thead>
                <tbody>

                    @forelse($all_products as $product)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->old_price}}</td>
                        <td>{{$product->new_price}}</td>
                        <td>
                            <img src="{{asset('uploads/product_photo')}}/{{$product->product_image}}" alt="not found" height="100" width="140px">
                        </td>
                        <td>{{$product->category->category_name}}</td>
                        <td>{{$product->subcategory->subcategory_name }}</td>
                        <td>{{$product->created_at->format('d-Y-M')}}</td>

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">Delele</a>

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