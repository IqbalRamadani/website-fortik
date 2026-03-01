@push('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($post->content), 150) }}">

    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    <meta property="og:url" content="{{ request()->url() }}">
    
    @if($post->image)
        <meta property="og:image" content="{{ asset('storage/' . $post->image) }}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 150) }}">
    @if($post->image)
        <meta name="twitter:image" content="{{ asset('storage/' . $post->image) }}">
    @endif
@endpush

<div class="px-6 py-8 md:py-12 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
        {{-- Breadcrumb simpel --}}
        <div class="text-sm font-bold text-gray-800 mb-6 uppercase">
            <a href="{{ route('fornews.index') }}" class="hover:text-lkoamaru">Fornews Terkini</a> 
            <span class="text-gray-400 mx-2">›</span>
            <span class="text-gray-600 truncate">{{ Str::limit($post->title, 50) }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
            {{-- MAIN CONTENT (Col span 8 on Desktop) --}}
            <div class="lg:col-span-8">
                <h1 class="text-3xl md:text-4xl font-bold text-koamaru mb-4 leading-tight">
                    {{ $post->title }}
                </h1>

                <div class="text-lkoamaru font-medium text-sm mb-6">
                    {{ \Carbon\Carbon::parse($post->published_at)->format('d F Y') }} | {{ $post->author->name ?? 'Admin' }}
                </div>

                {{-- Featured Image 16:9 --}}
                <div class="aspect-video w-full bg-supernova mb-8 overflow-hidden rounded-sm">
                    @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" 
                        alt="{{ $post->title }}" 
                        class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-yellow-800 text-4xl font-bold">
                            16:9
                        </div>
                    @endif
                </div>

                {{-- Post Body --}}
                <article class="prose prose-lg max-w-none text-justify leading-relaxed">
                    {{-- Gunakan {!! !!} karena Filament biasanya menyimpan HTML dari RichEditor --}}
                    {!! clean($post->content) !!}
                </article>

                {{-- Navigation Prev/Next (Optional placeholder as per design) --}}
                {{-- <div class="flex justify-between mt-12 pt-6 border-t border-gray-200 font-bold text-sm">
                    <a href="#" class="flex items-center hover:text-blue-900">
                        <span class="mr-2">‹</span> Sebelumnya
                    </a>
                    <a href="#" class="flex items-center hover:text-blue-900">
                        Selanjutnya <span class="ml-2">›</span>
                    </a>
                </div> --}}
            </div>

            {{-- SIDEBAR (Col span 4 on Desktop) --}}
            <div class="lg:col-span-4 space-y-8">
                
                {{-- Widget Fornews Terkini --}}
                <div class="bg-white shadow-lg rounded-sm border-t-4 border-koamaru p-6">
                    <h3 class="bg-koamaru text-white font-bold text-sm uppercase px-4 py-2 inline-block -mt-10 mb-6">
                        Fornews Terkini
                    </h3>

                    <div class="space-y-6 divide-y divide-gray-200">
                        @foreach ($recentPosts as $recent)
                            <div class="pt-4 first:pt-0">
                                <h4 class="font-bold text-gray-900 hover:text-lkoamaru text-lg leading-snug mb-2">
                                    <a href="{{ route('fornews.show', $recent->slug) }}">
                                        {{ $recent->title }}
                                    </a>
                                </h4>
                                <div class="text-xs text-gray-500 mb-2">
                                    {{ \Carbon\Carbon::parse($recent->published_at)->format('d F Y') }} | {{ $recent->author->name ?? 'Admin' }}
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ Str::limit(strip_tags($recent->content), 100) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>