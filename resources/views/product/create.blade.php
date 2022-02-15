@extends('layouts.admin_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4 class="text-center">add Product form</h4>
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
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('product_name')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Name:</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>
                        @error('old_price')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">old price</label>
                            <input type="text" name="old_price" class="form-control">
                        </div>

                        <div class="me-3">
                            <label class="form-label">new price</label>
                            <input type="text" name="new_price" class="form-control">
                        </div>
                        @error('short_description')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control"></textarea>
                        </div>
                        @error('long_description')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Long Description</label>
                            <textarea name="long_description" class="form-control"></textarea>
                        </div>
                        @error('category_id')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Category</label>

                            <select name="category_id" class="custom-select" id="CatId">
                                <option>choese category </option>
                                @foreach($all_category as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('long_description')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <label class="form-label">Sub Category</label>

                            <select name="sub_category_id" class="custom-select" id="subCatid">
                                <option>choese Sub category </option>


                            </select>
                        </div>

                        <div class="me-3">
                            <label class="form-label">product_weight</label>
                            <input type="text" name="product_weight" class="form-control">
                        </div>
                        <div class="me-3">
                            <label class="form-label">Product_deimention</label>
                            <input type="text" name="product_deimention" class="form-control">
                        </div>

                        <div class="me-3">
                            <label class="form-label">Product Other Info</label>
                            <input type="text" name="product_other_info" class="form-control">
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
@section('category_script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#CatId').select2();
        $('#CatId').change(function() {
            var catId = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: '/product/GetsubcategoryID',
                data: {
                    Cat_id: catId
                },
                success: function(data) {
                    $('#subCatid').html(data)
                }
            });
        });

    });
</script>

@endsection