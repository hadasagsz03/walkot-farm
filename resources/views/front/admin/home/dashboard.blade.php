@extends('front.admin.main')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-white p-6 shadow rounded-lg flex items-center space-x-4">
        <i class="bi bi-tree-fill text-green-700 text-3xl"></i>
        <div>
            <h2 class="text-xl font-bold">{{ $totalProduktif }}</h2>
            <p class="text-gray-500">Tanaman Produktif</p>
        </div>
    </div>
    <div class="bg-white p-6 shadow rounded-lg flex items-center space-x-4">
        <i class="bi bi-tree-fill text-green-700 text-3xl"></i>
        <div>
            <h2 class="text-xl font-bold">{{ $totalToga }}</h2>
            <p class="text-gray-500">Tanaman Toga</p>
        </div>
    </div>
    <div class="bg-white p-6 shadow rounded-lg flex items-center space-x-4">
        <i class="bi bi-tree-fill text-green-700 text-3xl"></i>
        <div>
            <h2 class="text-xl font-bold">{{ $totalHias }}</h2>
            <p class="text-gray-500">Tanaman Hias</p>
        </div>
    </div>
</div>

<!-- Fitur Search -->
<div class="mb-6">
    <form action="{{ route('admin.home.cari') }}" method="GET" class="flex items-center gap-3 w-full">
        <div class="relative flex-grow">
            <span class="absolute left-3 top-2.5 text-blue-500">
                <i class="bi bi-search"></i>
            </span>
            <input
                type="text"
                name="q"
                class="pl-10 pr-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition text-sm"
                placeholder="Cari nama tanaman (Indonesia atau Latin)..."
                required
            >
        </div>
        <button type="submit" class="btn btn-success flex items-center gap-1">
            <i class="bi bi-search"></i> Cari
        </button>
    </form>
</div>

<!-- Pie Chart -->
@php
    $totalAll = $totalProduktif + $totalToga + $totalHias;
    $percentProduktif = $totalAll > 0 ? round(($totalProduktif / $totalAll) * 100) : 0;
    $percentToga = $totalAll > 0 ? round(($totalToga / $totalAll) * 100) : 0;
    $percentHias = $totalAll > 0 ? round(($totalHias / $totalAll) * 100) : 0;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Tanaman Statistics</h2>

        <div class="flex justify-center mb-6">
            <canvas id="pieChart" width="300" height="300"></canvas>
        </div>

        <div class="mb-4">
            <p class="font-semibold text-sm">Produktif: <span class="float-right">{{ $percentProduktif }}%</span></p>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                <div class="bg-green-500 h-4 rounded-full" style="width: {{ $percentProduktif }}%"></div>
            </div>
        </div>

        <div class="mb-4">
            <p class="font-semibold text-sm">Toga: <span class="float-right">{{ $percentToga }}%</span></p>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                <div class="bg-yellow-500 h-4 rounded-full" style="width: {{ $percentToga }}%"></div>
            </div>
        </div>

        <div class="mb-4">
            <p class="font-semibold text-sm">Hias: <span class="float-right">{{ $percentHias }}%</span></p>
            <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $percentHias }}%"></div>
            </div>
        </div>

        <p class="text-xs text-gray-500 italic">Dihitung berdasarkan total {{ $totalAll }} tanaman terdaftar.</p>
    </div>

    <!-- Galeri Mini -->
    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-lg font-semibold mb-4">Galeri Mini Tanaman</h2>

        @if($tanamans && $tanamans->count() > 0)
            <div class="relative w-full h-70 overflow-hidden"> <div class="flex transition-transform duration-1000" id="slider">
                    @foreach($tanamans as $tanaman)
                        <div class="flex-shrink-0 w-64 h-full mx-2">
                            <img
                                src="{{ asset('storage/images/tanaman/' . $tanaman->gambar) }}"
                                alt="{{ $tanaman->nama_tanaman_indonesia }}"
                                class="w-full h-full object-fit rounded-lg shadow-md" >
                            <p class="text-xs text-center mt-1">{{ $tanaman->nama_tanaman_indonesia }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-gray-400 italic">Belum ada gambar tanaman tersedia.</p>
        @endif
    </div>
</div>

<script>
    const ctx = document.getElementById('pieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Produktif', 'Toga', 'Hias'],
                datasets: [{
                    label: 'Distribusi Tanaman',
                    data: [{{ $totalProduktif }}, {{ $totalToga }}, {{ $totalHias }}],
                    backgroundColor: [
                        'rgba(34, 197, 94, 0.7)',    // Green
                        'rgba(234, 179, 8, 0.7)',    // Yellow
                        'rgba(59, 130, 246, 0.7)'    // Blue
                    ],
                    borderColor: [
                        'rgba(34, 197, 94, 1)',
                        'rgba(234, 179, 8, 1)',
                        'rgba(59, 130, 246, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
    });

    document.addEventListener("DOMContentLoaded", function () {
        const slider = document.getElementById("slider");
        const slides = document.querySelectorAll("#slider > div");
        let currentIndex = 0;
        const totalSlides = slides.length;
        let slideCount = 0;

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSliderPosition();
        }

        function updateSliderPosition() {
            const offset = -currentIndex * 100;
            slider.style.transform = `translateX(${offset}%)`;
        }

        // Menggunakan setInterval untuk loop setelah 5 kali slide
        let interval = setInterval(function() {
            if (slideCount < 4) {
                showNextSlide();
                slideCount++;
            } else {
                clearInterval(interval);
                // Reset slideCount dan currentIndex untuk loop kembali
                slideCount = 0;
                currentIndex = 0;
                updateSliderPosition();
                // Mulai loop kembali setelah 3 detik
                interval = setInterval(arguments.callee, 3000);
            }
        }, 3000);
    });
</script>

@endsection
