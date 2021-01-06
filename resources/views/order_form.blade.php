<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
      #Search {
            background-image: url('{{ url('searchicon.png') }}');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
    </style>
    <script>

        // search
        function myFunction() {
            var input = document.getElementById("Search");
            var filter = input.value.toLowerCase();
            var nodes = document.getElementsByClassName('filter');

            for (i = 0; i < nodes.length; i++) {
                if (nodes[i].innerText.toLowerCase().includes(filter)) {
                    nodes[i].style.display = "block";
                } else {
                    nodes[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<body>

  <div class="container">
    <div class="card">
      <div class="card-body">
        @if (session('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
              <h4 class="text-success py-2">Order Form</h4>
            </div>
            
          </div>
          <!-- ./row -->
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
              <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                      <table align="center" width="100%">
                        <tr>
                        <td>
                        <input type="text" id="Search" onkeyup="myFunction()" placeholder="Type to search." title="Type in a name">
                        </td>
                        </tr>
                        </table>
                      <form action="{{ route('order.submit') }}" method="post">
                        @csrf
                        <div class="row">
                          @foreach ($dishes as $dish)
                              <div class="col-sm-3 filter">
                                <div class="card">
                                  <div class="card-body">
                                    <img width="100%" src="{{ url('/images/'. $dish->image) }}" alt="">
                                    <label for="">{{ $dish->name }}</label>
                                    <input type="number" name="{{ $dish->id }}">
                                  </div>
                                </div>
                              </div>
                          @endforeach
                        </div>
                        <div class="form-group">
                          <select name="table" id="">
                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}" class="form-control">{{ $table->number }}</option>
                            @endforeach
                          </select>
                        </div>
                        <button class="btn btn-success">Order</button>
                      </form>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                      
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
                                        <a class="btn btn-primary" href="/order/{{ $order->id }}/serve">Serve</a>
                                    
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
                  </div>
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
          <!-- /.row -->
      </div>
    </div>
  </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>