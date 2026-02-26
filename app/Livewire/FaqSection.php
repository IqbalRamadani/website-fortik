<?php

namespace App\Livewire;

use App\Models\Faq;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class FaqSection extends Component
{
    public function render()
    {
        // Kunci query ke dalam cache selama 24 jam
        $faqs = Cache::remember('faqs_data', 86400, function () {
            return Faq::orderBy('sort_order')->get();
        });

        return view('livewire.faq-section', compact('faqs'));
    }
}
