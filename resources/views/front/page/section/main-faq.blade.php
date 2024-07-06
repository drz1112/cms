    @if (count($post_faq) > 0)
      <section id="faq" class="faq section">
          <div class="container section-title" data-aos="fade-up">
            <h2>F.A.Q</h2>
            <p><span>Pertanyaan</span> <span class="description-title"> yang Sering Diajukan</span></p>
          </div>
          <div class="container">
            <div class="row justify-content-center">
              @foreach ($post_faq as $item_faq)
                <div class="col-lg-10 py-1" data-aos="fade-up" data-aos-delay="100">
                  <div class="faq-container">
                    <div class="faq-item">
                      <h3>{{ $item_faq->faq_pertanyaan}}</h3>
                      <div class="faq-content">
                        <p>{{ $item_faq->faq_jawaban}}</p>
                      </div>
                      <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
      </section>
    @endif