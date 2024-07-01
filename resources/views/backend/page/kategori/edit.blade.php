@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Kategori Menu</h1>

    <div class="row mt-4">
        @if ($post->parentid === 0)
        <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Parent Menu</h5>
            <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
            <form action="{{ route('kategorimenu.update',[$post->id,$post->slug]) }}" method="POST">
                @method('put')
                @csrf
                <div class="row mt-4">
                <label class="col-sm-2 col-form-label text-dark">Name Menu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('namaKate') is-invalid @enderror" id="namaKate" placeholder="New Menu Parent" name="namaKate" value="{{ old('namaKate', $post->namaKate)}}">
                    @error('namaKate')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                </div>
                <div class="row mt-4">
                <label class="col-sm-2 col-form-label text-dark">Slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug Menu Parent (AUTOMATIC)" name="slug" value="{{ old('slug', $post->slug)}}">
                    @error('slug')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                </div>

                </div>
                <div class="row justify-content-end mt-4">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        <script>
        const namaKate = document.querySelector('#namaKate');
        const slug = document.querySelector('#slug');
        
        namaKate.addEventListener('change', function(){
            fetch("{{ route('kategorimenu.checkSlug')}}?namaKate=" + namaKate.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })        
        </script>
        @else
        <div class="col-lg-12">
            <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Menu Child</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('kategorimenu.update',[$post->id,$post->slug]) }}" method="POST">
                @method('put')
                    @csrf
                    <div class="row mt-4">
                        <label class="col-sm-2 col-form-label text-dark">Parent Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="idparent">
                                @foreach ($parent as $itemparent)
                                    @if (old('idparent', $post->parentid) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="row mt-4">
                    <label class="col-sm-2 col-form-label text-dark">Child Menu</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control @error('nameparentKate') is-invalid @enderror" id="nameparentKate" placeholder="New Child Menu" name="nameparentKate" value="{{ old('nameparentKate', $post->namaKate)}}">
                    @error('nameparentKate')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                    </div>

                </div>
                <div class="row mt-4">
                    <label class="col-sm-2 col-form-label text-dark">Slug</label>
                    <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control @error('slug2') is-invalid @enderror"
                        id="slug2"
                        placeholder="Slug Menu Parent (AUTOMATIC)"
                        name="slug2"
                        value="{{ old('slug2', $post->slug)}}"
                        >

                    @error('slug2')
                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                            {{ $message}}
                        </div>
                    @enderror
                    </div>

                </div>
                <div class="row justify-content-end mt-4">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        <script>
        const nameparentKate = document.querySelector('#nameparentKate');
        const slug2 = document.querySelector('#slug2');
        nameparentKate.addEventListener('change', function(){
            fetch("{{ route('kategorimenu.checkSlug')}}?namaKate=" + nameparentKate.value)
            .then(response => response.json())
            .then(data => slug2.value = data.slug)
        })
        </script>
        @endif
    </div>

</div>
@endsection
