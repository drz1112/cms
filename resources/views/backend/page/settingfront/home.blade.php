@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="display: ruby;">
                        <form action="{{ route('settingsfront.updatedefault')}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda kembali reset setting halaman depan?')">
                                <i class="fas fa-fw fa-recycle"></i> Reset
                            </button>
                        </form>
                        Setting Front
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('settingsfront.update')}}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Default Font</label>
                                    <input class="form-control @error('default_font') is-invalid @enderror" type="text" id="firstName" name="default_font" value="{{ old('default_font', $post_front->default_font) }}" >
                                    @error('default_font')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Heading Font</label>
                                  <input class="form-control @error('heading_font') is-invalid @enderror" type="text" id="firstName" name="heading_font" value="{{ old('heading_font',$post_front->heading_font) }}" >
                                  @error('heading_font')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                  <label for="firstName" class="form-label">Nav Font</label>
                                  <input class="form-control @error('nav_font') is-invalid @enderror" type="text" id="firstName" name="nav_font" value="{{ old('nav_font',$post_front->nav_font) }}" >
                                  @error('nav_font')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                  @enderror
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Background</label>
                                        <input class="form-control @error('background_color') is-invalid @enderror" type="color" id="firstName" name="background_color" value="{{ old('background_color',$post_front->background_color) }}" >
                                        @error('background_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Default</label>
                                        <input class="form-control @error('default_color') is-invalid @enderror" type="color" id="firstName" name="default_color" value="{{ old('default_color',$post_front->default_color) }}" >
                                        @error('default_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Heading</label>
                                        <input class="form-control @error('heading_color') is-invalid @enderror" type="color" id="firstName" name="heading_color" value="{{ old('heading_color',$post_front->heading_color) }}" >
                                        @error('heading_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Main</label>
                                        <input class="form-control @error('main_color') is-invalid @enderror" type="color" id="firstName" name="main_color" value="{{ old('main_color',$post_front->main_color) }}" >
                                        @error('main_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Contrast</label>
                                        <input class="form-control @error('contrast_color') is-invalid @enderror" type="color" id="firstName" name="contrast_color" value="{{ old('contrast_color',$post_front->contrast_color) }}" >
                                        @error('contrast_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Navbar</label>
                                        <input class="form-control @error('nav_color') is-invalid @enderror" type="color" id="firstName" name="nav_color" value="{{ old('nav_color',$post_front->nav_color) }}" >
                                        @error('nav_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Navbar Hover</label>
                                        <input class="form-control @error('nav_hover_color') is-invalid @enderror" type="color" id="firstName" name="nav_hover_color" value="{{ old('nav_hover_color',$post_front->nav_hover_color) }}" >
                                        @error('nav_hover_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Navbar dropdown background</label>
                                        <input class="form-control @error('nav_dropdown_background_color') is-invalid @enderror" type="color" id="firstName" name="nav_dropdown_background_color" value="{{ old('nav_dropdown_background_color',$post_front->nav_dropdown_background_color) }}" >
                                        @error('nav_dropdown_background_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Navbar dropdown</label>
                                        <input class="form-control @error('nav_dropdown_color') is-invalid @enderror" type="color" id="firstName" name="nav_dropdown_color" value="{{ old('nav_dropdown_color',$post_front->nav_dropdown_color) }}" >
                                        @error('nav_dropdown_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="firstName" class="form-label">Navbar dropdown hover</label>
                                        <input class="form-control @error('nav_dropdown_hover_color') is-invalid @enderror" type="color" id="firstName" name="nav_dropdown_hover_color" value="{{ old('nav_dropdown_hover_color',$post_front->nav_dropdown_hover_color) }}" >
                                        @error('nav_dropdown_hover_color')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
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

    window.addEventListener("DOMContentLoaded", function(e) {  
      document.querySelectorAll("input[type=color]").forEach(function(current) {
        let newEl = document.createElement("input");

        newEl.className  = "form-control";
        newEl.value = current.value;
        newEl.pattern = "#[0-9A-Fa-f]{6}";
        newEl.style = 'margin-top: 0.5em; padding: 0px 5px;';
        current.insertAdjacentElement("afterend", newEl);
        newEl.addEventListener("input", function(e) {
          if(e.target.validity.valid) {
            current.value = e.target.value;
          }
        });
  
        current.addEventListener("change", function(e) {
          newEl.value = e.target.value;
        });
  
      });
  
    });
  
  </script>
@endsection