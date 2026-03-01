<div class="px-6 py-12 bg-white border-none flex mx-auto h-fit">
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
                                class="w-full object-cover hover:scale-105 transition duration-300"
                            >
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
