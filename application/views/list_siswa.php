<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Siswa</title>
</head>
<body>
<?php 
if($this->session->flashdata('msg')) { 
echo $this->session->flashdata('msg').'<br>';
}
?>
<a href="<?php echo base_url('siswa/add_siswa')?>">Tambah Siswa</a>
<table>
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Aksi</th>
	</tr>
	<?php if ($list->num_rows()>0) { ?>
		<?php $no=0; ?>
		<?php foreach ($list->result() as $row) { ?>
		<?php $no++; ?>	
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row->nama;?></td>
			<td><?php echo $row->kelas;?></td>
			<td>
				<a href="<?=base_url('siswa/edit_siswa/'.$row->id)?>">Edit</a>
				<a href="<?=base_url('siswa/delete_siswa/'.$row->id)?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	<?php } else { ?>
		<tr>
			<td colspan="4">Data tidak ada</td>
		</tr>
	<?php } ?>	
</table>
</body>
</html>
