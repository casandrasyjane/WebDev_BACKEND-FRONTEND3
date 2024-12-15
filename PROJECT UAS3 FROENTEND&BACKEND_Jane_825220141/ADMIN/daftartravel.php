<!doctype html>
<html>

<?php
    include 'include/config.php'; //nyambungin data 
?>

<head>
    <title> travel </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- stylesheet untuk memanggil file dengan tipe text/css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row"> <!-- total kolom adalah 12 -->
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <h2 class=display-5> Hasil Entri Data travel</h2>

            <form method = "POST">
                <!--form nya ada dalam sebuah form group, margin bottomnya 2-->
                <div class = "formgroup row mb-2" style="margin-top: 20px;">
                    <!--row-sm-2 untuk panjang judul "Nama Destinasi"-->
                    <label for = "search" class = "col-sm-2">Kode travel</label>
                    <!--col-sm-6 untuk panjang box-->
                    <div class = "col-sm-6">
                        <input type ="text" name ="search" class = "form-control" id = "search" value = "<?php if
                        (isset($_POST["search"])) {echo $_POST ["search"];}?>"    placeholder = "Cari kode travel">
                    </div>
                    <input type ="submit" name = "kirim" value = "Cari" class = "col-sm-1 btn btn-primary">
                </div>
            </form>

            <table class="table table-hover table-dark" style="margin-top: 20px;">
            <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Kode Travel</th>
      <th scope="col">Nama Travel</th>
      <th scope="col">Foto Travel</th>
      <th scope="col">Nama Tempat Travel</th>
    </tr>
  </thead>
                <tbody>
                    <?php
                        if (isset ($_POST["kirim"])){
                            $search = $_POST["search"];
                            $query = mysqli_query($connection, "select travel.* from travel where travelNAMA like '%".$search."%' ");
                        }
                        else {
                            $query = mysqli_query($connection, "select travel.* from travel");
                        }
                        //$query = mysqli_query($connection, "select travel.* from travel"); //destinasi. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

<tr>
      <th><?php echo $nomor;?></th>
      <td><?php echo $row['travelKODE'];?></td>
      <td><?php echo $row['travelNAMA'];?></td>
      <td><?php echo $row['travelFILE'];?></td>
      <td><?php echo $row['tempatNAMA'];?></td>
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


</body>

</html>