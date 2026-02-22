<div x-data="{ lightboxOpen: false, activeImage: '' }" class="px-6 pt-28 md:pt-32 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto mb-12">
        <div class="mb-8">
            <a href="/albums" class="text-sm text-blue-600 hover:underline">&larr; Album</a>
            <h1 class="text-3xl font-bold mt-2 text-gray-900">{{ $album->title }}</h1>
        </div>

        <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            @foreach($album->photos as $photo)
                <div 
                    x-data="{ loaded: false }" 
                    class="relative break-inside-avoid overflow-hidden rounded-xl bg-gray-200 cursor-pointer transform transition duration-300 hover:scale-[1.02] hover:shadow-xl"
                    @click="lightboxOpen = true; activeImage = '{{ asset('storage/' . $photo->image_path) }}'"
                >
                    <div x-show="!loaded" class="absolute inset-0 animate-pulse bg-gray-300"></div>
                    
                    <img 
                        src="{{ asset('storage/' . $photo->image_path) }}" 
                        alt="Album Photo" 
                        loading="lazy"
                        @load="loaded = true"
                        class="w-full h-auto object-cover transition-opacity duration-500"
                        :class="loaded ? 'opacity-100' : 'opacity-0'"
                    >
                </div>
            @endforeach
        </div>

        <div 
            x-show="lightboxOpen" 
            style="display: none;"
            x-transition.opacity.duration.300ms
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4 backdrop-blur-sm"
        >
            <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-4xl hover:text-gray-300 focus:outline-none">&times;</button>
            
            <img 
                :src="activeImage" 
                @click.away="lightboxOpen = false"
                class="max-w-full max-h-[90vh] rounded-lg shadow-2xl transition-transform duration-300 transform scale-95"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
        </div>
    </div>
</div>
