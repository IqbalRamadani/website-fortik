<div id="agenda" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h2 class="text-2xl font-bold text-blue-800">Agenda FORTIK</h2>
        <button class="flex items-center gap-2 bg-[#1e3a8a] text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-blue-900 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            Filter
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($agendas as $agenda)
        <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 flex flex-col hover:shadow-lg transition">
            <div class="relative aspect-[3/4] bg-purple-900">
                <img src="{{ $agenda->banner_image }}" 
                    alt="{{ $agenda->title }}" 
                    class="w-full h-full object-cover">
                <span class="absolute top-3 right-3 bg-blue-800 text-white text-xs font-bold px-2 py-1 rounded">
                    {{ $agenda->level }}
                </span>
            </div>
            
            <div class="p-4 flex flex-col flex-grow">
                <h3 class="font-bold text-sm text-gray-900 mb-3 leading-tight line-clamp-2">
                    {{ $agenda->title }}
                </h3>
                
                <div class="text-[11px] text-gray-500 mb-3">
                    <p>Mulai : {{ $agenda->start_date->translatedFormat('j F Y') }}</p>
                    <p>Deadline : {{ $agenda->end_date->translatedFormat('j F Y') }}</p>
                </div>

                <div class="mt-auto space-y-1.5 text-xs text-gray-700 font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-blue-800" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                        <span>{{ $agenda->location }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-blue-800" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                        <span>{{ $agenda->is_free ? 'Gratis' : 'Rp ' . number_format($agenda->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-blue-800" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                        <span>{{ $agenda->quota }} Peserta</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10">
        {{ $agendas->links() }}
    </div>
</div>
