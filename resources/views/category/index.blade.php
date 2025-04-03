@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Categories') }} <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a></div>
                

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key=>$row)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $row->category_name }}</td>
                                <td>{{ $row->category_slug }}</td>
                                <td>
                                    <a href="{{route('category.update',$row->id)}}" class="btn btn-primary">Edit</a> 
                                    <form action="{{ route('category.delete',$row->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
