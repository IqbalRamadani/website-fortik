<?php

namespace App\Livewire;

use App\Models\Submission;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout')]
class CekStatus extends Component
{
    public $email;
    public $no_whatsapp;
    public $hasilSubmissions = [];
    public $sudahDicari = false;

    public function cariData()
    {
        $this->validate([
            'email' => 'required|email',
            'no_whatsapp' => 'required|numeric',
        ]);

        $this->hasilSubmissions = Submission::with('agenda')
            ->where('email', $this->email)
            ->where('no_whatsapp', $this->no_whatsapp)
            ->get();

        $this->sudahDicari = true;
    }

    public function render() { 
        return view('livewire.cek-status'); 
    }
}
