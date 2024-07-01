@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <a href="{{ route('pages.index') }}"></a>
              <h5 class="card-title"> Edit Pages</h5>
              <div class="card-body">
                  <form method="POST" action="{{ route('pages.update', [$post->id, $post->pages_slug]) }}" enctype="multipart/form-data">
                      @method('put')
                      @csrf
                      <div class=" mb-3">
                        <label class="col-sm-2 col-form-label text-dark">Status Post
                          <i class="bx bx-help-circle "
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title=""
                              data-bs-original-title="Untuk Menampilkan Postingan di halaman User"
                              aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                        </label>
                          <div class="col-sm-12">
                              <select class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="pages_status">
                                  <option {{ old('pages_status', $post->pages_status) == '1' ? "selected" : "" }} value="1">Publish</option>
                                  <option {{ old('pages_status', $post->pages_status) == '0' ? "selected" : "" }} value="0">Draft</option>
                              </select>
                          </div>
                      </div>
                      <div class=" mb-3">
                        <label class="col-sm-2 col-form-label text-dark">Protect Page
                          <i class="bx bx-help-circle "
                              data-bs-toggle="tooltip"
                              data-bs-placement="top"
                              title=""
                              data-bs-original-title="Untuk Menampilkan Postingan di halaman User"
                              aria-label="Untuk Menampilkan Postingan di halaman User"></i>
                        </label>
                          <div class="col-sm-12">
                              <select class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="pages_protect">
                                  <option {{ old('pages_protect', $post->pages_protect) == '1' ? "selected" : "" }} value="1">Public</option>
                                  <option {{ old('pages_protect', $post->pages_protect) == '2' ? "selected" : "" }} value="2">Private</option>
                              </select>
                          </div>
                      </div>
                      <div class=" mb-3">
                        <label class="col-sm-2 col-form-label text-dark">Name Menu</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control @error('pages_title') is-invalid @enderror" id="pages_title" placeholder="New Menu Parent" name="pages_title" value="{{ old('pages_title', $post->pages_title) }}" autofocus required autocomplete="off">
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
                          <input type="text" class="form-control @error('pages_slug') is-invalid @enderror" id="pages_slug" placeholder="Slug (AUTOMATIC)" name="pages_slug" value="{{ old('pages_slug', $post->pages_slug) }}" autofocus required autocomplete="off">
      
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
                              <select class="form-control @error('pages_category') is-invalid @enderror" id="exampleFormControlSelect1" aria-label="Default select example" name="pages_category">
                                  @foreach ($category as $itemparent)
                                      @if (old('pages_category', $post->pages_category_id) == $itemparent->id)
                                          <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                      @else
                                          <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                      @endif
                                  @endforeach
                              </select>
                          </div>
                          @error('pages_category')
                              <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                  {{ $message}}
                              </div>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label class="col-sm-2 col-form-label text-dark">Articles</label>
                          <div class="col-sm-12">
                              <textarea class="ckeditor form-control @error('pages_content') is-invalid @enderror" id="post_content" name="pages_content" required>
                                {{ old('pages_content', $post->pages_content)}}
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