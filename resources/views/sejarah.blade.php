<x-layout>


    @php
    $timeline = [
    [
        "date" => "Sejak 2014",
        "title" => "Fasilitas teknologi mulai dikembangkan",
        "description" => "Sejak tahun 2014, UPT TIK STDI Imam Syafi’i Jember mulai mengembangkan fasilitas teknologi sebagai bentuk dukungan terhadap peningkatan literasi digital mahasiswa. Fasilitas ini meliputi penyediaan perangkat komputer, jaringan internet, serta pelatihan software dan pengembangan website berbasis open source. Langkah ini menjadi fondasi awal terbentuknya ekosistem teknologi di lingkungan kampus."
    ],
    [
        "date" => "Sekitar 2014–setelahnya",
        "title" => "Pembinaan komunitas teknologi mahasiswa",
        "description" => "UPT TIK tidak hanya menyediakan fasilitas, tetapi juga melakukan pembinaan intensif terhadap komunitas teknologi mahasiswa yang saat itu dikenal sebagai FORTI. Pembinaan ini berupa pelatihan rutin, pendampingan teknis, serta penyediaan laboratorium komputer sebagai pusat kegiatan belajar, diskusi, dan praktik pengembangan teknologi."
    ],
    [
        "date" => "Masa awal FORTI",
        "title" => "Aktivitas komunitas teknologi berjalan aktif",
        "description" => "Pada masa awalnya, komunitas FORTI menunjukkan perkembangan yang signifikan dengan berbagai kegiatan produktif. Anggota secara aktif mengadakan pelatihan internal, menjaga operasional laboratorium komputer, menyusun portofolio karya, serta memberikan pendampingan kepada mahasiswa yang ingin mempelajari komputer, desain, maupun software open source. Komunitas ini menjadi pusat pembelajaran teknologi di kalangan mahasiswa."
    ],
    [
        "date" => "Periode berikutnya",
        "title" => "FORTI menjadi nonaktif",
        "description" => "Seiring berjalannya waktu, komunitas FORTI mengalami penurunan aktivitas akibat tidak adanya regenerasi kepengurusan dan anggota baru. Kegiatan perlahan terhenti hingga akhirnya komunitas dinyatakan nonaktif. Dampaknya, laboratorium komputer yang sebelumnya menjadi pusat aktivitas teknologi juga sempat ditiadakan karena tidak adanya operator yang bertanggung jawab."
    ],
    [
        "date" => "Tahun 2022",
        "title" => "Pembentukan komunitas baru berbasis FOSS",
        "description" => "Pada tahun 2022, semangat pengembangan teknologi kembali dihidupkan melalui pembentukan komunitas Mahasiswa Free Open Source Software (MFS) STDI Imam Syafi’i Jember. Komunitas ini menjadi wadah baru bagi mahasiswa yang memiliki minat di bidang teknologi, khususnya dalam pemanfaatan dan pengembangan perangkat lunak berbasis Free Open Source Software (FOSS)."
    ],
    [
        "date" => "November - 2022",
        "title" => "Perencanaan menjadi UKM resmi",
        "description" => "Pada bulan November 2022, anggota MFS bersama UPT TIK mulai merancang transformasi komunitas menjadi Unit Kegiatan Mahasiswa (UKM) resmi. Proses ini meliputi penyusunan struktur organisasi, pembentukan tim eksekutif, penyusunan AD/ART, serta perencanaan program kerja yang lebih terarah dan berkelanjutan."
    ],
    [
        "date" => "13 Maret 2023",
        "title" => "Resmi menjadi UKM FORTIK",
        "description" => "Pada tanggal 13 Maret 2023, komunitas ini resmi berdiri sebagai UKM dengan nama Forum Teknologi Informasi dan Komunikasi (FORTIK) STDI Imam Syafi’i Jember. Pada hari yang sama, diselenggarakan Musyawarah Besar pertama sebagai momentum penetapan arah organisasi, pengesahan struktur kepengurusan, serta perumusan visi dan misi FORTIK."
    ],
    [
        "date" => "20 Maret 2023",
        "title" => "Pelantikan pengurus FORTIK pertama",
        "description" => "Tanggal 20 Maret 2023 menjadi momen bersejarah dengan dilantiknya kepengurusan angkatan pertama FORTIK. Pelantikan ini dilaksanakan bersamaan dengan pelantikan BEM STDIIS Jember dan seluruh UKM kampus, menandai pengakuan resmi FORTIK sebagai bagian dari organisasi kemahasiswaan di lingkungan kampus."
    ],
    [
        "date" => "Setelah resmi berdiri",
        "title" => "Pengembangan tujuan dan peran FORTIK",
        "description" => "Setelah resmi berdiri, FORTIK terus mengembangkan perannya sebagai pusat pengembangan skill teknologi mahasiswa. Kegiatan meliputi pelatihan Free Open Source Software (FOSS), workshop desain dan pemrograman, partisipasi dalam lomba teknologi, serta produksi karya nyata seperti website, aplikasi, dan desain grafis. FORTIK berkomitmen menjadi wadah pembinaan teknologi yang profesional, berkelanjutan, dan bermanfaat bagi civitas akademika."
    ],
    ];
    @endphp

    <div class="px-6 pt-28 md:pt-32 bg-white border-none">

        <div class="w-full max-w-6xl mx-auto">

            <h2 class="text-4xl font-extrabold text-koamaru mb-12 block lg:hidden">
                SEJARAH FORTIK
            </h2>

            <div class="wrapper flex gap-16 justify-between">

                <img src="sejarah/sejarah-fortik-text.svg"
                    alt="sejarah-fortik"
                    class="hidden lg:block w-20 h-full object-contain">

                <div class="relative">

                    <!-- Garis kiri -->
                    <div class="absolute left-2.5 top-5 h-full w-1 bg-lkoamaru"></div>

                    @foreach($timeline as $item)
                    <div class="relative pl-12 mb-12">

                        <!-- Titik -->
                        <div class="absolute left-0 top-1.5 w-6 h-6 bg-koamaru rounded-full shadow"></div>

                        <!-- Card -->
                        <div>
                            <h3 class="text-lg bg-koamaru font-bold inline-block px-2 py-1 text-white">
                                {{ $item['date'] }}
                            </h3>
                            <h1 class="text-3xl font-bold uppercase mt-2">
                                {{ $item['title'] }}
                            </h1>
                            <p class="mt-2 text-justify">
                                {{ $item['description'] }}
                            </p>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

</x-layout>