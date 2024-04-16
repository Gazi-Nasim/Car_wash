@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User </h1>
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
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">General</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            @include('layouts.messages')
            @if(isset($edit))
            <form action="{{route('user.update', $edit->id)}}" method="post" class="row" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              @else

              <form action="{{route('user.store')}}" method="post" class="row" enctype="multipart/form-data">
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
                  <label for="email">E-mail</label>
                  <input type="text" id="email" name="email" required value="{{ old('email', isset($edit) ? $edit->email : '') }}" class="form-control">
                  @error('email')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="password">Password</label>
                  <input type="text" id="password" name="password" {{ (!isset($edit) ) ? ('require') :('') ; }} value="{{ old('password') ? old('password')  : ''; }}" class="form-control">
                  @error('password')
                  <span style="color: red">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label for="address">Save</label>
                  <input type="submit" value="" class="btn btn-success btn-block">
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