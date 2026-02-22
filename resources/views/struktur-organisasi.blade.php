@php
    $categories = [
        [
            'name' => 'BPH',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ],
        [
            'name' => 'DIVISI DESAIN GRAFIS ',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ],
        [
            'name' => 'DIVISI VIDEOGRAFIS ',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ],
        [
            'name' => 'DIVISI KONTEN KREATOR ',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ],
        [
            'name' => 'DIVISI PSDM',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ],
        [
            'name' => 'DIVISI PUBLIC RELATION ',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ],
        [
            'name' => 'DIVISI SIIP',
            'photos' => [
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
                ['title' => 'Taqy Kanz Harsaputra', 'image' => 'images/struktur/img1.jpg'],
            ]
        ]
    ];
@endphp

<x-layout>
    <div class="px-6 pt-28 md:pt-32 bg-white border-none flex mx-auto h-fit">
        <div class="w-full max-w-6xl mx-auto">

            @foreach($categories as $category)
                <div class="mb-16">
                    <h2 class="inline-block text-3xl md:text-4xl font-extrabold mb-6 text-koamaru border-b-8 border-koamaru py-2">
                        {{ $category['name'] }}
                    </h2>
                    <div class="
                                grid 
                                grid-cols-2 
                                sm:grid-cols-3 
                                md:grid-cols-4 
                                lg:grid-cols-5 
                                gap-4
                            ">
                        @foreach($category['photos'] as $photo)
                            <div class="overflow-hidden shadow-md">
                            <img
                                src="{{ asset($photo['image']) }}"
                                alt="{{ $photo['title'] }}"
                                class="w-full  object-contain hover:scale-105 transition duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>