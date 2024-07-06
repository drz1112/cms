@extends('front/layout.template')
@section('content')
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
                    <i class="bi bi-calendar3"></i> {{ date('d-M-Y', strtotime( $post->created_at));}} - <i class="bi bi-person-check"></i> {{ $post->postauthor->name}}
                </span>
            </div>
            <div class="row p-1" style="text-align: center;">
                <h1>{{ Str::title($post->post_title)}}</h1>
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
                
                                <i class="fas fa-arrow-left fa-fw"></i>
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
            <div class="services-list">
              <a href="#" class="active">Web Design</a>
              <a href="#">Software Development</a>
              <a href="#">Product Management</a>
              <a href="#">Graphic Design</a>
              <a href="#">Marketing</a>
            </div>

            <h4>Enim qui eos rerum in delectus</h4>
            <p>Nam voluptatem quasi numquam quas fugiat ex temporibus quo est. Quia aut quam quod facere ut non occaecati ut aut. Nesciunt mollitia illum tempore corrupti sed eum reiciendis. Maxime modi rerum.</p>
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
