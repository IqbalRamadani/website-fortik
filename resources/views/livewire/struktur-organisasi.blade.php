<div class="px-6 pt-28 md:pt-32 bg-white border-none flex mx-auto h-fit">
    <div class="w-full max-w-6xl mx-auto">
        @forelse($divisions as $division)
            <div class="mb-16">
                <h2 class="inline-block text-3xl md:text-4xl font-extrabold mb-6 text-koamaru border-b-8 border-koamaru py-2 uppercase">
                    {{ $division->name }}
                </h2>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($division->members as $member)
                        <div class="overflow-hidden shadow-lg group relative">
                            <img 
                                src="{{ asset('storage/' . $member->image) }}" 
                                alt="{{ $member->name }}" 
                                loading="lazy"
                                class="w-full aspect-[4/6] object-cover hover:scale-105 transition duration-300"
                            >
                            
                            {{-- <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3 translate-y-2 group-hover:translate-y-0 transition-transform">
                                <p class="text-white text-sm font-bold text-center drop-shadow-md">
                                    {{ $member->name }}
                                </p>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            @empty
            <div class="text-center py-20 text-gray-500">
                Struktur organisasi belum dikonfigurasi.
            </div>
        @endforelse
    </div>
</div>
