<?php

namespace App\Livewire;

use App\Models\Pendaftaran;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout')]
class CekStatus extends Component
{
    public $email;
    public $no_whatsapp;
    public $hasilPendaftarans = [];
    public $sudahDicari = false;

    public function cariData()
    {
        $this->validate([
            'email' => 'required|email',
            'no_whatsapp' => 'required|numeric',
        ]);

        $this->hasilPendaftarans = Pendaftaran::with('agenda')
            ->where('email', $this->email)
            ->where('no_whatsapp', $this->no_whatsapp)
            ->get();

        $this->sudahDicari = true;
    }

    public function render() { 
        return view('livewire.cek-status'); 
    }
}
