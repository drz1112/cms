@extends('front/layout.template')
@section('content')
<div class="page-title aos-init aos-animate" data-aos="fade">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">{{Str::title($post->pages_title)}}</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{route('FrontHome.index')}}">Home</a></li>
          <li class="current">{{Str::title($post->pages_title)}}</li>
        </ol>
      </nav>
    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <h1 class="text-center mt-5">{{Str::title($post->pages_title)}}</h1>
        <div id="post_content">
            {!!  html_entity_decode($post->pages_content) !!}
        </div>
    </div>
</div>

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
         min-height: 700px;
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