<nav class="bg-linear-to-br from-lkoamaru to-koamaru fixed w-full z-100 top-0 start-0 shadow-lg overflow-hidden px-6 py-4">
    <div class="flex max-w-2xl md:max-w-3xl lg:max-w-6xl flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo-navbar.png') }}" class="w-[93px] h-[30px] lg:w-[124px] lg:h-[40px]" alt="Logo Fortik" />
        </a>
        <div>
            {{-- Search deactivate --}}
            {{-- <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="lg:hidden text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm p-2.5 me-1">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
            <div class="relative hidden lg:block">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
            </div> --}}
            <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg cursor-pointer md:hidden hover:bg-supernova hover:text-koamaru" aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-semibold text-sm lg:text-base p-0 mt-4 bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <x-nav-link href="/" :active="request()->is('/')">BERANDA</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/about" :active="request()->is('about')">TENTANG</x-nav-link>
                </li>
                {{-- deactivate dropdown menu --}}
                {{-- <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Tentang <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sejarah</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Makna Lambang</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Visi, Misi & Tujuan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Kabinet</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Struktur Organisasi</a>
                            </li>
                            
                        </ul>
                    </div>
                </li> --}}
                <li>
                    <x-nav-link href="/post" :active="request()->is('post')">FORNEWS</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/gallery" :active="request()->is('gallery')">GALERI</x-nav-link>
                </li>
                <li>
                    <x-nav-link href="/bulletin" :active="request()->is('bulletin')">FORSIGHT</x-nav-link>
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
