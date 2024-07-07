@extends('front/layout.template')
@section('content')
@include('front/page/section.main-testimonial')
<div class="page-title aos-init aos-animate" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Berita</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('FrontHome.index')}}">Home</a></li>
          <li class="current">{{ Str::ucfirst($post->post_title)}}</li>
        </ol>
      </nav>
    </div>
</div>
<section id="service-details" class="service-details section">
    <div class="container">
        <div class="row gy-4">
        <div div class="col-lg-8 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
                <span>
                    <i class="bi bi-calendar3 author-artikel"></i> <strong>{{ date('d-M-Y', strtotime( $post->created_at));}}</strong> - <i class="bi bi-person-check author-artikel"></i> <strong>{{ $post->postauthor->name}}</strong>
                </span>
            </div>
            <div class="row p-1" style="text-align: center;">
                <h1 class="title-artikel"><strong>{{ Str::title($post->post_title)}}</strong></h1>
            </div>
            <div class="row" id="post_content">
                {!!  html_entity_decode($post->post_content) !!}
            </div>

            <div class="row">
                <div class="col-sm-6 d-none d-lg-block">
                    <div class="detailinfoakademik-paginate">
                        <p class="float-start">
                            @if (!empty($sebelumnya->post_slug))
                            <a href="{{ url($sebelumnya->post_slug.'/posts') }}">
                
                                <i class="bi bi-chevron-left"></i>
                            Sebelumnya
                            </a>
                            @endif
                        </p>
                    </div>
                </div>  
                <div class="col-sm-6 d-none d-lg-block">
                  <div class="detailinfoakademik-paginate">
                    <p class="float-end">
                      @if (!empty($selanjutnya->post_slug))
                          
                      <a href="{{ url($selanjutnya->post_slug.'/posts') }}">
                        Selanjutnya
                        <i class="bi bi-chevron-right"></i>
                      </a>
                      @endif
                    </p>
                  </div>
                </div>  
            </div>
            <div class="row">
            <div class="col-6 d-lg-none">
                <div class="detailinfoakademik-paginate">
                <p class="float-start">
                    @if (!empty($sebelumnya->post_slug))
                    <a href="{{ url($sebelumnya->post_slug. '/posts') }}">
                    <i class="bi bi-chevron-left"></i>
                    Sebelumnya
                    </a>
                    @endif
                </p>
                </div>
            </div>  
            <div class="col-6 d-lg-none">
                <div class="detailinfoakademik-paginate">
                <p class="float-end">
                    @if (!empty($selanjutnya->post_slug))
                    <a href="{{ url($selanjutnya->post_slug.'/posts') }}">
                    Selanjutnya
                    <i class="bi bi-chevron-right"></i>
                    </a>
                    @endif
                </p>
                </div>
                
            </div>  
            </div>
        </div>   
        <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mt-2">Berita Terbaru</h2>
            @foreach ($post_berita as $values_post_berita)
            <div class="row mt-2" style="border-radius: 10px !important; background-color: #f4f6f8 !important; padding:3%;">
            <div class="col-12">
                <div class="row g-4 align-items-center">
                <div class="col-2">
                    <div class="overflow-hidden rounded">
                        <img src="{{asset($values_post_berita->thumbnail)}}" class="img-zoomin img-fluid rounded w-100" alt="">
                    </div>
                </div>
                <div class="col-10">
                    <div class="features-content d-flex flex-column">
                    <h6 class="author-artikel">
                        <a href="{{ route('FrontHome.detailposts', [$values_post_berita->post_slug])}}">
                            <strong>
                                {{Str::title(Str::limit($values_post_berita->post_title,70))}}
                            </strong>
                        </a>
                    </h6>
                        <small>
                            <i class="bi bi-calendar3 author-artikel"> </i> <strong>{{ date('d-M-Y', strtotime( $values_post_berita->created_at));}}</strong> 
                            -
                            <i class="bi bi-person-check author-artikel"></i> <strong>{{ $values_post_berita->postauthor->name}}</strong>
                        </small>
                    </div>
                </div>
                </div>
            </div>
            </div>
            @endforeach
        </div>   
    </div>
    </div>
</section>
@include('front/page/section.main-clients')

<style src="{{ asset('js/ckeditor5/sample/styles.css')}}"></style>
<script src="{{ asset('js/ckeditor5/build/ckeditor.js') }}"></script>
<style>  
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {  
        border:0px !important;  
    } 
    .ck.ck-editor__editable.ck-blurred .ck-widget.ck-widget_selected, .ck.ck-editor__editable.ck-blurred .ck-widget.ck-widget_selected:hover {
    outline-color: rgb(0 0 0 / 0%);
    border: 0px !important;
    }
    .ck.ck-block-toolbar-button {
    transform: translateX( -10px );
    }
    .ck-editor {
         min-height: 500px;
    }
    .ck-widget__selection-handle {
        display: none;
         }
</style>
<script type="text/javascript">
    ClassicEditor
          .create( document.querySelector( '#post_content' ))
          .then( editor => {
            const toolbarElement = editor.ui.view.toolbar.element;
            toolbarElement.style.display = 'none';
                editor.enableReadOnlyMode("editor");
          })
         
</script>
@endsection
