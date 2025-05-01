<aside class="w-64 h-screen bg-white shadow-md fixed overflow-y-auto">
    <div class="text-center py-6 font-bold text-2xl border-b text-green-800">Walkot-Farm</div>
    <nav class="flex flex-col p-4 space-y-2">

        <!-- Dashboard -->
        <a href="{{ route('admin.home.dashboard') }}"
           class="flex items-center px-3 py-2 rounded transition-all duration-200
           {{ request()->routeIs('admin.home.dashboard') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="bi bi-grid-fill mr-2"></i> Dashboard
        </a>

        <!-- Dropdown Tanaman -->
        <div>
            <button onclick="toggleDropdown()" type="button"
                class="flex items-center justify-between w-full px-3 py-2 rounded transition-all duration-200
                {{ request()->routeIs('admin.tanaman.*') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-200' }}">
                <span class="flex items-center"><i class="bi bi-flower1 mr-2"></i> Tanaman</span>
                <i class="bi bi-chevron-down ml-2"></i>
            </button>

            <!-- Dropdown Menu: akan tetap terbuka jika route adalah admin.tanaman. -->
            <div id="dropdownTanaman"
                class="{{ request()->routeIs('admin.tanaman.*') ? 'flex' : 'hidden' }} flex-col mt-1 ml-4 space-y-1">
                <a href="{{ route('admin.tanaman.all') }}"
                class="flex items-center px-3 py-2 text-sm rounded transition-all duration-200
                {{ request()->routeIs('admin.tanaman.all') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="bi bi-flower1 mr-2"></i> Semua Tanaman
                </a>
                <a href="{{ route('admin.tanaman.list', ['kategori' => 'Produktif']) }}"
                class="flex items-center px-3 py-2 text-sm rounded transition-all duration-200
                {{ request()->fullUrlIs(route('admin.tanaman.list', ['kategori' => 'Produktif'])) ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="bi bi-tree-fill mr-2"></i> Produktif
                </a>
                <a href="{{ route('admin.tanaman.list', ['kategori' => 'Toga']) }}"
                class="flex items-center px-3 py-2 text-sm rounded transition-all duration-200
                {{ request()->fullUrlIs(route('admin.tanaman.list', ['kategori' => 'Toga'])) ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="bi bi-tree-fill mr-2"></i> Toga
                </a>
                <a href="{{ route('admin.tanaman.list', ['kategori' => 'Hias']) }}"
                class="flex items-center px-3 py-2 text-sm rounded transition-all duration-200
                {{ request()->fullUrlIs(route('admin.tanaman.list', ['kategori' => 'Hias'])) ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                    <i class="bi bi-tree-fill mr-2"></i> Hias
                </a>
            </div>
        </div>

        <!-- Berita -->
        <a href="{{ route('admin.berita.index') }}"
           class="flex items-center px-3 py-2 rounded transition-all duration-200
           {{ request()->routeIs('admin.berita.index') ? 'bg-green-100 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-200' }}">
            <i class="bi bi-newspaper mr-2"></i> Berita
        </a>
    </nav>
</aside>
