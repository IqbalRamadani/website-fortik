<nav x-data="{ mobileMenuOpen: false }" class="bg-linear-to-br from-lkoamaru to-koamaru fixed w-full z-20 top-0 start-0 shadow-lg px-6 py-4">
    <div class="flex max-w-2xl md:max-w-3xl lg:max-w-6xl flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo-navbar.png') }}" class="w-[93px] h-[30px] lg:w-[124px] lg:h-[40px]" alt="Logo Fortik" />
        </a>
        <div>
            <button @click.stop="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg cursor-pointer md:hidden hover:bg-supernova hover:text-koamaru" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

        <div :class="{'hidden': !mobileMenuOpen, 'block': mobileMenuOpen}" @click.outside="mobileMenuOpen = false" class="hidden w-full md:block md:w-auto">
            <ul class="flex flex-col font-semibold text-sm lg:text-base p-0 mt-4 bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <x-nav-link href="/" :active="request()->is('/')">BERANDA</x-nav-link>
                </li>
                <li x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false" class="relative">
                    {{-- Tombol Trigger Dropdown --}}
                    <button @click="dropdownOpen = !dropdownOpen" 
                            class="flex items-center justify-between w-full py-2 px-3 rounded text-white md:w-auto hover:text-supernova md:border-0 md:p-0 focus:outline-none">
                        TENTANG
                        {{-- Ikon Chevron Dinamis --}}
                        <svg :class="{'rotate-180': dropdownOpen}" 
                            class="w-4 h-4 ms-1.5 transition-transform duration-200" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="dropdownOpen" x-transition.opacity.duration.200ms
                        class="z-10 bg-linear-to-br from-lkoamaru to-koamaru border-none w-full md:w-60 md:absolute md:top-full md:mt-8"
                        style="display: none;">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="nav-dropdown-trigger">
                            <li class="ml-2 md:mb-2">
                                <x-navdrop-link href="/sejarah" :active="request()->is('sejarah')">SEJARAH</x-navdrop-link>
                            </li>
                            <li class="ml-2 md:mb-2">
                                <x-navdrop-link href="/visi-misi-tujuan" :active="request()->is('visi-misi-tujuan')">VISI MISI DAN TUJUAN</x-navdrop-link>
                            </li>
                            <li class="ml-2 md:mb-2">
                                <x-navdrop-link href="/lambang" :active="request()->is('lambang')">LAMBANG</x-navdrop-link>
                            </li>
                            <li class="ml-2 md:mb-2">
                                <x-navdrop-link href="/struktur-organisasi" :active="request()->is('struktur-organisasi')">STRUKTUR ORGANISASI</x-navdrop-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <x-nav-link href="/fornews" :active="request()->is('fornews')">FORNEWS</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/galeri" :active="request()->is('galeri')">GALERI</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/forsight" :active="request()->is('forsight')">FORSIGHT</x-nav-link>
                </li>
                {{-- <li> 
                    <x-nav-link href="/announcement" :active="request()->is('announcement')">Pengumuman</x-nav-link>
                </li> deactivate announcement link --}} 
                {{-- <li>
                    <x-nav-link href="/contact" :active="request()->is('contact')">Kontak</x-nav-link>
                </li> deactivate contact link --}} 
            </ul>
        </div>
    </div>
</nav>
