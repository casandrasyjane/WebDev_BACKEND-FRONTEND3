<!doctype html>
<html>

<?php
    include 'include/config.php'; 
?>

<head>
    <title> Perkulineran </title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col-sm-10">

            <h2 class=display-5> Hasil Entri Data Kuliner </h2>

            <form method = "POST">
                <div class = "formgroup row mb-2" style="margin-top: 20px;">
                    <label for = "search" class = "col-sm-2">Kode kuliner</label>
                    <div class = "col-sm-6">
                        <input type ="text" name ="search" class = "form-control" id = "search" value = "<?php if
                        (isset($_POST["search"])) {echo $_POST ["search"];}?>"    placeholder = "Cari Kode kuliner">
                    </div>
                    <input type ="submit" name = "kirim" value = "Cari" class = "col-sm-1 btn btn-primary">
                </div>
            </form>

            <table class="table table-hover table-dark" style="margin-top: 20px;">
                <thead>
                    <tr>
                    <th scope="col"> No. </th>
                    <th scope="col"> Kode kuliner </th>
                    <th scope="col"> Nama kuliner </th>
                    <th scope="col"> Gambar kuliner </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        if (isset ($_POST["kirim"])){
                            $search = $_POST["search"];
                            $query = mysqli_query($connection, "select kuliner.* from kuliner where kulinerKODE like '%".$search."%' ");
                        }
                        else {
                            $query = mysqli_query($connection, "select kuliner.* from kuliner");
                        }
                        //$query = mysqli_query($connection, "select hotel.* from hotel"); //hotel. itu kalo misalnya ada atribut yang sama biar tidak bentrok
                        $nomor = 1;
                        while($row = mysqli_fetch_array($query)) { //mengambil satu per satu record dari query
                    ?>

                    <tr>
                    <td><?php echo $nomor;?></td>
           <td><?php echo $row['kulinerKODE'];?></td>
           <td><?php echo $row['kulinerNAMA'];?></td>
           <!--<td><?// echo $row['kulinerGAMBAR'];?></td>  -->
   
           <td>
			<?php if (isset($row['kulinerGAMBAR']) && is_file("images/" . $row['kulinerGAMBAR'])) 
						{ ?>
							<img src="images/<?php echo $row['kulinerGAMBAR']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
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


</body>

</html>