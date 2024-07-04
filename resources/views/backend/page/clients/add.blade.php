@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Client</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('settingclients.store')}}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Client Status</label>
                            <div class="col-sm-12">
                                <select class="form-control form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="clients_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('clients_status')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Client Name</label>
                            <div class="col-sm-12">
                                <input name="clients_name" type="text" class="form-control @error('clients_name') is-invalid @enderror" placeholder="Input" required>
                                @error('clients_name')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Client Link</label>
                            <div class="col-sm-12">
                                <input name="clients_link" type="text" class="form-control @error('clients_link') is-invalid @enderror" placeholder="Input" required>
                                @error('clients_link')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Client Deskripsi</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="clients_description" id="" rows="5" required></textarea>
                                @error('clients_description')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Client Logo</label>
                            <div class="col-sm-12">
                                <input class="form-control @error('clients_logos') is-invalid @enderror" type="file" id="clients_logos" name="clients_logos" required>
                                <span style="color: #b02a37; font-size: .875em;">
                                    ukuran min-width=400 min-height=70, ukuran max: 2MB
                                </span>
                                @error('clients_logos')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection