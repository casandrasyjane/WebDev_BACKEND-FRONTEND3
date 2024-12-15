<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pemesanan Barang</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="
    sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

</head>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$pemesananKODE = $_POST['kodepemesanan'];
		$pemesananNAMA = $_POST['namapemesanan'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png") or ($ekstensifile == "PNG"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); 
			mysqli_query($connection, "INSERT INTO pemesananbarang (pemesananKODE, pemesananNAMA, 
            fotodestinasiFILE) VALUES ('$pemesananKODE', '$pemesananNAMA', '$namafile')");
		}

	}

?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Pemesanan Barang</h1>
		</div>
	</div>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="pemesananKODE" class="col-sm-2 col-form-label">Kode Pemesanan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="pemesananKODE" name="kodepemesanan" placeholder="Kode Pemesanan" maxlength="4">
			</div>
		</div>

		<div class="form-group row">
			<label for="namafoto" class="col-sm-2 col-form-label">Nama Pemesanan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Photo">
			</div>
		</div>

		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Pemesanan Barang</label>
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
     		 <label for="search" class="col-sm-2">Nama Foto</label>
     		 <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="Cari nama foto">
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
				<h1 class="display-4">Daftar Pemesanan Barang</h1>
			</div>
		</div>


	<table class="table table-hover table-danger">
		<thead class="thead-dark">
			<tr>

				<th scope="col"> No. </th>
                    <th scope="col"> Kode Pemesanan </th>
                    <th scope="col"> Nama Pemesanan </th>
                    <th scope="col"> Keterangan Pemesanan </th>
					<th scope="col"> Alamat Pemesanan </th>
                    <th colspan="3" style="text-align: center">Aksi</th>
			</tr>			
		</thead>

		<tbody>
		<?php 

	if (isset($_POST["kirim"]))
	{
 		$search = $_POST["search"];
  		$query = mysqli_query($connection, " select fotodestinasi.*from fotodestinasi
      		where fotodestinasiNAMA like '%".$search."%'");}
    else{
      	$query = mysqli_query($connection, "select fotodestinasi.* from fotodestinasi");}
     	$nomor = 1;
      	while($row = mysqli_fetch_array($query))
    {    
      ?>

		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $row['fotodestinasiKODE'];?></td>
			<td><?php echo $row['fotodestinasiNAMA'];?></td>
			
			<td>
			<?php if (isset($row['fotodestinasiFILE']) && is_file("images/" . $row['fotodestinasiFILE'])) 
						{ ?>
							<img src="images/<?php echo $row['fotodestinasiFILE']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

				
				<td width="5px">
           		<a href="d-pemesananEDIT.php?ubah=<?php echo $row["fotodestinasiKODE"] ?>" class="btn btn-success btn-sm" title="EDIT">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg></a>
                </td>

           		<td width="5px">
                <a href="d-pemesananHAPUS.php?hapus=<?php echo $row["fotodestinasiKODE"] ?>" class="btn btn-danger btn-sm" title="HAPUS">
                <i class="bi bi-trash"></i>
                </a>
                </td>
			</td>

		</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
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