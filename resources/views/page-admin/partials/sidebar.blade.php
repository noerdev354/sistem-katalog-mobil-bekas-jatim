<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <a href="{{ route('dashboard.index') }}" class="brand-link logo-switch">
        <img src="{{ asset('assets/data-katalog/logo/mobil88-logo-circle.png') }}" alt="Logo Mobil 88" class="brand-image-xl logo-xs" style="opacity: .8">
        <img src="{{ asset('assets/data-katalog/logo/mobil88-logo-circle.png') }}" alt="Logo Mobil 88" class="brand-image-xs logo-xl">
        <img src="{{ asset('assets/data-katalog/logo/mobil88-logo.png') }}" alt="Logo Large Mobil 88" class="brand-image-xs logo-xl" style="left: 72px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/page-admin/dist/img/user2-160x160.jpg') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            @php
                $user = Auth::user();
            @endphp
            <div class="info">
                <a href="#" class="d-block">{{ $user->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link
                        {{ setActive('dashboard/index') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('katalog.index') }}" class="nav-link
                        {{ setActive('katalog/index') }}">
                        <i class="nav-icon fas fa-solid fa-book"></i>
                        <p>
                            Data Katalog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sales.index') }}" class="nav-link
                        {{ setActive('sales/index') }}">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>
                            Data Sales
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('iklan.index') }}" class="nav-link
                        {{ setActive('iklan/index') }}">
                        <i class="nav-icon fas fa-regular fa-images"></i>
                        <p>
                            Data Iklan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pesan.index') }}" class="nav-link
                        {{ setActive('pesan/index') }}">
                        <i class="nav-icon fas fa-solid fa-inbox"></i>
                        <p>
                            Data Pesan
                        </p>
                    </a>
                </li>
                <li class="nav-header">Master Data</li>
                <li class="nav-item">
                    <a href="{{ route('master_data.merk.index') }}" class="nav-link
                        {{ setActive('master-data/merk/index') }}">
                        <i class="nav-icon fas fa-solid fa-tag"></i>
                        <p>
                            Merk
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('master_data.tipe.index') }}" class="nav-link
                        {{ setActive('master-data/tipe/index') }}">
                        <i class="nav-icon fas fa-solid fa-tags"></i>
                        <p>
                            Tipe
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
