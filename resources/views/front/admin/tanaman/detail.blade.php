@extends('front.admin.header')

@section('content')
<section class="wf100 p80 team">
    <div class="team-details">
        <div class="container">
            <div class="row align-items-center">
                <!-- Gambar Tanaman -->
                <div class="col-md-5">
                    <div class="team-large-img">
                        <img src="{{ asset('storage/images/tanaman/'.$tanaman->gambar) }}" alt="{{ $tanaman->nama_tanaman_indonesia }}" class="img-fluid rounded shadow">
                    </div>
                </div>

                <!-- Informasi Tanaman -->
                <div class="col-md-7">
                    <div class="team-details-txt">
                        <h2>{{ $tanaman->nama_tanaman_indonesia }}</h2>
                        <strong class="text-success">{{ $tanaman->nama_tanaman_latin }}</strong>
                        <p>{!! $tanaman->keterangan !!}</p>

                        <!-- Share & Navigasi -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="sosmed">
                                <strong>Share tanaman ini:</strong>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" class="fb">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a target="_blank" href="https://twitter.com/share?url={{ Request::url() }}&text={{ $tanaman->nama_tanaman_indonesia }}" class="tw">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a target="_blank" href="whatsapp://send?text={{ Request::url() }}" class="wa">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Tombol & QR Code dalam satu container -->
                        <div class="qr-container mt-4">
                            <!-- Tombol Tampilkan QR Code -->
                            <button id="showQR" class="btn btn-success btn-lg shadow-sm">
                                Tampilkan QR Code
                            </button>

                            <!-- QR Code tanpa card -->
                            <div class="collapse mt-3" id="qrcode">
                                <img src="{{ asset('storage/images/qrcode/' .$tanaman->qrcode) }}"
                                    alt="QR Code {{ $tanaman->nama_tanaman_indonesia }}"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $("#showQR").click(function(){
            $("#qrcode").slideToggle(); // Efek muncul/hilang dengan animasi
        });
    });
</script>
@endpush
