@php
    $contacts = [
        [
            'label' => 'Ketua FORTIK', 
            'url' => 'https://wa.me/6285641194204'
        ],
        [
            'label' => 'Public Relation', 
            'url' => 'https://wa.me/6281212820632'
        ],
    ];

    $socials = [
        [
            'label' => 'Facebook', 
            'url' => 'https://www.facebook.com/share/1789XX9TtH/', 
            'icon' => 'fa-facebook-f'
        ],
        [
            'label' => 'Instagram', 
            'url' => 'https://www.instagram.com/fortik_stdiis?igsh=MTM2cnZ2Y3JvdmE1aQ==', 
            'icon' => 'fa-instagram'
        ],
        [
            'label' => 'Telegram', 
            'url' => 'https://t.me/kanalfortikstdiis', 
            'icon' => 'fa-telegram'
        ],
        [
            'label' => 'Youtube', 
            'url' => 'https://youtube.com/@fortik.stdiis?feature=shared', 
            'icon' => 'fa-youtube'
        ],
    ];
@endphp

<footer class="relative bottom-0 bg-linear-to-br from-lkoamaru to-koamaru px-6 py-8">
    <div class="mx-auto w-full max-w-6xl">
        {{-- TOP AREA --}}
        <div class="flex flex-col md:gap-10 md:flex-row md:justify-between mb-8">
            {{-- Logo --}}
            <div class="mb-8 md:mb-0"> 
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/logo-navbar.webp') }}" alt="Logo Fortik" class="w-48 lg:w-64" loading="lazy">
                </a> 
                <hr class="mt-8 border-gray-200 md:hidden">
            </div>

            {{-- Wrapper kategori --}}
            <div class="flex flex-col gap-10 sm:flex-row lg:gap-16">
                {{-- Narahubung --}}
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-white uppercase">
                        Narahubung
                    </h2>
                    <ul class="text-gray-200 font-medium space-y-2">
                        @foreach ($contacts as $contact)
                            <li>
                                <a href="{{ $contact['url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center gap-2 hover:text-supernova">
                                <i class="fa-brands fa-whatsapp"></i>
                                <span>{{ $contact['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Sekretariat --}}
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-white uppercase">
                        Sekretariat
                    </h2>
                    <ul class="text-gray-200 font-medium space-y-2 w-full max-w-64">
                        <li>Kampus STDI Imam Syafi'i Jember</li>
                        <li class="text-wrap ">
                            Jl. M.H. Thamrin Gg. Kepodang No.5,
                            Jember, Jawa Timur, Indonesia
                        </li>
                        <li>
                            <a href="https://maps.app.goo.gl/vYkj8RWJRFSfWZuSA"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="underline hover:text-supernova">
                            View On Map
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Social --}}
                <div>
                    <h2 class="mb-4 text-sm font-semibold text-white uppercase">
                        Follow Us
                    </h2>
                    <ul class="text-gray-200 font-medium space-y-2">
                        @foreach ($socials as $social)
                            <li>
                                <a href="{{ $social['url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center gap-2 hover:text-supernova">
                                <i class="fa-brands {{ $social['icon'] }}"></i>
                                <span>{{ $social['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{-- Divider --}}
        <hr class="mb-8 border-gray-200"/>
        {{-- Bottom --}}
        <div class="text-sm text-left md:text-center text-gray-200">
            © 2025 Developed by Arya Team.
            All Rights Reserved.
        </div>
    </div>
</footer>