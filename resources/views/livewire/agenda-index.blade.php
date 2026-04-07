<div id="agenda" class="w-full max-w-6xl mx-auto px-6 xl:px-0 py-12 bg-white border-none" x-data="{ showFilter: false }">
    <div class="w-full mx-auto">
        {{-- header section --}}
        <div class="grid grid-cols-1 md:grid-cols-12 items-center gap-8">
            <div class="text-center md:text-left md:col-span-7">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-koamaru">
                    Temukan Lomba dan Pelatihan Terbaikmu di Sini!
                </h1>
                <p class="mt-4 text-lg text-gray-600 mx-auto md:mx-0 max-w-xl">
                    Ikuti berbagai lomba dan pelatihan untuk mengasah kemampuanmu. Daftar sekarang dan tunjukkan potensimu!
                </p>
            </div>
            <div class="hidden md:block md:col-span-5">
                <img src="{{ asset('images/fortik-bot-4.webp') }}" 
                    alt="Maskot FORTIK" 
                    class="w-full max-w-sm mx-auto h-auto object-contain drop-shadow-2xl">
            </div>
        </div>
        <div class="flex mt-8 justify-between items-center mb-8 border-b pb-4">
            <h2 class="text-2xl md:text-3xl font-bold text-koamaru">Agenda FORTIK</h2>
            <div class="flex flex-row gap-2 md:gap-4">
                {{-- <a href="{{ route('cek.status') }}" class="text-white bg-blue-900 px-4 py-2 rounded-md text-sm font-semibold hover:bg-koamaru transition focus:outline-none">
                <i class="fa-solid fa-magnifying-glass"></i>
                <span>Cek Status</span>
                </a> --}}
                <button @click="showFilter = !showFilter" 
                        class="flex items-center gap-2 text-white px-4 py-2 rounded-md text-sm font-semibold cursor-pointer bg-koamaru hover:bg-lkoamaru transition focus:outline-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    <span x-text="showFilter ? 'Tutup Filter' : 'Filter'"></span>
                </button>
            </div>
        </div>
        <div x-show="showFilter" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            style="display: none;" 
            class="bg-gray-50 p-6 rounded-xl border border-gray-200 mb-10 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Cari Agenda</label>
                        <div class="relative">
                            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Ketik judul lomba..." class="w-full pl-10 pr-4 py-2.5 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <div class="absolute left-3 top-3 text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Tingkat</label>
                        <select wire:model.live="level" class="w-full py-2.5 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <option value="">Semua Tingkat</option>
                            <option value="Nasional">Nasional</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kabupaten">Kabupaten</option>
                            <option value="Lokal">Lokal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Biaya</label>
                        <select wire:model.live="filter_is_free" class="w-full py-2.5 rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-sm">
                            <option value="">Semua Biaya</option>
                            <option value="1">Gratis</option>
                            <option value="0">Berbayar</option>
                        </select>
                    </div>
                </div>
                
                @if($search || $level || $filter_is_free !== '')
                    <div class="mt-4 flex items-center justify-between border-t pt-4">
                        <p class="text-xs text-gray-500">Menampilkan hasil pencarian yang difilter...</p>
                        <button wire:click="$set('search', ''); $set('level', ''); $set('filter_is_free', '');" 
                            class="text-xs font-semibold text-red-600 hover:text-red-800 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12"></path></svg>
                            Reset Filter
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($agendas as $agenda)
            <div class="bg-white overflow-hidden shadow-xl border border-gray-200 flex flex-col hover:shadow-lg transition">
                <div class="relative aspect-[3/4] bg-purple-900">
                    <img src="{{ $agenda->banner_image ? (Str::startsWith($agenda->banner_image, 'http') ? $agenda->banner_image : asset('storage/'.$agenda->banner_image)) : 'https://placehold.co/400x600/6B21A8/FFF?text=Banner' }}" alt="{{ $agenda->title }}}}" 
                        alt="{{ $agenda->title }}" 
                        class="w-full h-full object-cover">
                    <span class="absolute top-0 right-0 bg-koamaru text-white text-xs font-bold px-2 py-1 rounded-bl-md">
                        {{ $agenda->level }}
                    </span>
                </div>
                
                <div class="p-4 flex flex-col flex-grow">
                    <h3 class="font-bold text-sm text-gray-900 mb-3 leading-tight">
                        {{ $agenda->title }}
                    </h3>
                    
                    <div class="text-[11px] text-gray-500 mb-3">
                        <p>Mulai : {{ $agenda->start_date->translatedFormat('j F Y') }}</p>
                        <p>Deadline : {{ $agenda->end_date->translatedFormat('j F Y') }}</p>
                    </div>

                    <div class="mt-auto space-y-1.5 text-xs text-gray-700 font-medium">
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-koamaru" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            <span>{{ $agenda->location }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-koamaru" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            <span>{{ $agenda->is_free ? 'Gratis' : 'Rp ' . number_format($agenda->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-3.5 h-3.5 text-koamaru" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            <span>{{ $agenda->quota }} Peserta</span>
                        </div>
                        <div class="flex items-center justify-end mb-2">
                            <a href="{{ $agenda->link }}" target="_blank" rel="noopener noreferrer"
                                class="inline-block bg-koamaru text-white text-xs md:text-sm font-medium px-4 py-2 rounded hover:text-supernova transition delay-120 duration-300 ease-in-out hover:-translate-x-0 hover:scale-105">
                                Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500 text-lg">Belum ada agenda yang dipublikasikan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $agendas->links('vendor.livewire.flowbite-pagination') }}
        </div>
    </div>
</div>
