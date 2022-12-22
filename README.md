# Laundry

Tugas UKL Kelas 11 Semester Genap Menggunakan PHP Native


## Pembuat

- [@nabils24](https://www.github.com/nabils24)



## Instal

Install my-project with npm

```bash
  git clone https://github.com/nabils24/ukl_laundry.git
  cd ukl_laundry
```
Atur Koneksi di `Config/Koneksi.php`
```bash
<?php
// koneksi database db_laundry dengan user root dan password 
$conn = mysqli_connect('localhost','root','','db_laundry');

// cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```


Username & Password

    -> Username admin -> admin
    -> Password admin -> admin123

    -> Username kasir -> naia
    -> Password kasr  -> kasir123

    -> Username Owner -> nabil
    -> Password admin -> owner123
## Screenshots

Login
![App Screenshot](https://telegra.ph/file/9500756f4c62edb776603.png)

Admin
![App Screenshot](https://telegra.ph/file/82139576e845439339240.png)

Kasir
![App Screenshot](https://telegra.ph/file/f275f1720beaa6015f970.png)

Owner
![App Screenshot](https://telegra.ph/file/8a1497f4269592f3300c7.png)





## Fitur

- CRUD PHP Native
- Owner | Kasir | Admin 
- Cek Sendiri


## license

[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)



## Feedback

Jika ada bug atau mau kasih saran bisa hubungi email saya nabilsahsadacode@gmail.com

Oh, iya jangan lupa starnya yaaaa🌟🌟

Makasihhh
