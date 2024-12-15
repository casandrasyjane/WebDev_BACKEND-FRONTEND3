<!DOCTYPE html>
<html>

<?php
    include 'include/config.php';
    if(isset($_POST['Simpan']))
    {
        $destinasiKODE = $_POST['kodedestinasi'];
        $destinasiNAMA = $_POST['namadestinasi'];
        $kategoriKODE = $_POST['kodekategori'];

        mysqli_query($connection, "insert into destinasi values ('$destinasiKODE', 
        '$destinasiNAMA', '$kategoriKODE')");
        header("location:destinasi.php");
    }

?>

<head>
    <title> DESTINASI </title>
    <link rel="stylesheet" type="text/css" href="css/bootsrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/
    libs/select2/4.0.13/css/select2.min.css">
</head>
<body>

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
<form method="POST">

<div class="mb-3 row">
    <label for="kodedestinasi" class="col-sm-2 col-form-label"> Kode Destinasi </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kodedestinasi" 
      id="kodedestinasi">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="namadestinasi" class="col-sm-2 col-form-label"> Nama Destinasi </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="namadestinasi" 
      id="namadestinasi">
    </div>
  </div>

<!--
  <div class="mb-3 row">
    <label for="kodekategori" class="col-sm-2 col-form-label"> Kode Kategori </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kodekategori" 
      id="kodekategori">
    </div>
  </div>
-->



                <div class="mb-3-row">
                    <label for="kodekategori" class="col-sm-2 col-form-label">
                    Kategori Wisata </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kodekategori" 
                        id="kodekategori">
                            <option>Kategori Wisata </option>
                            <?php while($row = mysqli_fetch_array($datakategori))
                            {
                                ?>
                                <option value="<?php echo $row["kategoriKODE"]?>">
                                <?php echo $row["kategoriKODE"]?>">
                                <?php echo $row["kategoriNAMA"]?>">
                                </option>
                            <?php } ?>
                    </select>
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
      <th scope="col"> Kode Destinasi </th>
      <th scope="col"> Nama Destinasi </th>
      <th scope="col"> Kode Kategori </th>
    </tr>
  </thead>
  <tbody>
  <?php
   $query = mysqli_query($connection, "select destinasi.* from destinasi");

   $nomor = 1;
   while($row = mysqli_fetch_array($query))
   {
   ?>
   <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $row['destinasiKODE']; ?></td>
      <td><?php echo $row['destinasiNAMA']; ?></td>
      <td><?php echo $row['kategoriKODE']; ?></td>
    </tr>
   <?php $nomor = $nomor + 1; ?> 
   <?php  } ?>
  </tbody>
</table>

</div>
</div>

<script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/
select2/4.0.13/js/select2.min.js"> </script>

    <script>
        $(document).ready(function()
        {
        $('#kodeKategori').select2(
            {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kategori Wisata'
            });    
        });
    </script>

</body>
</html>