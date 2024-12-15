<!doctype html>

<?php
include "include/config.php";
if(isset($_POST["Simpan"]))
{
    $kategoriberitaKODE = $_POST['inputkode'];
    $kategoriberitaNAMA = $_POST['inputnama'];
    $kategoriberitaKET = $_POST['inputket'];

    //digunakan utk memasukkan data yang akan tersimpan di variable ini
    //varaibelnya harus sama dgn yang ada di file config.php
    mysqli_query($connection, "insert into kategoriberita values ('$kategoriberitaKODE', 
    '$kategoriberitaNAMA', '$kategoriberitaKET')");
    
    header("location:kategoriberita.php");
}

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> Hello, world! </title>
  </head>
  <body>
<!-- mulai saya kerja -->

<div class="row">
<div class="col-sm-1">
</div>


<div class="col-sm-10">
<div class="alert alert-secondary" role="alert">
<b> ENTRI DATA KATEGORI BERITA </b>
</div>
<form method="POST">
  <div class="form-group row">
    <label for="inputkode" class="col-sm-3 col-form-label"><b><p style="text-align: right;"> Kode Kategori Berita </b></p></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputkode" name="inputkode" placeholder="Kode Kategori Berita">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputnama" class="col-sm-3 col-form-label"><b><p style="text-align: right;"> Nama Kategori Berita </b></p></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputnama" name="inputnama" placeholder="Nama Kategori Berita">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputket" class="col-sm-3 col-form-label"><b><p style="text-align: right;"> Keterangan Kategori Berita </b></p></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputEket" name="inputket" placeholder="Keterangan Kategori Berita">
    </div>
  </div>

  <div class="form-group row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-7">
          <button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-info">Batal</button>
        </div>
      </div>
</form> 
    
</div>



<!-- akhir saya kerja -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>