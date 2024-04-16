@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-4">
                    <h1>{{ucfirst($title)}} Report </h1>
                </div>
                <form action="{{route($route.'.summery')}}" method="get" class="col-8 row">
                    <div class="col-5">
                        <label for="startDate">From Date</label>
                        <input type="date" class="form-control" required name="startDate" id="startDate">
                    </div>
                    <div class="col-5">
                        <label for="endDate">To Date</label>
                        <input type="date" class="form-control" required value="{{date('Y-m-d')}}" name="endDate" id="endDate">
                    </div>
                    <div class="col-2">
                        <button style="margin-top: 34%;" class="btn btn-primary " id="searchDateWise">Search</button>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ucfirst($title)}} Date Wise</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('layouts.messages')
                            <table id="example1" class="table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th class="">Sale</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($datePriceData as $tData)
                                    <tr class="tRows">
                                        <td>
                                            {{$tData['date'] ?? '' }}
                                        </td>
                                        <td class="purchesePrice ">
                                            {{$tData['price'] ?? '' }}
                                        </td>
                                        <td>

                                            <a href="{{route($route.'.dateWise', $tData['date'])}}" class="btn btn-primary">Details</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">
                                            Sub Total :
                                        </th>
                                        <th id="PurchesSubTotal">

                                        </th>

                                    </tr>
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
@section('footer_script')
<script>
    $(document).ready(function() {
        $(function() {
            let totalpurchesePrice = 0;
            $('.purchesePrice').each(function() {
                let Ppva = parseInt($(this).html());
                totalpurchesePrice += Ppva;
            })
            $('#PurchesSubTotal').html(totalpurchesePrice);

        });
    })
</script>

@endsection
@endsection