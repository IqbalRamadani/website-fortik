<div class="bg-linear-to-br from-lkoamaru to-koamaru px-6 py-8 md:py-12 lg:py-20">
    <div class="max-w-5xl mx-auto">
        <!-- Title -->
        <h2 class="text-white text-3xl md:text-4xl lg:text-6xl font-bold text-center lg:-mt-4 mb-10">ForNews</h2>
        
        <!-- Desktop Grid (3 columns) - Hidden on mobile -->
        <div class="hidden md:grid md:grid-cols-3 gap-6 lg:gap-8">
            @foreach($posts->take(3) as $post)
            <div class="bg-white overflow-hidden shadow-lg">
                <!-- Content -->
                <div class="p-4">
                    <div class="w-full h-48 mb-4 bg-supernova">
                        @if($post['image'])
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                        @endif
                    </div>

                    <h3 class="text-koamaru font-bold text-lg mb-3 leading-tight">
                        {{ $post['title'] }}
                    </h3>
                    
                    <p class="text-koamaru text-sm mb-3">
                        {{ $post['published_at'] }} | {{ $post['author'] }}
                    </p>
                    
                    <p class="text-gray-700 text-sm mb-4 leading-relaxed">
                        {{ $post['content_preview'] }}
                    </p>
                    
                    <a href="/posts/{{ $post['slug'] }}" class="inline-block bg-koamaru text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-lkoamaru transition">
                        Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Mobile Grid (2 columns) - Visible only on mobile -->
        <div class="grid grid-cols-2 gap-4 md:hidden">
            @foreach($posts->take(4) as $post)
            <div class="bg-white overflow-hidden shadow-lg">
                <!-- Content -->
                <div class="p-2">
                    <div class="w-full h-32 mb-4 bg-supernova">
                        @if($post['image'])
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h3 class="text-koamaru font-bold text-sm mb-2 leading-tight">
                        {{ $post['title'] }}
                    </h3>

                    <p class="text-koamaru text-xs mb-2">
                        {{ $post['published_at'] }} | {{ $post['author'] }}
                    </p>
                    
                    <p class="text-gray-700 text-xs mb-3 leading-relaxed">
                        {{ $post['content_preview'] }}
                    </p>
                    
                    <a href="/posts/{{ $post['slug'] }}" class="inline-block bg-koamaru text-white px-4 py-1.5 rounded text-xs font-medium hover:bg-opacity-90 transition">
                        Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="flex justify-center mt-6">
            <button class="bg-white text-koamaru md:mt-4 px-6 py-2 rounded-md text-sm md:text-base font-semibold hover:bg-gray-100 transition">
                ForNews Lainnya
            </button>
        </div>
    </div>
</div>
