<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Layout('components.layout')]
class Setup extends Component
{
    public $name;
    public $email;
    public $password;

    public function mount()
    {
        // PENGUNCI ABSOLUT: 
        // Cegah akses jika tabel users belum di-migrate (Error 500) 
        // atau jika admin sudah ada (Error 404).
        try {
            if (User::count() > 0) {
                abort(404); // Bunuh rute ini selamanya jika admin sudah ada
            }
        } catch (\Exception $e) {
            abort(500, 'Database belum tersambung atau belum di-migrate oleh IT Kampus.');
        }
    }

    public function createAdmin()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Pencegahan ganda (Race Condition Guard)
        if (User::count() > 0) {
            abort(404);
        }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // // Kita gunakan try-catch agar jika role belum ter-generate di DB, sistem tidak crash
        // try {
        //     $user->assignRole('super_admin'); 
        // } catch (\Exception $e) {
        //     // Jika gagal assign role, biarkan saja dulu atau log error-nya
        // }

        // Berikan Role Super Admin secara otomatis
        // Kita cek dulu apakah role-nya ada, jika belum ada kita buatkan.
        $role = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        
        $user->assignRole($role);

        // Langsung login-kan user tersebut setelah akun dibuat
        Auth::login($user);

        // Lempar langsung ke panel Filament
        return redirect()->to('/admin');
    }

    public function render()
    {
        return view('livewire.setup');
    }
}
