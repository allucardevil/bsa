<?php 
$this->load->view('gp/header');?>
<div class="span9">
<h4>List User</h4>
<table class="table table-bordered table-striped">
<thead><tr><th>No</th><th>Nama</th><th>NIPP</th><th>HP</th><th>Email</th><th>Cabang</th><th>Unit</th><th>Jabatan</th><th>User Level</th><th>Action</th></tr></thead>
<?php 
	$no=1;
	foreach ($all_ui as $rows){ ?>
	<tr>
	<td><?php echo $no;?></td>
	<td>
	<?php echo ucfirst($rows->ui_nama);?>
	</td>
	<td>
	<?php echo $rows->ui_nipp;?>
	</td>
	<td>
	<?php echo $rows->ui_hp;?>
	</td>
	<td>
	<?php echo $rows->ui_email;?>
	</td>
	<td>
	<?php echo strtoupper($rows->ui_cabang);?>
	</td>
	<td>
	<?php echo strtoupper($rows->ui_unit);?>
	</td>
	<td>
	<?php echo $rows->ui_jabatan;?>
	</td>
	<td>
	<?php echo $rows->ui_app_level;?>
	</td>
	<td>
	<a href="<?php echo base_url();?>user/update_user/<?php echo $rows->ui_id;?>">Update</a>
	<a href="<?php echo base_url();?>user/del_user/<?php echo $rows->ui_id;?>">Delete</a>
	</td>
<?php $no++; }?>
</table>
</div>