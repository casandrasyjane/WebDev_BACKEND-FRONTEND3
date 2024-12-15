<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>List Travel </title>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<?php 
 include "include/config.php";
 if(isset($_POST['Simpan']))
 {
  $travelKODE = $_POST['travelKODE'];
  $travelNAMA = $_POST['travelNAMA'];
  $tempatNAMA = $_POST['tempatNAMA'];

  $namafile = $_FILES['file']['name'];
  $file_tmp = $_FILES["file"]["tmp_name"];

  $ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

  if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png") or ($ekstensifile == "PNG")
  or ($ekstensifile == "JPEG") or ($ekstensifile == "jpeg"))
  {
   move_uploaded_file($file_tmp, 'images/'.$namafile);
   mysqli_query($connection, "INSERT INTO travel (travelKODE, travelNAMA, travelFILE, tempatNAMA) 
   VALUES ('$travelKODE', '$travelNAMA', '$namafile', '$tempatNAMA')");
  }

 }

?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
 <div class="jumbotron jumbotron-fluid">
  <div class="container">
   <h2 class="display-4">Daftar Travel Terkini</h2>
  </div>
 </div>

 <form method="POST" enctype="multipart/form-data">
  <div class="form-group row">
   <label for="travelKODE" class="col-sm-2 col-form-label">Kode Travel</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="travelKODE" name="travelKODE" placeholder="Kode Travel" maxlength="4">
   </div>
  </div>

  <div class="form-group row mb-3 mt-3">
   <label for="travelNAMA" class="col-sm-2 col-form-label">Nama Travel</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="travelNAMA" name="travelNAMA" placeholder="Nama Travel">
   </div>
  </div>

  <div class="form-group row mb-3 mt-3">
   <label for="tempatNAMA" class="col-sm-2 col-form-label">Nama Tempat yang ingin Dikunjungi</label>
   <div class="col-sm-10">
    <input type="text" class="form-control" id="tempatNAMA" name="tempatNAMA" placeholder="Nama Tempat">
   </div>
  </div>


  <div class="form-group row ">
   <label for="file" class="col-sm-2 col-form-label">Unggah Foto</label>
   <div class="col-sm-10">
    <input type="file" id="file" name="file">
    <p class="help-block">Field ini digunakan untuk unggah file</p>
   </div>
  </div>

  <div class="form-group row">
   <div class="col-sm-2"></div>
   <div class="col-sm-10">
    <input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
    <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">

   </div>
   
  </div>

  
 </form>
 <form method="post">
     <div class="form-group row mb-2 mt-3">
        <label for="search" class="col-sm-2">Nama Travel</label>
        <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="Cari Nama Travel">
      </div>
      <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
     </div>
 </form>

</div>

<div class="col-sm-1"></div>
</div>

<div class="row">
 <div class="col-sm-1"></div>
 <div class="col-sm-10">
  <div class="jumbotron jumbotron-fluid">
   <div class="container">
    <h2 class="display-4">Daftar Travel</h2>
   </div>
  </div>


 <table class="table table-hover table-danger">
  <thead class="thead-dark">
   <tr>
    <th>No.</th>
    <th>Kode Travel</th>
    <th>Nama Travel</th>
    <th>Nama Tempat</th>
    <th>Input Foto Travel</th>
                <th colspan="3" style="text-align: center">Aksi</th>
   </tr>   
  </thead>


  
  <tbody>
        <?php 
   if (isset($_POST["kirim"]))
   {
    $search = $_POST["search"];
    $query = mysqli_query($connection, "select travel.*from travel
    where travelNAMA like '%".$search."%'"); }
    else{
     $query = mysqli_query($connection, "select travel.* from 
     travel");}
     $nomor = 1;
     while ($row = mysqli_fetch_array($query))
     { 
      ?>
    
    <tr>
     <td><?php echo $nomor;?></td>
     <td><?php echo $row['travelKODE'];?></td>
     <td><?php echo $row['travelNAMA'];?></td>
     <td><?php echo $row['tempatNAMA'];?></td>
    <td>
      <?php if(is_file("images/".$row['travelFILE']))
      { ?>
       <img src="images/<?php echo $row['travelFILE']?>" width="80">
      <?php } else
       echo "<img src='images/noimage.png' width='80'>"
      ?>
               
                        <td width="5px">
                        <a href="t-travelEDIT.php?ubah=<?php echo $row["travelKODE"] ?>" class="btn btn-success btn-sm" title="EDIT">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
    </svg></a>
                </td>

                        <td width="5px">
      <a href="travelHAPUS.php?hapus=<?php echo $row['travelKODE']?>" class="btn btn-danger btn-sm" title="HAPUS">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
      </a>
      
     </td>

    </tr>
   <?php $nomor = $nomor + 1;?>
   <?php } ?>
  </tbody>
  
 </table>
 </div>

 <div class="col-sm-1"></div>

 
</div>


</body>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</html>