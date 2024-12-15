<?php
include "include/config.php";

if (isset($_POST["edit"])) {
    $kategoriKODE = $_POST['inputkode'];
    $kategoriNAMA = $_POST['inputnama'];
    $kategoriKET = $_POST['inputket'];
    $kategoriREFERENCE = $_POST['inputreferensi'];

    mysqli_query($connection, "UPDATE kategoriwisata SET kategoriNAMA ='$kategoriNAMA',
        kategoriKET = '$kategoriKET',
        kategoriREFERENCE = '$kategoriREFERENCE'
        WHERE kategoriKODE = '$kategoriKODE'");
}

$kategoriKODE = $_GET["ubah"];
$editkategori = mysqli_query($connection, "SELECT * FROM kategoriwisata WHERE kategoriKODE = '$kategoriKODE'");
$rowedit2 = mysqli_fetch_array($editkategori);

?>

<!DOCTYPE html>
<html>

<head>
    <title> Kategori Wisata </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">

            <form method="POST">

                <div class="form-group row">
                    <label for="inputkode" class="col-sm-3 col-form-label"> Kode Kategori Wisata </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputkode" name="inputkode"
                            value="<?php echo $rowedit2['kategoriKODE']; ?>"readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputnama" class="col-sm-3 col-form-label"> Nama Kategori Wisata </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputnama" name="inputnama"
                            value="<?php echo $rowedit2['kategoriNAMA']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputket" class="col-sm-3 col-form-label"> Keterangan Kategori Wisata </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputket" name="inputket"
                            value="<?php echo $rowedit2['kategoriKET']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputref" class="col-sm-3 col-form-label"> Referensi Kategori </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="inputref" name="inputreferensi"
                            value="<?php echo $rowedit2['kategoriREFERENCE']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" name="edit" value="Edit" class="btn btn-secondary">
                        <input type="button" class="btn btn-success" value="Batal" name="Batal">
                    </div>
                </div>
            </form>

            <table class="table table-hover table-primary">
                <thead>
                    <tr>
                        <th scope="col"> No. </th>
                        <th scope="col"> Kode Kategori Wisata </th>
                        <th scope="col"> Nama Kategori Wisata </th>
                        <th scope="col"> Keterangan Kategori Wisata </th>
                        <th scope="col"> Referensi Kategori </th>
                        <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

if (isset($_POST["kirim"])) {
    $search = $_POST["search"];
    $query = mysqli_query($connection, " SELECT * FROM kategoriwisata
      WHERE kategoriNAMA LIKE '%" . $search . "%'");
} else {
    $query = mysqli_query($connection, "SELECT * FROM kategoriwisata");
}
$nomor = 1;
while ($row = mysqli_fetch_array($query)) {
    ?>
                    <tr>
                        <th><?php echo $nomor; ?></th>
                        <td><?php echo $row['kategoriKODE']; ?></td>
                        <td><?php echo $row['kategoriNAMA']; ?></td>
                        <td><?php echo $row['kategoriKET']; ?></td>
                        <td><?php echo $row['kategoriREFERENCE'];?></td>
      <td width="5px">
        <a href="k-kategoriwisataEDIT.php?ubah=<?php echo $row["kategoriKODE"]?>"
          class="btn btn-success btn-sm" title="Edit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
      </td>
      <td>        <a href="kategoriwisataHAPUS.php?hapus=<?php echo $row["kategoriKODE"]?>"
          class="btn btn-danger btn-sm" title="Hapus">

          <i class="bi bi-trash"></i></td>
                    </tr>
                    <?php $nomor = $nomor + 1; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 

</body>

</html>
