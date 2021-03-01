<?php 
	// print_r($dd_bagian_departemen);
	// echo count($dd_bagian_departemen);
	// if(count($dd_bagian_departemen)!=1) { 
?>
<div class="form-group">
	<label>Bagian Departemen</label>
	<?php echo form_dropdown('id_bagian_departemen',$dd_bagian_departemen, $id_bagian_departemen, 'required class="form-control"');?>
</div>
<?php 
	// }
?>