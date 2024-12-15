<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $kulinerKODE = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM kuliner 
    WHERE kulinerKODE = '$kulinerKODE'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='k-kuliner.php'</script>";
}

?>