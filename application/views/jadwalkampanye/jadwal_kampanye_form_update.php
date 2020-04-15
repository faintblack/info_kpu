<?php
$map_kecamatan[''] = 'Pilih Kecamatan';
$map_paslon_pilpres[''] = 'Pilih Paslon';

foreach ($kecamatan as $key => $value) {
    $id = $value->id_kecamatan;
    $map_kecamatan[$id] = $value->nama_kecamatan;
}
foreach ($paslon_pilpres as $key => $value) {
    $id = $value->id_paslon_pilpres;
    $map_paslon_pilpres[$id] = "{$value->nomor_urut} - {$value->id_capres} & {$value->id_cawapres}";
}
?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Jadwal Kampanye <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal" id="tg" placeholder="Tgl Mulai" value="<?php echo $tanggal; ?>" autofocus />
                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                            </div><!-- input-group -->
                        </div>
                        <div class="form-group">
                            <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                            <?= form_dropdown('id_kecamatan', $map_kecamatan, $id_kecamatan, ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Paslon Pilpres <?php echo form_error('id_paslon_pilpres') ?></label>
                            <?= form_dropdown('id_paslon_pilpres', $map_paslon_pilpres, $id_paslon_pilpres, ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <input type="hidden" name="id_jadwal_kampanye" value="<?php echo $id_jadwal_kampanye; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('JadwalKampanye') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
