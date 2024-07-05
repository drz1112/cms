@if (count($post_team)>0)
    <section id="team" class="team section">
        <div class="container section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p><span>Team</span> <span class="description-title">Kami</span></p>
        </div>
        <div class="container">
          <div class="row gy-4">
            @foreach ($post_team as $item_team)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member">
                  <div class="member-img">
                    <img src="{{asset($item_team->team_Foto)}}" class="img-fluid" alt="">
                    <div class="social">
                      <a href="{{ $item_team->team_twitter_link }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                      <a href="{{ $item_team->team_facebook_link }}" target="_blank"><i class="bi bi-facebook"></i></a>
                      <a href="{{ $item_team->team_ig_link }}" target="_blank"><i class="bi bi-instagram"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>{{ $item_team->team_Nama }}</h4>
                    <span>{{ $item_team->team_Jabatan }}</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
    </section>
@endif
