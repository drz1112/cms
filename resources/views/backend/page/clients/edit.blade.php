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
                        <form action="{{ route('settingclients.update', [$post_clients->id])}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class=" mb-3">
                                <label class="col-sm-2 col-form-label text-dark">Client Status
                                <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Untuk Menampilkan Postingan di halaman User" aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                                </label>
                                <div class="col-sm-12">
                                    <select class="form-control form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="clients_status">
                                        <option {{ old('clients_status', $post_clients->clients_status) == '1' ? "selected" : "" }} value="1">Publish</option>
                                        <option {{ old('clients_status', $post_clients->clients_status) == '0' ? "selected" : "" }} value="0">Draft</option>
                                    </select>
                                    @error('clients_status')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="col-sm-2 col-form-label text-dark">Client Name
                                <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Untuk Menampilkan Postingan di halaman User" aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                                </label>
                                <div class="col-sm-12">
                                    <input name="clients_name" type="text" class="form-control @error('clients_name') is-invalid @enderror" placeholder="Input" value="{{ old('clients_name', $post_clients->clients_name)}}">
                                    @error('clients_name')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="col-sm-2 col-form-label text-dark">Client Link
                                <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Untuk Menampilkan Postingan di halaman User" aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                                </label>
                                <div class="col-sm-12">
                                    <input name="clients_link" type="text" class="form-control @error('clients_link') is-invalid @enderror" placeholder="Input" value="{{ old('clients_link', $post_clients->clients_link)}}">
                                    @error('clients_link')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class=" mb-3">
                                <label class="col-sm-2 col-form-label text-dark">Client Deskripsi
                                <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Untuk Menampilkan Postingan di halaman User" aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                                </label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="clients_description" id="" rows="5">{{old('clients_description', $post_clients->clients_description)}}</textarea>
                                    @error('clients_description')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class=" mb-3">
                                <div class="input-group">
                                    <button id="btnimgpreview2" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter2">
                                        <i class="fas fa-fw fa-eye"></i> Image already
                                    </button>
                                    <input class="form-control @error('clients_logos') is-invalid @enderror" type="file" id="clients_logos" name="clients_logos" value=""  onchange="previewImage2()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Preview Image Dashboard</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body" style="background-color: lightgray;">
                                            <div class="row">
                                                <img class="img-preview2 img-fluid " src="{{ asset('/'.$post_clients->clients_logos) }}">
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <span style="color: #b02a37; font-size: .875em;">
                                ukuran min-width=400 min-height=70, ukuran max: 2MB
                                </span>
                                @error('clients_logos')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
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
    <script>
        function previewImage2(){
        const image = document.querySelector('#clients_logos')
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