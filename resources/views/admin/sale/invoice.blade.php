@extends('layouts.app')
@section('content')
<style>
    table,
    th,
    td {
        border: 1px solid !important;
        border-collapse: collapse !important;
        height: 30px !important;
    }
</style>


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

                        <li class="breadcrumb-item active">Office Copy
                            <a href="javascript:void(0)" id="office_print" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            Customer Copy
                            <a href="javascript:void(0)" id="customer_print" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                        </li>
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
                    <div class="card" id="customer_copy">
                        <div class="card-header">
                            <h3 style="text-align: center; color: #6c757d ; " class="">Customer Copy :</h3>
                            <!-- <h3 class="card-title">
                                <strong> Employee Name:<h2>{{$sales->employee_name->name ?? ''}}</strong></h2>
                            </h3>
                            <h3 class="text-right">
                                Date:{{$sales->invoice_date ?? ''}}
                            </h3>
                            <h5 class="text-right">
                                Invoice No:{{$sales->invoiceID ?? ''}}
                            </h5> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 style="float: right; size:15cm " class="">Invoice :{{$sales->invoiceID ?? ''}} <span class="badge bg-success font-size-12 ms-2"></span></h4>

                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">Bootdey.com</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                                    <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="" style="width:100%; overflow: auto;">
                                <div style="float: left; width:50% ; height:20% " class="col-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To: </h5>
                                        <h5 class="font-size-15 mb-2">{{$sales->name ?? ''}}</h5>
                                        <p class="mb-1">{{$sales->address ?? ''}}</p>
                                        <!-- <p class="mb-1">PrestonMiller@armyspy.com</p> -->
                                        <p>{{$sales->phone ?? ''}}</p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div style="float: right; width:50% ; height:20%; text-align: right;" class="col-6 ">
                                    <div class="text-muted text-sm-end float-right">
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                            <p>{{$sales->invoice_date ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="" style="width:100%">
                                <h4 style="text-align: left; color: #6c757d ; " class="">Order Summary :</h4>
                                <div class="table-responsive">
                                    <table style="width: 100%; text-align: left; border-collapse: collapse;  border: 1px solid;" class="table align-middle table-nowrap table-centered mb-0">
                                        <thead>
                                            @if(isset($servicess[0]->name))
                                            <tr>
                                                <th style="width: 70px;border: 1px solid ; border-collapse: collapse; height: 30px;">No.</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Vehicle Name</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;"> Service</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Price</th>
                                                <th class="text-end" style="width: 120px; border: 1px solid ; border-collapse: collapse; height: 30px;">Total</th>
                                            </tr>
                                            @endif
                                        </thead><!-- end thead -->
                                        <tbody>
                                            @if(isset($servicess[0]->name))
                                            @foreach($servicess as $service)
                                            <tr style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                <!-- {{$service}} -->
                                                <th scope="row" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$loop->index+1}}</th>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{$service->vehicle_name->name ?? ''}}</h5>
                                                        <!-- <p class="text-muted mb-0">Watch, Black</p> -->
                                                    </div>
                                                </td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$service->name ?? ''}}</td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$service->price ?? ''}}</td>
                                                <td class="text-end" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$service->price ?? ''}}</td>
                                            </tr>
                                            @endforeach
                                            @endif

                                            @if( isset( $salesProduct[0]))
                                            <tr style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                <th style="width: 70px; border: 1px solid ; border-collapse: collapse; height: 30px;">No.</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Product Name</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Price</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Quantity</th>
                                                <th class="text-end" style="width: 120px; border: 1px solid ; border-collapse: collapse !important;">Total</th>
                                            </tr>
                                            <!-- end tr -->
                                            @foreach($salesProduct as $saleP)
                                            <tr>
                                                <th scope="row" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$loop->index+1}}</th>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{$saleP->product_data->name ?? '' }}</h5>
                                                        <!-- <p class="text-muted mb-0">Watch, Gold</p> -->
                                                    </div>
                                                </td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$saleP->product_data->mrp ?? '' }}</td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$saleP->quantity ?? '' }}</td>
                                                <td class="text-end" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$saleP->price ?? '' }}</td>

                                            </tr>

                                            @endforeach
                                            @endif

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end" style="width: 70px;border: 1px solid ; border-collapse: collapse; height: 30px;">Sub Total :</th>
                                                <td class="border-0 text-end" style="width: 70px;border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                    <h4 class="m-0 fw-semibold">{{$sales->price ?? ''}}</h4>
                                                </td>
                                            </tr>
                                            <!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div><!-- end table responsive -->
                                <!-- <div class="d-print-none mt-4 offset-10 col-2">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary w-md">Send</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card" id="office_copy">
                        <div class="card-header">
                            <h3 style="text-align: center; color: #6c757d ; " class="">Office Copy </h3>
                            <!-- <h3 class="card-title">
                                <strong> Employee Name:<h2>{{$sales->employee_name->name ?? ''}}</strong></h2>
                            </h3>
                            <h3 class="text-right">
                                Date:{{$sales->invoice_date ?? ''}}
                            </h3>
                            <h5 class="text-right">
                                Invoice No:{{$sales->invoiceID ?? ''}}
                            </h5> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 style="float: right; size:15cm " class="">Invoice :{{$sales->invoiceID ?? ''}} <span class="badge bg-success font-size-12 ms-2"></span></h4>

                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">Bootdey.com</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                                    <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                </div>
                            </div>

                            <div class="" style="width:100%; overflow: auto;">
                                <div style="float: left; width:50% ; height:20% " class="col-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To: </h5>
                                        <h5 class="font-size-15 mb-2">{{$sales->name ?? ''}}</h5>
                                        <p class="mb-1">{{$sales->address ?? ''}}</p>
                                        <!-- <p class="mb-1">PrestonMiller@armyspy.com</p> -->
                                        <p>{{$sales->phone ?? ''}}</p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div style="float: right; width:50% ; height:20%; text-align: right;" class="col-6 ">
                                    <div class="text-muted text-sm-end float-right">
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                            <p>{{$sales->invoice_date ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="" style="width:100%">
                                <h4 style="text-align: left; color: #6c757d ; " class="">Order Summary :</h4>
                                <div class="table-responsive">
                                    <table style="width: 100%; text-align: left; border-collapse: collapse;  border: 1px solid;" class="table align-middle table-nowrap table-centered mb-0">
                                        <thead>
                                            @if(isset($servicess[0]->name))
                                            <tr>
                                                <th style="width: 70px; border: 1px solid ; border-collapse: collapse; height: 30px;">No.</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Vehicle Name</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;"> Service</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px;">Price</th>
                                                <th class="text-end" style="width: 120px; border: 1px solid ; border-collapse: collapse; height: 30px;">Total</th>
                                            </tr>
                                            @endif
                                        </thead><!-- end thead -->
                                        <tbody>
                                            @if(isset($servicess[0]->name))
                                            @foreach($servicess as $service)
                                            <tr style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                <!-- {{$service}} -->
                                                <th scope="row" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$loop->index+1}}</th>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{$service->vehicle_name->name ?? ''}}</h5>
                                                        <!-- <p class="text-muted mb-0">Watch, Black</p> -->
                                                    </div>
                                                </td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$service->name ?? ''}}</td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$service->price ?? ''}}</td>
                                                <td class="text-end" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$service->price ?? ''}}</td>
                                            </tr>
                                            @endforeach
                                            @endif

                                            @if( isset( $salesProduct[0]))
                                            <tr style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                <th style="width: 70px; border: 1px solid ; border-collapse: collapse; height: 30px; height: 30px;;">No.</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px; height: 30px;;">Product Name</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px; height: 30px;;">Price</th>
                                                <th style=" border: 1px solid ; border-collapse: collapse; height: 30px; height: 30px;;">Quantity</th>
                                                <th class="text-end" style="width: 120px; border: 1px solid ; border-collapse: collapse; height: 30px; height: 30px;;">Total</th>
                                            </tr>
                                            <!-- end tr -->
                                            @foreach($salesProduct as $saleP)
                                            <tr>
                                                <th scope="row" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$loop->index+1}}</th>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{$saleP->product_data->name ?? '' }}</h5>
                                                        <!-- <p class="text-muted mb-0">Watch, Gold</p> -->
                                                    </div>
                                                </td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$saleP->product_data->mrp ?? '' }}</td>
                                                <td style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$saleP->quantity ?? '' }}</td>
                                                <td class="text-end" style=" border: 1px solid ; border-collapse: collapse; height: 30px;">{{$saleP->price ?? '' }}</td>

                                            </tr>

                                            @endforeach
                                            @endif

                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end" style="width: 70px;border: 1px solid ; border-collapse: collapse; height: 30px;">Sub Total :</th>
                                                <td class="border-0 text-end" style="width: 70px;border: 1px solid ; border-collapse: collapse; height: 30px;">
                                                    <h4 class="m-0 fw-semibold">{{$sales->price ?? ''}}</h4>
                                                </td>
                                            </tr>
                                            <!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div><!-- end table responsive -->
                                <!-- <div class="d-print-none mt-4 offset-10 col-2">
                                    <div class="float-right">
                                        <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary w-md">Send</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
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

@section('footer_script')
<script>
    $(document).on("click", "#customer_print", function() {
        var prtContent = document.getElementById("customer_copy");
        console.log(prtContent);
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    });
    $(document).on("click", "#office_print", function() {
        var prtContent = document.getElementById("office_copy");
        console.log(prtContent);
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    });
</script>
@endsection
@endsection