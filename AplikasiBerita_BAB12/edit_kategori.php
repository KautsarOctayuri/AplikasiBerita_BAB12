<?php
include "koneksi.php";
if (isset($_GET['id'])) 
{
     $id_kategori = $_GET['id'];
}
$query = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
$sql = mysqli_query ($conn,$query);
$hasil = mysqli_fetch_array ($sql);
$id_kategori = $hasil['id_kategori'];
$nm_kategori = $hasil['nm_kategori'];
$deskripsi = $hasil['deskripsi'];

//proses edit kategori
if (isset($_POST['Edit'])) {
    // $id_kategori = $_POST['nm_berita'];
    $nm_kategori = $_POST['nm_kategori'];
    $deskripsi = $_POST['deskripsi'];
    //update kategori
    $query = "UPDATE kategori SET id_kategori = '$id_kategori', nm_kategori = '$nm_kategori', deskripsi = '$deskripsi' WHERE id_kategori = '$id_kategori'";
    $sql = mysqli_query ($conn,$query);
    if ($sql) {
         echo "<h2?><font color = blue> Kategori telah berhasil diedit </font></h2>";
    } else {
        echo "<h2><font color = red> Kategori gagal diedit</font></h2>"; 
    }
}
?>
<html>
  <head>
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_kategori.php">Arsip Kategori</a> |
    <a href="input_kategori.php">Input Kategori</a>
    <br /><br />
    <form action="" method="POST" name="Edit">
      <table cellpadding="0" cellspacing="0" border="0" width="700">
        <tr>
          <td colspan="2"><h2>Input Kategori</h2></td>
        </tr>
        <tr>
          <td width="200">Nama Kategori</td>
          <td>
            :
            <input
              type="text"
              name="nm_kategori"
              size="30"
              value="<?php echo $nm_kategori ?>"
            />
          </td>
        </tr>
        <tr>
          <td>Deskripsi Kategori</td>
          <td>
            :
            <textarea name="deskripsi" cols="50" rows="4">
            <?=$deskripsi?></textarea
            >
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            &nbsp;&nbsp;
            <!-- <input type="hidden" name="hidberita" value="<?=$id_kategori?>" /> -->
            <input
              type="submit"
              name="Edit"
              value="Edit Kategori"
            />&nbsp; <input type="reset" name="reset" value="Cancel" />
          </td>
        </tr>
      </table>
    </form>
 </body>
</html>