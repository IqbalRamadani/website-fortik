<x-layout>
  <div class="px-6 py-12 md:py-16 lg:py-36 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
  
            <section class="mt-16 md:mt-10 lg:mt-0 mb-10 lg:mb-16">
              <p class="font-bold text-sm md:text-md lg:text-lg">TENTANG > MAKNA LAMBANG</p>
            </section>

            <section class="mb-16">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-koamaru mb-16">MAKNA LAMBANG</h1>

                <div class="place-items-center mb-16">
                  <img src="../images/logo-fortik-1b.png" class="w-40 lg:w-60" alt="Logo-FORTIK">
                </div>

                <div class="flex flex-col align-items-center justify-content-center gap-5">

                <?php 
                $texts = ["Lambang FORTIK STDI Imam Syafi’i Jember mengacu pada lambang STDI imam Syafi’i.","Arah Panah Keatas bermakna Bangkit menjadi kampus yang maju dalam dunia digital dengan meningkatkan pemahaman Mahasiswa di Bidang TIK.",
                "Orang Berkolaborasi mempunyai makna menjadi salah satu UKM yang aktif berkontribusi pada setiap acara yang diadakan kampus dan/atau setiap UKM kampus dalam merealisasikan Program Kerja yang direncanakan.",
                "Buku Terbuka (Edukasi) maknanya adalah fokus utama kami dalam menangani buta teknologi dan meningkatkan keterampilan setiap mahasiswa pada bidang digital.",
                "Huruf “T” yaitu Teknologi yang menjadi fokus utama UKM ini.",
                "Huruf “F” yakni Forum maksudnya adalah menjadi sebuah forum diskusi dan konsultasi yang berkaitan dengan teknologi informasi dan komunikasi.",
                "Jalan yang dimaksud jalan disini adalah Free Access. Maksudnya adalah diantara salah satu fokus kami adalah mengkampanyekan software-software berlisensi FOSS atau Free Open Source Software."];

                ?>

                <?php foreach ($texts as $index => $text) : ?>
                  <div class="flex gap-5 place-items-start lg:place-items-center">
                    <p class="px-4 py-2 bg-koamaru text-white ">
                      <?= $index + 1 ?>
                    </p>
                    <p><?= $text ?></p>
                  </div>
                <?php endforeach ?>

                <hr class="w-full h-1 bg-koamaru mt-8"></hr>
            </section>
  

    </div>
  </div>
</x-layout>