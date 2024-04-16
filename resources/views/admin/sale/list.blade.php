@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Invoice List</h1>
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
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('layouts.messages')
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Service</th>
                    <th>Photo</th>
                    <th>Invoice No</th>
                    <th>Price</th>
                    <th>Invoice Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  @foreach($data as $tData)
                  <tr>
                    <td>{{$tData->employee_name->name ?? ''}}</td>
                    <td>{{$tData->service_name->name ?? 'No Service'}}</td>
                    <td>
                      <img style="height: 50px; width: 80px; " src="{{asset('images/'.$tData->photo ?? '' )}}" class="img-circle elevation-2" alt="User Image" />
                    </td>
                    <td>{{$tData->invoiceID ?? ''}}</td>
                    <td>{{$tData->price ?? ''}}</td>
                    <td>{{$tData->invoice_date ?? ''}}</td>
                    <td>
                      <a href="{{ route('sale.edit', $tData->id) }}" style='float: left;' class="btn btn-primary"><i class="fas fa-pen-square"></i></a>
                      <a href="{{ route('sale.show', $tData->id) }}" style='float: left;' class="btn btn-primary"><i class="fas fa-solid fa-eye"></i></a>
                      <form action="{{ route('sale.destroy', $tData->id) }}" style='float: left;' class="left" method="post">
                        @method('Delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
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