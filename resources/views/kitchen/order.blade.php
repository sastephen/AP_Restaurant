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
                            <h3 class="card-title">Dishes</h3>
                            <a href="/dish/create" class="btn btn-success float-right">Create</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <table id="dishes" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Dish Name</th>
                                        <th>Table Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->dish->name }}</td>
                                        <td>{{ $order->table_id }}</td>
                                        <td>{{ $status[$order->status] }}</td>
                                        <td>
                                            {{-- <div> --}}
                                                <a class="btn btn-primary" href="/order/{{ $order->id }}/approve">Approve</a>
                                                <a class="btn btn-danger" href="/order/{{ $order->id }}/cancel">Cancel</a>
                                                <a class="btn btn-success" href="/order/{{ $order->id }}/ready">Ready</a>
                                            
                                            {{-- </div> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                      <th>Dish Name</th>
                                      <th>Table Number</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
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
