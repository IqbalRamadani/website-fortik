<p align="center"><a href="https://fortik.stdiis.ac.id/" target="_blank"><img src="/public/images/logo-fortik-3b.png" width="200" alt="Logo Fortik"></a></p>

## Panduan Gabung Projek

1. Silakan **fork** terlebih dahulu repo ini
2. Siapkan **site** di herd **tanpa starter kit**
3. **Clone** repo fork tadi di github masing-masing 
4. Silakan untuk mengunduh **direktori** berikut:

- composer
```bash
composer install
``` 

- npm
```bash
npm install
``` 

- flowbite

```bash
npm install flowbite
```
- livewire
```bash
composer require livewire/livewire
```

5. Salin file **.env.example** kedalam file **.env** dengan menjalankan perintah berikut:
```bash
cp .env.example .env
```
6. Generate **app key** dengan menjalankan perintah berikut:
 ```php
php artisan key:generate
```
7. Atur **database** ke **mysql** di file .env dan sesuaikan dengan konfigurasi masing-masing

8. Jalankan **database** di **DBngin**

9. **Migrasi** database dengan menjalankan perintah `php artisan migrate`

10. Jalankan perintah `npm run dev`

### Developer

- **[Iqbal Ramadani](https://github.com/IqbalRamadani)**
- **[Farhan Syifaul Umam](https://github.com/farhansyflu)**
- **[Muhammad Naufal Irfansyah](https://github.com/Nawfall-stack)** 

