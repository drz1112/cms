@php
  $cek =  $settingboxs->status_box_1 + $settingboxs->status_box_2 + $settingboxs->status_box_3 + $settingboxs->status_box_4;
@endphp
@if ($cek > 0)
    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
      <div class="container">
        <div class="row gy-4">
          
          @if ($settingboxs->status_box_1 == '1')
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100" style="margin: auto">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-activity icon"></i></div>
                <h4><a href="{{route('FrontHome.index')}}" class="stretched-link">{{$settingboxs->judul_box_1}}</a></h4>
                <p>{{$settingboxs->deskripsi_box_1}}</p>
              </div>
            </div><!-- End Service Item -->
          @endif
          @if ($settingboxs->status_box_2 == '1')
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200" style="margin: auto">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                <h4><a href="{{route('FrontHome.index')}}" class="stretched-link">{{$settingboxs->judul_box_2}}</a></h4>
                <p>{{$settingboxs->deskripsi_box_2}}</p>
              </div>
            </div><!-- End Service Item -->
          @endif
          @if ($settingboxs->status_box_3 == '1')
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300" style="margin: auto">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                <h4><a href="{{route('FrontHome.index')}}" class="stretched-link">{{$settingboxs->judul_box_3}}</a></h4>
                <p>{{$settingboxs->deskripsi_box_3}}</p>
              </div>
            </div><!-- End Service Item -->
          @endif
          @if ($settingboxs->status_box_4 == '1')
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400" style="margin: auto">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                <h4><a href="{{route('FrontHome.index')}}" class="stretched-link">{{$settingboxs->judul_box_4}}</a></h4>
                <p>{{$settingboxs->deskripsi_box_4}}</p>
              </div>
            </div><!-- End Service Item -->
          @endif
        </div>
      </div>
    </section><!-- /Featured Services Section -->
@endif  