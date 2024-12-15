<!DOCTYPE html>
<html lang="en">
   <?php include "include/head.php";?></include>
    <body class="sb-nav-fixed">
        <?php include "include/menunav.php";?>
        <div id="layoutSidenav">
            <?php include "include/menu.php";?>
            <div id="layoutSidenav_content">
                <main>
<?php
include "include/config.php";

if (isset($_POST["Simpan"])) {
    // Existing code for adding new destination
} elseif (isset($_GET["ubah"])) {
    $kodeDestinasi = $_GET["ubah"];
    $result = mysqli_query($connection, "SELECT * FROM destinasi WHERE destinasiKODE = '$kodeDestinasi'");
    $data = mysqli_fetch_array($result);

    if (isset($_POST["Update"])) {
        // Existing code for updating destination
        $namadestinasi = $_POST['namadestinasi'];
        $destinasiKET = $_POST['destinasiket'];

        $namafile = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];

        // Check if a new file is selected
        if (!empty($namafile)) {
            $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

            if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png") or ($ekstensifile == "PNG")
                or ($ekstensifile == "JPEG") or ($ekstensifile == "jpeg")) {
                move_uploaded_file($file_tmp, 'images/' . $namafile);

                $kodekategori = $_POST['kodekategori'];

                mysqli_query($connection, "UPDATE destinasi SET destinasiNAMA='$namadestinasi', destinasiKET='$destinasiKET', destinasiFOTO='$namafile', kategoriKODE='$kodekategori' WHERE destinasiKODE='$kodeDestinasi'");
            } else {
                echo "File must be in JPG, JPEG, or PNG format.";
            }
        } else {
            // No new file selected, update other fields only
            $kodekategori = $_POST['kodekategori'];
            mysqli_query($connection, "UPDATE destinasi SET destinasiNAMA='$namadestinasi', destinasiKET='$destinasiKET', kategoriKODE='$kodekategori' WHERE destinasiKODE='$kodeDestinasi'");
        }

    }
} else {
    // Redirect to the main page if no 'Simpan' or 'ubah' parameter is set
    header("Location: d-destinasiEDIT.php");

}

$datakategori = mysqli_query($connection, "SELECT * FROM kategoriwisata");
?>
<?php include "include/menu.php";?>
<head>
    <title>EDIT DESTINASI</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3 row">
                    <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodedestinasi" id="kodedestinasi" value="<?php echo $data['destinasiKODE']; ?>" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="namadestinasi" id="namadestinasi" value="<?php echo $data['destinasiNAMA']; ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="destinasiket" class="col-sm-2 col-form-label">Keterangan Destinasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="destinasiket" id="destinasiket" value="<?php echo $data['destinasiKET']; ?>">
                    </div>
                </div>

                <div class="form-group row">
    <label for="file" class="col-sm-2 col-form-label">Photo Destinasi</label>
    <div class="col-sm-10">
        <img src="images/<?php echo $data['destinasiFOTO']; ?>" width="80" alt="Current Image">
        <input type="file" id="file" name="file">
        <p class="help-block">Field ini digunakan untuk unggah file</p>
    </div>
</div>


                <div class="mb-3 row">
                    <label for="kodekategori" class="col-sm-2 col-form-label">Kategori Wisata</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kodekategori" id="kodekategori">
                            <?php while ($row = mysqli_fetch_array($datakategori)) { ?>
                                <option value="<?php echo $row["kategoriKODE"] ?>" <?php if ($row["kategoriKODE"] == $data["kategoriKODE"]) echo "selected" ?>>
                                    <?php echo $row["kategoriKODE"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" name="Update" value="Update" class="btn btn-secondary">
                        <a href="index.php" class="btn btn-success">Batal</a>
                    </div>
                </div>
            </form>
			
		<form method="post">
    <div class="form-group row mb-2 mt-3">
      <label for="search" class="col-sm-2">Nama Destinasi</label>
      <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="cari nama destinasi">
      </div>
      <input type="submit" name="kirim" value="cari" class="col-sm-1 btn btn-primary">
    </div>

</form>

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Kode Destinasi</th>
      <th scope="col">Nama Destinasi</th>
	  <th scope="col">Keterangan Destinasi</th>
	  <th scope="col">Foto Destinasi</th>
      <th scope="col">Kode Kategori</th>
      <th colspan="2" style="text-align: center">Aksi</th>
    </tr>
  </thead>
  <tbody>

  <?php 

if (isset($_POST["kirim"]))
{
  $search = $_POST["search"];
  $query = mysqli_query($connection, " select destinasi.*from destinasi
      where destinasiNAMA like '%".$search."%'");}
    else{
      $query = mysqli_query($connection, "select destinasi.* from destinasi");}
      $nomor = 1;
      while($row = mysqli_fetch_array($query))
      {    
      ?>
    <tr>
      <th><?php echo $nomor;?></th>
      <td><?php echo $row['destinasiKODE'];?></td>
      <td><?php echo $row['destinasiNAMA'];?></td>
	  <td><?php echo $row['destinasiKET'];?></td>
	  <td>
                                <?php if (is_file("images/" . $row['destinasiFOTO'])) { ?>
                                    <img src="images/<?php echo $row['destinasiFOTO'] ?>" width="80">
                                <?php } else
                                    echo "<img src='images/noimage.png' width='80'>"
                                ?>
                            </td>
	  <td><?php echo $row['kategoriKODE'];?></td>
      <td width="5px">
        <a href="d-destinasiEDIT.php?ubah=<?php echo $row["destinasiKODE"]?>"
          class="btn btn-success btn-sm" title="EDIT">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </td>
      <td>        <a href="destinasiHAPUS.php?hapus=<?php echo $row["destinasiKODE"]?>"
          class="btn btn-danger btn-sm" title="HAPUS">

          <i class="bi bi-trash"></i></td>
    </tr>
    <?php $nomor = $nomor + 1; ?>
    <?php } ?>
  </tbody>
</table>
</div><!-- penutup class=col-sm-11-->
</div> <!--penutup class=row-->

</body>
</html>