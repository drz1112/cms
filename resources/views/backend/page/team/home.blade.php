@extends('backend/layout.template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Team Management 
                        <a class="btn btn-sm btn-info" href="{{ route('team.add') }}">
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
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Sosial Media</th>
                                <th>Foto</th>
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
          
          ajax: "{{ route('team.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'team_Nama', name: 'team_Nama'},
              {data: 'team_Jabatan', name: 'team_Jabatan'},
              {data: 'sosial_media', name: 'sosial_media',orderable: false, searchable: false},
              {data: 'team_Foto', name: 'team_Foto', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
</script>
@endsection