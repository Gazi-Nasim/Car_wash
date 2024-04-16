@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Invoice</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">
          <!-- Title -->
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        @include('layouts.messages')
        <!-- <div class="row">
              <div class="offset-10 col-2 card-header py-1 clearfix bg-gradient-primary text-white">
                <h5 class="card-title font-weight-bold mb-0 float-left mt-1"></h5>
                <div class="card-title font-weight-bold mb-0 float-right">
                  <div class="input-group">
                    <input style="width:40px;" type="text" id="add_text" required class="form-control form-control-sm add_text" value="1">
                    <span class="input-group-btn">
                      <button class="btn btn-success btn-sm add_more" type="button">Add New Product</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->

        @if(isset($edit))
        <form action="{{route('sale.update', $edit->id)}}" method="post" class="row" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          @else
          <form action="{{route('sale.store')}}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            @endif

            <div class="form-group col-6">
              <label for="employee_id">Employee Name</label>
              <select id="employee_id" name="employee_id" required value="{{ old('employee_id', isset($edit) ? $edit->employee_id : '') }}" class="form-control">
                <option value="">Select</option>
                @foreach($employees as $employee)
                <option value="{{$employee->id}}" {{(isset($edit))?( $edit->employee_id==$employee->id ? 'selected':'' ):''}}>{{$employee->name ?? '' }}</option>
                @endforeach
              </select>
              @error('employee_id')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">

              @if(isset($edit))
              <div class="row form-group">
                <div class="form-group col-8">
                  <label for="photo">Choose To Change Photo</label>
                  <input type="file" id="photo" name="photo" value="{{ old('photo', isset($edit) ? $edit->photo : '') }}" class="form-control">
                </div>
                <div class="form-group col-4">
                  <label for="photo">Old Photo</label>
                  <img style="height: 100%; width:38% " src=" {{asset('images/'.$edit->photo ?? '' )}}" alt="">
                </div>
              </div>

              @else
              <label for="photo"> Photo</label>
              <input type="file" id="photo" name="photo" value="" class="form-control">
              @endif

              @error('photo')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">
              <label for="name">Customer Name</label>
              <input type="text" id="name" name="name" required value="{{ old('name', isset($edit) ? $edit->name : '') }}" class="form-control">
              @error('name')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">
              <label for="phone">Customer Phone</label>
              <input type="text" id="phone" name="phone" required value="{{ old('phone', isset($edit) ? $edit->phone : '') }}" class="form-control">
              @error('phone')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group col-12">
              <label for="address">Address</label>
              <textarea id="address" name="address" required class="form-control" rows="2">{{ old('address', isset($edit) ? $edit->address : '') }}</textarea>
              @error('address')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">
              <label for="service_id"> Service</label>
              <select id="service_id" name="service_id" value="{{ old('service_id', isset($edit) ? $edit->service_id : '') }}" class="form-control ">
                <option value="">Select</option>
                @foreach($services as $service)
                {{$service}}
                <option value="{{$service->id}}" {{(isset($edit))?( $edit->service_id==$service->id ? 'selected':'' ):''}}>{{ $service->name ?? '' }} ({{ $service->vehicle_name->name ?? '' }})</option>
                <option hidden class="ser_price" value="{{ $service->price }}">{{ $service->price }}</option hidden>
                @endforeach
              </select>
              @error('service_id')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">
              <label for="ser_price">Service Charge</label>
              <input type="text" id="ser_price" readonly name="service_price" value="{{(isset($edit))? ($edit->service_name->price ?? '0'):( (old('service_price'))?(old('service_price')):('0') )}}" class="form-control totalPrice">
              @error('ser_price')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">
              <label for="invoice_date"> Date </label>
              <input type="date" id="invoice_date" name="invoice_date" required value="{{(isset($edit))? ($edit->invoice_date):( (old('invoice_date'))?(old('invoice_date')):(date('Y-m-d')) )}}" class="form-control">
              @error('invoice_date')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col-6">
              <label for="product"> Products </label>
              <select id="product" name="" autofocus class="form-control">
                <option value="Nasim">Select Product</option>
                @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name ?? '' }}</option>
                @endforeach
              </select>
              @error('invoice_date')
              <span style="color: red">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-row table-responsive form-group col-12">
              <table role="presentation" class="table table-sm table-hover table-bordered m-0">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table_row">
                  @if(isset($edit))
                  @foreach($salesProduct as $saleP)
                  {{-- {{$saleP}} --}}
                  <tr>
                    <td>
                      <input type="text" readonly name="" class="form-control" id="product_id" autofocus required value="{{$saleP->product_data->name}}">
                      <input type="hidden" class="product_id" name="product_id[]" value="{{$saleP->product_id}}">
                    </td>
                    <td>
                      <input type="number" readonly name="product_price[]" class="form-control price_{{$saleP->product_id}}" id="" autofocus required value="{{$saleP->price/$saleP->quantity}}">
                    </td>
                    <td>
                      <input type="number" name="product_quantity[]" proDuctSerial="{{$saleP->product_id}}" class="form-control quantity" id="quaTity_id{{$saleP->product_id}}" autofocus required value="{{$saleP->quantity}}">
                      @error('quantity')
                      <span style="color: red">{{ $message }}</span>
                      @enderror
                    </td>
                    <td>
                      <input type="number" name="product_total[]" class="form-control totalPrice" id="total_{{$saleP->product_id}}" value="{{$saleP->price }}" readonly>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger btn-larg remove"><i class="fas fa-trash-alt"></i></button>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">
                      Sub Total :
                    </th>
                    <th>
                      <input type="text" readonly name="price" class="form-control" id="subTotal" value="{{isset($edit) ? $edit->price:'' }} ">
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="form-group offset-10 col-2">
              <label for="save"> </label>
              <input type="submit" value="Save" id="save" class="btn btn-success btn-block">
            </div>

          </form>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <!-- Footer -->
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@section('footer_script')
<script>
  $(document).on("change", "#service_id", function() {
    let ser_id = $(this).val();
    if (ser_id == '') {
      $('#ser_price').val('0');
      totalSubTotal();
    } else {
      $.ajax({
        url: '{{route("get_service")}}',
        method: 'post',
        data: {
          id: ser_id,
          _token: '{{ csrf_token() }}'
        },
        success: function(data) {
          $('#ser_price').val(data['price']);
          totalSubTotal();
        }
      });
    };
  });

  $(document).on("change", "#product", function() {
    let pro_id = parseInt($(this).val());
    // console.log(pro_id);

    let ProDuctIDs = [];
    $('.product_id').each(function() {
      ProDuctIDs.push(parseInt($(this).val()));
    });
    // console.log(ProDuctIDs);

    if (ProDuctIDs.includes(pro_id) == false && isNaN(pro_id) == false) {
      $.ajax({
        url: '{{route("get_product")}}',
        method: 'post',
        data: {
          id: pro_id,
          _token: '{{ csrf_token() }}'
        },
        success: function(data) {
          let tbl_ro = `<tr>
                      <td>                          
                      <input type="text" readonly name="" class="form-control" id="product_id" autofocus required value="${data.name}">                    
                      <input type="hidden" class="product_id"  name="product_id[]" value="${data.id}">                    
                      </td>
                      <td>
                        <input type="number" readonly name="product_price[]" class="form-control price_${data.id}" id="" autofocus required value="${data.mrp}">
                      </td>
                      <td>
                        <input type="number" name="product_quantity[]" proDuctSerial="${data.id}" class="form-control quantity" id="quaTity_id${data.id}" autofocus required value="1">
                        @error('quantity')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                      </td>
                      <td>
                        <input type="number" name="product_total[]" class="form-control totalPrice" id="total_${data.id}" value="${data.mrp}" readonly>                        
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-larg remove"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>`;
          $(tbl_ro).appendTo('.table_row');
          totalSubTotal(pro_id);
        },
      });
      // ProDuctIDs.push(pro_id);
    } else {
      if (isNaN(pro_id) == false) {
        let quanTity = parseInt($('#quaTity_id' + pro_id).val());
        $('#quaTity_id' + pro_id).val(quanTity + 1);
        totalSubTotal(pro_id);
      };
    };
    // console.log(ProDuctIDs);
  });
</script>
@endsection
@endsection