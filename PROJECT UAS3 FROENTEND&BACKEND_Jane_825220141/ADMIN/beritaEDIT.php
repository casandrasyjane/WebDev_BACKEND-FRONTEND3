<?php
include "include/config.php";

if (isset($_POST["edit"])) {
    $berita0141 = $_POST['berita141'];
    $beritaJUDUL = $_POST['beritaJUDUL'];
    $kategoriberitajane = $_POST['kategoriberitajane'];
    $event0141 = $_POST['event141'];

    mysqli_query($connection, "UPDATE jane SET beritaJUDUL ='$beritaJUDUL',
        kategoriberitajane = '$kategoriberitajane',
        event0141 = '$event0141'
        WHERE berita0141 = '$berita0141'");
}

$berita0141 = $_GET["ubah"];
$editkategori = mysqli_query($connection, "SELECT * FROM jane WHERE berita0141 = '$berita0141'");
$rowedit2 = mysqli_fetch_array($editkategori);

?>

<!DOCTYPE html>
<html>

<head>
    <title> Kategori Berita </title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="
    sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">

            <form method="POST">

                <div class="form-group row">
                    <label for="inputkode" class="col-sm-3 col-form-label"> Kode Berita </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="berita141" name="berita141"
                            value="<?php echo $rowedit2['berita0141']; ?>"readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputnama" class="col-sm-3 col-form-label"> Nama Berita </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="beritaJUDUL" name="beritaJUDUL"
                            value="<?php echo $rowedit2['beritaJUDUL']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputket" class="col-sm-3 col-form-label"> Kategori Berita </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="kategoriberitajane" name="kategoriberitajane"
                            value="<?php echo $rowedit2['kategoriberitajane']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputref" class="col-sm-3 col-form-label"> Event Berita </label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="event141" name="event141"
                            value="<?php echo $rowedit2['event0141']; ?>">
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

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No. </th>
                    <th scope="col"> Kode Berita </th>
                    <th scope="col"> Nama Berita </th>
                    <th scope="col"> Kategori Berita </th>
                    <th scope="col"> Event Berita </th>
                    <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

    <?php

    if (isset($_POST["kirim"])) {
        $search = $_POST["search"];
        $query = mysqli_query($connection, " SELECT * FROM jane
        WHERE beritaJUDUL LIKE '%" . $search . "%'");
    } else {
        $query = mysqli_query($connection, "SELECT * FROM jane");
    }
    $nomor = 1;
    while ($row = mysqli_fetch_array($query)) {
    ?>
                    <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $row['berita0141']; ?></td>
                    <td><?php echo $row['beritaJUDUL']; ?></td>
                    <td><?php echo $row['kategoriberitajane']; ?></td>
                    <td><?php echo $row['event0141']; ?></td>
                    <td width="5px">
                        
                        <a href="b-beritaEDIT.php?ubah=<?php echo $row["berita0141"]?>" 
                        class="btn btn-success btn-sm" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                
                      </td>
                        <td width="5px">
                        <a href="beritaHAPUS.php?hapus=<?php echo $row["berita0141"] ?>" 
                        class="btn btn-danger btn-sm" title="HAPUS">
                        <i class="bi bi-trash"></i>
                        </a>
                        </td>
                
                    </tr>
                    <?php $nomor = $nomor + 1; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 

</body>

</html>
