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
                            <h3 class="card-title">Create Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="py-2">
                                <form action="/category" method="post">
                                    @csrf
                                    <div class="form-group row alert alert-secondary">
                                        <input class="form-control col-8" type="text" name="name">
                                        <button class="btn btn-success col-4">Add Category</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                @foreach ($categories as $category)
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-footer">
                                            <div class="row">
                                                <form action="/category/{{ $category->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
    
    
                                                <form action="/category/{{ $category->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input class="mr-3 ml-3" type="text" name="name" value="{{ $category->name }}">
                                                    <button class="btn btn-warning">Update</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
