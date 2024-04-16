@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sale Details </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
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
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <strong> Employee Name:<h2>{{$sales->employee_name->name ?? ''}}</strong></h2>
                            </h3>
                            <h3 class="text-right">
                                Date:{{$sales->invoice_date ?? ''}}
                            </h3>
                            <h5 class="text-right">
                                Invoice No:{{$sales->invoiceID ?? ''}}
                            </h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Vehicle Name</th>
                                        <th>Service Name</th>
                                        <th></th>
                                        <th>Charge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($servicess as $service)
                                    <tr>
                                        <td>{{$service->vehicle_name->name ?? ''}}</td>
                                        <td>{{$service->name ?? ''}}</td>
                                        <td></td>
                                        <td>{{$service->price ?? ''}}</td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td><strong>Product Name</strong></td>
                                        <td><strong>Price</strong></td>
                                        <td><strong>Quantity</strong></td>
                                        <td><strong>Total</strong></td>
                                    </tr>

                                    @foreach($salesPro as $saleP)
                                    <tr>
                                        <td>{{$saleP->product_data->name ?? '' }}</td>
                                        <td>{{$saleP->product_data->mrp ?? '' }}</td>
                                        <td>{{$saleP->quantity ?? '' }}</td>
                                        <td>{{$saleP->price ?? '' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th colspan="3">Total :</th>
                                    <th>{{$sales->price}} </th>

                                </tfoot>
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
<!-- /.content-wrapper -->

@endsection