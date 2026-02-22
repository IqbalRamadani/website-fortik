<div class="bg-white px-6 py-8 md:py-12 lg:py-16">
    <div class="w-full max-w-6xl mx-auto">
        <h2 class="mx-auto -mt-4 p-2 text-center text-3xl md:text-4xl lg:text-5xl font-bold text-koamaru mb-4 md:mb-6 lg:mb-8">Galeri</h2>
        <div class="flex justify-center w-full max-w-sm md:max-w-4xl lg:max-w-7xl">
            {{-- 1. Jadikan container ini sebagai komponen Alpine --}}
            <div x-data="{
                    swiper: null,
                    initSwiper() {
                        this.swiper = new Swiper(this.$refs.container, {
                            loop: true,
                            autoplay: {
                                delay: 3000,
                                disableOnInteraction: false,
                            },
                            speed: 800,
                            slidesPerView: 1,
                            spaceBetween: 0,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                        });
                    }
                }" 
                x-init="initSwiper()" 
                class="w-full relative">
                
                {{-- 2. Gunakan x-ref sebagai ganti class selector '.mySwiper' --}}
                <div x-ref="container" class="swiper w-full max-w-sm md:max-w-4xl lg:max-w-7xl mx-auto">
                    
                    {{-- Wrapper dari Swiper --}}
                    <div class="swiper-wrapper">
                        @forelse($sliderPhotos as $photo)
                            <div class="swiper-slide relative">
                                <img 
                                    src="{{ asset('storage/' . $photo->image_path) }}" 
                                    loading="lazy" 
                                    class="w-full h-full object-cover aspect-[4/3] md:aspect-video" 
                                    alt="Highlight Kegiatan FORTIK"
                                >
                            </div>
                        @empty
                            <div class="swiper-slide relative bg-gray-200 flex items-center justify-center aspect-video">
                                <span class="text-gray-500">Belum ada dokumentasi.</span>
                            </div>
                        @endforelse
                    </div>

                    {{-- Navigasi dan Pagination (Tetap gunakan class bawaan Swiper) --}}
                    <div class="swiper-button-next !w-8 !h-8 md:!w-12 md:!h-12 lg:!w-14 lg:!h-14 bg-white/45 hover:bg-gray-900 !text-black hover:!text-white flex items-center justify-center transition-all duration-300 rounded-none !right-2 md:!right-4">
                        <span class="text-sm md:text-lg lg:text-xl font-bold">&rang;</span>
                    </div>
                    <div class="swiper-button-prev !w-8 !h-8 md:!w-12 md:!h-12 lg:!w-14 lg:!h-14 bg-white/45 hover:bg-gray-900 !text-black hover:!text-white flex items-center justify-center transition-all duration-300 rounded-none !left-2 md:!left-4">
                        <span class="text-sm md:text-lg lg:text-xl font-bold">&lang;</span>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>

