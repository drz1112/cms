@extends('backend/layout.template')
@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0" style="display: ruby;">
                            <form action="{{ route('settingboxs.updatedefault')}}" method="POST">
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
                            <form action="{{ route('settingboxs.update')}}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Judul box 1</label>
                                    <input class="form-control @error('judul_box_1') is-invalid @enderror" type="text" id="firstName" name="judul_box_1" value="{{ old('judul_box_1',$post_boxs->judul_box_1) }}" >
                                    @error('judul_box_1')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Deskripsi box 1</label>
                                    <textarea class="form-control @error('deskripsi_box_1') is-invalid @enderror" type="text" id="firstName" name="deskripsi_box_1" >{{old('deskripsi_box_1',$post_boxs->deskripsi_box_1)}}</textarea>
                                    @error('deskripsi_box_1')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Judul box 2</label>
                                    <input class="form-control @error('judul_box_2') is-invalid @enderror" type="text" id="firstName" name="judul_box_2" value="{{ old('judul_box_2',$post_boxs->judul_box_2) }}" >
                                    @error('judul_box_2')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Deskripsi box 2</label>
                                    <textarea class="form-control @error('deskripsi_box_2') is-invalid @enderror" type="text" id="firstName" name="deskripsi_box_2" >{{ old('deskripsi_box_2',$post_boxs->deskripsi_box_2)}}</textarea>
                                    @error('deskripsi_box_2')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Judul box 3</label>
                                    <input class="form-control @error('judul_box_3') is-invalid @enderror" type="text" id="firstName" name="judul_box_3" value="{{ old('judul_box_3',$post_boxs->judul_box_3) }}" >
                                    @error('judul_box_3')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Deskripsi box 3</label>
                                    <textarea class="form-control @error('deskripsi_box_3') is-invalid @enderror" type="text" id="firstName" name="deskripsi_box_3" >{{old('deskripsi_box_3',$post_boxs->deskripsi_box_3) }}</textarea>
                                    @error('deskripsi_box_3')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Judul box 4</label>
                                    <input class="form-control @error('judul_box_4') is-invalid @enderror" type="text" id="firstName" name="judul_box_4" value="{{ old('judul_box_4',$post_boxs->judul_box_4) }}" >
                                    @error('judul_box_4')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="firstName" class="form-label">Deskripsi box 4</label>
                                    <textarea class="form-control @error('deskripsi_box_4') is-invalid @enderror" type="text" id="firstName" name="deskripsi_box_4" >{{(old('deskripsi_box_4',$post_boxs->deskripsi_box_4))}}</textarea>
                                    @error('deskripsi_box_4')
                                        <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                            {{ $message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-1">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{($post_boxs->status_box_1 == '1' ? 'checked' : '') }} name="status_box_1">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Tampil Box 1</label>
                                        @error('status_box_1')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-1">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{($post_boxs->status_box_2 == '1' ? 'checked' : '') }} name="status_box_2">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Tampil Box 2</label>
                                        @error('status_box_2')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-1">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{($post_boxs->status_box_3 == '1' ? 'checked' : '') }} name="status_box_3">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Tampil Box 3</label>
                                        @error('status_box_3')
                                            <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-1">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{($post_boxs->status_box_4 == '1' ? 'checked' : '') }} name="status_box_4">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Tampil Box 4</label>
                                        @error('status_box_4')
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
@endsection