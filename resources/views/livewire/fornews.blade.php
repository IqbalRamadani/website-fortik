<div class="bg-linear-to-br from-lkoamaru to-koamaru px-6 py-8 md:py-12 lg:py-20">
    <div class="max-w-6xl mx-auto">
        <!-- Title -->
        <h2 class="text-white text-3xl md:text-4xl lg:text-6xl font-bold text-center lg:-mt-4 mb-10">ForNews</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8 items-stretch">
            
            @foreach($posts->take(4) as $post)
                <div class="bg-white overflow-hidden shadow-lg flex flex-col h-full p-2  {{ $loop->index === 3 ? 'md:hidden lg:flex' : '' }}">
                    <div class="w-full aspect-video bg-supernova overflow-hidden">
                        @if($post['image'])
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                        @else
                            {{-- Fallback jika gambar tidak ada --}}
                            <div class="w-full h-full flex items-center justify-center text-yellow-800 font-bold">No Image</div>
                        @endif
                    </div>

                    <div class="mt-2 px-2 flex flex-col flex-grow">
                        <h3 class="text-koamaru font-bold text-sm md:text-lg mb-2 leading-tight line-clamp-2">
                            <a href="{{ route('fornews.show', $post['slug']) }}" class="hover:underline">
                                {{ $post['title'] }}
                            </a>
                        </h3>

                        <p class="text-koamaru text-xs md:text-sm mb-2">
                            {{ $post['published_at'] }} | {{ $post['author'] }}
                        </p>

                        <p class="text-gray-700 text-xs md:text-sm mb-4 leading-relaxed line-clamp-3 flex-grow">
                            {{ $post['content_preview'] }}
                        </p>

                        <div class="mt-auto mb-2 mr-2 text-right">
                            <a href="/fornews/{{ $post['slug'] }}" class="inline-block bg-koamaru text-white hover:text-supernova px-4 py-2 rounded-md text-xs md:text-sm font-medium hover:bg-opacity-90 mt-auto w-max transition delay-150 duration-300 ease-in-out hover:-translate-x-0 hover:scale-105">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-center mt-8">
            <a href="/fornews" class="bg-white text-koamaru px-6 py-2 rounded-md text-sm md:text-base font-semibold hover:bg-supernova transition delay-150 duration-300 ease-in-out hover:-translate-x-0 hover:scale-105">
                ForNews Lainnya
            </a>
        </div>
    </div>
</div>
