@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="display: ruby;">
                      <form action="{{ route('settingsbannerfront.updatedefault')}}" method="POST">
                        @method('put')
                        @csrf
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda kembali reset setting website?')">
                            <i class="fas fa-fw fa-recycle"></i> Reset
                        </button>
                    </form>
                      Setting Website
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('settingsbannerfront.update')}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                              <div class="mb-3 col-md-1">
                                <label for="text_1_color" class="form-label">Teks 1 Color</label>
                                <input class="form-control @error('text_1_color') is-invalid @enderror" type="color" id="text_1_color" name="text_1_color" value="{{ old('text_1_color',$post_banner_front->text_1_color) }}" style="padding: .1em;">
                                @error('text_1_color')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-11">
                                <label for="firstName" class="form-label">Teks 1</label>
                                <input class="form-control @error('text_1') is-invalid @enderror" type="text" id="firstName" name="text_1" value="{{ old('text_1', $post_banner_front->text_1) }}" >
                                @error('text_1')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-1">
                                <label for="text_2_color" class="form-label">Teks 2 Color</label>
                                <input class="form-control @error('text_2_color') is-invalid @enderror" type="color" id="text_2_color" name="text_2_color" value="{{ old('text_2_color',$post_banner_front->text_2_color) }}" style="padding: .1em;">
                                @error('text_2_color')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-11">
                                <label for="firstName" class="form-label">Teks 2</label>
                                <input class="form-control @error('text_2') is-invalid @enderror" type="text" id="firstName" name="text_2" value="{{ old('text_2', $post_banner_front->text_2) }}" >
                                @error('text_2')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-1">
                                <label for="text_3_color" class="form-label">Teks 3 Color</label>
                                <input class="form-control @error('text_3_color') is-invalid @enderror" type="color" id="text_3_color" name="text_3_color" value="{{ old('text_3_color',$post_banner_front->text_3_color) }}" style="padding: .1em;">
                                @error('text_3_color')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-11">
                                <label for="firstName" class="form-label">Teks 3</label>
                                <input class="form-control @error('text_3') is-invalid @enderror" type="text" id="firstName" name="text_3" value="{{ old('text_3', $post_banner_front->text_3) }}" >
                                @error('text_3')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-4">
                                <label for="firstName" class="form-label">Nomor Hubungi Kami</label>
                                <input class="form-control @error('hubungi_kami') is-invalid @enderror" type="text" id="firstName" name="hubungi_kami" value="{{ old('hubungi_kami', $post_banner_front->hubungi_kami) }}" >
                                @error('hubungi_kami')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-8">
                                <label for="firstName" class="form-label">Kalimat Hubungi Kami</label>
                                <input class="form-control @error('hubungi_kami_text') is-invalid @enderror" type="text" id="firstName" name="hubungi_kami_text" value="{{ old('hubungi_kami_text', $post_banner_front->hubungi_kami_text) }}" >
                                @error('hubungi_kami_text')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                            </div>
                            <div class="row">
                              <div class="mb-3 col-md-1">
                                <label for="firstName" class="form-label">Judul Color</label>
                                <input class="form-control @error('text_link_video_color') is-invalid @enderror" type="color" id="firstName" name="text_link_video_color" value="{{ old('text_link_video_color', $post_banner_front->text_link_video_color) }}" style="padding: .1em;">
                                @error('text_link_video_color')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-3">
                                <label for="firstName" class="form-label">Judul Video</label>
                                <input class="form-control @error('text_link_video') is-invalid @enderror" type="text" id="firstName" name="text_link_video" value="{{ old('text_link_video', $post_banner_front->text_link_video) }}" >
                                @error('text_link_video')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="mb-3 col-md-8">
                                <label for="firstName" class="form-label">Link Video</label>
                                <input class="form-control @error('link_video') is-invalid @enderror" type="text" id="firstName" name="link_video" value="{{ old('link_video', $post_banner_front->link_video) }}" >
                                @error('link_video')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="firstName" class="form-label">
                                    Image Banner 1
                                    <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran min-width=1800 min-height=720, ukuran max: 2MB"></i>
                                </label>
                                @if (empty($post_banner_front->image_banner_1))
                                  <div class="input-group">
                                      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Preview Image Login</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                              </button>
                                              </div>
                                              <div class="modal-body" style="background-color: lightgray;">
                                                <div class="row">
                                                  <img class="img-preview img-fluid ">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <input class="form-control @error('upload_banner_1') is-invalid @enderror" type="file" id="upload_banner_1" name="upload_banner_1" value=""  onchange="previewImage()">
                                      <button  id="btnimgpreview" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter" hidden >
                                      <i class="fas fa-fw fa-eye"></i> show Image
                                      </button>
                                  </div>
                                  <span style="color: #b02a37; font-size: .875em;">
                                    ukuran min-width=1800 min-height=720, ukuran max: 2MB
                                  </span>
                                  @error('upload_banner_1')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                  @enderror
                                @else
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
                                                  <img class="img-preview img-fluid " src="{{ asset('/'.$post_banner_front->image_banner_1) }}">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      <input class="form-control @error('upload_banner_1') is-invalid @enderror" type="file" id="upload_banner_1" name="upload_banner_1" value=""  onchange="previewImage()" onclick="return confirm('Image already exists, Are You Sure?')">
                                  </div>
                                  <span style="color: #b02a37; font-size: .875em;">
                                    ukuran min-width=1800 min-height=720, ukuran max: 2MB
                                  </span>
                                  @error('upload_banner_1')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                  @enderror
                                @endif
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="firstName" class="form-label">
                                    Image Banner 2 
                                    <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran min-width=1800 min-height=720, ukuran max: 2MB"></i>
                                </label>
                                @if (empty($post_banner_front->image_banner_2))
                                <div class="input-group">
                                    <button id="btnimgpreview2" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter2" hidden>
                                        <i class="fas fa-fw fa-eye"></i> show Image
                                    </button>
                                    <input class="form-control @error('upload_banner_2') is-invalid @enderror" type="file" id="upload_banner_2" name="upload_banner_2" value=""  onchange="previewImage2()">
                                    
                                    <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalCenterTitle">Preview Image Dashboard</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body" style="background-color: lightgray;">
                                              <div class="row">
                                                <img class="img-preview2 img-fluid ">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                <span style="color: #b02a37; font-size: .875em;">
                                  ukuran min-width=1800 min-height=720, ukuran max: 2MB
                                </span>
                                @error('upload_banner_2')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                                @else
                                <div class="input-group">
                                    <button id="btnimgpreview2" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter2">
                                        <i class="fas fa-fw fa-eye"></i> Image already
                                    </button>
                                    <input class="form-control @error('upload_banner_2') is-invalid @enderror" type="file" id="upload_banner_2" name="upload_banner_2" value=""  onchange="previewImage2()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="modalCenterTitle">Preview Image Dashboard</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body" style="background-color: lightgray;">
                                              <div class="row">
                                                <img class="img-preview2 img-fluid " src="{{ asset('/'.$post_banner_front->image_banner_2) }}">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    
                                @endif
                              </div> 
                              <span style="color: #b02a37; font-size: .875em;">
                                ukuran min-width=1800 min-height=720, ukuran max: 2MB
                              </span>
                              @error('upload_banner_2')
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
    function previewImage2(){
        const image = document.querySelector('#upload_dashboard')
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