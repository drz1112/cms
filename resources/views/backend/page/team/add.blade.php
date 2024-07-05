@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah Team</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('team.store')}}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf

                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Nama</label>
                            <div class="col-sm-12">
                                <input name="team_Nama" type="text" class="form-control @error('team_Nama') is-invalid @enderror" placeholder="Input" required>
                                @error('team_Nama')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Jabatan</label>
                            <div class="col-sm-12">
                                <input name="team_Jabatan" type="text" class="form-control @error('team_Jabatan') is-invalid @enderror" placeholder="Input" required>
                                @error('team_Jabatan')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Twitter</label>
                            <div class="col-sm-12">
                                <input name="team_twitter_link" type="text" class="form-control @error('team_twitter_link') is-invalid @enderror" placeholder="https://x.com/" required>
                                @error('team_twitter_link')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Facebook</label>
                            <div class="col-sm-12">
                                <input name="team_facebook_link" type="text" class="form-control @error('team_facebook_link') is-invalid @enderror" placeholder="https://www.facebook.com/" required>
                                @error('team_facebook_link')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Instagram</label>
                            <div class="col-sm-12">
                                <input name="team_ig_link" type="text" class="form-control @error('team_ig_link') is-invalid @enderror" placeholder="https://www.instagram.com/" required>
                                @error('team_ig_link')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">Team Foto</label>
                            <div class="col-sm-12">
                                <input class="form-control @error('team_Foto') is-invalid @enderror" type="file" id="team_Foto" name="team_Foto" required>
                                <span style="color: #b02a37; font-size: .875em;">
                                    ukuran min-width=450 min-height=450, ukuran max: 2MB
                                </span>
                                @error('team_Foto')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{route('team.index')}}" class="btn btn-danger"> Cancel</a>
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection