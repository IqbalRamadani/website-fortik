@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="flex justify-center mt-8">
        <div class="inline-flex rounded-base shadow-xs -space-x-px" role="group">
            
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <button disabled type="button" class="inline-flex items-center justify-center text-white bg-koamaru rounded-s-base box-border border border-default-medium leading-5 w-9 h-9 opacity-50 cursor-not-allowed">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                </button>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" type="button" class="inline-flex items-center justify-center text-white bg-koamaru rounded-s-base box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary leading-5 w-9 h-9 focus:outline-none transition-colors">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                </button>
            @endif

            {{-- Indikator Halaman (Dinamis) --}}
            <button type="button" class="inline-flex shrink-0 text-sm items-center justify-center text-white bg-koamaru box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading leading-5 px-3 h-9 focus:outline-none cursor-default">
                {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
            </button>

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" type="button" class="inline-flex items-center justify-center text-white bg-koamaru rounded-e-base box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-3 focus:ring-neutral-tertiary leading-5 w-9 h-9 focus:outline-none transition-colors">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                </button>
            @else
                <button disabled type="button" class="inline-flex items-center justify-center text-white bg-koamaru rounded-e-base box-border border border-default-medium leading-5 w-9 h-9 opacity-50 cursor-not-allowed">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                </button>
            @endif
            
        </div>
    </nav>
@endif