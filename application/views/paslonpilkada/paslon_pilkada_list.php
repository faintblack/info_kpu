<div class="content">
	<div class="container">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title" style="margin-bottom: 10px">Data Paslon Pilkada</h4>
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
							<?php echo anchor(site_url('PaslonPilkada/create'),'Create', 'class="btn btn-primary"'); ?>
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
							<table id="datatable-responsive" class="table table-striped table-bordered nowrap data-list" cellspacing="0" width="100%">
								<thead>
									<!-- Ambil dari generator -->
									<tr>
										<th>No</th>
										<th>Jenis Pemilihan</th>
										<th>Nomor Urut</th>
										<th>Kepala Daerah</th>
										<th>Wakil Kepala Daerah</th>
										<th>Status Penetapan</th>
										<th>Tahun</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<!-- Ambil dari generator -->
									<?php
									foreach ($paslonpilkada_data as $no => $paslonpilkada){
										?>
										<tr>
											<td width="80px"><?php echo $no+1 ?></td>
											<td><?php echo $paslonpilkada->jenis_pemilihan ?></td>
											<td><?php echo $paslonpilkada->nomor_urut ?></td>
											<td><?php echo $paslonpilkada->id_kepala_daerah ?></td>
											<td><?php echo $paslonpilkada->id_wakil_kepala_daerah ?></td>
											<td>
                                                <span class="label label-<?= $paslonpilkada->status_penetapan == 'MS' ? 'success' : 'danger' ?>">
                                                    <?= $paslonpilkada->status_penetapan == 'MS' ? 'Memenuhi Syarat' : 'Tidak Memenuhi Syarat' ?>
                                                </span>
                                            </td>
											<td><?php echo $paslonpilkada->tahun ?></td>
											<td style="display:table-cell; text-align:center" width="200px">
												<?php 
												echo anchor(site_url('PaslonPilkada/read/'.$paslonpilkada->id_paslon),' ', 'class="btn btn-info waves-effect waves-light glyphicon glyphicon-eye-open"'); 
												echo ' '; 
												echo anchor(site_url('PaslonPilkada/update/'.$paslonpilkada->id_paslon),' ', 'class="btn btn-warning waves-effect waves-light glyphicon glyphicon-pencil"'); 
												echo ' '; 
												echo anchor(site_url('PaslonPilkada/delete/'.$paslonpilkada->id_paslon),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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


