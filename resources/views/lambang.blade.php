<x-layout>
  <div class="px-6 py-12 md:py-16 lg:py-36 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
      
      <section>
          <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-koamaru mb-16">MAKNA LAMBANG</h1>

          <div class="place-items-center md:place-items-start mb-32 flex flex-col md:flex-row gap-16">
              <img src="images/logo-fortik-1b.png" class="w-40 lg:w-60" alt="Logo-FORTIK">
              <h1 class="text-koamaru text-justify text-xl lg:text-2xl ">      Perkembangan zaman yang disertai dengan kemajuan teknologinya menuntut kita untuk lebih aktif dalam mengelola dan mengolah teknologi dengan sebaik mungkin. Hal inilah yang menjadi perhatian FORTIK untuk dapat meningkatkan serta mengembangkan keterampilan setiap mahasiswa dalam bidang digital, dengan berbagai pelayanan yang ditawarkan mulai dari bentuk kerjasama antar UKM hingga pelayanan pendidikan yang dapat diakses oleh setiap mahasiswanya. FORTIK hadir untuk dapat membangkitkan semangat mahasiswa dalam berteknologi serta menciptakan kampus yang maju dalam dunia digital.</h1>
          </div>


          <div class="flex flex-col align-items-center justify-content-center gap-5">

                      <?php 
                      $details = [
                          [
                              "judul" => "Arah panah keatas",
                              "deskripsi" => "Bangkit menjadi kampus yang maju dalam dunia digital dengan meningkatkan pemahaman mahasiswa dalam mengelola dan mengolah teknologi.",
                              "gambar" => "images/panah-keatas.webp"
                          ],
                          [
                              "judul" => "Orang (Kolaborasi)",
                              "deskripsi" => "Menjadi salah satu Unit Kegiatan Mahasiswa yang aktif berkontribusi pada setiap acara yang diadakan oleh kampus, serta membantu setiap UKM kampus dalam merealisasikan Program kerja yang direncanakan.",
                              "gambar" => "images/orang-fortik.webp"
                          ],
                          [
                              "judul" => "Buku (Edukasi)",
                              "deskripsi" => "Menjadi salah satu fokus utama dalam menangani buta teknologi dan meningkatkan keterampilan setiap mahasiswa pada bidang digital.",
                              "gambar" => "images/buku-fortik.webp"
                          ],
                          [
                              "judul" => 'Huruf "T" (Teknologi)',
                              "deskripsi" => "Teknologi merupakan fokus utama FORTIK.",
                              "gambar" => "images/huruf-t.webp"
                          ],
                          [
                              "judul" => 'Huruf "F" (Forum)',
                              "deskripsi" => "Menjadi sebuah forum diskusi dan konsultasi yang berkaitan dengan teknologi, informasi dan komunikasi.",
                              "gambar" => "images/huruf-f.webp"
                          ],
                          [
                              "judul" => "Jalan (Free Access)",
                              "deskripsi" => "Menjadi salah satu fokus utama kami; bahwa software-software yang kami kampanyekan berlisensi FOSS (Free Open Source Software).",
                              "gambar" => "images/free-access.webp"
                          ],
                      ];
                      ?>

                          <div class="grid md:grid-cols-3 gap-20 relative">
                                  <?php foreach ($details as $index => $detail): ?>
                                      <div class="text-center p-3 lg:p-6 shadow-lg">

                                          <div class="flex justify-center mb-6">
                                              <img src=<?= $detail["gambar"] ?> alt="" class="w-35">
                                          </div>

                                          <h3 class="text-lg font-bold text-blue-800 mb-3">
                                              <?= $detail['judul'] ?>
                                          </h3>

                                          <p class="text-koamaru leading-relaxed">
                                              <?= $detail['deskripsi'] ?>
                                          </p>
                                      </div>

                                  <?php endforeach; ?>
                              </div>
                  </section>
          </div>
  </div>
</x-layout>