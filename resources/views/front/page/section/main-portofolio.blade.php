    @if (count($post_galeri) > 0)
      <section id="portfolio" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Galeri</h2>
          <p><span>Galeri&nbsp;</span> <span class="description-title">Kegiatan</span></p>
        </div>
        <div class="container">
          <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">  
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
              @foreach ($post_galeri as $item_galeri)           
                <div class="col-lg-3 col-md-6 portfolio-item isotope-item filter-app">
                  <img src="{{asset($item_galeri->galeri_gambar)}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>{{$item_galeri->galeri_title}}</h4>
                    <p>{{$item_galeri->galeri_deskripsi_singkat}}</p>
                    <a href="{{asset($item_galeri->galeri_gambar)}}" title="{{$item_galeri->galeri_title}} {{$item_galeri->galeri_deskripsi_singkat}}" data-gallery="portfolio-gallery-app" class="glightbox preview-link details-link"><i class="bi bi-zoom-in"></i></a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
    @endif