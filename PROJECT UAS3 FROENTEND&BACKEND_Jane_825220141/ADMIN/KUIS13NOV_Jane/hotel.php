<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 
    if(isset($_POST['Simpan'])) { //isset yang di kirim ada isinya atau tidak
        $hotelKODE = $_POST['hotelKODE'];
        $hotelNAMA = $_POST['hotelNAMA'];
        $hotelALAMAT = $_POST['hotelALAMAT'];

        mysqli_query($connection, "insert into hotel values ('$hotelKODE', '$hotelNAMA', '$hotelALAMAT')");
        header("location:hotel.php");
    }

?>

<head>
    <title> HOTEL </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <form method="POST">
                <div class="mb-3 row"> <!-- desainnya bisa begitu karena mb-3 row(mb=margin buttom), membuat spasi menjadi 3 spasi -->
                    <label for="hotelKODE" class="col-sm-2 col-form-label"> Kode Hotel </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hotelKODE" id="hotelKODE">
                    </div>
                </div>        
                
                <div class="mb-3 row"> 
                    <label for="hotelNAMA" class="col-sm-2 col-form-label"> Nama Hotel </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hotelNAMA" id="hotelNAMA">
                    </div>
                </div>    

                <div class="mb-3 row"> 
                    <label for="hotelALAMAT" class="col-sm-2 col-form-label"> Alamat Hotel </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="hotelALAMAT" id="hotelALAMAT">
                    </div>
                </div>    

                <div class="form-group row">
                    <div class="col-sm-2"> <!-- membuat disebelah kiri kosong -->
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" value="Simpan" class="btn btn-secondary" name="Simpan">
                        <input type="reset" value="Batal" class="btn btn-success" name="baral">
                    </div>
                </div>
            </form>

<!-- bagian untuk 'search' -->
<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2"> Nama Hotel </label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-9">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari Nama Hotel">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>

    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Alamat Hotel</label>
        
        <!--untuk panjang box isi nya-->
        <div class="col-sm-9">
            <input type="text" name="search2" class="form-control" id="search2" 
            value="<?php if(isset($_POST["search2"]))
            {echo $_POST["search2"];}?>"placeholder="Cari Alamat Hotel">
        </div>
         <input type="submit" name="kirim2" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Kode Hotel </th>
                    <th scope="col"> Nama Hotel </th>
                    <th scope="col"> Alamat Hotel </th>
                                                    
                    <!--untuk membagi kolom menjadi dua dengan colspan-->
                    <th colspan="2" style="text-align: center"> Aksi </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        //untuk menerima isi dari search yang ada di atas '$search'
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select hotel.*
                            from hotel
                            where hotelNAMA like '%".$search."%'");
                    }

                    else if (isset($_POST["kirim2"]))
                    {
                        $search2 = $_POST["search2"];
                        $query = mysqli_query($connection, "select hotel.*
                            from hotel
                            where hotelALAMAT like '%".$search2."%'");
                    }
                    
                    else

                    {
                        $query = mysqli_query($connection, "select hotel.* from hotel");
                    }
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { 
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['hotelKODE']; ?> </td>
                                <td> <?php echo $row['hotelNAMA']; ?> </td>
                                <td> <?php echo $row['hotelALAMAT']; ?> </td>
                                
                                <td width="5px">

                                <a href="hoteledit.php?ubah=<?php echo $row["hotelNAMA"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="hotelhapus.php?hapus=<?php echo $row["hotelNAMA"]?>" 
                                class="btn btn-danger btn-sm" title="HAPUS">
                                    <i class="bi bi-trash"></i>
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

</body>

</html>