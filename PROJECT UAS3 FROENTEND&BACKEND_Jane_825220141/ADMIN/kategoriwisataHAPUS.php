<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $kategoriKODE = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM kategoriwisata  
    WHERE kategoriKODE = '$kategoriKODE'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='k-kategoriwisata.php'</script>";
}

?>