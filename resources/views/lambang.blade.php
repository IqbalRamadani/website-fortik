@php 
    $texts = 
	[
		"Lambang FORTIK STDI Imam Syafi’i Jember mengacu pada lambang STDI imam Syafi’i.",
		"Arah Panah Keatas bermakna Bangkit menjadi kampus yang maju dalam dunia digital dengan meningkatkan pemahaman Mahasiswa di Bidang TIK.",
		"Orang Berkolaborasi mempunyai makna menjadi salah satu UKM yang aktif berkontribusi pada setiap acara yang diadakan kampus dan/atau setiap UKM kampus dalam merealisasikan Program Kerja yang direncanakan.",
		"Buku Terbuka (Edukasi) maknanya adalah fokus utama kami dalam menangani buta teknologi dan meningkatkan keterampilan setiap mahasiswa pada bidang digital.",
		"Huruf “T” yaitu Teknologi yang menjadi fokus utama UKM ini.",
		"Huruf “F” yakni Forum maksudnya adalah menjadi sebuah forum diskusi dan konsultasi yang berkaitan dengan teknologi informasi dan komunikasi.",
		"Jalan yang dimaksud jalan disini adalah Free Access. Maksudnya adalah diantara salah satu fokus kami adalah mengkampanyekan software-software berlisensi FOSS atau Free Open Source Software."
	];
@endphp

<x-layout>
	<div class="px-6 py-12 bg-white border-none">
        <div class="w-full max-w-6xl mx-auto">
            <section class="mb-16">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-koamaru mb-12 md:mb-20">MAKNA LAMBANG
				</h1>
                <div class="flex flex-col align-items-center justify-content-center gap-5">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-20 relative">
                        <?php foreach ($details as $index => $detail): ?>
                            <div class="text-center p-3 md:p-6 shadow-lg">
                                <div class="flex justify-center mb-6">
                                    <img src=<?= $detail["gambar"] ?> alt="" class="w-35">
                                </div>
                                <?php foreach ($texts as $index => $text) : ?>
                                    <div class="flex gap-5 place-items-start lg:place-items-center">
                                        <p class="px-4 py-2 bg-koamaru text-white ">
                                        <?= $index + 1 ?></p>
                                        <p class="text-xl"><?= $text ?></p>
                                    </div>
                                <?php endforeach ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>