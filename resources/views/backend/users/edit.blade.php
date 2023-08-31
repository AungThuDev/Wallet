@extends('backend.layout.app')
@section('title','Edit User')
@section('user-active','nav-link active')
@section('body-title','Edit User')
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
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
                    <form action="{{route('admin.users.update',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" name="password" value="{{old('name')}}">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary mr-2 back-btn">Cancel</button>
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  </div>
  <!-- /.content-wrapper -->    


    
@endsection





