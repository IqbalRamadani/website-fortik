<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layout')]
class Agenda extends Component
{
    use WithPagination;

    // Opsional: jika ingin menggunakan filter di masa depan
    public $search = '';

    public function render()
    {
        // Mengambil data dengan pagination (12 item per halaman agar pas untuk grid 3 dan 4)
        $agendas = Agenda::latest()->paginate(12);

        return view('livewire.agenda', [
            'agendas' => $agendas
        ]);
    }
}
