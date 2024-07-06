@extends('backend/layout.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tambah FAQ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('faq.store')}}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">FAQ Status</label>
                            <div class="col-sm-12">
                                <select class="form-control form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="faq_status">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                                @error('faq_status')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">FAQ Pertanyaan</label>
                            <div class="col-sm-12">
                                <input name="faq_pertanyaan" type="text" class="form-control @error('faq_pertanyaan') is-invalid @enderror" placeholder="Pernyaan yang sering di tanyakan" required>
                                @error('faq_pertanyaan')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-3">
                            <label class="col-sm-2 col-form-label text-dark">FAQ Jawaban</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="faq_jawaban" id="" rows="5" required></textarea>
                                @error('faq_jawaban')
                                    <div class="is-invalid" style="color: #b02a37; font-size: .875em;">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{route('faq.index')}}" class="btn btn-danger"> Cancel</a>
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection