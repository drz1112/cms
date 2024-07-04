    <!-- Clients Section -->
    <section id="clients" class="clients section">

        <div class="container">
  
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "spaceBetween": 40
                  },
                  "480": {
                    "slidesPerView": 3,
                    "spaceBetween": 60
                  },
                  "640": {
                    "slidesPerView": 4,
                    "spaceBetween": 80
                  },
                  "992": {
                    "slidesPerView": 6,
                    "spaceBetween": 120
                  }
                }
              }
            </script>
            <div class="swiper-wrapper align-items-center">
              @foreach ($settingclients as $item)
                  <div class="swiper-slide">
                    <a href="{{$item->clients_link}}" target="_blank">
                      <img src="{{asset($item->clients_logos)}}" class="img-fluid" alt="">
                    </a>
                  </div>
              @endforeach
              
            </div>
          </div>
  
        </div>
  
      </section><!-- /Clients Section -->