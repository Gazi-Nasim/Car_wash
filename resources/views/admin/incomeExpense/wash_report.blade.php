@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-4">
                    <h1>Monthly Wash Report </h1>
                </div>
                <form action="javascript:void(0)" class="col-8 row">
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
                            <h3 class="card-title">Monthly Wash Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('layouts.messages')
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Service Charge</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($ServiceDatas as $tData)
                                    <tr class="tRows">
                                        <td>
                                            {{$tData['name'] ?? '' }}
                                        </td>
                                        <td class="charge">
                                            {{$tData['charge'] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $tData['invoice_date'] ?? '' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">
                                            Sub Total :
                                        </th>
                                        <th id="SubTotal">
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
            TtoalCalculation();
        });

        $(document).on("click", "#searchDateWise", function() {
            let startDate = $('#startDate').val();
            let endDate = $('#endDate').val();
            let ProDuctIDs = [];

            $.ajax({
                url: '{{route("wash.income")}}',
                method: 'get',
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // console.log(data);
                    $(".tRows").remove();
                    for (let tdata of data) {
                        let tRow = `<tr class="tRows">
                                        <td>
                                            ${ tdata.name ?? '' }
                                        </td>
                                        <td class="charge">
                                            ${ tdata.charge ?? '' }
                                        </td>
                                        <td>
                                            ${ tdata.invoice_date ?? '' }
                                        </td>
                                    </tr>`;

                        $(tRow).appendTo("#tBody");
                        ProDuctIDs.push(tdata.pD_id);
                        TtoalCalculation();

                    };
                }
            });
            // console.log(ProDuctIDs)
        });

    })

    function TtoalCalculation(id) {
        let totalpurchesePrice = 0;
        $('.charge').each(function() {
            let Ppva = parseInt($(this).html());
            totalpurchesePrice += Ppva;
        })
        $('#SubTotal').html(totalpurchesePrice);
    }
</script>
@endsection
@endsection