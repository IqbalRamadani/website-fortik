<div class="max-w-2xl mx-auto p-6 bg-white rounded-xl shadow-lg border border-gray-100 mt-8">
    
    <div class="mb-8 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-900">Form Pendaftaran</h2>
        <p class="text-sm text-gray-500 mt-1">{{ $agenda->title }}</p>
    </div>

    @if (session()->has('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded text-sm font-medium">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" wire:model="nama_lengkap" class="w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm" placeholder="Sesuai KTP/KTM">
                @error('nama_lengkap') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email Aktif</label>
                <input type="email" wire:model="email" class="w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm" placeholder="email@contoh.com">
                @error('email') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp</label>
                <input type="text" wire:model="no_whatsapp" class="w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm" placeholder="081234567890">
                @error('no_whatsapp') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Asal Instansi/Kampus</label>
                <input type="text" wire:model="instansi" class="w-full px-4 py-2.5 rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm" placeholder="Nama Universitas / Sekolah">
                @error('instansi') <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-8 bg-gray-50 p-5 rounded-lg border border-gray-200">
            
            <label class="block text-sm font-semibold text-gray-800 mb-2">
                @if($agenda->is_free)
                    Bukti Share Postingan (Min. 3 Grup) <span class="text-red-500">*</span>
                @else
                    <img src="{{ $agenda->qris }}" alt="qris" class="w-48 mb-4">
                    Bukti Pembayaran (Rp {{ number_format($agenda->price, 0, ',', '.') }}) <span class="text-red-500">*</span>
                @endif
            </label>
            
            <p class="text-xs text-gray-500 mb-4">
                @if($agenda->is_free)
                    Jadikan 1 gambar (Grid/Kolase) jika berupa banyak screenshot. Format: JPG/PNG, Maksimal 2MB.
                @else
                    Format: JPG, PNG, atau PDF. Maksimal 2MB.
                @endif
            </p>

            <input type="file" wire:model="bukti_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 border border-gray-300 rounded-lg cursor-pointer bg-white">
            
            <div wire:loading wire:target="bukti_file" class="text-sm text-blue-600 mt-2 font-medium flex items-center gap-2">
                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10" stroke-width="4" class="opacity-25"></circle><path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" class="opacity-75"></path></svg>
                Mengunggah file...
            </div>

            @error('bukti_file') <span class="text-xs text-red-600 mt-2 block font-medium">{{ $message }}</span> @enderror
        </div>

        <div class="mt-8">
            <button type="submit" wire:loading.attr="disabled" class="w-full bg-blue-800 text-white font-bold py-3.5 px-4 rounded-lg hover:bg-blue-900 transition flex justify-center items-center gap-2 disabled:opacity-70 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="submit">Kirim Pendaftaran</span>
                <span wire:loading wire:target="submit" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10" stroke-width="4" class="opacity-25"></circle><path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" class="opacity-75"></path></svg>
                    Memproses...
                </span>
            </button>
        </div>

    </form>
</div>
