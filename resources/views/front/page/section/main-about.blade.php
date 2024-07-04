    <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Profil</h2>
        <p><span>Profil Singkat</span> <span class="description-title">{{ $post_profilsingkat->profilsingkat_title }}</span></p>
      </div>
      <div class="container">
        <div class="row gy-3">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <img src="{{asset($post_profilsingkat->profilsingkat_gambar)}}" alt="" class="img-fluid">
          </div>
          <div class="col-lg-8 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
              <h2>{{ $post_profilsingkat->profilsingkat_subtitle }}</h2>
              <p>
                {!!$post_profilsingkat->profilsingkat_description!!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->