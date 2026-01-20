<div class="bg-[#11296b] py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Title -->
        <h2 class="text-white text-4xl md:text-5xl font-bold text-center mb-10 font-inter">Fornews</h2>
        
        <!-- Desktop Grid (3 columns) - Hidden on mobile -->
        <div class="hidden md:grid md:grid-cols-3 gap-6 lg:gap-8">
            @foreach($posts->take(3) as $post)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                <!-- Image -->
                <div class="w-full h-48 bg-[#ffcb05]">
                    @if($post['image'])
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                    @endif
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-[#11296b] font-bold text-lg mb-3 font-inter leading-tight">
                        {{ $post['title'] }}
                    </h3>
                    
                    <p class="text-[#11296b] text-sm mb-3 font-inter">
                        {{ $post['published_at'] }} | {{ $post['author'] }}
                    </p>
                    
                    <p class="text-gray-700 text-sm mb-4 font-inter leading-relaxed">
                        {{ $post['content_preview'] }}
                    </p>
                    
                    <a href="/posts/{{ $post['slug'] }}" class="inline-block bg-[#11296b] text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-opacity-90 transition font-inter">
                        Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Mobile Grid (2 columns) - Visible only on mobile -->
        <div class="grid grid-cols-2 gap-4 md:hidden">
            @foreach($posts->take(4) as $post)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                <!-- Image -->
                <div class="w-full h-32 bg-[#ffcb05]">
                    @if($post['image'])
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                    @endif
                </div>
                
                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-[#11296b] font-bold text-sm mb-2 font-inter leading-tight">
                        {{ $post['title'] }}
                    </h3>
                    
                    <p class="text-[#11296b] text-xs mb-2 font-inter">
                        {{ $post['published_at'] }} | {{ $post['author'] }}
                    </p>
                    
                    <p class="text-gray-700 text-xs mb-3 font-inter leading-relaxed">
                        {{ $post['content_preview'] }}
                    </p>
                    
                    <a href="/posts/{{ $post['slug'] }}" class="inline-block bg-[#11296b] text-white px-4 py-1.5 rounded text-xs font-medium hover:bg-opacity-90 transition font-inter">
                        Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Browse Category Button (Mobile Only) -->
        <div class="flex justify-center mt-6 md:hidden">
            <button class="bg-white text-[#11296b] px-6 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition font-inter">
                Browse Category
            </button>
        </div>
    </div>
</div>
