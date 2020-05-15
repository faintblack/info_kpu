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
?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Data Jadwal Kampanye</h4>
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
                            <?php echo anchor(site_url('JadwalKampanye/create'),'Create', 'class="btn btn-primary"'); ?>
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
                                        <th>Hari / Tanggal</th>
                                        <th>Paslon Pilpres</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Ambil dari generator -->
                                    <?php
                                    foreach ($jadwalkampanye_data as $no => $jadwalkampanye){
                                        $timestamp = strtotime($jadwalkampanye->tanggal);
                                        $hr = date('D', $timestamp);
                                        $tgl = substr($jadwalkampanye->tanggal, 8, 2);
                                        $bln = substr($jadwalkampanye->tanggal, 5, 2);
                                        $thn = substr($jadwalkampanye->tanggal, 0, 4);
                                        ?>
                                        <tr>
                                            <td width="80px"><?php echo $no+1 ?></td>
                                            <td><?php echo "{$nama_hari[$hr]}, {$tgl} {$nama_bulan[$bln]} {$thn}" ?></td>
                                            <td><?php echo "{$jadwalkampanye->nomor_urut} - {$jadwalkampanye->nama_capres} & {$jadwalkampanye->nama_cawapres}" ?></td>
                                            <td style="text-align:center" width="200px">
                                                <?php 
                                                echo anchor(site_url('JadwalKampanye/read/'.$jadwalkampanye->id_jadwal_kampanye),' ', 'class="btn btn-info waves-effect waves-light glyphicon glyphicon-eye-open"'); 
                                                echo ' '; 
                                                echo anchor(site_url('JadwalKampanye/update/'.$jadwalkampanye->id_jadwal_kampanye),' ', 'class="btn btn-warning waves-effect waves-light glyphicon glyphicon-pencil"'); 
                                                echo ' '; 
                                                echo anchor(site_url('JadwalKampanye/delete/'.$jadwalkampanye->id_jadwal_kampanye),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        
        <!-- Jadwal Kampanye -->
        <div class="row">
            <div class="col-md-9">
                <div class="card-box">
                <h4 class="page-title" style="margin-bottom: 10px">Jadwal Kampanye</h4>
                    <div id="calendar2"></div>
                </div>
            </div>
        </div>

    </div> 
    
</div>

