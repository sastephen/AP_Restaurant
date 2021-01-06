@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kitchen Panel</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Dish</h3>
                            <a href="/dish" class="btn btn-default float-right">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/dish/{{ $dish->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ old('name', $dish->name) }}">
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $dish->category_id ? 'selected' : '' }} class="form-control">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <img width="100" height="100" src="{{ url('/images/'. $dish->image) }} " alt="">
                                    <input name="dish_image" type="file" class="form-control">
                                    @error('dish_image')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="btn btn-success">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
