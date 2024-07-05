@extends('backend/layout.template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Gallery Management 
                        <a class="btn btn-sm btn-info" href="{{ route('galeri.add') }}">
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
                                <th>Deskripsi Singkat</th>
                                <th>Gambar</th>
                                <th class="d-flex justify-content-center">Visible</th>
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
          
          ajax: "{{ route('galeri.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'galeri_title', name: 'galeri_title'},
              {data: 'galeri_deskripsi_singkat', name: 'galeri_deskripsi_singkat'},
              {data: 'galeri_gambar', name: 'galeri_gambar', orderable: false, searchable: false},
              {data: 'galeri_status', name: 'galeri_status', orderable: false, searchable: false},
            //   {data: 'public', name: 'public', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
        
    });
</script>
@endsection