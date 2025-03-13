<section class="wf100 p80 team">
    <div class="team-details">
       <div class="container">
          <div class="row">
             <div class="col-md-5 wow fadeInLeft">
                <div class="team-large-img"> <img src="{{ asset('storage/images/tanaman/'.$tanaman->gambar) }}" alt=""><br> </div>
             </div>
             <div class="col-md-7">
                <div class="team-details-txt">
                   <h2 class="wow fadeInDown">{{ $tanaman->nama_tanaman_indonesia }}</h2>
                   <strong class="trank wow fadeInDown">{{ $tanaman->nama_tanaman_latin }}</strong>
                   <p class="wow fadeIn">{!! $tanaman->keterangan !!}</p>
                   <div class="share-post wf100">
                      <div class="sosmed wow zoomIn">
                         <strong>Share tanaman ini:</strong>
                         <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="fb"><i class="fab fa-facebook-f"></i></a>
                         <a target="_blank" href="https://twitter.com/share?url={{ Request::url() }}&text={{ $tanaman->nama_tanaman_indonesia }}" class="tw"><i class="fab fa-twitter"></i></a>
                         <a target="_blank" href="whatsapp://send?text={{ Request::url() }}" class="wa"><i class="fab fa-whatsapp"></i></a>
                      </div>
                      <div class="panah wow zoomIn">
                         @if($paging_tanaman['previous'])
                         <a href="{{ $paging_tanaman['previous'] }}" class="arrow"><i class="fas fa-chevron-left"></i></a>
                         @endif
                         @if($paging_tanaman['next'])
                         <a href="{{ $paging_tanaman['next'] }}" class="arrow"><i class="fas fa-chevron-right"></i></a>
                         @endif
                      </div>
                   </div>


                   <a data-toggle="collapse" href="#qrcode" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn contact-team mr-5 wow fadeIn">Tampilkan QR Code</a>
                   <br></br>

                   <div class="collapse mb-3" id="qrcode">
                      <div class="card" style="width: 13rem;" card-body>
                            <img src="{{ asset('storage/images/qrcode/' .$tanaman->qrcode) }}" alt="gambar barcode tanaman">
                      </div>
                   </div>

                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
