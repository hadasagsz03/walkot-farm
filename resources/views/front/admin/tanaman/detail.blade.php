@extends('front.admin.main')

@section('content')
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <!-- Gambar Tanaman -->
            <div class="md:w-5/12 w-full">
                <img src="{{ asset('storage/images/tanaman/'.$tanaman->gambar) }}"
                     alt="{{ $tanaman->nama_tanaman_indonesia }}"
                     class="rounded-2xl shadow-md w-full h-auto">
            </div>

            <!-- Informasi Tanaman -->
            <div class="md:w-7/12 w-full">
                <h2 class="text-3xl font-bold mb-2">{{ $tanaman->nama_tanaman_indonesia }}</h2>
                <p class="text-green-600 font-semibold mb-4 italic">{{ $tanaman->nama_tanaman_latin }}</p>
                <div class="prose max-w-full mb-6">
                    {!! $tanaman->keterangan !!}
                </div>

                <!-- Share & Navigasi -->
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-4">
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-gray-700">Share tanaman ini:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                            <i class="bi bi-facebook text-xl"></i>
                        </a>
                        <a href="https://twitter.com/share?url={{ Request::url() }}&text={{ $tanaman->nama_tanaman_indonesia }}" target="_blank" class="text-sky-500 hover:text-sky-700">
                            <i class="bi bi-twitter text-xl"></i>
                        </a>
                        <a href="whatsapp://send?text={{ Request::url() }}" target="_blank" class="text-green-500 hover:text-green-700">
                            <i class="bi bi-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Button & QR Code -->
                <div class="mt-6">
                    <button id="showQR" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg shadow transition duration-200">
                        Tampilkan QR Code
                    </button>
                    <div id="qrcode" class="hidden mt-4">
                        <img src="{{ asset('storage/images/qrcode/' .$tanaman->qrcode) }}"
                             alt="QR Code {{ $tanaman->nama_tanaman_indonesia }}"
                             class="w-40 h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.getElementById('showQR').addEventListener('click', function () {
        const qr = document.getElementById('qrcode');
        qr.classList.toggle('hidden');
    });
</script>
@endpush
