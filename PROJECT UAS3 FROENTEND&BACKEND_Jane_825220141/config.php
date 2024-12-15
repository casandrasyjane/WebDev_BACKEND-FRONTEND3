<?php
// koneksi ke basis data
$servername = "localhost";
$usernname = "root";
$password = "";
$dbname = "pesonajawa";

// variabel koneksi utk melakukan koneksi ke database (connection bila diubah nilainya)
$connection = mysqli_connect($servername, $usernname, $password, $dbname);
if(!$connection)
{
    // jika tidak berhasil terkoneksi aka memunculkan tulisan error
    die("connection failed: ".mysqli_connect_error());
}

?>