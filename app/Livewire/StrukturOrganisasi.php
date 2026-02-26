<?php

namespace App\Livewire;

use App\Models\Division;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout')]
class StrukturOrganisasi extends Component
{
    public function render()
    {
        // Eksekusi Eager Loading (with) untuk membunuh N+1 Query.
        // Cache data ini selama 24 jam.
        $divisions = Cache::remember('struktur-organisasi', 86400, function () {
            return Division::with('members')
                ->orderBy('sort_order')
                ->get();
        });

        return view('livewire.struktur-organisasi', compact('divisions'));
    }
}
