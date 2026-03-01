<div class="px-6 accordion w-full min-h-auto lg:min-h-screen xl:bg-faq bg-contain bg-no-repeat bg-top py-6 md:py-8">
    
    <div x-data="{ activeIndex: null }" class="flex flex-col gap-2 w-full max-w-6xl mx-auto">
        <h2 class="text-3xl md:text-4xl lg:text-6xl font-bold text-center text-koamaru mb-4 lg:mb-8">FAQ</h2>
        
        @forelse($faqs as $index => $faq)
            <div class="flex flex-col w-full xl:w-3/4 mb-2">

                <button @click="activeIndex = activeIndex === {{ $index }} ? null : {{ $index }}" 
                        class="flex items-start justify-between gap-4 w-full p-4 text-left text-md font-medium text-white bg-koamaru/90 shadow-lg border border-default hover:text-white hover:bg-koamaru focus:text-white focus:bg-koamaru transition-all">
                    <span>{{ $faq->question }}</span>
                    
                    <svg :class="{ 'rotate-180': activeIndex === {{ $index }} }" 
                        class="w-6 h-6 transition-transform duration-300 shrink-0" 
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="activeIndex === {{ $index }}" 
                    x-collapse 
                    class="overflow-hidden text-md bg-white shadow-lg border-t-0 border-default"
                    style="display: none;">
                    <div class="p-4 text-koamaru">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 py-10">
                Belum ada data FAQ yang ditambahkan.
            </div>
        @endforelse
    </div>
</div>