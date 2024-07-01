@extends('backend/layout.template')
@section('content')
<div class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <a href="{{ route('posting.index') }}"></a>
            <h5 class="card-title">Tambah Postingan Artikel</h5>
            <form method="POST" action="{{ route('posting.store') }}" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label">Status Post
                    <i class="bx bx-help-circle "
                        data-toggle="tooltip"
                        data-placement="top"
                        title=""
                        data-original-title="Untuk Menampilkan Postingan di halaman User"
                        aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                  </label>
                    <div class="col-sm-12">
                        <select class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="post_status">
                            <option {{ old('post_status') == '1' ? "selected" : "" }} value="1">Publish</option>
                            <option {{ old('post_status') == '0' ? "selected" : "" }} value="0">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                  <label class="col-sm-2 col-form-label">Thumbnail</label>
                  <div class="col-sm-12">
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" placeholder="New Menu Parent" name="thumbnail" value="{{ old('thumbnail') }}" autofocus required autocomplete="off" value="{{ old('thumbnail')}}">
                    
                    <div class="mt-1" style="padding-left:5px;">
                      <span class="badge bg-danger text-white"><i class="bi bi-collection me-1"></i> 
                        Max 2mb
                      </span>
                      <span class="badge bg-danger text-white"><i class="bi bi-collection me-1"></i> 
                        Gambar (png,jpeg,jpg)
                      </span>
                      <span class="badge bg-danger text-white"><i class="bi bi-collection me-1"></i> 
                        Minimal 500x500 
                      </span>
                    </div>
                    @error('thumbnail')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label">JUDUL</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title" placeholder="New Menu Parent" name="post_title" value="{{ old('post_title') }}" autofocus required autocomplete="off" value="{{ old('post_title')}}">
                    @error('post_title')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label">Slug</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control @error('post_slug') is-invalid @enderror" id="post_slug" placeholder="Slug (AUTOMATIC)" name="post_slug" value="{{ old('post_slug') }}" autofocus required autocomplete="off" value="{{ old('post_slug')}}" >

                    @error('post_slug')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                  </div>

                </div>
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-12">
                        <select class="form-control @error('categories') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="categories">
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
                    <label class="col-sm-2 col-form-label">Artikel</label>
                    <div class="col-sm-12">
                        <textarea id="post_content" class="ckeditor form-control @error('post_content') is-invalid @enderror" name="post_content" required>
                          {{ old('post_content')}}
                        </textarea>
                    </div>
                    @error('post_content')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="justify-content-end">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
              </form>
          </div>
        </div>
      </div>
</div>
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script>
  const post_title = document.querySelector('#post_title');
  const slug = document.querySelector('#post_slug');

  post_title.addEventListener('change', function(){
    fetch("{{ route('posting.checkSlug')}}?pt=" + post_title.value)
    .then(response => response.json())
    .then(data => slug.value = data.post_slug)
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