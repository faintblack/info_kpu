<?php
$nama_hari = [
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu',
];
$nama_bulan = [
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
    '12' => 'Desember'
];

$timestamp = strtotime($tanggal);

$hr = date('D', $timestamp);
$tgl = substr($tanggal, 8, 2);
$bln = substr($tanggal, 5, 2);
$thn = substr($tanggal, 0, 4);

?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Jadwal Kampanye Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <table class="table">
                        <tr><td>Paslon Pilpres</td><td><?php echo "{$nama_capres} & {$nama_cawapres}"; ?></td></tr>
                        <tr><td>Nomor Urut</td><td><?php echo $nomor_urut; ?></td></tr>
                        <tr><td>Kecamatan</td><td><?php echo $nama_kecamatan; ?></td></tr>
                        <tr><td>Tanggal</td><td><?php echo "{$nama_hari[$hr]}, {$tgl} {$nama_bulan[$bln]} {$thn}"; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('JadwalKampanye') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
