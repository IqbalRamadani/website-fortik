@php
    $banners = [
        [
            'image' => 'images/banner-1.png',
            'url'   => 'https://fortik.test/fornews/deserunt-et-enim-dolores-ducimus-nostrum-vL9cu',
        ],
        [
            'image' => 'images/banner-2.png',
            'url'   => 'https://fortik.test/fornews/at-ex-sed-aspernatur-dolorem-voluptatem-oQT4n',
        ],
        [
            'image' => 'images/banner-3.png',
            'url'   => 'https://fortik.test/fornews/consequatur-temporibus-incidunt-recusandae-autem-illo-tempora-XprmU',
        ],
    ];
@endphp

<div
    x-data
    x-init="
        new Swiper($refs.container, {
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            speed: 800,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: { el: '.swiper-pagination', clickable: true },
        })
    "
    class="relative w-full"
>
    <div x-ref="container" class="swiper w-full">
        <div class="swiper-wrapper">

            @foreach ($banners as $banner)
                <div class="swiper-slide">
                    <a href="{{ $banner['url'] }}" class="block w-full h-full">
                        <img
                            src="{{ asset($banner['image']) }}"
                            class="w-screen"
                            alt="Banner"
                        >
                    </a>
                </div>
            @endforeach

        </div>

        <div class="swiper-button-prev !w-8 !h-8 md:!w-12 md:!h-12 lg:!w-14 lg:!h-14 bg-white/45 hover:bg-gray-900 !text-koamaru hover:!text-white"><span class="text-sm md:text-lg lg:text-xl font-bold ">&lang;</span></div>
        <div class="swiper-button-next !w-8 !h-8 md:!w-12 md:!h-12 lg:!w-14 lg:!h-14 bg-white/45 hover:bg-gray-900 !text-koamaru hover:!text-white"><span class="text-sm md:text-lg lg:text-xl font-bold ">&rang;</span></div>
        <div class="swiper-pagination"></div>
    </div>
</div>