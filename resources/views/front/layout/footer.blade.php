<footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="{{route('FrontHome.index')}}" class="d-flex align-items-center">
            <img src="{{asset('/'.$settingweb->site_Image_footer)}}" style="max-width: 70%;" class="img img-fluid">
          </a>
          <div class="footer-contact pt-3">
            <p>{{ $settingweb->site_contact_address }}</p>
            <p class="mt-3"><strong>Phone:</strong> <span> {{ $settingweb->site_contact_wa }}</span></p>
            <p><strong>Email:</strong> <span>{{ $settingweb->site_contact_email }}</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_1_1->slug) }}">{{ $settinglayout->child_kategori_1_1->namaKate}}</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_1_2->slug) }}">{{ $settinglayout->child_kategori_1_2->namaKate}}</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_1_3->slug) }}">{{ $settinglayout->child_kategori_1_3->namaKate}}</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_1_4->slug) }}">{{ $settinglayout->child_kategori_1_4->namaKate}}</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_2_1->slug) }}">{{ $settinglayout->child_kategori_2_1->namaKate}}</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_2_2->slug) }}">{{ $settinglayout->child_kategori_2_2->namaKate}}</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_2_3->slug) }}">{{ $settinglayout->child_kategori_2_3->namaKate}}</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('FrontHome.single', $settinglayout->child_kategori_2_4->slug) }}">{{ $settinglayout->child_kategori_2_4->namaKate}}</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Social Media Official</p>
          <div class="social-links d-flex">
            <a href="{{ $settingweb->site_twitter }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $settingweb->site_facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="{{ $settingweb->site_instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{{ $settingweb->site_youtube }}" class="youtube"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Teknologi Informasi </strong> <span>UMKLA</span></p>
      <div class="credits">
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>