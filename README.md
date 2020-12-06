# Dian monit service

Dian monit service adalah aplikasi pusat kontrol dari Learning Management System. Yang akan menampilkan siswa login, masuk dan rekapitulasi masalah dan absensi dari sekolah sekolah yang terdaftar.
## Installation

Buat copy dari .env.example .env atau jalankan
``` 
cp .env.example .env
```
Kemudian generate key 
``` 
php artisan key:generate
```
Lalu konfigurasi database sesuai dengan environment.\
setelah itu jalankan sylink
```
php aritsan storage:link
```

## Development
``` 
php artisan serve
```
## Production
``` 
php artisan optimize
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
