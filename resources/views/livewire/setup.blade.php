<div class="min-h-screen flex items-center justify-center bg-gray-50 mt-10 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-2xl border border-gray-100">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-[#0B2161]">
                Inisialisasi Sistem
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Buat akun Super Admin pertama untuk web FORTIK. Halaman ini akan terkunci permanen setelah akun dibuat.
            </p>
        </div>
        
        <form wire:submit.prevent="createAdmin" class="mt-8 space-y-6">
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input wire:model="name" id="name" type="text" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-koamaru focus:border-koamaru focus:z-10 sm:text-sm">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Admin</label>
                    <input wire:model="email" id="email" type="email" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-koamaru focus:border-koamaru focus:z-10 sm:text-sm">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input wire:model="password" id="password" type="password" required class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-koamaru focus:border-koamaru focus:z-10 sm:text-sm">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#0B2161] hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-koamaru transition-colors">
                    <span wire:loading wire:target="createAdmin" class="mr-2">⌛</span>
                    Buat Akun & Masuk Panel
                </button>
            </div>
        </form>
    </div>
</div>
