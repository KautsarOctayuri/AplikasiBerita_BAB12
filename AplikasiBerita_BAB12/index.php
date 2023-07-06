<?php
include "koneksi.php";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Index Berita</title>
  </head>
  <body>
    <center>
      <a href="index.php">Halaman Depan</a> |
      <a href="arsip_berita.php">Arsip Berita</a> |
      <a href="input_berita.php">Input Berita</a> |
      <a href="input_kategori.php">Input Kategori</a> 

      <br /><br />
      <h2>HALAMAN DEPAN BERITA PIKIRAN MAMANG</h2>
    </center>
  </body>
</html>
<?php
$query = "SELECT B.*,K.* FROM berita B,kategori K WHERE B.id_kategori=K.id_kategori";
$sql = mysqli_query ($conn,$query) ;
while ($hasil = mysqli_fetch_array($sql)) {
    $id_berita = $hasil['id_berita'];
    $kategori = $hasil['nm_kategori'];
    $judul = $hasil['judul'];
    $headline = $hasil['headline'];
    $pengirim = $hasil['pengirim'];
    $tanggal = $hasil['tanggal'];
//
//tampilan berita
    echo "<font size=4><a href= 'berita_lengkap.php?id=$id_berita'>$judul</a></font><br>";
    echo "<small> Berita dikirimkan oleh <b> $pengirim </b> pada tanggal <b> $tanggal</b> dalam kategori <b> $kategori </b> </small>";
    echo "<p>$headline</p>";
    echo "<hr>";
}
?>