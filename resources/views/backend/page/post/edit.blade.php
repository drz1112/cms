@extends('backend/layout.template')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Postingan Artikel</h5>
            <form method="POST" action="{{ route('posting.update', [$post->id, $post->post_slug]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-company">Status Post
                    <i class="bx bx-help-circle "
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title=""
                        data-bs-original-title="Untuk Menampilkan Postingan di halaman User"
                        aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                  </label>
                    <div class="col-sm-12">
                        <select class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="post_status">
                            <option {{ old('post_status', $post->post_status) == '1' ? "selected" : "" }} value="1">Publish</option>
                            <option {{ old('post_status', $post->post_status) == '0' ? "selected" : "" }} value="0">Draft</option>
                        </select>
                    </div>
                    @error('post_status')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="col-sm-2 col-form-label">Thumbnail</label>
                    <div class="input-group">
                      @if ($post->thumbnail)
                        <button  id="btnimgpreview5" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalCenter5">
                          <i class="fas fa-fw fa-eye"></i> Image already
                        </button>
                        @endif
                      <div class="modal fade" id="modalCenter5" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Preview Image Navbar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <img class="img-preview5 img-fluid " src="{{ asset('/'.$post->thumbnail) }}">
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <input hidden name="old_thumbnail" type="text" value="{{ $post->thumbnail }}">
                      <input class="form-control @error('upload_thumbnail') is-invalid @enderror" type="file" id="upload_thumbnail" name="thumbnail" value=""  onchange="previewImage5()" onclick="return confirm('Image already exists, Are You Sure?')">
                      
                      @error('upload_thumbnail')
                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                          {{ $message}}
                      </div>
                      @enderror
                  </div>

                </div>
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">JUDUL</label>
                  <div class="col-sm-12">
                    <input
                        type="text"
                        class="form-control @error('post_title') is-invalid @enderror"
                        id="post_title"
                        placeholder="New Menu Parent"
                        name="post_title"
                        value="{{ old('post_title', $post->post_title) }}"
                        autofocus
                        required
                        autocomplete="off"
                    >
                    @error('post_title')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                  </div>

                </div>
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-name">Slug</label>
                  <div class="col-sm-12">
                    <input
                        type="text"
                        class="form-control @error('post_slug') is-invalid @enderror"
                        id="post_slug"
                        placeholder="Slug (AUTOMATIC)"
                        name="post_slug"
                        value="{{ old('post_slug', $post->post_slug) }}"
                        autofocus
                        required
                        autocomplete="off"
                        >

                    @error('post_slug')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                  </div>

                </div>
                <div class=" mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-default-company">Categories Menu</label>
                    <div class="col-sm-12">
                        <select class="form-control @error('categories') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="post_category">
                            @foreach ($category as $itemparent)
                                @if (old('pages_category', $post->post_category_id) == $itemparent->id)
                                    <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                @else
                                    <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('post_category')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-company">Articles</label>
                    <div class="col-sm-12">
                        <textarea class="ckeditor form-control " name="post_content" id="post_content" required>
                            {{ old('post_content', $post->post_content) }}
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
<script src="{{asset('js/ckeditor5/ckeditor.js')}}"></script>
<script>
      function previewImage5(){
        const image = document.querySelector('#upload_thumbnail')
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