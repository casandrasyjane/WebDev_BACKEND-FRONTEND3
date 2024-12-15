<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM destinasi");
    //untuk menghitung total jumlah rows nya
    $jumlah = mysqli_num_rows($sql);
?>                        

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM kategoriwisata");
    //untuk menghitung total jumlah rows nya
    $jumlah1 = mysqli_num_rows($sql);
?> 

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM fotodestinasi");
    //untuk menghitung total jumlah rows nya
    $jumlah2 = mysqli_num_rows($sql);
?> 

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM jane");
    //untuk menghitung total jumlah rows nya
    $jumlah3 = mysqli_num_rows($sql);
?> 

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM hotel");
    //untuk menghitung total jumlah rows nya
    $jumlah4 = mysqli_num_rows($sql);
?>

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM kuliner");
    //untuk menghitung total jumlah rows nya
    $jumlah5 = mysqli_num_rows($sql);
?>

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM travel");
    //untuk menghitung total jumlah rows nya
    $jumlah6 = mysqli_num_rows($sql);
?>

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM transportasi");
    //untuk menghitung total jumlah rows nya
    $jumlah7 = mysqli_num_rows($sql);
?>

<?php
    include "config.php";
    $sql = mysqli_query($connection,"SELECT * FROM sandra");
    //untuk menghitung total jumlah rows nya
    $jumlah8 = mysqli_num_rows($sql);
?>
                        <div class="row">

                        <!--ini untuk membuat tampilannya sehingga memunculkan total rows-->
                        <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Destinasi Wisata: 
                                        <?php echo $jumlah; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftardestinasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Kategori Wisata:
                                        <?php echo $jumlah1; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarwisata.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Obat-obatan:
                                        <?php echo $jumlah2; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarobat.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Berita-berita Terkini:
                                        <?php echo $jumlah3; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarberita.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Hotel Terlaris:
                                        <?php echo $jumlah4; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarhotel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Kuliner Saat Ini:
                                        <?php echo $jumlah5; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftarkuliner.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Daftar Travel Terlaris:
                                        <?php echo $jumlah6; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftartravel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Transportasi Saat Ini: 
                                        <?php echo $jumlah7; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftartransportasi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Daftar Destinasi Terbaru:
                                        <?php echo $jumlah8; ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="d-daftardestinasi2.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>