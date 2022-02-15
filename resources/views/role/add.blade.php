@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>User Roll</h4>
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
                    <form action="{{url('/role/add')}}" method="post">
                        @csrf
                        @error('role')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        <div class="me-3">
                            <input type="text" name="role" class="form-control">
                        </div>
                        <div class="me-3 mt-3">
                            <button type="submit" class="btn btn-primary">Add Role</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <table class="table table-bordered ">
                <thead>
                    <th>sl</th>
                    <th>role</th>
                    <th>status</th>
                    <th>created at</th>
                    <th>action</th>
                </thead>
                <tbody>

                    @forelse($all_role as $role)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$role->role}}</td>
                        <td>{{$role->status}}</td>
                        <td>{{$role->created_at}}</td>

                        <td>-</td>
                    </tr>
                    <tr>
                        @empty
                        <td colspan="10">
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