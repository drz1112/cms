@extends('front/layout.template')
@section('content')
<div class="page-title aos-init aos-animate" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">{{Str::title($getKategori)}}</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('FrontHome.index')}}">Home</a></li>
          <li class="current">{{Str::title($getKategori)}}</li>
        </ol>
      </nav>
    </div>
</div>
<section id="starter-section" class="starter-section section">
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
      <h2>{{Str::title($getKategori)}}</h2>
      <p><span>Arsip</span> <span class="description-title">{{Str::title($getKategori)}}</span></p>
    </div>
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row">
        @foreach ($post as $keys => $item)
            <div class="col-sm-2 col-md-2 text-center py-1">
                <a href="{{ route('FrontHome.detailposts', [$item->post_slug])}}">
                    <img src="{{ $item->thumbnail}}" style="width: 180px; height:180px; " class="mx-auto d-block center-block img-responsive">
                </a>
            </div>
            <div class="col-sm-10 col-md-10 text-left py-1">
                <a href="{{ route('FrontHome.detailposts', [$item->post_slug])}}">
                    <h4 class="title-artikel">
                        <i class="bi bi-arrow-right-circle"></i>&nbsp&nbsp
                        <strong>{{ Str::title($item->post_title)}}</strong>
                    </h4> 
                </a>
                <br>    
                <small>
                    <i class="bi bi-person-circle author-artikel"></i> <strong> {{ $item->postauthor->name}}</strong> &nbsp&nbsp
                    <i class="bi bi-calendar-week author-artikel"></i> <strong> {{ date('d F Y', strtotime($item->created_at)) }}</strong>
                </small>
                <p>{{ $item->post_excerpt}}</p>
            </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
        <div class="single-article-pagination">
            {{ $post->render("pagination::bootstrap-4") }}
        </div>
    </div>
    </div>
</section>

@include('front/page/section.main-clients')
@endsection