<!DOCTYPE html>
<html lang="en">

<?php
  include "admin/include/config.php";
  $kategori = mysqli_query($connection, "SELECT * from kategoriwisata");
  $transportasi = mysqli_query($connection, "SELECT * from transportasi");
  $berita = mysqli_query($connection, "SELECT * from jane");

  //buat sambungin dua tabel dengan menggunakan foreign key
  $destinasi = mysqli_query($connection,
    "SELECT * from destinasi, kategoriwisata 
    WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE");

?>

<head>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width,
 initial-scale1.0">
 <title> Projek UAS WEBDEV </title>


</head>


<body>
    <div class="container-fluid">
    <!--membuat menu-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">WISATA ALAM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="destinasii.php">Home</a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="apotek.php">Apotek</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kulinerr.php">Kuliner</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sandraa.php">Destinasi Wisata</a>
            </li>
    
                <!--bagian dropdowm kategori-->
                <li class="nav-item dropdown">       
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori Wisata
                </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($kategori)>0){
                while ($row=mysqli_fetch_array($kategori)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["kategoriNAMA"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
          </ul>
        </li>

         <!--bagian dropdowm Travel-->
          <li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Travel
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($transportasi)>0){
                while ($row=mysqli_fetch_array($transportasi)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["transportasiJENIS"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
          </ul>
        </li>

          <!--bagian dropdowm Berita-->
          <li class="nav-item dropdown">       
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Berita
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php

            //syarat jika kategori terdapat sesuatu
              if(mysqli_num_rows($berita)>0){
                while ($row=mysqli_fetch_array($berita)){
                  ?>

                  <!--ini html jadi harus diluar tag php-->
                  <li><a class="dropdown-item" href="#">
                      <?php echo $row["kategoriberitajane"]?></a></li>

                <!--membuka kembali php-->
                <?php
                }
              }
            ?>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!--membuat akhir menu-->

<!--membuat slide-->
<style>
  .carousel-item img {
    height: 500px; 
    object-fit: cover; 
  }
</style>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="admin/images/wayag.jpg" alt="First slide" style="width:100%; height: 600px;">

      <div class="carousel-caption d-none d-md-block" style="color:#f3ffe3; padding: 250px;">
            <h1 style="font-size: 80px;"><i>Wayag</i></h1>
            <h3>Indahnya Pemandangan Pulau Wayag</h3>
      </div>
    </div>
</div>
<!--membuat destinasi-->

    <div style="margin-top: 50px;" class="container">
        <div class="row">

          <!--ini bagian kiri-->
            <div class="col-sm-9">
              <?php 
                //buat sambungin dua tabel dengan menggunakan foreign key
                  $destinasi = mysqli_query($connection,
                  "SELECT * from destinasi, kategoriwisata 
                  WHERE destinasi.kategoriKODE = kategoriwisata.kategoriKODE");
                  
                if(mysqli_num_rows($destinasi)>0)
                {
                  while($row=mysqli_fetch_array($destinasi))
                  { ?>
                    <div style="margin-top: 30px;" class="d-flex">

                      <!--shrink untuk mengecilkan, grow untuk memperbesar-->
                          <div class="flex-shrink-0">

                              <!--style untuk memodifikasi gambar-->
                              <img style="width: 130px; height: auto; margin-right: 35px;" 
                              src="admin/images/<?php echo $row["destinasiFOTO"];?>" alt="kosong">
                          </div>

                          <!--buat masukin atau manggil dari ADMIN tabel destinasi dan kategori-->
                          <div class="flex-grow-1">
                              <h5><?php echo $row["destinasiNAMA"];?> <small class="text-muted"><i><?php echo $row["kategoriNAMA"];?></i></small></h5>
                              
                              <!--substr untuk mengambil berapa total kata-->
                              <p><?php echo substr($row["destinasiKET"],0,250);?></p>
                              <a href="" class="btn btn-primary">Read More</a>
                          </div>
                      </div>
                    <?php
                  }
                }
              ?>

            </div> <!--penutup kolom 9 (untuk kolom kiri) -->

            <!--ini bagian kanannya-->
            <div style="margin-top: 36px;" class="col-sm-3">
            <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Nusa Kambangan</div>
                pulau nusa kambangan yang menarik perhatian
              </div>
              <span class="badge bg-primary rounded-pill">5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Labuan Bajo</div>
                pulau labuan bajo yang memikat hati para wisatawan
              </div>
              <span class="badge bg-primary rounded-pill">3</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Raja Ampat</div>
                keindahan alam eksotis pulau raja ampat
              </div>
              <span class="badge bg-primary rounded-pill">7</span>
            </li>
          </ol>
          </div>
          <!--penutup kolom 3-->

        </div> <!--penutup row-->
    </div> <!--penutup container-->

<!--membuat destinasi-->

<!--Memulai Kategori Wisata-->
<div style="margin-top: 50px;" class="container">
    <div class="row">
        <?php
                 $kategoriwisata = mysqli_query($connection, "SELECT * FROM kategoriwisata");

                 if (mysqli_num_rows($kategoriwisata) > 0) {
                     while ($row = mysqli_fetch_array($kategoriwisata)) {
                 ?>
                         <!--ini buat bagi jadi 3 kolom-->
                         <div class="col-sm-12">
                             <div style="text-align:center; padding-bottom:20px;" class="tulisan">
                                 <div style="background-color: #483d8b; color: white;" class="shadow-lg p-3 mb-5 body rounded">
                                     <h5 class="card-title"><?php echo $row["kategoriNAMA"]; ?></h5>
                                     <p class="card-text"><?php echo $row["kategoriKET"]; ?></p>
                                     <a href="#!" class="btn btn-secondary">More</a>
                                 </div>
                             </div>
                         </div>
                         <?php
            }
        } else {
            echo '<p>No kuliner data found.</p>';
        }
        ?>
    </div>
</div>
<!--akhir Kategori Wisata-->


<!--Awal Apotek-->
<div style="margin-bottom: 75px;" id="dynamicCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

        <?php
        $fotodestinasi = mysqli_query($connection, "SELECT * FROM fotodestinasi");

        if (mysqli_num_rows($fotodestinasi) > 0) {
            $counter = 0;
            while ($row = mysqli_fetch_array($fotodestinasi)) {
                $active = ($counter == 0) ? 'active' : '';
                ?>
                <div class="carousel-item <?php echo $active; ?>">
                    <img src="admin/images/<?php echo $row["fotodestinasiFILE"]; ?>" class="d-block mx-auto" alt="gambar" 
                    style="width: 78%; max-height: 50vh;  filter: brightness(70%); object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1><?php echo $row["fotodestinasiNAMA"]; ?></h1>
                    </div>
                </div>
                <?php
                $counter++;
            }
        }
        ?>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#dynamicCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#dynamicCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!--Akhir Apotek-->



<!--Kuliner-->

<!-- Container for the grid -->
<div style="margin-top: 50px;" class="container">
    <div class="row">
        <?php
        $kuliner = mysqli_query($connection, "SELECT * FROM kuliner");

        if (mysqli_num_rows($kuliner) > 0) {
            while ($row = mysqli_fetch_array($kuliner)) {
        ?>
                <!--ini buat bagi jadi 3 kolom-->
                <div class="col-lg-4 mb-4">
                    <div style="background-color:#9370db; text-align:center" class="card">
                        <img src="admin/images/<?php echo $row["kulinerGAMBAR"]; ?>" class="card-img-top" alt="Kuliner Image" style="height: 350px;">
                        <div style="color: white;" class="card-body">
                            <h5 class="card-title"><?php echo $row["kulinerNAMA"]; ?></h5>
                            <a href="#!" class="btn btn-secondary">Pelajari</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--akhir kuliner-->

<!--Awal Hotel-->

<div style="margin-top: 50px;" class="container">
    <?php
    $hotel = mysqli_query($connection, "SELECT * FROM hotel");

    if (mysqli_num_rows($hotel) > 0) {
        while ($row = mysqli_fetch_array($hotel)) {
    ?>
            <div style="margin-bottom: 30px;" class="row">
                <div class="col-lg-6 mb-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row["hotelKODE"]; ?>
                        </div>
                        <div style="text-align: center;" class="card-body">
                            <h5 class="card-title"><?php echo $row["hotelNAMA"]; ?></h5>
                            <p class="card-text"><?php echo $row["hotelALAMAT"]; ?></p>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
    <?php
            if ($row = mysqli_fetch_array($hotel)) {
    ?>
                <div class="col-lg-6 mb-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row["hotelKODE"]; ?>
                        </div>
                        <div style="text-align: center;" class="card-body">
                            <h5 class="card-title"><?php echo $row["hotelNAMA"]; ?></h5>
                            <p class="card-text"><?php echo $row["hotelALAMAT"]; ?></p>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            }
        }
    } else {
        echo '<p>No data found.</p>';
    }
    ?>
</div>

<!--Akhir Hotel-->

<!--Awal Travel-->
<div style="margin-top: 50px;" class="container">
    <div class="row">
        <?php
        $travel = mysqli_query($connection, "SELECT * FROM travel");

        if (mysqli_num_rows($travel) > 0) {
            while ($row = mysqli_fetch_array($travel)) {
        ?>
                <div class="col-lg-6 mb-4">
                    <div style="box-shadow: 0 2px 5px" class="card mb-3">
                        <img src="admin/images/<?php echo $row["travelFILE"]; ?>" class="card-img-top img-fluid" alt="gambar" style="height: 200px; object-fit: cover; object-position: 50% 20%;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["travelNAMA"]; ?></h5>
                            <p class="card-text"><small class="text-muted"><?php echo $row["tempatNAMA"]; ?></small></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
    </div>
</div>
<!--Akhir Travel-->

<!--Awal berita-->
<div style="margin-top: 50px;" class="container">
    <?php
    $berita = mysqli_query($connection, "SELECT * FROM jane");

    if (mysqli_num_rows($berita) > 0) {
        while ($row = mysqli_fetch_array($berita)) {
    ?>
            <div style="margin-bottom: 30px;" class="row">
                <div class="col-lg-6 mb-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row["kategoriberitajane"]; ?>
                        </div>
                        <div style="text-align: center;" class="card-body">
                            <h5 class="card-title"><?php echo $row["beritaJUDUL"]; ?></h5>
                            <p class="card-text"><?php echo $row["event0141"]; ?></p>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
    <?php
            if ($row = mysqli_fetch_array($berita)) { // Check if there is another row
    ?>
                <div class="col-lg-6 mb-6">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $row["kategoriberitajane"]; ?>
                        </div>
                        <div style="text-align: center;" class="card-body">
                            <h5 class="card-title"><?php echo $row["beritaJUDUL"]; ?></h5>
                            <p class="card-text"><?php echo $row["event0141"]; ?></p>
                            <a href="#" class="btn btn-primary">More</a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
            }
        }
    } else {
        echo '<p>No data found.</p>';
    }
    ?>
</div>
<!--Akhir berita-->





<!--coba lagi-->


</div> <!--penutup container-fluid-->


<div class="container my-5">

  <footer class="text-center text-white" style="background-color: #e6e6fa;">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- gambar-gambar -->
      <section class="">
        <div class="row">
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
                 class="bg-image hover-overlay ripple shadow-1-strong rounded"
                 data-ripple-color="light"
                 >
              <img
                   src="admin/images/nature.jpg"
                   class="w-100"
                   />
              <a href="#!">
                <div
                     class="mask"
                     style="background-color: #e6e6fa;"
                     ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
                 class="bg-image hover-overlay ripple shadow-1-strong rounded"
                 data-ripple-color="light"
                 >
              <img
                   src="admin/images/island.jpg"
                   class="w-100"
                   />
              <a href="#!">
                <div
                     class="mask"
                     style="background-color: #e6e6fa;"
                     ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
                 class="bg-image hover-overlay ripple shadow-1-strong rounded"
                 data-ripple-color="light"
                 >
              <img
                   src="admin/images/pulau.jpg"
                   class="w-100"
                   />
              <a href="#!">
                <div
                     class="mask"
                     style="background-color: #e6e6fa;"
                     ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
                 class="bg-image hover-overlay ripple shadow-1-strong rounded"
                 data-ripple-color="light"
                 >
              <img
                   src="admin/images/bromo.jpg"
                   class="w-100"
                   />
              <a href="#!">
                <div
                     class="mask"
                     style="background-color: #e6e6fa;"
                     ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
                 class="bg-image hover-overlay ripple shadow-1-strong rounded"
                 data-ripple-color="light"
                 >
              <img
                   src="admin/images/batuan.jpg"
                   class="w-100"
                   />
              <a href="#!">
                <div
                     class="mask"
                     style="background-color: #e6e6fa;"
                     ></div>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
            <div
                 class="bg-image hover-overlay ripple shadow-1-strong rounded"
                 data-ripple-color="light"
                 >
              <img
                   src="admin/images/pantai.jpg"
                   class="w-100"
                   />
              <a href="#!">
                <div
                     class="mask"
                     style="background-color: #e6e6fa;"
                     ></div>
              </a>
            </div>
          </div>
        </div>
      </section>
      <!-- gambar-gambar -->
    </div>
    <!-- bagian container pertama -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: #483d8b;">
      © Jane Syahwalina Kaprica Sandra 825220141 2023 UAS WEBDEV

    </div>
    <!-- Copyright -->
  </footer>

</div>
<!-- akhir dari container -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>