
# Tamu PTSP

adalah aplikasi untuk mendata pengunjung yang datang ke Pelayanan Terpadu Satu Pintu (PTSP).

## Instalasi

1. Pindahkan folder ini ke komputer server yang sama dengan folder SIPP.
2. Buat database dengan nama `ptsp_tamu` di server yang sama dengan database SIPP.
3. Silahkan import file sql yang ada di folder ini.
4. Buka file `application/config/database.php` dan `application/config/ptsp_tamu_config.php`.
5. Sesuaikan username, password, dan databasenya.  
`database.php`
```
$db['default'] = array(
	...
	'username' => 'root',
	'password' => '',
	'database' => 'ptsp_tamu',
	...
);

$db['sipp'] = array(
	...
	'username' => 'root',
	'password' => '',
	'database' => 'sipp',
	...
);
```
`ptsp_tamu_config.php`
```
$config['sipp'] = "sipp";
$config['ini'] = "ptsp_tamu";
```
6. Buka browser dan masukkan `IP SERVER/ptsp_tamu`.
7. Data login
```
username : rahasia
password : tidakpakaipassword
```
8. Lakukan pengaturan browser dengan mengizinkan penggunaan kamera untuk mengambil gambar pihak yang berkunjung ke PTSP. Cara [Izin Kamera.](https://support.google.com/chrome/answer/2693767). Apabila server tidak menggunakan https silahkan masukkan alamat ini pada browser chrome anda. Untuk pengguna browser lain bisa dicari di google untuk caranya.
```
chrome://flags/#unsafely-treat-insecure-origin-as-secure
```
9. Masukkan alamat server anda di kotak `Insecure origins treated as secure` setelah itu pilih dropdown di sebelahnya menjadi Enabled.
![alt text](https://github.com/topyk27/ptsp_tamu/blob/main/asset/img/img-1.png?raw=true)
10. Kemudian apabila muncul gambar seperti di bawah ini, silahkan pilih Allow.
![alt text](https://github.com/topyk27/ptsp_tamu/blob/main/asset/img/img-2.png?raw=true)

## Frequently Asked Questions
- Upload foto gagal atau tidak masuk?
>Ubah permission untuk folder `asset/img` dan `upload` menjadi 777 biar yakin
---

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)