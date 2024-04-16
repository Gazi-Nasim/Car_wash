@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-4">
                    <h1>{{$title}} Product Sale</h1>
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
                            <h3 class="card-title">{{$title}} Product Sale Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('layouts.messages')
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Purches Price</th>
                                        <th>Sale Price</th>
                                        <th>Sale Qnt.</th>
                                        <th>Profit</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="tBody">
                                    @foreach ($soldProductWithDate as $tData)
                                    <tr class="tRows">
                                        <td>{{$tData->product_data->name ?? '' }}</td>
                                        <td class="purchesePrice">
                                            {{$tData->product_data->purchase_price ?? '' }}
                                        </td>
                                        <td class="salePrice">
                                            {{ $tData->product_data->mrp ?? '' }}
                                        </td>
                                        <td class="saleQuantity">
                                            {{ $tData->quantity ?? '' }}
                                        </td>
                                        <td class="Profit">
                                            {{ $tData->product_data->mrp*$tData->quantity - $tData->product_data->purchase_price*$tData->quantity ?? '' }}

                                        </td>
                                        <td>
                                            {{ $tData->created_at ?? '' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            Sub Total :
                                        </th>
                                        <th id="PurchesSubTotal">
                                        </th>
                                        <th id="SaleSubTotal">
                                        </th>
                                        <th></th>
                                        <th id="ProfitSubTotal">
                                        </th>
                                        <th>

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
                url: '{{route("product.income")}}',
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
                        if (ProDuctIDs.includes(tdata.pD_id) == false && isNaN(tdata.pD_id) == false) {
                            let tRow = `<tr class='tRows' >
                                            <td>
                                                ${ tdata.name ?? '' }
                                            </td>
                                            <td class="purchesePrice">
                                                ${ tdata.purchase_price ?? '' }                  
                                            </td>
                                            <td class="salePrice">
                                                ${ tdata.mrp ?? '' }                           
                                            </td>
                                            <td id="saleQuantity${tdata.pD_id}">
                                                ${ tdata.quantity ?? '' }                           
                                            </td>
                                            <td id="Profit${tdata.pD_id}" class='Profit'>
                                            ${ tdata.profit ?? '' }                            
                                            </td>
                                            <td>
                                            ${ tdata.created_at ?? '' }                            
                                            </td>                    
                                        </tr>`;

                            $(tRow).appendTo("#tBody");
                            ProDuctIDs.push(tdata.pD_id);
                            TtoalCalculation();

                        } else {
                            let oldQuantity = parseInt($('#saleQuantity' + tdata.pD_id).html());
                            let thisQuantity = parseInt(tdata.quantity);
                            let totlQuantity = oldQuantity + thisQuantity
                            $('#saleQuantity' + tdata.pD_id).html(totlQuantity);
                            $('#Profit_ValuE' + tdata.pD_id).val(totlQuantity * tdata.profit);
                            $('#Profit' + tdata.pD_id).html(totlQuantity * tdata.profit);
                            TtoalCalculation();
                            // console.log("old ="+oldQuantity, "New ="+thisQuantity)
                        }

                    };
                }
            });
            // console.log(ProDuctIDs)
        });

    })

    function TtoalCalculation(id) {
        let totalpurchesePrice = 0;
        let totalProfit = 0;
        let totalsalePrice = 0;
        $('.purchesePrice').each(function() {
            let Ppva = parseInt($(this).html());
            totalpurchesePrice += Ppva;
        })
        $('#PurchesSubTotal').html(totalpurchesePrice);

        $('.salePrice').each(function() {
            let Spva = parseInt($(this).html());
            totalsalePrice += Spva;
        })
        $('#SaleSubTotal').html(totalsalePrice);

        $('.Profit').each(function() {
            let Pftva = parseInt($(this).html());
            totalProfit += Pftva;
        })
        $('#ProfitSubTotal').html(totalProfit);
    }
</script>
@endsection
@endsection