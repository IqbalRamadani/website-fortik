<div class="min-h-screen bg-slate-900 relative mx-auto px-6 py-16 flex flex-col items-center text-center">
    <div class="inline-block px-4 py-1.5 rounded-full bg-slate-800 border border-slate-700 text-sm text-emerald-400 font-medium mb-6">
            🔴 Live Webinar - 26 April 2026
        </div>
        
        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight mb-6">
            Jika Aku Seorang <span class="text-rose-500">Scammer</span>,<br> Siapa Targetku?
        </h1>

        <p class="text-lg md:text-xl max-w-2xl text-slate-400 mb-2 md:mb-4">
            Bersama
        </p>
        <p class="text-lg md:text-xl max-w-2xl text-white mb-6">
            <strong>Satrya Mahardhika</strong> - Certified Ethical Hacker
        </p>

        <p class="text-lg md:text-xl max-w-2xl text-slate-400 mb-10">
            Berhenti belajar teori pertahanan. Mari bedah anatomi peretasan, manipulasi psikologis, dan eksploitasi data langsung dari sudut pandang penyerang.
        </p>

        <div x-data="countdownTimer()" x-init="startTimer()" class="flex space-x-2 mb-12 font-mono">
            <template x-for="(value, unit) in time" :key="unit">
                <div class="flex flex-col items-center bg-slate-800 border border-slate-700 rounded-lg p-4 w-20 md:w-24">
                    <span class="text-2xl md:text-4xl font-bold text-white" x-text="value"></span>
                    <span class="text-xs text-slate-400 uppercase tracking-wider mt-1" x-text="unit"></span>
                </div>
            </template>
        </div>

        <div class="grid md:grid-cols-2 gap-8 w-full max-w-4xl text-left">
            
            <div class="relative flex flex-col p-8 rounded-2xl bg-slate-800 border-2 border-slate-700 hover:border-slate-500 transform md:-translate-x-0 hover:scale-[1.02] transition-all">
                <h3 class="text-2xl font-bold text-white mb-2">General Ticket</h3>
                <p class="text-3xl font-extrabold text-white mb-6">Rp 0</p>
                <ul class="space-y-4 mb-8 flex-1 text-sm">
                    <li class="flex items-center text-slate-300"><span class="text-emerald-400 mr-2">✔</span> Akses Live Zoom</li>
                    <li class="flex items-center text-rose-400"><span class="mr-2">✖</span> Tanpa E-Sertifikat</li>
                    <li class="flex items-center text-rose-400"><span class="mr-2">✖</span> Tanpa Modul Materi PDF & Rekaman</li>
                    <li class="flex items-center text-slate-400 italic"><span class="mr-2 text-rose-500">⚠</span> Wajib share poster ke 3 Grup WA</li>
                    <li class="flex items-center text-slate-400 italic"><span class="mr-2 text-rose-500">⚠</span> Wajib tag 3 teman di postingan IG</li>
                </ul>
                <a href="https://forms.gle/Uj1ZjCc41mHmf5ZQA" target="_blank" class="w-full py-3 px-4 bg-slate-700 hover:bg-slate-600 text-white font-semibold text-center rounded-lg transition-colors">
                    Daftar Jalur Gratis
                </a>
            </div>

            <div class="relative flex flex-col p-8 rounded-2xl bg-slate-800 border-2 border-emerald-500 shadow-[0_0_30px_rgba(16,185,129,0.15)] transform md:-translate-x-0 hover:scale-[1.02] transition-all">
                <div class="absolute top-0 right-0 bg-emerald-500 text-slate-900 text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg uppercase tracking-wide">
                    Rekomendasi
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">VIP Upgrade</h3>
                <p class="text-3xl font-extrabold text-white mb-1">Rp 25.000</p>
                <p class="text-sm text-emerald-400 mb-6 font-medium">Investasi seharga segelas kopi.</p>
                <ul class="space-y-4 mb-8 flex-1 text-sm">
                    <li class="flex items-center text-white font-medium"><span class="text-emerald-400 mr-2">✔</span> Akses Live Zoom</li>
                    <li class="flex items-center text-white"><span class="text-emerald-400 mr-2">✔</span> E-Sertifikat Nasional</li>
                    <li class="flex items-center text-white"><span class="text-emerald-400 mr-2">✔</span> Modul Materi PDF & Rekaman </li>
                    <li class="flex items-center text-emerald-400 font-semibold"><span class="text-emerald-400 mr-2">✔</span> Langsung daftar, tanpa syarat share & tag.</li>
                </ul>
                <a href="https://forms.gle/uNST9nGkXEttxo2A7" target="_blank" class="w-full py-3 px-4 bg-emerald-500 hover:bg-emerald-400 text-slate-900 font-bold text-center rounded-lg transition-all transform hover:scale-[1.02] shadow-lg shadow-emerald-500/30">
                    Amankan Tiket VIP
                </a>
            </div>
        </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('countdownTimer', () => ({
            // Set tanggal eksekusi: 26 April 2026, 09:00:00 WIB
            targetDate: new Date('2026-04-26T09:00:00+07:00').getTime(),
            time: { Hari: '00', Jam: '00', Menit: '00', Detik: '00' },
            
            startTimer() {
                setInterval(() => {
                    const now = new Date().getTime();
                    const distance = this.targetDate - now;

                    if (distance < 0) {
                        this.time = { Hari: '00', Jam: '00', Menit: '00', Detik: '00' };
                        return;
                    }

                    this.time.Hari = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
                    this.time.Jam = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                    this.time.Menit = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                    this.time.Detik = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                }, 1000);
            }
        }));
    });
</script>