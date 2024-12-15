<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FOTO DESTINASI WISATA</title>
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="
    sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

</head>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$kulinerKODE = $_POST['inputkode'];
		$kulinerNAMA = $_POST['inputnama'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];


		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png") or ($ekstensifile == "PNG")
        or ($ekstensifile == "JPEG") or ($ekstensifile == "jpeg"))

		{
			move_uploaded_file($file_tmp, 'images/'.$namafile);
			mysqli_query($connection, "INSERT INTO kuliner (kulinerKODE, kulinerNAMA, kulinerGAMBAR) 
            VALUES ('$kulinerKODE', '$kulinerNAMA', '$namafile')");
			
		}

	}

?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Kuliner</h1>
		</div>
	</div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/enam.jpeg" class="d-block w-60 mx-auto" alt="Gambar Tidak Ada">
            <div class="carousel-caption d-none d-md-block">
                <h5>Menu Pertama</h5>
                <p>Dimsum</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/hmm.jpeg" class="d-block w-60 mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Menu Kedua</h5>
                <p>Katsu</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/dua.jpeg" class="d-block w-60 mx-auto" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Menu Ketiga</h5>
                <p>Roti</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="left: 5%">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="right: 5%">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<style>
    .carousel-inner {
        margin-bottom: 30px;
    }
</style>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="kulinerKODE" class="col-sm-2 col-form-label">Kode Makanan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kulinerKODE" name="inputkode" placeholder="Input kode makanan" maxlength="4">
			</div>
		</div>

		<div class="form-group row">
			<label for="kulinerNAMA" class="col-sm-2 col-form-label">Nama Makanan</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kulinerNAMA" name="inputnama" placeholder="Input nama makanan">
			</div>
		</div>


		<div class="form-group row">
			<label for="file" class="col-sm-2 col-form-label">Gambar Makanan</label>
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
     		 <label for="search" class="col-sm-2">Nama Makanan</label>
     		 <div class="col-sm-6">
        <input type="text" name="search" class="form-control" id="search" value="<?php if (isset($_POST["search"]))
        {echo $_POST["search"];}?>" placeholder="Cari nama makanan">
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
		


	<table class="table table-hover table-primary">
		<thead class="thead-dark">
			<tr>

				<th scope="col"> No. </th>
                    <th scope="col"> Kode Makanan </th>
                    <th scope="col"> Nama Makanan </th>
                    <th scope="col"> Gambar Makanan </th>

                    <th colspan="3" style="text-align: center">Aksi</th>
			</tr>			
		</thead>

		<tbody>
		<?php 

	if (isset($_POST["kirim"]))
	{
 		$search = $_POST["search"];
  		$query = mysqli_query($connection, " select kuliner.*from kuliner
      		where kuliner like '%".$search."%'");}
    else{
      	$query = mysqli_query($connection, "select kuliner.* from kuliner");}
     	$nomor = 1;
      	while($row = mysqli_fetch_array($query))
    {    
      ?>

		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $row['kulinerKODE'];?></td>
			<td><?php echo $row['kulinerNAMA'];?></td>
			
			<td>
			<?php if (isset($row['kulinerGAMBAR']) && is_file("images/" . $row['kulinerGAMBAR'])) 
						{ ?>
							<img src="images/<?php echo $row['kulinerGAMBAR']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>

				
				<td width="5px">
           		<a href="k-kulinerEDIT.php?ubah=<?php echo $row["kulinerKODE"] ?>" class="btn btn-success btn-sm" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
				</svg></a>
                </td>

           		<td width="5px">
                <a href="kulinerHAPUS.php?hapus=<?php echo $row["kulinerKODE"] ?>" class="btn btn-danger btn-sm" title="Hapus">
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