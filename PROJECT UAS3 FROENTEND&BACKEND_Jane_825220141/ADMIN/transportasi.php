<!doctype html>
<html>

<?php
    include 'include/config.php';  
    if(isset($_POST['Simpan'])) { 
        $transportasiKODE = $_POST['kodetransportasi'];
        $transportasiJENIS = $_POST['transportasiJENIS'];
        $travelKODE = $_POST['travelKODE'];

        mysqli_query($connection, "insert into transportasi values ('$transportasiKODE', '$transportasiJENIS',  '$travelKODE')");
    }

    $travelKODE = mysqli_query($connection, "select * from travel");
?>

<head>
    <title> transportasi 1 </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    
    <!--ini buat manggil svg nya-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <form method="POST">
                <div class="mb-3 row"> 
                    <label for="kodetransportasi" class="col-sm-2 col-form-label"> Kode transportasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodetransportasi" id="kodetransportasi">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="transportasiJENIS" class="col-sm-2 col-form-label"> Jenis transportasi </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="transportasiJENIS" id="transportasiJENIS">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="travelKODE" class="col-sm-2 col-form-label"> Kode Travel </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="travelKODE" id="travelKODE">
                                <option> Kode Travel </option>
                                    <?php while($row = mysqli_fetch_array($travelKODE)) {
                                        ?>
                                        <option value="<?php echo $row["travelKODE"] ?>" >
                                        <?php echo $row["travelKODE"] ?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                </div>
                                    
   
                <div class="form-group row">
                    <div class="col-sm-2"> 
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" value="Simpan" class="btn btn-secondary" name="Simpan">
                        <input type="reset" value="Batal" class="btn btn-success" name="batal">
                    </div>
                </div>
            </form>

<form method="POST">
    <div class="form-group row mb-2">
        <label for="search"class="col-sm-2">Nama transportasi</label>
        
        <div class="col-sm-6">
            <input type="text" name="search" class="form-control" id="search" 
            value="<?php if(isset($_POST["search"]))
            {echo $_POST["search"];}?>"placeholder="Cari nama transportasi">
        </div>
         <input type="submit" name="kirim" value="Cari" class="col-sm-1 btn btn-primary">
    </div>
</form>


            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col"> No. </th>
                    <th scope="col"> Kode transportasi </th>
                    <th scope="col"> Jenis transportasi </th>
                    <th scope="col"> Kode Kategori </th>
                                                    
                    <th colspan="2" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php

                    if(isset($_POST["kirim"]))
                    {
                        $search = $_POST["search"];
                        $query = mysqli_query($connection, "select transportasi.* 
                            from transportasi
                            where transportasiJENIS like '%".$search."%'");
                    }else

                    {
                        $query = mysqli_query($connection, "select transportasi.* from transportasi");
                    }
                    
                    $nomor = 1;
                        while($row = mysqli_fetch_array($query)) {
                    ?>

                            <tr>
                                <td> <?php echo $nomor; ?> </td>
                                <td> <?php echo $row['transportasiKODE']; ?> </td>
                                <td> <?php echo $row['transportasiJENIS']; ?> </td>
                                <td> <?php echo $row['travelKODE']; ?> </td>
                                
                                <td width="5px">

                                <a href="t-transportasiEDIT.php?ubah=<?php echo $row["transportasiKODE"]?>" 
                                class="btn btn-success btn-sm" title="EDIT">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>

                                </td>
                                <td width="5px">
                                <a href="transportasiHAPUS.php?hapus=<?php echo $row["transportasiKODE"]?>" 
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

    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"> </script>

    <script>
        $(document).ready(function() {
            ('#travelKODE').select2( {
                closeOnSelect:true,
                allowClear:true,
                placeholder:'Pilih Kategori Travel'
            } );
        } );
    </script>

</body>

</html>