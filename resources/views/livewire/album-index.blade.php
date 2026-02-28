<div class="px-6 py-12 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
        <div class="flex justify-center mb-12">
            <h1 class="text-5xl md:text-6xl font-extrabold text-koamaru">
                ALBUM
            </h1>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            @forelse($albums as $album)
                <a href="{{ route('album.show', $album->slug) }}" class="group block cursor-pointer">
                    
                    <div 
                        x-data="{ loaded: false }" 
                        x-init="if ($refs.myImage.complete) loaded = true"
                        class="relative w-full aspect-square overflow-hidden bg-gray-200 rounded-sm shadow-sm transition-all duration-300 group-hover:shadow-lg group-hover:-translate-y-1"
                    >
                        <div x-show="!loaded" class="absolute inset-0 animate-pulse bg-gray-300"></div>
                        
                        <img 
                            x-ref="myImage"    
                            src="{{ asset('storage/' . $album->cover_image) }}" 
                            alt="Cover {{ $album->title }}" 
                            loading="lazy"
                            @load="loaded = true"
                            class="w-full h-full object-cover transition-opacity duration-500"
                            :class="loaded ? 'opacity-100' : 'opacity-0'"
                        >
                    </div>

                    <h2 class="mt-4 text-center text-lg font-bold text-koamaru group-hover:text-lkoamaru transition-colors">
                        {{ $album->title }}
                    </h2>
                </a>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada album yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
