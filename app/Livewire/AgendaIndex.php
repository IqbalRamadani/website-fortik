<?php

namespace App\Livewire;

use App\Models\Agenda;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layout')]
class AgendaIndex extends Component
{
    use WithPagination;

    #[Url(history: true)] public $search = '';
    #[Url(history: true)] public $level = '';
    #[Url(history: true)] public $filter_is_free = '';

    public function updatedSearch() { $this->resetPage(); }
    public function updatedLevel() { $this->resetPage(); }
    public function updatedFilterIsFree() { $this->resetPage(); }

    public function render()
    {
        $agendas = Agenda::query()
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->when($this->level, fn($q) => $q->where('level', $this->level))
            ->when($this->filter_is_free !== '', fn($q) => $q->where('is_free', $this->filter_is_free))
            ->latest()->paginate(12);

        return view('livewire.agenda-index', ['agendas' => $agendas]);
    }
}
