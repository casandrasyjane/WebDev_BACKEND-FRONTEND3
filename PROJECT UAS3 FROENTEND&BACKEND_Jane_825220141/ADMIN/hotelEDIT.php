<?php
include "include/config.php";

// Check if the form is submitted for editing
if(isset($_POST["SimpanEdit"]))
{
    $hotelKODE = $_POST['kodehotel'];
    $hotelNAMA = $_POST['namahotel'];
    $hotelALAMAT = $_POST['alamathotel'];

    // Update the hotel entry
    mysqli_query($connection, "UPDATE hotel SET hotelNAMA='$hotelNAMA', 
    hotelALAMAT='$hotelALAMAT' WHERE hotelKODE='$hotelKODE'");
    header("location:hotel.php");
}

// Fetch hotel data for editing
if(isset($_GET['ubah']))
{
    $hotelKODE = $_GET['ubah'];
    $result = mysqli_query($connection, "SELECT * FROM hotel WHERE hotelKODE = '$hotelKODE'");
    $rowedit = mysqli_fetch_assoc($result);
}
?>

<head>
   <title>HOTEL</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>
<body>

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">

    <form method="POST">

      <!-- Input fields for editing hotel -->
      <div class="mb-3 row">
        <label for="kodehotel" class="col-sm-2 col-form-label">Kode Hotel</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="kodehotel" 
            id="kodehotel" value="<?php echo isset($rowedit['hotelKODE']) ? $rowedit['hotelKODE'] : ''; ?>" readonly>
        </div>
    </div>


      <div class="mb-3 row">
        <label for="namahotel" class="col-sm-2 col-form-label">Nama Hotel</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="namahotel" 
            id="namahotel" value="<?php echo isset($rowedit['hotelNAMA']) ? $rowedit['hotelNAMA'] : ''; ?>">
        </div>
    </div>


      <div class="mb-3 row">
        <label for="alamathotel" class="col-sm-2 col-form-label">Alamat Hotel</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="alamathotel" 
            id="alamathotel" value="<?php echo isset($rowedit['hotelALAMAT']) ? $rowedit['hotelALAMAT'] : ''; ?>">
        </div>
    </div>


      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <input type="submit" name="Edit" value="Edit" class="btn btn-secondary">
          <input type="button" class="btn btn-success" value="Batal" name="Batal">
        </div>
      </div>
    </form>

<form method="post">
    <div class="form-group row mb-2 mt-2">
      <label for="search" class="col-sm-2">Nama Hotel</label>
      <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="Cari nama hotel">
      </div>
      <input type="submit" name="kirim1" value="search" class="col-sm-1 btn btn-primary">
    </div>

</form>
<form method="post">
    <div class="form-group row mb-2 mt-2">
      <label for="search" class="col-sm-2">Alamat Hotel</label>
      <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="Cari alamat hotel">
      </div>
      <input type="submit" name="kirim2" value="search" class="col-sm-1 btn btn-primary">
    </div>
</form>


<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Kode Hotel</th>
      <th scope="col">Nama Hotel</th>
      <th scope="col">Alamat Hotel</th>
      <th colspan="4" style="text-align: center">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <?php 

if (isset($_POST["kirim"]))
{
  $search = $_POST["search"];
  $query = mysqli_query($connection, " select hotel.*from hotel
      where hotelNAMA like '%".$search."%'");}
    else

      if (isset($_POST["kirim2"]))
{
    $search = $_POST["search"];
  $query = mysqli_query($connection, " select hotel.*from hotel
      where hotelALAMAT like '%".$search."%'");}
    else{
      $query = mysqli_query($connection, "select hotel.* from hotel");}
      $nomor = 1;
      while($row = mysqli_fetch_array($query))
      {
      ?>

    <tr>
      <th><?php echo $nomor;?></th>
      <td><?php echo $row['hotelKODE'];?></td>
      <td><?php echo $row['hotelNAMA'];?></td>
      <td><?php echo $row['hotelALAMAT'];?></td>
      <td>
      <td width="5px">
           <a href="hotelEDIT.php?ubah=<?php echo $row["hotelKODE"] ?>"
                           class="btn btn-success btn-sm edit-btn" title="Edit"
                           data-kode="<?php echo $row['hotelKODE']; ?>"
                           data-nama="<?php echo $row['hotelNAMA']; ?>"
                           data-alamat="<?php echo $row['hotelALAMAT']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>
                    </td>
      </td>

      <td width="5px">
      <td><a href="hotelHAPUS.php?hapus=<?php echo $row["hotelKODE"]?>"
          class="btn btn-danger btn-sm" title="H">

          <i class="bi bi-trash"></i></td>
      </td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
    <?php } ?>
  </tbody>
</table>

  </div><!-- penutup class=col-sm-11-->
</div> <!--penutup class=row-->

</body>
</html>
