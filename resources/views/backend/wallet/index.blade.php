@extends('backend.layout.app')
@section('title','Wallet')
@section('wallet-active','nav-link active')
@section('body-title','Wallet')
@section('content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Wallet</h1>
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
                                <th>Account Number</th>
                                <th>Account Person</th>
                                <th>Amount</th>
                                <th>Created At</th>
                                <th>Update At</th>
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
            url:'/admin/wallet/',
            error: function(xhr, textStatus, errorThrown) {
            console.log("AJAX Error:", textStatus, errorThrown);
        }
        },

        "columns": [
        {
            "data" : "account_number",
        },
        {
            "data" : "account_person",
        },
        {
            "data" : "amount",   
        },
        {
            "data" : "created_at",   
        },
        {
            "data" : "updated_at",   
        },
        
    ],
    order: [
        [4,"desc"]
    ],
    columnDefs: [{
        targets: "no-sort",
        sortable:false
    }]
    } );
    
</script>
@endsection

