<?php 
$this->load->view('gp/header');?>
<div class="span9">
					
    <div class="hero-unit">
        <h3>
 <?php  foreach ($profile as $rows) { echo strtoupper($rows->ui_nama);?> Profile
        </h3>
<table>
		 <?php
		
		echo "<tr><td>Nama</td><td> :</td><td>";
		echo strtoupper($rows->ui_nama)."</td></tr>";
		echo "<tr><td>NIPP</td><td> :</td><td>";
		echo $rows->ui_nipp."</td></tr>";
		echo "<tr><td>No. HP</td><td> :</td><td>";
		echo $rows->ui_hp."</td></tr>";
		echo "<tr><td>Email</td><td> :</td><td>";
		echo $rows->ui_email."</td></tr>";
		echo "<tr><td>Cabang</td><td> :</td><td>";
		echo strtoupper($rows->ui_cabang)."</td></tr>";
		echo "<tr><td>Unit</td><td> :</td><td>";
		echo strtoupper($rows->ui_unit)."</td></tr>";
		echo "<tr><td>Jabatan</td><td> :</td><td>";
		echo strtoupper($rows->ui_jabatan)."</td></tr>";
		echo "<tr><td>Level</td><td> :</td><td>";
		echo strtoupper($rows->ui_app_level)."</td></tr>";
		}?>
</table>
    </div>				
</div>