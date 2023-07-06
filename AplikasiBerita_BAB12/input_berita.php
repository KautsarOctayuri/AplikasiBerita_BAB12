<?php
include "koneksi.php";
//proses input berita
if (isset($_POST['input'])) {
    $judul = $_POST['judul'];
    $id_kategori = $_POST['id_kategori'];
    $headline = $_POST['headline'];
    $isi_berita = $_POST['isi'];
    $pengirim = $_POST['pengirim'];
    //insert ke tabel
    $query = "INSERT INTO berita VALUES('','$id_kategori','$judul','$headline','$isi_berita','$pengirim', now())";
    $sql = mysqli_query($conn,$query);
    if ($sql) {
        echo "<h2><font color=blue>Berita telah berhasil ditambahkan</font></h2>";
    }
    else {
        echo "<h2><font color=blue>Berita gagal ditambahkan</font></h2>";
    }
}
?>
<html>
<head>
  <title>Input Berita</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <center>
  <a href="index.php">Halaman Depan</a> |
  <a href="arsip_berita.php">Arsip Berita</a> |
  <a href="arsip_berita.php">Input Berita</a>
  </center> 
  <br /><br />
  <form action="" method="post" name="input">
    <table cellpadding="0" cellspacing="0" border="0" width="700">
      <tr>
        <td colspan="2">
          <h2>Input Berita</h2>
        </td>
      </tr>
      <tr>
        <td width="200">Judul Berita</td>
        <td>: <input type="text" name="judul" size="30"></td>
      </tr>
      <tr>
        <td>Kategori</td>
        <td>:
          <select name="id_kategori">
            <?php
$query = "SELECT * FROM kategori";
$sql = mysqli_query($conn, $query);
while ($hasil = mysqli_fetch_array($sql)) {
    $kategori_id = $hasil['id_kategori'];
    $kategori = $hasil['nm_kategori'];
    echo "<option value=$kategori_id>$kategori</option>";
}
?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Headline Berita</td>
        <td>: <textarea name="headline" cols="50" rows="4"></textarea></td>
      </tr>
      <tr>
        <td>Isi Berita</td>
        <td>: <textarea name="isi" cols="50" rows="10"></textarea></td>
      </tr>
      <tr>
        <td>pengirim</td>
        <td>: <textarea name="pengirim" cols="50" rows="20"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          &nbsp;&nbsp;<input type="submit" name="input" value="Input Berita" />&nbsp;<input type="reset" name="reset"
            value="cancel" />
        </td>
      </tr>
    </table>
  </form>
</body>
</html>