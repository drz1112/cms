  @if (count($post_berita) > 0)
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
          <h2>{{Str::title($post_url_infopage->namaKate)}}</h2>
          
          <p><span>{{Str::title($post_url_infopage->namaKate)}}</span> <span class="description-title">Terbaru</span></p>
        </div>
        <div class="container">
          <div class="row g-4">
            @foreach ($post_berita as $item)
            <div class="col-lg-3 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
              <div class="case-item position-relative overflow-hidden rounded mb-2">
                  <div style="width: 300px; height:300px">
                    <img class="img-fluid" src="{{asset($item->thumbnail)}}" alt="" style="max-width: 100%; max-height:100%">
                  </div>
                  <a class="case-overlay text-decoration-none" href="{{ route('FrontHome.detailposts', [$item->post_slug])}}">
                      <small>{{ date('d F Y', strtotime($item->created_at)) }}</small>
                      <span class="lh-base text-white mb-3">{{$item->post_title}}</span>
                      <span class="btn btn-square btn-primary"><i class="bi bi-arrow-right"></i></span>
                  </a>
              </div>
            </div>
            @endforeach
            <div class="col-lg-12 text-center">
              <span>
                @if (!is_null($post_url_infopage))
                  <a href="{{ url($post_url_infopage->slug) }}">
                  Lihat Info Lainnya <i class="bi bi-arrow-right"></i> 
                  </a>
                @endif
              </span>
            </div>
          </div>
        </div>
        </div>
    </section>
  @endif