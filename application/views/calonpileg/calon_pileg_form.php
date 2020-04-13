<?php
$data_dapil = $this->DapilModel->get_all();
$map_dapil = ['' => 'Pilih Dapil'];
foreach ($data_dapil as $key => $value) {
	$id = $value->id_dapil;
	$map_dapil[$id] = $value->nama_dapil;
}

$data_parpol = $this->ParpolModel->get_all();
$map_parpol = ['' => 'Pilih Parpol'];
foreach ($data_parpol as $key => $value) {
	$id = $value->id_parpol;
	$map_parpol[$id] = $value->nama_parpol;
}

?>
<div class="content">
	<div class="container">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<!-- Judul halaman -->
				<h4 class="page-title" style="margin-bottom: 10px">Calon Pileg <?php echo $button ?></h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<!-- Isi Tag Form dibawah ini -->
					<form action="<?php echo $action; ?>" method="post">
						<div class="form-group">
							<label for="int">Dapil <?php echo form_error('id_dapil') ?></label>
							<?= form_dropdown('id_dapil', $map_dapil, $id_dapil, ['class' => 'form-control']) ?>
						</div>
						<div class="form-group">
							<label for="int">Parpol <?php echo form_error('id_parpol') ?></label>
							<?= form_dropdown('id_parpol', $map_parpol, $id_parpol, ['class' => 'form-control']) ?>
						</div>
						<div class="form-group">
							<label for="int">No Urut <?php echo form_error('no_urut') ?></label>
							<input type="text" class="form-control" name="no_urut" id="no_urut" placeholder="No Urut" value="<?php echo $no_urut; ?>" />
						</div>
						<div class="form-group">
							<label for="nama_calon">Nama Calon <?php echo form_error('nama_calon') ?></label>
							<input type="text" class="form-control" rows="3" name="nama_calon" id="nama_calon" placeholder="Nama Calon" value="<?php echo $nama_calon; ?>" />
						</div>
						<div class="form-group">
							<label for="enum">Gender <?php echo form_error('gender') ?></label>
							<?php
							$gender_option = [
								'' => 'Pilih gender',
								'Laki-laki' => 'Laki-laki',
								'Perempuan' => 'Perempuan'
							];
							echo form_dropdown('gender', $gender_option, $gender, ['class' => 'form-control']);
							?>
						</div>
						<input type="hidden" name="id_calon_pileg" value="<?php echo $id_calon_pileg; ?>" /> 
						<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
						<a href="<?php echo site_url('CalonPileg') ?>" class="btn btn-default">Cancel</a>
					</form>
				</div>
			</div>
		</div>        

	</div> 
	
</div>
