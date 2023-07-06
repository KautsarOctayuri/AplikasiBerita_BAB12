<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_berita = $_GET['id'];
} else {
    die ("Error. No Id Selected! ");
}
?>
<html>
    <head>
        <title>
            Berita Lengkap
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_berita.php">Arsip Berita</a> |
        <a href="input_berita.php">Input Berita</a> 
        <br><br>
        <h2>Berita Lengkap</h2>
        <?php
        $query = "SELECT B. id_berita, K. nm_kategori,B. judul, B.isi, B.pengirim, B.tanggal FROM berita B, kategori K WHERE B. id_kategori = K. id_kategori && B. id_berita = '$id_berita'";
            $sql = mysqli_query ($conn,$query) ;
            $hasil = mysqli_fetch_array ($sql);
            $id_berita = $hasil ['id_berita'];
            $kategori =$hasil['nm_kategori'];
            $judul =$hasil['judul'];
            $isi =$hasil['isi'];
            $pengirim =$hasil['pengirim'];
            $tanggal =$hasil['tanggal'];
            //
            //tampilkan berita
            echo "<font size=5 color=blue>$judul</font><br>";
            echo "<small>Berita dikirim oleh <b>$pengirim</b> pada tanggal <b>$tanggal</b> dalam kategori <b>$kategori</b></small>";
            echo "<p>$isi</p>";
        ?>
    </body>
</html>


