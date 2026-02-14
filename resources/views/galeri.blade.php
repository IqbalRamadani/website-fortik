<x-layout>
  <div class="px-6 py-12 md:py-16 lg:py-36 bg-white border-none">
    <div class="w-full max-w-6xl mx-auto">
    <section class="place-items-center">
      <img src="images/AlbumFORTIK.svg" class="w-70 place-items-center mb-16" alt="judul">
    </section>

    <?php
    $albums = [
        [
            "nama"  => "Open Recruitment",
            "image" => "images/img-0.png",
            "link"  => "album/open-recruitment.php"
        ],
        [
            "nama"  => "Training",
            "image" => "images/img-0.png",
            "link"  => "album/training.php"
        ],
        [
            "nama"  => "Tataran Arutala",
            "image" => "images/img-0.png",
            "link"  => "album/tataran-arutala.php"
        ],
        [
            "nama"  => "Mubes",
            "image" => "images/img-0.png",
            "link"  => "album/mubes.php"
        ],
        [
            "nama"  => "Makrab",
            "image" => "images/img-0.png",
            "link"  => "album/makrab.php"
        ],
        [
            "nama"  => "Pelatihan",
            "image" => "images/img-0.png",
            "link"  => "album/pelatihan.php"
        ],
        [
            "nama"  => "Fortik's Fair",
            "image" => "images/img-0.png",
            "link"  => "album/fortiks-fair.php"
        ],
        [
            "nama"  => "Reorganisasi",
            "image" => "images/img-0.png",
            "link"  => "album/reorganisasi.php"
        ]
    ];
    ?>
    <div class="grid grid-cols-4 gap-2">
        <?php foreach ($albums as $album) : ?>
        <a href="<?= $album["link"] ?>" class="block group">
            <div class="flex flex-col place-items-center hover:bg-gray-200 p-5 w-70 overflow-hidden group">
              <img src="<?= $album["image"] ?>" alt="" class="w-full h-full object-cover transition-transform duration-300 ease-in-out group-hover:scale-102 mb-3">
              <p class="font-bold text-koamaru text-xl"><?= $album["nama"] ?></p>
            </div>
          <?php endforeach ?>
      </div>
        </a>



    </div>    
  </div>
</x-layout>