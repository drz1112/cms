@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pages Management 
                        <a class="btn btn-sm btn-info" href="{{ route('pages.add') }}">
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
                                <th>Judul</th>
                                <th>Ringkasan</th>
                                <th>Tanggal</th>
                                <th width="50px">Visible</th>
                                <th width="50px">Protect</th>
                                <th width="100px">Action</th>
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
          
          ajax: "{{ route('pages.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'pages_title', name: 'pages_title'},
              {data: 'pages_excerpt', name: 'pages_excerpt'},
              {data: 'updated_at', name: 'updated_at'},
              {data: 'visible', name: 'visible', orderable: false, searchable: false},
              {data: 'public', name: 'public', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
</script>
@endsection