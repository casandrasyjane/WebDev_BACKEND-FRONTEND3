<!doctype html>

<?php
include "include/config.php";
if(isset($_POST["Simpan"]))
{
    $kategoriKODE = $_POST['inputkode'];
    $kategoriNAMA = $_POST['inputnama'];
    $kategoriKET = $_POST['inputket'];
    $kategoriREFERENCE = $_POST['inputreference'];

    //digunakan utk memasukkan data yang akan tersimpan di variable ini
    //varaibelnya harus sama dgn yang ada di file config.php
    mysqli_query($connection, "insert into kategoriwisata values ('$kategoriKODE', 
    '$kategoriNAMA', '$kategoriKET', '$kategoriREFERENCE')");
    
    
}

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="
    sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <title> Kategori Wisata </title>
  </head>
  <body>
<!-- mulai saya kerja -->

<div class="row">
<div class="col-sm-1">
</div>


<div class="col-sm-8">
<form method="POST">
  <div class="form-group row">
    <label for="inputkode" class="col-sm-3 col-form-label"> Kode Kategori Wisata </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputkode" name="inputkode" placeholder="input kode">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputnama" class="col-sm-3 col-form-label"> Nama Kategori Wisata </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputnama" name="inputnama" placeholder="input nama">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputket" class="col-sm-3 col-form-label"> Keterangan Kategori Wisata </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputket" name="inputket" placeholder="input keterangan">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputref" class="col-sm-3 col-form-label"> Referensi Kategori </label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputref" name="inputreference" placeholder="input referensi">
    </div>
  </div>

<input type="submit" name="Simpan" values="Simpan" class="btn btn-secondary">
<button type="reset" class="btn btn-success"> Batal </button>

</form>
</div>
</div>

<!-- akhir saya kerja -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <table class="table table-hover table-primary">
                <thead>
                    <tr>
                    <th scope="col"> No. </th>
                    <th scope="col"> Kode Kategori Wisata </th>
                    <th scope="col"> Nama Kategori Wisata </th>
                    <th scope="col"> Keterangan Kategori Wisata </th>
                    <th scope="col"> Referensi Kategori </th>
                                                    
                    <!--untuk membagi kolom menjadi dua dengan colspan-->
                    <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select kategoriwisata.* 
                            from kategoriwisata
                            where kategoriNAMA like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select kategoriwisata.* from kategoriwisata");
                    }
                    
                        //      $query = mysqli_query($connection, "select destinasi.* from destinasi");
                    
                        //untuk menampilkan tampilan isi database
                        //$query = mysqli_query($connection, "select destinasi.* from destinasi"); //destinasi. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['kategoriKODE']; ?> </td>
                                <td> <?php echo $row['kategoriNAMA']; ?> </td>
                                <td> <?php echo $row['kategoriKET']; ?> </td>
                                <td> <?php echo $row['kategoriREFERENCE']; ?> </td>
                                
                                <td width="5px">

                                <!--variabel 'ubah' untuk menunjukkan ke variabel yang ada di php yang bagian echo $row["destinasiKODE"]-->
                                <a href="k-kategoriwisataEDIT.php?ubah=<?php echo $row["kategoriKODE"]?>" 
                                class="btn btn-success btn-sm" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="kategoriwisataHAPUS.php?hapus=<?php echo $row["kategoriKODE"] ?>" 
                                class="btn btn-danger btn-sm" title="HAPUS">
                                <i class="bi bi-trash"></i>
                                </a>
                                </td>
                            </tr>
                    
                    <?php $nomor = $nomor + 1; ?>

                    <?php    
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>


  </body>
</html>