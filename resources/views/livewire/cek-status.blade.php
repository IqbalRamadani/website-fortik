<div class="max-w-3xl mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 md:p-8">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Cek Status Pendaftaran</h2>
        <p class="text-sm text-gray-500 text-center mb-8">Masukkan Email dan Nomor WhatsApp yang Anda gunakan saat mendaftar.</p>

        <form wire:submit.prevent="cariData" class="max-w-md mx-auto space-y-4">
            <div>
                <input type="email" wire:model="email" placeholder="Alamat Email" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:ring-blue-600 focus:border-blue-600">
                @error('email') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <input type="text" wire:model="no_whatsapp" placeholder="Nomor WhatsApp" class="w-full px-4 py-3 rounded-lg border-gray-300 focus:ring-blue-600 focus:border-blue-600">
                @error('no_whatsapp') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
            </div>
            <button type="submit" wire:loading.attr="disabled" class="w-full bg-blue-800 text-white font-bold py-3 rounded-lg hover:bg-blue-900 transition">
                <span wire:loading.remove wire:target="cariData">Cari Data Saya</span>
                <span wire:loading wire:target="cariData">Mencari...</span>
            </button>
        </form>

        @if($sudahDicari)
            <div class="mt-10 border-t pt-8">
                @if(count($hasilPendaftarans) > 0)
                    <h3 class="font-bold text-gray-800 mb-4">Riwayat Pendaftaran Anda:</h3>
                    <div class="space-y-4">
                        @foreach($hasilPendaftarans as $pendaftaran)
                            <div class="border rounded-lg p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 {{ $pendaftaran->status === 'approved' ? 'bg-green-50 border-green-200' : 'bg-gray-50' }}">
                                <div>
                                    <h4 class="font-bold text-sm">{{ $pendaftaran->agenda->title }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">Tgl Daftar: {{ $pendaftaran->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="text-right flex flex-col items-end gap-2">
                                    @if($pendaftaran->status === 'pending')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">Menunggu Verifikasi</span>
                                    @elseif($pendaftaran->status === 'rejected')
                                        <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">Ditolak</span>
                                    @elseif($pendaftaran->status === 'approved')
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Disetujui</span>
                                        @if($pendaftaran->agenda->link_grup_wa)
                                            <a href="{{ $pendaftaran->agenda->link_grup_wa }}" target="_blank" class="text-xs bg-green-600 text-white px-3 py-1.5 rounded hover:bg-green-700 transition flex items-center gap-1">
                                                Gabung Grup WA
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6 bg-red-50 text-red-600 rounded-lg text-sm font-medium border border-red-100">
                        Data tidak ditemukan. Pastikan Email dan Nomor WhatsApp sesuai.
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>