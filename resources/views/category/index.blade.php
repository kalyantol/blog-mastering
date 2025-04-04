@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">catetagoris</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category with default features</h3>
              </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->category_slug }}</td>
                        <td>
                            <a href="{{ route('category.update', $category->id)  }}" class="btn btn-primary">Edit</a>
                            <form action="{{route('category.delete',$category->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn" id="">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('sweetalert::alert')

@endsection
@push('scripts')
<script>
$(document).ready(function() {
  $('.delete-btn').on('click', function (event) {
      event.preventDefault();
      const form = $(this).closest('form');
      swal({
          title: 'Are you sure?',
          text: 'This record and it`s details will be permanantly deleted!',
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
      }).then(function(value) {
          if (value) {
              window.location.href = form.attr('action');
              form.submit();
          }
      });
  }); 
});      
</script>
@endpush
<!-- <div class="container">
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
                            @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_slug }}</td>
                                <td>
                                    <a href="{{ route('category.update', $category->id)  }}" class="btn btn-primary">Edit</a>
                                    <!-- <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> -->
                                <!-- </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div> --> -->
