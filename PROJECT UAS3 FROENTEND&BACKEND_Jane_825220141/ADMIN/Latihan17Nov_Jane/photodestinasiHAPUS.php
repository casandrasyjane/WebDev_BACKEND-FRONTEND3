<?php
include "include/config.php";
if(isset($_GET['hapus']))
{
    $kodefoto = $_GET['hapus'];
    mysqli_query($connection, "DELETE FROM fotodestinasi  
    WHERE fotodestinasiKODE = '$kodefoto'");
    echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='photodestinasi.php'</script>";
}

?>