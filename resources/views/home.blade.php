<x-layout>
  {{-- <x-slot:title>{{ $title }}</x-slot:title> --}}
  <x-hero></x-hero>
  {{-- <div class="bg-gradient-to-r from-koamaru to-matcha">
    <div class="max-w-7xl mx-auto grid grid-cols-1 justify-baseline place-items-center text-center leading-none px-12 py-6 gap-8 md:grid-cols-2 lg:px-8 lg:py-16">
      <div class="mx-auto">
        <img src="{{ asset('images/logo-fortik-1w.png') }}" alt="Logo Fortik" class="w-[116px] h-[160px] lg:w-[145px] lg:h-[200px]">
      </div>
      <div class="mx-auto">
        <h2 class="mb-3 font-bold text-2xl text-white md:text-2xl lg:text-3xl lg:mb-6">Apa Itu UKM FORTIK?</h2>
        <p class="max-w-2xl font-semibold text-wrap text-base text-white md:text-lg lg:text-xl">FORTIK adalah singkatan dari &lpar;Forum Teknologi Informasi dan Komunikasi&rpar;. Forum ini adalah forum yang dibentuk untuk menjadi wadah mahasiswa yang memiliki minat dan bakat di bidang teknologi agar mereka lebih terarah, bukan untuk membatasi. Kedepannya forum ini akan bekerja sama dengan UPT TIK STDI Imam Syafi'i Jember.</p>
      </div>
    </div>
  </div> --}}
  <x-about-us></x-about-us>
  <x-number-counting></x-number-counting>
  {{-- <hr class="h-px bg-gray-500 border-0 text-shadow-supernova-xl/50"> --}}
  <x-team></x-team>
  <x-gallery></x-gallery>
  <x-faq></x-faq>
</x-layout>