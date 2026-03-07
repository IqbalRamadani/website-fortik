<nav x-data="{ mobileMenuOpen: false, isMobile: window.innerWidth < 768 }" @resize.window="isMobile = window.innerWidth < 768" class="bg-linear-to-br from-lkoamaru to-koamaru sticky w-full z-20 top-0 start-0 shadow-lg px-6 py-4">
    <div class="flex max-w-2xl md:max-w-3xl lg:max-w-6xl flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo-navbar.webp') }}" class="w-30 md:w-35" alt="Logo Fortik"/>
        </a>
        <div>
            <button @click.stop="mobileMenuOpen = !mobileMenuOpen" 
                    type="button" 
                    class="relative inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg cursor-pointer md:hidden hover:bg-supernova hover:text-koamaru transition-all duration-300" 
                    aria-controls="navbar-dropdown" 
                    :aria-expanded="mobileMenuOpen">
                <span class="sr-only">Open main menu</span>
                
                <div class="relative w-6 h-5">
                    <span class="absolute block h-0.5 w-6 bg-current transform transition duration-300 ease-in-out"
                        :class="mobileMenuOpen ? 'rotate-45 translate-y-2' : 'translate-y-0'"></span>
                    <span class="absolute block h-0.5 w-6 bg-current transform transition duration-300 ease-in-out top-2"
                        :class="mobileMenuOpen ? 'opacity-0' : 'opacity-100'"></span>
                    <span class="absolute block h-0.5 w-6 bg-current transform transition duration-300 ease-in-out top-4"
                        :class="mobileMenuOpen ? '-rotate-45 -translate-y-2' : 'translate-y-0'"></span>
                </div>
            </button>
        </div>

        <div 
            x-show="!isMobile || mobileMenuOpen"
            x-collapse
            @click.outside="mobileMenuOpen = false" 
            class="w-full md:!block md:w-auto md:!h-auto" 
            x-cloak>
            
            <ul class="flex flex-col font-semibold text-sm lg:text-base p-0 mt-4 bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-4 lg:mt-0 md:border-0">
                <li>
                    <x-nav-link href="/" :active="request()->is('/')">BERANDA</x-nav-link>
                </li>
                
                <li x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" 
                            class="flex items-center justify-between w-full py-2 px-3 rounded cursor-pointer text-white md:w-auto hover:text-supernova md:border-0 md:p-0 focus:outline-none transition-colors duration-200">
                        TENTANG
                        <svg :class="{'rotate-180': dropdownOpen}" 
                            class="w-4 h-4 ms-1.5 transition-transform duration-300" 
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" 
                        x-collapse
                        class="z-10 bg-linear-to-br from-lkoamaru to-koamaru border-none w-full md:w-60 md:absolute md:top-full md:mt-8 shadow-xl"
                        x-cloak>
                        <ul class="p-2 text-sm text-body font-medium">
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

                <li><x-nav-link href="/fornews" :active="request()->is('fornews')">FORNEWS</x-nav-link></li>
                <li><x-nav-link href="/galeri" :active="request()->is('galeri')">GALERI</x-nav-link></li>
                <li><x-nav-link href="/forsight" :active="request()->is('forsight')">FORSIGHT</x-nav-link></li>
                <li><x-nav-link href="/agenda" :active="request()->is('agenda')">AGENDA</x-nav-link></li>
                <li><x-nav-link href="/webinar" :active="request()->is('webinar')">WEBINAR</x-nav-link></li>
            </ul>
        </div>
    </div>
</nav>
