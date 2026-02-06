<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pengumuman Kelulusan FORTIK</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts: Exo 2 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- html2canvas for share image -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    <!-- Canvas Confetti -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
    
    <style>
        * {
            font-family: 'Exo 2', sans-serif;
        }
        
        body {
            overflow-x: hidden;
        }
        
        /* Animated Grid Background */
        .cyber-grid {
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }
        
        /* Glow Effects */
        .glow-blue {
            text-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }
        
        .glow-box {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
        }
        
        /* Loading Bar Animation */
        @keyframes loadFast {
            0% { width: 0%; }
            100% { width: 97%; }
        }
        
        @keyframes loadSlow {
            0% { width: 97%; }
            33% { width: 98%; }
            66% { width: 98.5%; }
            100% { width: 99%; }
        }
        
        .load-bar-fast {
            animation: loadFast 3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        
        .load-bar-slow {
            animation: loadSlow 4s cubic-bezier(0.9, 0, 0.1, 1) forwards;
        }
        
        /* Pulse Animation */
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .pulse-slow {
            animation: pulse-slow 2s ease-in-out infinite;
        }
        
        /* Mobile Grid Disable */
        @media (max-width: 640px) {
            .cyber-grid {
                background-image: none;
                animation: none;
            }
        }
        
        /* Input Glow on Focus */
        .input-glow:focus {
            border-color: #3B82F6;
            box-shadow: 0 4px 20px rgba(59, 130, 246, 0.4);
        }
        
        /* Share Card Styles */
        #shareCard {
            background: linear-gradient(135deg, #0A0F1A 0%, #1a1f35 100%);
        }
    </style>
</head>
<body class="bg-[#0A0F1A] text-gray-200 min-h-screen cyber-grid">
    
  <x-navbar></x-navbar>
    <div x-data="kelulusanApp()" class="min-h-screen flex items-center justify-center px-6 py-12">
        
        <!-- HALAMAN INPUT -->
        <div x-show="statusHalaman === 'input'" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="w-full max-w-2xl text-center">
            
            <!-- Logo -->
            <div class="mb-8 mt-12 flex justify-center">
                <div class="w-24 h-24 md:w-32 md:h-32 bg-blue-500 rounded-2xl glow-box flex items-center justify-center">
                    <svg class="w-16 h-16 md:w-20 md:h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
            </div>
            
            <!-- Heading -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 glow-blue">
                PENGUMUMAN KELULUSAN<br>ANGGOTA BARU FORTIK
            </h1>
            
            <p class="text-gray-400 text-sm md:text-base lg:text-lg mb-12 max-w-xl mx-auto">
                Satu langkah lagi untuk menjadi bagian dari inovasi. Masukkan NIM-mu untuk melihat hasil.
            </p>
            
            <!-- Input Form -->
            <div class="max-w-md mx-auto mb-8">
                <input 
                    type="text" 
                    x-model="nim"
                    @keyup.enter="cekStatus()"
                    placeholder="Masukkan NIM Anda"
                    class="w-full bg-transparent border-b-2 border-gray-600 text-white text-center text-xl md:text-2xl py-4 px-4 focus:outline-none input-glow transition-all duration-300"
                    maxlength="10"
                />
            </div>
            
            <!-- Error Message -->
            <div x-show="errorMessage" 
                x-transition
                class="mb-6 text-red-400 text-sm">
              <span x-text="errorMessage"></span>
            </div>
            
            <!-- Button -->
            <button 
                @click="cekStatus()"
                class="w-full md:w-auto bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-12 rounded-lg transition-all duration-300 glow-box hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="loading">
                <span x-show="!loading">CEK STATUS KELULUSAN</span>
                <span x-show="loading">Memproses...</span>
            </button>
        </div>
        
        <!-- HALAMAN LOADING -->
        <div x-show="statusHalaman === 'loading'" 
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            class="w-full max-w-2xl text-center">
            
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-12 pulse-slow glow-blue">
                Menyiapkan hasil untukmu...
            </h2>
            
            <!-- Loading Bar Container -->
            <div class="w-full max-w-md mx-auto">
                <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden border border-blue-500/30">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-blue-400 relative"
                        :class="loadingPhase === 'fast' ? 'load-bar-fast' : 'load-bar-slow'">
                    </div>
                </div>
                <p class="text-gray-500 text-sm mt-4">Mohon tunggu sebentar...</p>
            </div>
        </div>
        
        <!-- HALAMAN LULUS -->
        <div x-show="statusHalaman === 'sukses'" 
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="w-full max-w-2xl text-center">
            
            <!-- Success Icon -->
            <div class="mb-8 mt-16 flex justify-center">
                <div class="w-24 h-24 md:w-32 md:h-32 bg-green-500 rounded-full glow-box flex items-center justify-center animate-bounce">
                    <svg class="w-16 h-16 md:w-20 md:h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 glow-blue">
                Selamat, <span x-text="hasil.nama"></span>!
            </h2>
            
            <p class="text-gray-400 text-base md:text-lg mb-8">
                Kamu telah resmi diterima sebagai anggota baru FORTIK.
            </p>
            
            <!-- Info Box -->
            <div class="bg-gray-900/50 border-2 border-blue-500 rounded-xl p-6 md:p-8 mb-8 glow-box max-w-lg mx-auto">
                <div class="space-y-4 text-left">
                    <div class="flex justify-between border-b border-gray-700 pb-3">
                        <span class="text-gray-400">Status:</span>
                        <span class="text-green-400 font-semibold">LULUS</span>
                    </div>
                    <div class="flex justify-between border-b border-gray-700 pb-3">
                        <span class="text-gray-400">Nama:</span>
                        <span class="text-white font-semibold" x-text="hasil.nama"></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Divisi:</span>
                        <span class="text-blue-400 font-semibold" x-text="hasil.divisi"></span>
                    </div>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="space-y-4">
                <button 
                    @click="gabungGrup()"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 glow-box hover:scale-105 flex items-center justify-center gap-3">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
                    </svg>
                    GABUNG GRUP KOORDINASI
                </button>
                
                <button 
                    @click="bagikanHasil()"
                    class="w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 border border-gray-600 hover:border-blue-500 flex items-center justify-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                    </svg>
                    BAGIKAN HASIL
                </button>
            </div>
        </div>
        
        <!-- HALAMAN TIDAK LULUS -->
        <div x-show="statusHalaman === 'gagal'" 
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="w-full max-w-2xl text-center">
            
            <!-- Icon -->
            <div class="mb-8 mt-16 flex justify-center">
                <div class="w-24 h-24 md:w-32 md:h-32 bg-gray-700 rounded-full glow-box flex items-center justify-center">
                    <svg class="w-16 h-16 md:w-20 md:h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-gray-300">
                Terima Kasih, <span x-text="hasil.nama"></span>
            </h2>
            
            <div class="bg-gray-900/50 border-2 border-gray-700 rounded-xl p-6 md:p-8 mb-8 max-w-lg mx-auto">
                <p class="text-gray-400 text-base md:text-lg leading-relaxed">
                    Terima kasih telah mengikuti seleksi anggota baru FORTIK. 
                    Sayangnya, kamu belum dapat bergabung pada periode ini.
                </p>
                <p class="text-gray-400 text-base md:text-lg leading-relaxed mt-4">
                    Jangan berkecil hati! Terus kembangkan skill-mu dan pantau terus informasi rekrutmen berikutnya.
                </p>
            </div>
            
            <button 
                @click="resetApp()"
                class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-4 px-12 rounded-lg transition-all duration-300 border border-gray-600 hover:border-blue-500">
                KEMBALI KE BERANDA
            </button>
        </div>
        
    </div>
    
    <!-- Hidden Share Card -->
    <div id="shareCard" class="fixed -left-[9999px] w-[800px] h-[800px] p-16 flex flex-col items-center justify-center">
        <div class="text-center">
            <!-- Logo -->
            <div class="mb-8 flex justify-center">
                <div class="w-32 h-32 bg-blue-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
            </div>
            
            <h1 class="text-5xl font-bold text-white mb-4" style="text-shadow: 0 0 30px rgba(59, 130, 246, 0.8);">
                I'M OFFICIALLY A PART<br>OF FORTIK!
            </h1>
            
            <div class="bg-gray-800/70 border-2 border-blue-500 rounded-2xl p-8 mb-8 mt-12" style="box-shadow: 0 0 40px rgba(59, 130, 246, 0.4);">
                <div class="space-y-4 text-left text-2xl">
                    <div class="flex justify-between border-b border-gray-600 pb-4">
                        <span class="text-gray-400">Nama:</span>
                        <span class="text-white font-semibold" id="shareNama"></span>
                    </div>
                    <div class="flex justify-between border-b border-gray-600 pb-4">
                        <span class="text-gray-400">Status:</span>
                        <span class="text-green-400 font-semibold">LULUS</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Divisi:</span>
                        <span class="text-blue-400 font-semibold" id="shareDivisi"></span>
                    </div>
                </div>
            </div>
            
            <p class="text-gray-400 text-xl">
                #NewMemberFORTIK #FORTIK2025<br>
                @fortik_stdiis
            </p>
        </div>
    </div>

    <script>
        function kelulusanApp() {
            return {
                statusHalaman: 'input',
                nim: '',
                hasil: {},
                errorMessage: '',
                loading: false,
                loadingPhase: 'fast',
                
                async cekStatus() {
                    // Validasi input
                    if (!this.nim || this.nim.trim() === '') {
                        this.errorMessage = 'NIM tidak boleh kosong';
                        return;
                    }
                    
                    this.errorMessage = '';
                    this.loading = true;
                    this.statusHalaman = 'loading';
                    this.loadingPhase = 'fast';
                    
                    // Fase cepat (3 detik)
                    setTimeout(() => {
                        this.loadingPhase = 'slow';
                    }, 3000);
                    
                    try {
                        // Delay total 7 detik
                        const [response] = await Promise.all([
                            fetch('/api/cek-kelulusan', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({ nim: this.nim })
                            }),
                            new Promise(resolve => setTimeout(resolve, 7000))
                        ]);
                        
                        const data = await response.json();
                        
                        if (data.status === 'NOT_FOUND') {
                            this.errorMessage = 'NIM tidak ditemukan dalam database';
                            this.statusHalaman = 'input';
                            this.loading = false;
                            return;
                        }
                        
                        this.hasil = data;
                        
                        if (data.status === 'LULUS') {
                            this.statusHalaman = 'sukses';
                            // Trigger confetti
                            setTimeout(() => {
                                this.launchConfetti();
                            }, 300);
                        } else {
                            this.statusHalaman = 'gagal';
                        }
                        
                    } catch (error) {
                        console.error('Error:', error);
                        this.errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                        this.statusHalaman = 'input';
                    }
                    
                    this.loading = false;
                },
                
                launchConfetti() {
                    const duration = 3000;
                    const end = Date.now() + duration;
                    
                    const colors = ['#3B82F6', '#60A5FA', '#93C5FD', '#DBEAFE'];
                    
                    (function frame() {
                        confetti({
                            particleCount: 3,
                            angle: 60,
                            spread: 55,
                            origin: { x: 0 },
                            colors: colors
                        });
                        confetti({
                            particleCount: 3,
                            angle: 120,
                            spread: 55,
                            origin: { x: 1 },
                            colors: colors
                        });
                        
                        if (Date.now() < end) {
                            requestAnimationFrame(frame);
                        }
                    }());
                },
                
                gabungGrup() {
                    // Ganti dengan link Telegram grup koordinasi yang sebenarnya
                    const telegramLink = 'https://t.me/+X99oWcu2-jlmZDk1';
                    window.open(telegramLink, '_blank');
                },
                
                async bagikanHasil() {
                    // Update data di share card
                    document.getElementById('shareNama').textContent = this.hasil.nama;
                    document.getElementById('shareDivisi').textContent = this.hasil.divisi;
                    
                    const shareCard = document.getElementById('shareCard');
                    
                    try {
                        // Generate canvas dari share card
                        const canvas = await html2canvas(shareCard, {
                            backgroundColor: '#0A0F1A',
                            scale: 2,
                            logging: false,
                            useCORS: true
                        });
                        
                        // Convert ke blob dan download
                        canvas.toBlob((blob) => {
                            const url = URL.createObjectURL(blob);
                            const link = document.createElement('a');
                            link.download = `FORTIK-${this.hasil.nama.replace(/\s+/g, '_')}.png`;
                            link.href = url;
                            link.click();
                            URL.revokeObjectURL(url);
                        }, 'image/png');
                        
                    } catch (error) {
                        console.error('Error generating image:', error);
                        alert('Gagal membuat gambar. Silakan coba lagi.');
                    }
                },
                
                resetApp() {
                    this.statusHalaman = 'input';
                    this.nim = '';
                    this.hasil = {};
                    this.errorMessage = '';
                    this.loading = false;
                }
            }
        }
    </script>
    <x-footer></x-footer>
</body>
</html>