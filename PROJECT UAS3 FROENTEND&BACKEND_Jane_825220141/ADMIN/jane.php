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
    
    header("location:jane.php");
}

?>

<head>
    <title> JANE </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
    <label for="beritaJUDUL" class="col-sm-2 col-form-label"> Judul Berita </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="beritaJUDUL" 
      id="beritaJUDUL">
    </div>
  </div>


  <div class="mb-3 row">
    <label for="kategoriberitajane" class="col-sm-2 col-form-label"> Kode Kategori Berita </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kategoriberitajane" 
      id="kategoriberitajane">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="event141" class="col-sm-2 col-form-label"> Kode Event </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="event141" 
      id="event141">
    </div>
  </div>
  
  <div class="form-group row">
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
      <th scope="col"> No </th>
      <th scope="col"> Kode Berita </th>
      <th scope="col"> Judul Berita </th>
      <th scope="col"> Kode Kategori Berita </th>
      <th scope="col"> Kode Kategori </th>
    </tr>
  </thead>
  <tbody>
  <?php
   $query = mysqli_query($connection, "select jane.* from jane");

   $nomor = 1;
   while($row = mysqli_fetch_array($query))
   {
   ?>
   <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $row['berita0141']; ?></td>
      <td><?php echo $row['beritaJUDUL']; ?></td>
      <td><?php echo $row['kategoriberitajane']; ?></td>
      <td><?php echo $row['event0141']; ?></td>
    </tr>
   <?php $nomor = $nomor + 1; ?> 
   <?php  } ?>
  </tbody>
</table>

</div>
</div>
</body>
</html>
