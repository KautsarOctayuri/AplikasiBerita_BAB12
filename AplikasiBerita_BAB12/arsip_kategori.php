<?php
include "koneksi.php";
?>
<html>
    <head>
        <title>
            Arsip Kategori
        </title>
        <link rel="stylesheet" href="style.css">
        <script language="javascript">
            function tanya() {
                if (confirm("Apakah Anda yakin akan menghapus kategori ini?")) {
                    return true;
                } 
                else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <a href="index.php">Halaman Depan</a> |
        <a href="arsip_kategori.php">Arsip Kategori</a> |
        <a href="input_kategori.php">Input Kategori</a> 
        <br><br>
        <h2>Arsip Kategori</h2>
        <ol>
            <?php
            $query = "SELECT * FROM kategori ";
                $sql = mysqli_query($conn, $query);
                while ($hasil = mysqli_fetch_array($sql)) {
                    $id_kategori = $hasil['id_kategori'];
                    $nm_kategori = $hasil['nm_kategori'];
                    $deskripsi = $hasil['deskripsi'];
                    //
                    //tampilkan arsip kategori
                    echo "<b> Nama Kategori : $nm_kategori</b>" ;
                    echo "<b> Dengan Deskripsi : $deskripsi</b>" ;
                    echo "<b>Action : </b><a href='edit_kategori.php?id=$id_kategori'>Edit</a> | ";
                    echo "<a href='delete_kategori.php?id=$id_kategori' onClik='return tanya()'>Delete</a>";
                    echo "</small></li><br><br>"; 
                       
                }
            ?>
        </ol>
    </body>
</html>