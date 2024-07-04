@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Profil Singkat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profilsingkat.update')}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                            <div class="mb-3 col-md-12">
                              <label for="firstName" class="form-label">Title</label>
                              <input class="form-control @error('profilsingkat_title') is-invalid @enderror" type="text" id="firstName" name="profilsingkat_title" value="{{ old('profilsingkat_title',$post_profilsingkat->profilsingkat_title) }}" >
                              @error('profilsingkat_title')
                                  <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                      {{ $message}}
                                  </div>
                              @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                              <label for="firstName" class="form-label">Sub-Title</label>
                              <input class="form-control @error('profilsingkat_subtitle') is-invalid @enderror" type="text" id="firstName" name="profilsingkat_subtitle" value="{{ old('profilsingkat_subtitle',$post_profilsingkat->profilsingkat_subtitle) }}" >
                              @error('profilsingkat_subtitle')
                                  <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                      {{ $message}}
                                  </div>
                              @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                              <label for="firstName" class="form-label">Description</label>
                              <textarea class="form-control" name="profilsingkat_description" id="" cols="30" rows="10">{{ old('profilsingkat_description',$post_profilsingkat->profilsingkat_description) }}</textarea>
                              @error('profilsingkat_description')
                                  <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                      {{ $message}}
                                  </div>
                              @enderror
                              <span style="color: #b02a37; font-size: .875em;">
                                {{"Gunakan <br> untuk baris baru"}}
                              </span>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="firstName" class="form-label">
                                    Image Profil
                                </label>
                                <div class="input-group">
                                    <button id="btnimgpreview" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                    <i class="fas fa-fw fa-eye"></i> Image already
                                    </button>
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalCenterTitle">Preview Image Login</h5>
                                              <button
                                                type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"
                                              >
                                            </button>
                                            </div>
                                            <div class="modal-body" style="background-color: lightgray;">
                                              <div class="row">
                                                <img class="img-preview img-fluid " src="{{ asset('/'.$post_profilsingkat->profilsingkat_gambar) }}">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <input class="form-control @error('profilsingkat_gambar') is-invalid @enderror" type="file" id="profilsingkat_gambar" name="profilsingkat_gambar" value=""  onchange="previewImage()" onclick="return confirm('Image already exists, Are You Sure?')">
                                </div>
                                <span style="color: #b02a37; font-size: .875em;">
                                  ukuran harus 450x450, ukuran max: 2MB
                                </span>
                                @error('profilsingkat_gambar')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(){
        const image = document.querySelector('#upload_login')
        const imgPreview = document.querySelector('.img-preview')
        const btnreview = document.querySelector('#btnimgpreview')

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