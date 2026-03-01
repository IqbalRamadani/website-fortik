<x-layout>
  <div class="px-6 pt-28 md:pt-32 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
  
            <section class="mb-16">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-koamaru mb-12 md:mb-20">MAKNA LAMBANG</h1>


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
                      <?= $index + 1 ?>
                    </p>
                    <p class="text-xl"><?= $text ?></p>
                  </div>
                <?php endforeach ?>
            </section>
  

                    <?php endforeach; ?>
                </div>
            </div>
    </section>
  </div>
</x-layout>