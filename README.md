
# Tamu PTSP

adalah aplikasi untuk mendata pengunjung yang datang ke Pelayanan Terpadu Satu Pintu (PTSP).

## Instalasi

1. Pindahkan folder ini ke komputer server yang sama dengan folder SIPP.
2. Buat database dengan nama `ptsp_tamu` di server yang sama dengan database SIPP.
3. Silahkan import file sql yang ada di folder ini.
4. Buka file `application/config/database.php`.
5. Sesuaikan username, password, dan databasenya.
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
6. Buka file `application/config/ptsp_config` dan sesuaikan nama PA.
7. Buka browser dan masukkan `IP SERVER/ptsp_tamu`.
8. Data login
```
username : admin
password : iniadmin
```
9. Lakukan pengaturan browser dengan mengizinkan penggunaan kamera untuk mengambil gambar pihak yang berkunjung ke PTSP. Cara [Izin Kamera.](https://support.google.com/chrome/answer/2693767). Apabila server tidak menggunakan https silahkan masukkan alamat ini pada browser chrome anda. Untuk pengguna browser lain bisa dicari di google untuk caranya.
```
chrome://flags/#unsafely-treat-insecure-origin-as-secure
```
10. Masukkan alamat server anda di kotak `Insecure origins treated as secure` setelah itu pilih dropdown di sebelahnya menjadi Enabled.
11. Kemudian apabila muncul gambar seperti di bawah ini, silahkan pilih Allow.
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)