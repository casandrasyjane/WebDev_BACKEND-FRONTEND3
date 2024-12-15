<!DOCTYPE html>
<html lang="en">

<?php
  include "admin/include/config.php";
  $kategori = mysqli_query($connection, "SELECT * from kategoriwisata");
  $transportasi = mysqli_query($connection, "SELECT * from transportasi");
  $berita = mysqli_query($connection, "SELECT * from jane");
  $destinasi = mysqli_query($connection, "SELECT * FROM destinasi");

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
          <a class="nav-link active" aria-current="page" href=".php">Home</a>
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
        <img class="d-block w-100" src="admin/images/bromo.jpg" alt="First slide" style="width:100%; height: 600px;">

      <div class="carousel-caption d-none d-md-block" style="color:#f3ffe3; padding: 250px;">
            <h1 style="font-size: 80px;"><i>Destinasi Wisata</i></h1>
            <h3>Pemandangan Indah Wisata Alam Indonesia</h3>
      </div>
    </div>
  </div>

  <div class="container-fluid px-4">
    <h1 class="mt-4">Hasil Entri Data</h1>
    <div class="container"> <br> <br>
    <div class="row">
      <div class="col-sm-12">
        <div class="isi" style="background-color: #fbe4ff; padding: 38px; border-radius:20px;">
        <?php if(mysqli_num_rows($destinasi) > 0) {
              while ($row2 = mysqli_fetch_array($destinasi))
            { ?>
              <div class="media" style="border-bottom: 2px solid #97a2ff;">
                <div class="media-body">
                  <h4 class="mt-0 mb-1"><?php echo $row2["destinasiNAMA"] ?></h4><br>
                  <h6><?php echo $row2["destinasiKET"] ?>
                  <p><i><?php echo $row2["destinasiKODE"] ?> </i>|<i> <?php echo $row2["kategoriKODE"] ?></i></p>
                </div>
                <img class="ml-3" style="width: 200px; height: 120px; border-radius: 5px; margin-bottom:20px;" src="images/<?php echo $row2["destinasiFOTO"] ?>" alt="Gambar Tidak Ada">
              </div> <br>
            <?php } } ?>
          </div>
      </div>
    </div>
  </div> 
  <br> 
  <br>

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
</div>
</div>
</body>
</html>