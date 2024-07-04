@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Clients Management 
                        <a class="btn btn-sm btn-info" href="{{ route('settingclients.add') }}">
                            <i class='fa fa-plus' ></i> Add NEW
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <table class="table table-striped dataTable no-footer dtr-inline data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Deskripsi</th>
                                <th>Link</th>
                                <th>Public</th>
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
</div>

<script type="text/javascript">
    $(function () {
        
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          
          ajax: "{{ route('settingclients.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'clients_name', name: 'clients_name'},
              {data: 'clients_description', name: 'clients_description'},
              {data: 'clients_link', name: 'clients_link'},
              {data: 'updated_at', name: 'updated_at'},
              {data: 'public', name: 'public', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
</script>
@endsection