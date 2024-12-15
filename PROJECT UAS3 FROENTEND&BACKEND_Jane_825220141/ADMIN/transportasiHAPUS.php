<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $transportasiKODE = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM transportasi  
    WHERE transportasiKODE = '$transportasiKODE'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='t-transportasi.php'</script>";
}

?>