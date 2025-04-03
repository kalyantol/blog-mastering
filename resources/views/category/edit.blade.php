@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Categories') }} <a href="{{ route('category.index') }}" class="btn btn-primary">All Category</a></div>
                

                <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category->category_name }}" name="category_name" placeholder="Enter Category Name">  
                        <input type="hidden" name="id" value="{{ $category->id }}">    
                        @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
