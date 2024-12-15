<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $hotelNAMA = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM hotel
        WHERE hotelNAMA = '$hotelNAMA'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='h-hotel.php'</script>";
}

?>

