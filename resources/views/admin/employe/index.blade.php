@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Employe </h1>
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

            <form action="{{route('employee.update', $edit->id)}}" method="post" class="row" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              
              @else
              <form action="{{route('employee.store')}}" method="post" class="row" enctype="multipart/form-data">
                @csrf
                @endif

                <div class="form-group col-6">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" required value="{{ old('name', isset($edit) ? $edit->name : '') }}" class="form-control">
                  @error('name')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" required value="{{ old('phone', isset($edit) ? $edit->phone : '') }}" class="form-control">
                  @error('phone')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-12">
                  <label for="address">Address</label>
                  <textarea id="address" name="address" required class="form-control" rows="4">{{ old('address', isset($edit) ? $edit->address : '') }}</textarea>
                  @error('address')
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
    <!-- <div class="row">
      <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Create new Project" class="btn btn-success float-right">
      </div>
    </div> -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection