<?php
include "koneksi.php";
//proses input kategori
if (isset($_POST['input'])) {
    $nm_kategori = $_POST['nm_kategori'];
    $deskripsi = $_POST['deskripsi'];
    //insert ke tabel
    $query = "INSERT INTO kategori VALUES('','$nm_kategori','$deskripsi' )";
    $sql = mysqli_query($conn,$query);
    if ($sql) {
        echo "<h2><font color=blue>Kategori telah berhasil ditambahkan</font></h2>";
    }
    else {
        echo "<h2><font color=blue>Kategori gagal ditambahkan</font></h2>";
    }
}
?>
<html>
<head>
  <title>Input Kategori</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <center>
  <a href="index.php">Halaman Depan</a> |
  <a href="arsip_kategori.php">Arsip Kategori</a> |
  <a href="input_kategori.php">Input Kategori</a>
  </center> 
  <br /><br />
  <form action="" method="post" name="input">
    <table cellpadding="0" cellspacing="0" border="0" width="700">
      <tr>
        <td colspan="2">
          <h2>Input Kategori</h2>
        </td>
      </tr>
      <tr>
        <td width="200">Nama Kategori</td>
        <td>: <input type="text" name="nm_kategori" size="30"></td>
      </tr>
            <tr>
        <td>deskripsi</td>
        <td>: <textarea name="deskripsi" cols="50" rows="20"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          &nbsp;&nbsp;<input type="submit" name="input" value="Input Kategori" />&nbsp;<input type="reset" name="reset"
            value="cancel" />
        </td>
      </tr>
    </table>
  </form>
</body>
</html>