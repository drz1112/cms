@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="display: ruby;">
                        <form action="{{ route('settinglayout.updatedefault')}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda kembali reset setting website?')">
                                <i class="fas fa-fw fa-recycle"></i> Reset
                            </button>
                        </form>
                        Setting Layout</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('settinglayout.update')}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <h2 class="card-title mb-0">Aktifasi Section</h2>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_1_activation') is-invalid @enderror" type="checkbox"  name="section_1_activation"  {{($settinglayout->section_1_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 1</span>
                                </label>
                                @error('section_1_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_2_activation') is-invalid @enderror" type="checkbox" name="section_2_activation"  {{($settinglayout->section_2_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 2</span>
                                </label>
                                @error('section_2_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_3_activation') is-invalid @enderror" type="checkbox" name="section_3_activation"  {{($settinglayout->section_3_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 3</span>
                                </label>
                                @error('section_3_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_4_activation') is-invalid @enderror" type="checkbox" name="section_4_activation"  {{($settinglayout->section_4_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 4</span>
                                </label>
                                @error('section_4_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_5_activation') is-invalid @enderror" type="checkbox" name="section_5_activation"  {{($settinglayout->section_5_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 5</span>
                                </label>
                                @error('section_5_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_6_activation') is-invalid @enderror" type="checkbox" name="section_6_activation"  {{($settinglayout->section_6_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 6</span>
                                </label>
                                @error('section_6_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_7_activation') is-invalid @enderror" type="checkbox" name="section_7_activation"  {{($settinglayout->section_7_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 7</span>
                                </label>
                                @error('section_7_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('section_8_activation') is-invalid @enderror" type="checkbox" name="section_8_activation"  {{($settinglayout->section_8_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Section 8</span>
                                </label>
                                @error('section_8_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('banner_2_activation') is-invalid @enderror" type="checkbox" name="banner_2_activation"  {{($settinglayout->banner_2_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Banner 2</span>
                                </label>
                                @error('banner_2_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('link_footer_1_activation') is-invalid @enderror" type="checkbox" name="link_footer_1_activation"  {{($settinglayout->link_footer_1_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Usefull Link</span>
                                </label>
                                @error('link_footer_1_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input @error('link_footer_2_activation') is-invalid @enderror" type="checkbox" name="link_footer_2_activation"  {{($settinglayout->link_footer_2_activation == '1' ? 'checked' : '') }}>
                                    <span class="form-check-label">Our Service</span>
                                </label>
                                @error('link_footer_2_activation')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Section 4</label>
                            <select name="section_4_setID" class="form-select">
                                @foreach ($categories as $itemparent)
                                    @if (old('section_4_setID', $settinglayout->section_4_setID) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" >Useful Links </label>
                            <select name="link_footer_1_1" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_1_1', $settinglayout->link_footer_1_1) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="link_footer_1_2" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_1_2', $settinglayout->link_footer_1_2) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="link_footer_1_3" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_1_3', $settinglayout->link_footer_1_3) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="link_footer_1_4" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_1_4', $settinglayout->link_footer_1_4) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" >Useful Links </label>
                            <select name="link_footer_2_1" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_2_1', $settinglayout->link_footer_2_1) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="link_footer_2_2" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_2_2', $settinglayout->link_footer_2_2) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="link_footer_2_3" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_2_3', $settinglayout->link_footer_2_3) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="link_footer_2_4" class="form-select mb-1">
                                @foreach ($categories_usefull_link as $itemparent)
                                    @if (old('link_footer_2_4', $settinglayout->link_footer_2_4) == $itemparent->id)
                                        <option value="{{ $itemparent->id}}" selected>{{ $itemparent->namaKate }}</option>
                                    @else
                                        <option value="{{ $itemparent->id}}" >{{ $itemparent->namaKate }}</option>
                                    @endif
                                @endforeach
                            </select>
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
@endsection