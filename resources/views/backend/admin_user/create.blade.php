@extends('backend.layout.app')
@section('title','Create Admin User')
@section('admin-user-active','nav-link active')
@section('body-title','Create Admin User')
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Admin User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    @include('backend.layout.flash')
                    <form action="{{route('admin.admin-user.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="number" class="form-control" name="phone" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" name="password" value="{{old('name')}}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary mr-2 back-btn">Cancel</button>
                            <button class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  </div>
  <!-- /.content-wrapper -->    


    
@endsection





