<?php
$bulan = [
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
];
?>
<div class="content">
	<div class="container">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title" style="margin-bottom: 10px">Data Calon Pilkada</h4>
			</div>
		</div>
		
		<!-- Tabel -->
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<!-- Div 1 -->
					<div class="row" style="margin-bottom: 10px">
						<div class="col-md-4">
							<!-- Ambil dari generator -->
							<?php echo anchor(site_url('CalonPilkada/create'),'Create', 'class="btn btn-primary"'); ?>
						</div>
						<div class="col-md-4 text-center">
							<div style="margin-top: 8px" id="message">
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							</div>
						</div>
					</div>
					<!-- Div 2 -->
					<div class="row">
						<div class="col-sm-12">
							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap data-list" cellspacing="0" width="100%">
								<thead>
									<!-- Ambil dari generator -->
									<tr>
										<th>No</th>
										<th>Nama Calon</th>
										<th>Gender</th>
										<th>Tgl Lahir</th>
										<th>Alamat</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<!-- Ambil dari generator -->
									<?php
									foreach ($calonpilkada_data as $no => $calonpilkada){
										$split_birthday = explode('-', $calonpilkada->tgl_lahir);
										$convert_date = $split_birthday[2].' '.$bulan[$split_birthday[1]].' '.$split_birthday[0];
										?>
										<tr>
											<td width="80px"><?php echo $no+1 ?></td>
											<td><?php echo $calonpilkada->nama_calon ?></td>
											<td><?php echo $calonpilkada->gender ?></td>
											<td><?php echo $convert_date ?></td>
											<td><?php echo $calonpilkada->alamat ?></td>
											<td style="text-align:center" width="200px">
												<?php 
												echo anchor(site_url('CalonPilkada/read/'.$calonpilkada->id_calon_pilkada),' ', 'class="btn btn-info waves-effect waves-light glyphicon glyphicon-eye-open"'); 
												echo ' '; 
												echo anchor(site_url('CalonPilkada/update/'.$calonpilkada->id_calon_pilkada),' ', 'class="btn btn-warning waves-effect waves-light glyphicon glyphicon-pencil"'); 
												echo ' '; 
												echo anchor(site_url('CalonPilkada/delete/'.$calonpilkada->id_calon_pilkada),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
												?>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>                    
				</div>
			</div>
		</div>
		

	</div> 
	
</div>
