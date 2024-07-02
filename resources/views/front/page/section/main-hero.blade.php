<!-- Hero Section -->
<section id="hero" class="hero section" style="background-image: url('{{asset('/'.$settingbannerfront->image_banner_1)}}');">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
          <h1 style="color: {{$settingbannerfront->text_1_color}}">{{ $settingbannerfront->text_1}} 
            <span style="color: {{$settingbannerfront->text_2_color}}">{{ $settingbannerfront->text_2}}</span>
          </h1>
          <h2 style="color:{{ $settingbannerfront->text_3_color}}">{{ $settingbannerfront->text_3}}</h2>
          <div class="d-flex">
            <a href="https://api.whatsapp.com/send/?phone={{$settingbannerfront->hubungi_kami}}&amp;text=Assalamualaikum Warahmatullahi Wabarakatuh, Admin Prodi TI" target="_blank" class="btn-get-started" >Hubungi Kami</a>
            <a href="{{$settingbannerfront->link_video}}" class="glightbox btn-watch-video d-flex align-items-center" style="color: {{$settingbannerfront->text_link_video_color}}">
              <i class="bi bi-play-circle" style="color: {{$settingbannerfront->text_link_video_color}}"></i>
              <span>{{$settingbannerfront->text_link_video}}</span>
            </a>
          </div>
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->