@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Expense </h1>
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
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">General</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
            @if(isset($edit))

            <form action="{{route('expense.update', $edit->id)}}" method="post" class="row" enctype="multipart/form-data">
              @method('PUT')
              @csrf

              @else
              <form action="{{route('expense.store')}}" method="post" class="row" enctype="multipart/form-data">
                @csrf
                @endif

                <div class="form-group col-6">
                  <label for="name">Reason</label>
                  <input type="text" id="name" name="name" required value="{{ old('name', isset($edit) ? $edit->name : '') }}" class="form-control">
                  @error('name')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="price">Price</label>
                  <input type="text" id="price" name="price" required value="{{ old('price', isset($edit) ? $edit->price : '') }}" class="form-control">
                  @error('price')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="date">Date</label>
                  <input type="date" id="date" name="date" required value="{{ old('date', isset($edit) ? $edit->date : date('Y-m-d')) }}" class="form-control">
                  @error('date')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="offset-11 col-1 align-self-end">
                  <input type="submit" value="Save" class="btn btn-success">
                </div>
              </form>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection