<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $berita0141 = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM jane  
    WHERE berita0141 = '$berita0141'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='b-berita.php'</script>";
}

?>