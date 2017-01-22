<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Siswa</title>
</head>
<body>
<a href="<?php echo base_url('siswa') ?>">Kembali</a>
<br>
<?php if ($siswa['id']) { ?>
<form action="<?php echo base_url('siswa/update_siswa')?>" method="post">
<?php } else { ?>
<form action="<?php echo base_url('siswa/simpan_siswa')?>" method="post">
<?php } ?>
	<?php 
	if($this->session->flashdata('msg')) { 
	echo $this->session->flashdata('msg')." ".validation_errors();
	}
	?>
	<input type="hidden" id="id" name="id" value="<?=$siswa['id']?>">
	<label for="nama">Nama *</label>
	<input type="text" id="nama" name="nama" value="<?=$siswa['nama']?>">
	<label for="kelas">Kelas *</label>
	<input type="text" id="kelas" name="kelas" value="<?=$siswa['kelas']?>">

	<button type="submit" class="btn btn-success pull-right">Simpan</button>
</form>	
</body>
</html>
