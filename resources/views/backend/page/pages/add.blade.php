@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $title_table }}</h5>
              <div class="card-body">
                
                  <form method="POST" action="{{ route('pages.store') }}" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class=" mb-3">
                      <label class="col-sm-2 col-form-label text-dark">Status Post 
                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="Untuk Menampilkan Postingan di halaman User"></i>
                      </label>
                        <div class="col-sm-12">
                            <select class="form-control form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="pages_status">
                                <option {{ old('pages_status') == '1' ? "selected" : "" }} value="1">Publish</option>
                                <option {{ old('pages_status') == '0' ? "selected" : "" }} value="0">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class=" mb-3">
                      <label class="col-sm-2 col-form-label text-dark">Protect Page 
                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" title="Untuk Menampilkan Postingan di halaman User"></i>
                      </label>
                        <div class="col-sm-12">
                            <select class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="pages_protect">
                                <option {{ old('pages_protect') == '1' ? "selected" : "" }} value="1">Public</option>
                                <option {{ old('pages_protect') == '2' ? "selected" : "" }} value="2">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class=" mb-3">
                      <label class="col-sm-2 col-form-label text-dark">Title</label>
                      <div class="col-sm-12">
                        <input  type="text"  class="form-control @error('pages_title') is-invalid @enderror"  id="pages_title"  placeholder="Judul"  name="pages_title" value="{{ old('pages_title') }}" autofocus required autocomplete="off" value="{{ old('pages_title')}}">
                        @error('pages_title')
                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                {{ $message}}
                            </div>
                        @enderror
                      </div>
                        
                    </div>
                    <div class=" mb-3">
                      <label class="col-sm-2 col-form-label text-dark">Slug</label>
                      <div class="col-sm-12">
                        <input  type="text"  class="form-control @error('pages_slug') is-invalid @enderror"  id="pages_slug"  placeholder="Slug (AUTOMATIC)"  name="pages_slug" value="{{ old('pages_slug') }}" autofocus required autocomplete="off" value="{{ old('pages_slug')}}">
                        @error('pages_slug')
                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                {{ $message}}
                            </div>
                        @enderror
                      </div>
                        
                    </div>
                    <div class=" mb-3">
                      <label class="col-sm-2 col-form-label text-dark">Categories Menu</label>
                        <div class="col-sm-12">
                            <select class="form-control form-select @error('categories') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="categories">
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->namaKate }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('categories')
                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="col-sm-2 col-form-label text-dark">Articles</label>
                        <div class="col-sm-12">
                            <textarea class="ckeditor form-control @error('pages_content') is-invalid @enderror" id="post_content" name="pages_content" required>
                              {{ old('pages_content')}}
                            </textarea>
                        </div>
                        @error('pages_content')
                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="justify-content-end">
                            <div class="col-sm-12">
                                <a href="{{route('pages.index')}}" class="btn btn-danger"> Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
    </div>
</div> 
<script>
    const pages_title = document.querySelector('#pages_title');
    const slug = document.querySelector('#pages_slug');
  
    pages_title.addEventListener('change', function(){
      fetch("{{ route('pages.checkSlug')}}?pt=" + pages_title.value)
      .then(response => response.json())
      .then(data => slug.value = data.pages_slug)
    })
  </script>
  <script type="text/javascript">
    ClassicEditor
          .create( document.querySelector( '#post_content' ), {
            fontSize: {options: [9,11,13,'default',17,19,21]},
              ckfinder: {
                  uploadUrl: '{{route('ckeditor.image-upload').'?_token='.csrf_token()}}',
                  resourceType: 'Images',
                  // types: [ 'png'],
              },
          })
          .then( editor => {
              console.log( editor );
          })
          .catch( error => {
              console.error( error );
          })
  </script>   
@endsection