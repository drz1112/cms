@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Kategori Menu</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Parent Menu</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{route('kategorimenu.store')}}" method="POST">
                            @method('post')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Parent Menu</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control @error('namaKate') is-invalid @enderror" name="namaKate" id="namaKate" value="{{ old('namaKate') }}" autofocus required autocomplete="off">
                                    @error('namaKate')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Slug</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug Menu Parent (AUTOMATIC)" name="slug"  value="{{ old('slug') }}" autofocus required autocomplete="off" readonly>
                                @error('slug')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Type</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select flex-grow-1" aria-label="Default select example" name="type_menu">
                                        <option value="page">Page</option>
                                        <option value="article">Article</option>
                                    </select>
                                    @error('type_menu')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Status</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select flex-grow-1" aria-label="Default select example" name="menustatus">
                                        <option value="1">Visible</option>
                                        <option value="0">Hide</option>
                                    </select>
                                    @error('menustatus')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 text-right">
                                    <a href="{{route('kategorimenu.index')}}" class="btn btn-danger"> Cancel</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Child Menu</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{route('kategorimenu.storechild')}}" method="POST">
                            @method('post')
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Parent Menu</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select flex-grow-1 @error('idparent') is-invalid @enderror" name="idparent">
                                        @foreach ($parent as $itemparent)
                                            <option value="{{ $itemparent->id }}">{{ $itemparent->namaKate }}</option>
                                        @endforeach
                                    </select>
                                    @error('idparent')
                                      <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                          {{ $message}}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Child Menu</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control @error('nameparentKate') is-invalid @enderror" id="nameparentKate"  placeholder="New Child Menu" name="nameparentKate" value="{{ old('nameparentKate') }}" autofocus required autocomplete="off">
                                  @error('nameparentKate')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                  @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Slug</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control @error('slug2') is-invalid @enderror"  id="slug2"  placeholder="Slug Menu Parent (AUTOMATIC)"  name="slug2" value="{{ old('slug2') }}" autofocus required autocomplete="off">
                                    @error('slug2')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Status</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select flex-grow-1" aria-label="Default select example" name="menustatus2">
                                        <option value="1">Visible</option>
                                        <option value="0">Hide</option>
                                    </select>
                                    @error('menustatus2')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 text-right">
                                    <a href="{{route('kategorimenu.index')}}" class="btn btn-danger"> Cancel</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    const namaKate = document.querySelector('#namaKate');
    const slug = document.querySelector('#slug');

    namaKate.addEventListener('change', function(){
      fetch("{{ route('kategorimenu.checkSlug')}}?namaKate=" + namaKate.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    })

    const nameparentKate = document.querySelector('#nameparentKate');
    const slug2 = document.querySelector('#slug2');
    nameparentKate.addEventListener('change', function(){
      fetch("{{ route('kategorimenu.checkSlug')}}?namaKate=" + nameparentKate.value)
      .then(response => response.json())
      .then(data => slug2.value = data.slug)
    })

  </script>
@endsection
