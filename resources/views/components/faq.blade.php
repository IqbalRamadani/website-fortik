@php
$items = [
[
'title' => 'Apa itu FORTIK?',
'content' => 'FORTIK adalah singkatan dari Forum Teknologi Informasi dan Komunikasi. Forum ini dibentuk untuk menjadi wadah mahasiswa yang memiliki minat dan bakat di bidang teknologi. FORTIK berdiri pada tanggal 10 Oktober 2022 di Sekolah Tinggi Dirasat Islamiyyah Imam Syafi\'i (STDIIS) Jember, Jawa Timur.'
],
[
'title' => 'Kapan FORTIK membuka pendaftaran anggota baru?',
'content' => 'Kabar gembira nih! FORTIK Insya Allah bakal buka pendaftaran tanggal 1-7 September!! Siap siap yaa!'
],
[
'title' => 'FORTIK itu ngapain sih?',
'content' => 'FORTIK adalah UKM yang berfokus pada teknologi informasi, kerjaannya? tentu berkaitan dengan Teknologi Informasi dong.'
],
[
'title' => 'Apa keuntungan masuk FORTIK?',
'content' => 'Kamu bakal dapet relasi yang solid, pengalaman berorganisasi, skill yang terarah dan terasah, dan tentunya SAKTIFA dong.'
],
];
@endphp

<div class="px-6 accordion w-full min-h-auto xl:min-h-[693px] bg-faq-mobile xl:bg-faq bg-contain bg-no-repeat bg-top mb-12 sm:mb-24 xl:-mb-22 ">
    <div class="flex flex-col gap-2 w-full max-w-6xl mx-auto">
        <div class="h-12"></div>
        <h2 class="text-3xl md:text-4xl lg:text-6xl font-bold text-center text-koamaru">FAQ</h2>
        <div class="h-12"></div>
        @foreach($items as $item)
            {{-- 1. Inisialisasi state mandiri untuk SETIAP item --}}
            <div x-data="{ open: false }" class="flex flex-col w-full xl:w-3/4 mb-2">
                
                {{-- 2. Tombol Trigger: Hapus class sampah, gunakan @click --}}
                <button @click="open = !open" 
                        class="flex items-start justify-between gap-4 w-full p-4 text-left text-md font-medium text-white/90 bg-koamaru/90 shadow-lg border border-default hover:text-white hover:bg-koamaru focus:text-white focus:bg-koamaru transition-all">
                    <span>{{ $item['title'] }}</span>
                    
                    {{-- 3. Ikon Chevron: Rotasi dinamis berdasarkan state 'open' --}}
                    <svg :class="{'rotate-180': open}" 
                        class="w-6 h-6 transition-transform duration-300 shrink-0" 
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                {{-- 4. Konten: Gunakan x-show, bukan class 'hidden' --}}
                <div x-show="open" 
                    x-collapse
                    class="overflow-hidden text-md bg-white shadow-lg border-t-0 border-default"
                    style="display: none;">
                    <div class="p-4 text-koamaru">
                        {{ $item['content'] }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>