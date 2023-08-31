@extends('backend.layout.app')
@section('title','Admin User')
@section('admin-user-active','nav-link active')
@section('body-title','Admin User')
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('admin.admin-user.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i>Create Admin User</a>
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
                    <table class="table table-bordered" id="DataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>IP</th>
                                <th>User Agent</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
    
@endsection

@section('scripts')
<script>
    var table = $('#DataTable').DataTable( {
        "serverSide": true,
        "processing": true,
        "ajax": {
            url:'/admin/admin-user/',
            error: function(xhr, textStatus, errorThrown) {
            console.log("AJAX Error:", textStatus, errorThrown);
        }
        },

        "columns": [
        {
            "data" : "name",
        },
        {
            "data" : "email",
        },
        {
            "data" : "phone",   
        },
        {
            "data" : "ip",
        },
        {
            "data" : "user_agent",
            searchable : false,
            sortable : false,
        },
        {
            "data" : "action",
            searchable : false,
            sortable : false,
        }
        
    ]
    } );
    $(document).on('click','.delete',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      Swal.fire({
        title: 'Are you sure, you want to delete?',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url : '/admin/admin-user/' + id,
            type : 'DELETE',
            success : function(){
              table.ajax.reload();
            }
          });
      }})
    });
</script>
@endsection