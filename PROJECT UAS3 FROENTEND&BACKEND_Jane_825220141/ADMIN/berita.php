<!doctype html>

<?php
include "include/config.php";
if(isset($_POST["Simpan"]))
{
    $berita0141 = $_POST['berita141'];
    $beritaJUDUL = $_POST['beritaJUDUL'];
    $kategoriberitajane = $_POST['kategoriberitajane'];
    $event0141 = $_POST['event141'];


    mysqli_query($connection, "insert into jane values ('$berita0141', 
    '$beritaJUDUL', '$kategoriberitajane', '$event0141')");
    

}

?>

<head>
    <title> BERITA </title>
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

<div class="mb-3 row">
    <label for="berita141" class="col-sm-2 col-form-label"> Kode Berita </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="berita141" 
      id="berita141">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="beritaJUDUL" class="col-sm-2 col-form-label"> Nama Berita </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="beritaJUDUL" 
      id="beritaJUDUL">
    </div>
  </div>


  <div class="mb-3 row">
    <label for="kategoriberitajane" class="col-sm-2 col-form-label"> Kategori Berita </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kategoriberitajane" 
      id="kategoriberitajane">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="event141" class="col-sm-2 col-form-label"> Event Berita </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="event141" 
      id="event141">
    </div>
  </div>
  
  <div style="margin-bottom: 15px;" class="form-group row">
  <div class="col-sm-2"></div>
  <div class="col-sm-10">
    <input type="submit" name="Simpan" values="Simpan" class="btn btn-secondary">
    <input type="reset" class="btn btn-success" value="Batal" name="Batal"> 
  </div>
  </div>
</form>
<table class="table table-dark">
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

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection,  "select jane.* from jane
                            where beritaJUDUL like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select jane.* from jane");
                    }
                    
                        //      $query = mysqli_query($connection, "select destinasi.* from destinasi");
                    
                        //untuk menampilkan tampilan isi database
                        //$query = mysqli_query($connection, "select destinasi.* from destinasi"); //destinasi. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
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
   <?php  } ?>
  </tbody>
</table>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <img style="width: 300px; height: 100%; margin-right: 10px;
                    text-align: justify" 
                    src="images/blekping.png" alt="Kosong">

                </div>
                <div class="flex-grow-1">
                    <h5> Blackpink in Your Area <small class="text-muted">
                    <i>pada tanggal 10 Desember</i></small></h5>
                    <p>
                    Ketika penggemar "putus asa" dan hanya bisa menaruh kepercayaan mereka pada bulan Desember, baru-baru ini, 
                    YG akhirnya mengumumkan jadwal grup untuk bulan ini. YG dengan bersemangat mengumumkan jadwal BLACKPINK.
                    </p>
                    <a href="" class="btn btn-primary"> Read More </a>
                </div>

            </div>
        </div>

</body>
</html>
