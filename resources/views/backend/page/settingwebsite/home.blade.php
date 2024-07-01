@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="display: ruby;">
                      <form action="{{ route('settingswebsite.updatedefault')}}" method="POST">
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
                        <form action="{{ route('settingswebsite.update')}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Title</label>
                                    <input class="form-control @error('site_title') is-invalid @enderror" type="text" id="firstName" name="site_title" value="{{ old('site_title', $post_website->site_title) }}" >
                                    @error('site_title')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Keyword</label>
                                    <input class="form-control @error('site_keyword') is-invalid @enderror" type="text" id="firstName" name="site_keyword" value="{{ old('site_keyword',$post_website->site_keyword) }}" >
                                    @error('site_keyword')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Description</label>
                                    <input class="form-control  @error('site_description') is-invalid @enderror" type="text" id="firstName" name="site_description" value="{{ old('site_description',$post_website->site_description) }}" >
                                    @error('site_description')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Email Contact</label>
                                    <input class="form-control  @error('site_contact_email') is-invalid @enderror" type="text" id="firstName" name="site_contact_email" value="{{ old('site_contact_email',$post_website->site_contact_email) }}" >
                                    @error('site_contact_email')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">WA Contact <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gunakan 62 sebagai pengganti 0" aria-label="Gunakan 62 sebagai pengganti 0"></i></label>
                                    <input class="form-control  @error('site_contact_wa') is-invalid @enderror" type="text" id="firstName" name="site_contact_wa" value="{{ old('site_contact_wa',$post_website->site_contact_wa) }}" >
                                    @error('site_contact_wa')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">WA Message</label>
                                    <input class="form-control  @error('site_contact_wa_content') is-invalid @enderror" type="text" id="firstName" name="site_contact_wa_content" value="{{ old('site_contact_wa_content',$post_website->site_contact_wa_content) }}" >
                                    @error('site_contact_wa_content')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Tlp/Fax Contact</label>
                                    <input class="form-control  @error('site_contact_tlp') is-invalid @enderror" type="text" id="firstName" name="site_contact_tlp" value="{{ old('site_contact_tlp',$post_website->site_contact_tlp) }}" >
                                    @error('site_contact_tlp')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Address <i class="bx bx-help-circle " data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gunakan <br> untuk newline" aria-label="Gunakan <br> untuk newline"></i></label>
                                    <input class="form-control  @error('site_contact_address') is-invalid @enderror" type="text" id="firstName" name="site_contact_address" value="{{ old('site_contact_address',$post_website->site_contact_address) }}" >
                                    @error('site_contact_address')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
        
        
        
        
                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Twitter Account</label>
                                  <input class="form-control @error('site_twitter') is-invalid @enderror" type="text" id="firstName" name="site_twitter" value="{{ old('site_twitter',$post_website->site_twitter) }}" >
                                  @error('site_twitter')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Facebook Account</label>
                                  <input class="form-control @error('site_facebook') is-invalid @enderror" type="text" id="firstName" name="site_facebook" value="{{ old('site_facebook',$post_website->site_facebook) }}" >
                                  @error('site_facebook')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Instagram Account</label>
                                  <input class="form-control @error('site_instagram') is-invalid @enderror" type="text" id="firstName" name="site_instagram" value="{{ old('site_instagram',$post_website->site_instagram) }}" >
                                  @error('site_instagram')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Youtube Account</label>
                                  <input class="form-control @error('site_youtube') is-invalid @enderror" type="text" id="firstName" name="site_youtube" value="{{ old('site_youtube',$post_website->site_youtube) }}" >
                                  @error('site_youtube')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Tiktok Account</label>
                                  <input class="form-control @error('site_tiktok') is-invalid @enderror" type="text" id="firstName" name="site_tiktok" value="{{ old('site_tiktok',$post_website->site_tiktok) }}" >
                                  @error('site_tiktok')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">
                                        Image Login
                                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran 450x450, ukuran max: 2MB"></i>
                                    </label>
                                    @if (empty($post_website->site_Image_login))
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
                                        <input class="form-control @error('upload_login') is-invalid @enderror" type="file" id="upload_login" name="upload_login" value=""  onchange="previewImage()">
                                        <button  id="btnimgpreview" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter" hidden >
                                        <i class="fas fa-fw fa-eye"></i> show Image
                                        </button>
                                    </div>
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran 450x450, ukuran max: 2MB
                                    </span>
                                    @error('upload_login')
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
                                                    <img class="img-preview img-fluid " src="{{ asset('/'.$post_website->site_Image_login) }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        <input class="form-control @error('upload_login') is-invalid @enderror" type="file" id="upload_login" name="upload_login" value=""  onchange="previewImage()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    </div>
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran harus 450x450, ukuran max: 2MB
                                    </span>
                                    @error('upload_login')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    @endif
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">
                                        Image Dahsboard 
                                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran min-width=220 min-height=50, ukuran max: 2MB"></i>
                                    </label>
                                    @if (empty($post_website->site_Image_dashboard))
                                    <div class="input-group">
                                        <button id="btnimgpreview2" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter2" hidden>
                                            <i class="fas fa-fw fa-eye"></i> show Image
                                        </button>
                                        <input class="form-control @error('upload_dashboard') is-invalid @enderror" type="file" id="upload_dashboard" name="upload_dashboard" value=""  onchange="previewImage2()">
                                        
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
                                      ukuran min-width=220 min-height=50, ukuran max: 2MB
                                    </span>
                                    @error('upload_dashboard')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                    @else
                                    <div class="input-group">
                                        <button id="btnimgpreview2" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter2">
                                            <i class="fas fa-fw fa-eye"></i> Image already
                                        </button>
                                        <input class="form-control @error('upload_dashboard') is-invalid @enderror" type="file" id="upload_dashboard" name="upload_dashboard" value=""  onchange="previewImage2()" onclick="return confirm('Image already exists, Are You Sure?')">
                                        <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Dashboard</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview2 img-fluid " src="{{ asset('/'.$post_website->site_Image_dashboard) }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        
                                    @endif
                                  </div> 
                                  <span style="color: #b02a37; font-size: .875em;">
                                    ukuran min-width=220 min-height=50, ukuran max: 2MB
                                  </span>
                                  @error('upload_dashboard')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror 
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">
                                        Image Favicon
                                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran 180x180, ukuran max: 2MB"></i>
                                    </label>
                                    @if (empty($post_website->site_Image_favicon))
                                    <div class="input-group">
                                        <button  id="btnimgpreview3" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter3" hidden>
                                            <i class="fas fa-fw fa-eye"></i> show Image
                                        </button>
                                        <div class="modal fade" id="modalCenter3" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Favicon</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview3 img-fluid ">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input class="form-control @error('upload_favicon') is-invalid @enderror" type="file" id="upload_favicon" name="upload_favicon" value=""  onchange="previewImage3()">
                                    </div>
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran 180x180, ukuran max: 2MB
                                    </span>
                                    @error('upload_favicon')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                    @else
                                    <div class="input-group">
                                        <button  id="btnimgpreview3" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter3">
                                            <i class="fas fa-fw fa-eye"></i> Image already
                                        </button>
                                        <div class="modal fade" id="modalCenter3" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Favicon</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview3 img-fluid " src="{{ asset('/'.$post_website->site_Image_favicon) }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input class="form-control @error('upload_favicon') is-invalid @enderror" type="file" id="upload_favicon" name="upload_favicon" value=""  onchange="previewImage3()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    </div>
                                    @endif
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran 180x180, ukuran max: 2MB
                                    </span>
                                    @error('upload_favicon')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">
                                        Image Footer
                                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran min-width=450 min-height=180, ukuran max: 2MB"></i>
                                    </label>
                                    @if (empty($post_website->site_Image_footer))
                                    <div class="input-group">
                                        <button  id="btnimgpreview4" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter4" hidden>
                                            <i class="fas fa-fw fa-eye"></i> show Image
                                        </button>
                                        <div class="modal fade" id="modalCenter4" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Footer</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview4 img-fluid ">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input class="form-control @error('upload_footer') is-invalid @enderror" type="file" id="upload_footer" name="upload_footer" value=""  onchange="previewImage4()">
                                    </div>
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran min-width=450 min-height=180, ukuran max: 2MB
                                    </span>
                                    @error('upload_footer')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                    @else
                                    <div class="input-group">
                                        <button  id="btnimgpreview4" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter4">
                                            <i class="fas fa-fw fa-eye"></i> Image already
                                        </button>
                                        <div class="modal fade" id="modalCenter4" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Favicon</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview4 img-fluid " src="{{ asset('/'.$post_website->site_Image_footer) }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input class="form-control @error('upload_footer') is-invalid @enderror" type="file" id="upload_footer" name="upload_footer" value=""  onchange="previewImage4()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    </div>
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran min-width=450 min-height=180, ukuran max: 2MB
                                    </span>
                                    @error('upload_footer')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                    @endif
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">
                                        Image Navbar
                                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="ukuran min-width=450 min-height=180, ukuran max: 2MB"></i>
                                    </label>
                                    @if (empty($post_website->site_Image_navbar))
                                    <div class="input-group">
                                        <button  id="btnimgpreview5" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter5" hidden>
                                            <i class="fas fa-fw fa-eye"></i> show Image
                                        </button>
                                        <div class="modal fade" id="modalCenter5" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Footer</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview5 img-fluid ">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input class="form-control @error('upload_navbar') is-invalid @enderror" type="file" id="upload_navbar" name="upload_navbar" value=""  onchange="previewImage5()">
                                    </div>
                                      <span style="color: #b02a37; font-size: .875em;">
                                        ukuran min-width=450 min-height=180, ukuran max: 2MB
                                      </span>
                                      @error('upload_navbar')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                      @enderror
                                    @else
                                    <div class="input-group">
                                        <button  id="btnimgpreview5" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter5">
                                            <i class="fas fa-fw fa-eye"></i> Image already
                                        </button>
                                        <div class="modal fade" id="modalCenter5" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="modalCenterTitle">Preview Image Navbar</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                </div>
                                                <div class="modal-body" style="background-color: lightgray;">
                                                  <div class="row">
                                                    <img class="img-preview5 img-fluid " src="{{ asset('/'.$post_website->site_Image_navbar) }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <input class="form-control @error('upload_navbar') is-invalid @enderror" type="file" id="upload_navbar" name="upload_navbar" value=""  onchange="previewImage5()" onclick="return confirm('Image already exists, Are You Sure?')">
                                    </div>
                                    <span style="color: #b02a37; font-size: .875em;">
                                      ukuran min-width=450 min-height=180, ukuran max: 2MB
                                    </span>
                                    @error('upload_navbar')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                    @enderror
                                    @endif
                                    
                                
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
    function previewImage3(){
        const image = document.querySelector('#upload_favicon')
        const imgPreview = document.querySelector('.img-preview3')
        const btnreview3 = document.querySelector('#btnimgpreview3')

        imgPreview.style.display = 'block';
        btnreview3.removeAttribute("hidden");
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewImage4(){
        const image = document.querySelector('#upload_footer')
        const imgPreview = document.querySelector('.img-preview4')
        const btnreview4 = document.querySelector('#btnimgpreview4')

        imgPreview.style.display = 'block';
        btnreview4.removeAttribute("hidden");
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewImage5(){
        const image = document.querySelector('#upload_navbar')
        const imgPreview = document.querySelector('.img-preview5')
        const btnreview5 = document.querySelector('#btnimgpreview5')

        imgPreview.style.display = 'block';
        btnreview5.removeAttribute("hidden");
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection