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
$split_birthday = explode('-', $tgl_lahir);
$convert_date = $split_birthday[2].' '.$bulan[$split_birthday[1]].' '.$split_birthday[0];
?>
<div class="content">
	<div class="container">

		<!-- Page-Title -->
		<div class="row">
			<div class="col-sm-12">
				<!-- Judul halaman -->
				<h4 class="page-title" style="margin-bottom: 10px">Calon Pilkada Detail</h4>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<!-- Isi content -->
					<table class="table">
						<tr><td>Nama Calon</td><td><?php echo $nama_calon; ?></td></tr>
						<tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
						<tr><td>Tgl Lahir</td><td><?php echo $convert_date; ?></td></tr>
						<tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
						<tr><td></td><td><a href="<?php echo site_url('CalonPilkada') ?>" class="btn btn-default">Cancel</a></td></tr>
					</table>
				</div>
			</div>
		</div>        

	</div> 
	
</div>

