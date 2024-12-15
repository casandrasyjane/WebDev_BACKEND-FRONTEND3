<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 

?>

<head>
    <title> DESTINASI 1 </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
    
        <div class="col-sm-10">

<div class="jumbotron mt-5">
    <h2 class="display-5">Hasil entri data destinasi wisata</h2>
</div>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Nama Destinasi</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari nama destinasi">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No. </th>
                    <th scope="col"> Kode Destinasi </th>
                    <th scope="col"> Nama Destinasi </th>
                    <th scope="col"> Nama Kategori </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select * 
                            from destinasi, kategoriwisata
                            where destinasiNAMA like '%".$search."%' AND kategoriwisata.kategoriKODE = destinasi.kategoriKODE"); //ini diambil dari dua tabel
                    }else

                    {
                        //akan membuat dia tidak redudansi
                        $query = mysqli_query($connection, "select * from destinasi, kategoriwisata
                        WHERE kategoriwisata.kategoriKODE = destinasi.kategoriKODE");
                    }
                    
                    //      $query = mysqli_query($connection, "select destinasi.* from destinasi");
                    
                        //untuk menampilkan tampilan isi database
                        //$query = mysqli_query($connection, "select destinasi.* from destinasi"); //destinasi. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['destinasiKODE']; ?> </td>
                                <td> <?php echo $row['destinasiNAMA']; ?> </td>
                                <td> <?php echo $row['kategoriNAMA']; ?> </td>
                                
                            </tr>
                    
                    <?php $nomor = $nomor + 1; ?>

                    <?php    
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

    <script>
        $(document).ready(function() {
            ('#kodekategori').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kategori Wisata'
            } );
        } );
    </script>

</body>

</html>