<div class="content">
	<div class="container">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="page-title" style="margin-bottom: 10px">Data Calon Pileg</h4>
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
							<?php echo anchor(site_url('CalonPileg/create'),'Create', 'class="btn btn-primary"'); ?>
						</div>
						<div class="col-md-4 text-center">
							<div style="margin-top: 8px" id="message">
								<!-- Ambil dari generator -->
								<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							</div>
						</div>
					</div>
					<!-- Div 2 -->
					<div class="row">
						<div class="col-sm-12">
							<table id="datatable-responsive" class="table table-striped table-bordered nowrap data-list " cellspacing="0" width="100%">
								<thead>
									<!-- Ambil dari generator -->
									<tr>
										<th>No</th>
										<th>Dapil</th>
										<th>Parpol</th>
										<th>No Urut</th>
										<th>Nama Calon</th>
										<th>Gender</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<!-- Ambil dari generator -->
									<?php
									foreach ($calonpileg_data as $no => $calonpileg){
										?>
										<tr>
											<td width="80px"><?php echo $no+1 ?></td>
											<td><?php echo $calonpileg->nama_dapil ?></td>
											<td><?php echo $calonpileg->nama_parpol ?></td>
											<td><?php echo $calonpileg->no_urut ?></td>
											<td><?php echo $calonpileg->nama_calon ?></td>
											<td><?php echo $calonpileg->gender ?></td>
											<td style="display:table-cell; text-align:center;" width="200px">
												<?php 
												echo anchor(site_url('CalonPileg/read/'.$calonpileg->id_calon_pileg),' ', 'class="btn btn-info waves-effect waves-light glyphicon glyphicon-eye-open"'); 
												echo ' '; 
												echo anchor(site_url('CalonPileg/update/'.$calonpileg->id_calon_pileg),' ', 'class="btn btn-warning waves-effect waves-light glyphicon glyphicon-pencil"'); 
												echo ' '; 
												echo anchor(site_url('CalonPileg/delete/'.$calonpileg->id_calon_pileg),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
