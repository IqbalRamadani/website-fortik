<div class="px-6 py-12 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
        {{-- header section --}}
        <h1 class="text-5xl md:text-6xl font-extrabold text-center text-koamaru mb-10">FORNEWS</h1>
        {{-- grid layout --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @forelse($posts as $post)
                <div class="bg-white border border-solid border-koamaru/15 overflow-hidden shadow-lg">
                    <div class="p-4 flex flex-col flex-grow h-full">
                        {{-- image thumbnail --}}
                        <div class="w-full aspect-video relative overflow-hidden">
                            @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" 
                                alt="{{ $post->title }}" 
                                class="w-full h-full object-cover">
                            @else
                            {{-- Fallback jika tidak ada gambar --}}
                                <div class="w-full h-full flex items-center justify-center bg-supernova text-yellow-800">
                                    <span class="font-bold">No Image</span>
                                </div>
                            @endif
                        </div>
                        {{-- card content --}}
                        <div class="mt-2 flex flex-col flex-grow">
                            <h2 class="text-xl font-bold text-blue-900 mb-2 leading-tight line-clamp-2">
                                <a href="{{ route('fornews.show', $post['slug']) }}" class="hover:underline">
                                    {{ $post['title'] }}
                                </a>
                            </h2>
                        
                            <div class="text-xs text-blue-500 font-semibold mb-3">
                                {{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }} | {{ $post->author->name ?? 'Admin' }}
                            </div>

                            {{-- Excerpt / Cuplikan manual dari content --}}
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-grow">
                                {{ $post['content_preview'] }}
                            </p>

                            <div class="mt-auto mb-2 mr-2 text-right">
                                <a href="{{ route('fornews.show', $post['slug']) }}" 
                                    class="inline-block bg-koamaru text-white text-sm font-medium px-4 py-2 rounded hover:text-supernova transition delay-120 duration-300 ease-in-out hover:-translate-x-0 hover:scale-105">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-gray-500 text-lg">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        {{-- Render navigasi pagination di sini --}}
        <div class="mt-10">
            {{ $posts->links('vendor.livewire.flowbite-pagination') }}
        </div>
    </div>
</div>