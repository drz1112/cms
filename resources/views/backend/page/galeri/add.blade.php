@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Galeri</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('galeri.store')}}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Galeri Status</label>
                            <div class="col-sm-12">
                                <select class="form-control form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="galeri_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('galeri_status')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Galeri Judul</label>
                            <div class="col-sm-12">
                                <input name="galeri_title" type="text" class="form-control @error('galeri_title') is-invalid @enderror" placeholder="Input" required>
                                @error('galeri_title')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Galeri Deskripsi Singkat</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="galeri_deskripsi_singkat" id="" rows="5" required></textarea>
                                @error('galeri_deskripsi_singkat')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Galeri Gambar</label>
                            <div class="col-sm-12">
                                <input class="form-control @error('galeri_gambar') is-invalid @enderror" type="file" id="galeri_gambar" name="galeri_gambar" required>
                                <span style="color: #b02a37; font-size: .875em;">
                                    ukuran min-width=450 min-height=450, ukuran max: 2MB
                                </span>
                                @error('galeri_gambar')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{route('galeri.index')}}" class="btn btn-danger"> Cancel</a>
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection