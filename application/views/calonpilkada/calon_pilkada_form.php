<div class="content">
	<div class="container">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<!-- Judul halaman -->
				<h4 class="page-title" style="margin-bottom: 10px">Calon Pilkada<?php echo $button ?> </h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<!-- Isi content -->
					<form action="<?php echo $action; ?>" method="post">
						<div class="form-group">
							<label for="nama_calon">Nama Calon <?php echo form_error('nama_calon') ?></label>
							<input class="form-control" rows="3" name="nama_calon" id="nama_calon" placeholder="Nama Calon" value="<?php echo $nama_calon; ?>">
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
						<div class="form-group">
							<label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
							<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
						</div>
						<div class="form-group">
							<label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
							<textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
						</div>
						<input type="hidden" name="id_calon_pilkada" value="<?php echo $id_calon_pilkada; ?>" /> 
						<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
						<a href="<?php echo site_url('calonpilkada') ?>" class="btn btn-default">Cancel</a>
					</form>
				</div>
			</div>
		</div>        

	</div> 
	
</div>


