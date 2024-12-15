<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $travelKODE = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM travel  
    WHERE travelKODE = '$travelKODE'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='t-travel.php'</script>";
}

?>