<p align="center"><a href="https://fortik.stdiis.ac.id/" target="_blank"><img src="/public/images/logo-fortik-3b.png" width="200" alt="Logo Fortik"></a></p>

## Panduan Instalasi

1. Silakan untuk mengunduh **direktori** berikut:

- composer
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'c8b085408188070d5f52bcfe4ecfbee5f727afa458b2573b8eaaf77b3419b0bf2768dc67c86944da1544f06fa544fd47') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"
``` 

- npm
```bash
npm install
``` 

- flowbite

```bash
npm install flowbite
``` 
2. Salin file **.env.example** kedalam file **.env** dengan menjalankan perintah berikut:
```bash
cp .env.example .env
```
3. Generate **app key** dengan menjalankan perintah berikut:
 ```php
php artisan key:generate
```
4. Atur **database** ke **mysql** dan sesuaikan dengan konfigurasi masing-masing

5. Jalankan **database** di **DBngin**

6. Jalankan perintah `npm run dev`

### Developer

- **[Iqbal Ramadani](https://github.com/IqbalRamadani)**
- Farhan Syifaul Umam
- Muhammad Naufal 

