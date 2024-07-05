@extends('backend/layout.template')
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Galeri</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('galeri.update', [$post_galeri->id])}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class=" mb-2">
                                <label class="col-sm-2 col-form-label text-dark">Galeri Status
                                <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Untuk Menampilkan Postingan di halaman User" aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                                </label>
                                <div class="col-sm-12">
                                    <select class="form-control form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="galeri_status">
                                        <option {{ old('galeri_status', $post_galeri->galeri_status) == '1' ? "selected" : "" }} value="1">Publish</option>
                                        <option {{ old('galeri_status', $post_galeri->galeri_status) == '0' ? "selected" : "" }} value="0">Draft</option>
                                    </select>
                                    @error('galeri_status')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label class="col-sm-2 col-form-label text-dark">Galeri Judul</label>
                                <div class="col-sm-12">
                                    <input name="galeri_title" type="text" class="form-control @error('galeri_title') is-invalid @enderror" placeholder="Input" value="{{ old('galeri_title', $post_galeri->galeri_title)}}">
                                    @error('galeri_title')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class=" mb-2">
                                <label class="col-sm-2 col-form-label text-dark">Galeri Deskripsi Singkat</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="galeri_deskripsi_singkat" id="" rows="5">{{old('galeri_deskripsi_singkat', $post_galeri->galeri_deskripsi_singkat)}}</textarea>
                                    @error('galeri_deskripsi_singkat')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class=" mb-2">
                                <div class="input-group">
                                    <button id="btnimgpreview2" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter2">
                                        <i class="fas fa-fw fa-eye"></i> Image already
                                    </button>
                                    <input class="form-control @error('galeri_gambar') is-invalid @enderror" type="file" id="galeri_gambar" name="galeri_gambar" value=""  onchange="previewImage2()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Preview Gambar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body" style="background-color: lightgray;">
                                            <div class="row">
                                                <img class="img-preview2 img-fluid " src="{{ asset('/'.$post_galeri->galeri_gambar) }}">
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <span style="color: #b02a37; font-size: .875em;">
                                ukuran min-width=450 min-height=450, ukuran max: 2MB
                                </span>
                                @error('galeri_gambar')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
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
    <script>
        function previewImage2(){
        const image = document.querySelector('#galeri_gambar')
        const imgPreview = document.querySelector('.img-preview2')
        const btnreview = document.querySelector('#btnimgpreview2')

        imgPreview.style.display = 'block';
        btnreview.removeAttribute("hidden");
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection