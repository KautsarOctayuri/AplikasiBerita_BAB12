<?php
include "koneksi.php";
if (isset($_GET['id'])) 
{
     $id_berita = $_GET['id'];
}
$query = "SELECT id_berita, id_kategori, judul, headline, isi, pengirim, tanggal FROM berita WHERE id_berita = '$id_berita'";
$sql = mysqli_query ($conn,$query);
$hasil = mysqli_fetch_array ($sql);
$id_berita = $hasil['id_berita'];
$id_kategori = $hasil['id_kategori'];
$judul = $hasil['judul'];
$headline = $hasil['headline'];
$isi = $hasil['isi'];
$pengirim = $hasil['pengirim'];
$tanggal = $hasil['tanggal'];

//proses edit berita
if (isset($_POST['Edit'])) {
    // $id_berita = $_POST['nm_berita'];
    $judul = $_POST['judul'];
    $kategori = $_POST ['kategori'];
    $headline = $_POST['headline'];
    $isi_berita = $_POST['isi'];
    $pengirim = $_POST['pengirim'];
    //update berita
    $query = "UPDATE berita SET id_kategori = '$kategori', judul = '$judul', headline = '$headline', isi = '$isi_berita', pengirim = '$pengirim'WHERE id_berita = '$id_berita'";
    $sql = mysqli_query ($conn,$query);
    if ($sql) {
         echo "<h2?><font color = blue> Berita telah berhasil diedit </font></h2>";
    } else {
        echo "<h2><font color = red> Berita gagal diedit</font></h2>"; 
    }
}
?>
<html>
  <head>
    <title>Edit Berita</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <a href="index.php">Halaman Depan</a> |
    <a href="arsip_berita.php">Arsip Berita</a> |
    <a href="input_berita.php">Input Berita</a>
    <br /><br />
    <form action="" method="POST" name="input">
      <table cellpadding="0" cellspacing="0" border="0" width="700">
        <tr>
          <td colspan="2"><h2>Input Berita</h2></td>
        </tr>
        <tr>
          <td width="200">Judul Berita</td>
          <td>
            :
            <input
              type="text"
              name="judul"
              size="30"
              value="<?php echo $judul ?>"
            />
          </td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td>:
            <select name="kategori">
            <?php
            $query = "SELECT id_kategori, nm_kategori FROM kategori ORDER BY nm_kategori";
            $sql = mysqli_query ($conn,$query);
            while ($hasil = mysqli_fetch_array($sql)) {
                $selected = ($hasil['id_kategori']==$id_kategori) ? "selected" : "";
                echo"<option value='$hasil[id_kategori]'$selected>$hasil[nm_kategori]</option>";
             }
            ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Headline Berita</td>
          <td>
            :
            <textarea name="headline" cols="50" rows="4">
            <?=$headline?></textarea
            >
          </td>
        </tr>
        <tr>
          <td>Isi Berita</td>
          <td>
            : <textarea name="isi" cols="50" rows="10"><?=$isi?></textarea>
          </td>
        </tr>
        <tr>
          <td>Pengirim</td>
          <td>
            :
            <input
              type="text"
              name="pengirim"
              size="20"
              value="<?=$pengirim?>"
            />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            &nbsp;&nbsp;
            <input type="hidden" name="hidberita" value="<?=$id_berita?>" />
            <input
              type="submit"
              name="Edit"
              value="Edit Berita"
            />&nbsp; <input type="reset" name="reset" value="Cancel" />
          </td>
        </tr>
      </table>
    </form>
 </body>
</html>