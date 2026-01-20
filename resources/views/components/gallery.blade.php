<div class="bg-white px-6 py-8 md:py-12 lg:py-16">
    <div class="w-full max-w-6xl mx-auto">
        <h2 class="mx-auto -mt-4 p-2 text-center text-3xl md:text-4xl lg:text-5xl font-bold text-koamaru mb-4 md:mb-6 lg:mb-8">Galeri</h2>
        <div class="flex justify-center w-full max-w-sm md:max-w-4xl lg:max-w-7xl">
            {{-- Swiper --}}
            <div class="swiper mySwiper w-full max-w-sm md:max-w-4xl lg:max-w-7xl mx-auto">
                <div class="swiper-wrapper">
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-volunteer-1.jpg') }}" class="w-full object-cover" />
                    </div>
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-pemilu-1.jpg') }}" class="w-full object-cover" />
                    </div>
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-opening-1.jpg') }}" class="w-full object-cover" />
                    </div>
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-mubes-1.jpg') }}" class="w-full object-cover" />
                    </div>
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-makrab-1.jpg') }}" class="w-full object-cover" />
                    </div>
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-libre-1.jpg') }}" class="w-full object-cover" />
                    </div>
                    <div class="swiper-slide relative">
                        <img src="{{ asset('images/g-mubes-2.jpg') }}" class="w-full object-cover" />
                    </div>
                </div>

                {{-- Swipper Arrow Button --}}
                <div class="swiper-button-prev !w-8 !h-8 md:!w-12 md:!h-12 lg:!w-14 lg:!h-14 bg-white/45 hover:bg-gray-900 !text-black hover:!text-white flex items-center justify-center transition-all duration-300 rounded-none !left-2 md:!left-4">
                    <span class="text-sm md:text-lg lg:text-xl font-bold">&lang;</span>
                </div>

                <div class="swiper-button-next !w-8 !h-8 md:!w-12 md:!h-12 lg:!w-14 lg:!h-14 bg-white/45 hover:bg-gray-900 !text-black hover:!text-white flex items-center justify-center transition-all duration-300 rounded-none !right-2 md:!right-4">
                    <span class="text-sm md:text-lg lg:text-xl font-bold">&rang;</span>
                </div>

                {{-- Swiper Pagination --}}
                <div class="swiper-pagination"></div>
            </div>
            {{-- End Swiper --}}
        </div>
    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true, 
            
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },

            speed: 800,
            slidesPerView: 1,
            spaceBetween: 0,

            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },

            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });
    </script>
</div>

