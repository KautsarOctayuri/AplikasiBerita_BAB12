<?php
include "koneksi.php";
if (isset($_GET['id'])){
    $id_kategori = $_GET['id'];
} else {
    die ("Error. No id Selected! ");
}
?>
<html>
  <head>
    <title>Delete Kategori</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_kategori.php">Arsip Kategori</a> |
    <a href="input_kategori.php">Input Kategori</a>
    <br /><br />
  <?php
    //proses delete kategori 
    if (!empty($id_kategori) && $id_kategori != "") { 
        $query = "DELETE FROM kategori WHERE id_kategori='$id_kategori'"; 
        $sql = mysqli_query($conn,$query); 
        if ($sql) { 
            echo "<h2><font color=blue> Kategori telah berhasil dihapus </font></h2>"; 
        } else { 
            echo "<h2><font color=red> Kategori gagal dihapus </font></h2>"; 
        } 
            echo "Klik <a href='arsip_kategori.php'>di sini</a>untuk kembali ke halaman arsip kategori"; 
    } else { 
        die ("Access Denied"); 
    }
 ?>
  </body>
</html>
