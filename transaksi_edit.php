<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id = $_REQUEST['id'];
		$restoran = $_REQUEST['restoran1']; 
		$makanan = $_REQUEST['makanan'];
		$harga = $_REQUEST['harga'];
		$nama = $_REQUEST['nama'];
		$alamat = $_REQUEST['alamat'];
		$no = $_REQUEST['no'];
		$email = $_REQUEST['email'];

		$sql = mysqli_query($koneksi, "UPDATE transaksi SET restoran='$restoran', makanan='$makanan', harga='$harga', nama='$nama', alamat='$alamat', no='$no', email='$email' WHERE id='$id'");

		if($sql == true){
			header('Location: ./admin.php?hlm=transaksi');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.'.mysqli_error($koneksi);
		}
	} else {

		$id = $_REQUEST['id'];

		$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id='$id'");
		while($row = mysqli_fetch_array($sql)){

?>

<script>
	function random()
	{
		var a=document.getElementById('restoran').value;
		var s="";
		var g="";
		if(a==='Warteg Kharisma')
		{
			var s="Paket nasi tempe orek, kentang balado, oseng-oseng, tongkol";
			var g="30000";
		}
		else if(a==='Restoran Padang Sederhana')
		{
			var s="Paket Nasi Sate padang";
			var g="40000";
		}
		else if(a==='Soto Ayam Ndelik')
		{
			var s="Paket Nasi Soto Ayam plus mendoan";
			var g="35000";
		}
		document.getElementById('makanan').value=s;
		document.getElementById('harga').value=g;
		document.getElementById('restoran1').value=a;
	}
</script>


<h2>Edit Data Transaksi</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="id" class="col-sm-2 control-label">id</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="id" value="<?php echo $row['id']; ?>"name="id" placeholder="" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Pilih Restoran</label>
		<div class="col-sm-3">
			<select name="jenis" class="form-control" id="restoran" name="restoran" onchange="random()">
				<option value="" disable>--- Pilih Restoran ---</option>
				<option value="Warteg Kharisma">Warteg Kharisma</option>
				<option value="Restoran Padang Sederhana">Restoran Padang Sederhana</option>
				<option value="Soto Ayam Ndelik">Soto Ayam Ndelik</option>
			</select>
		</div>
	</div>
	<input id="restoran1" name="restoran1" hidden>
	<div class="form-group">
		<label for="makanan" class="col-sm-2 control-label">Makanan</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="makanan" name="makanan" value="<?php echo $row['makanan']; ?>" placeholder="" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="harga" class="col-sm-2 control-label">harga</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" placeholder="" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" placeholder="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat Lengkap</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" aria-label="With textarea" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="no" class="col-sm-2 control-label">No HP</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="no" name="no" value="<?php echo $row['no']; ?>" placeholder="" required>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Alamat Email</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
	}
}
?>
