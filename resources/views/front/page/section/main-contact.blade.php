    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Kontak</h2>
          <p><span>Butuh Bantuan?</span> <span class="description-title">Hubungi Kami</span></p>
        </div><!-- End Section Title -->
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <div class="col-lg-12">
              <div class="info-wrap">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                        <h3>Alamat</h3>
                        <p>{{ $settingweb->site_contact_address}}</p>
                      </div>
                    </div><!-- End Info Item -->
                    
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                      <i class="bi bi-telephone flex-shrink-0"></i>
                      <div>
                        <h3>Kontak</h3>
                        <p>{{ $settingweb->site_contact_wa}} <br> {{ $settingweb->site_contact_tlp }}</p>
                      </div>
                    </div><!-- End Info Item -->
      
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                        <h3>Email</h3>
                        <p>{{ $settingweb->site_contact_email }}</p>
                      </div>
                    </div><!-- End Info Item -->
                  </div>
                  <div class="col-lg-7">
                    <iframe src="{{ $settingweb->site_maps }}" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>
              </div>
            </div>
  
            
          </div>
  
        </div>
  
      </section><!-- /Contact Section -->