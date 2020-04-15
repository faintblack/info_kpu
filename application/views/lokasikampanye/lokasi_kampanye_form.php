<?php
$map_kecamatan[''] = 'Pilih Kecamatan';
foreach ($kecamatan as $key => $value) {
    $id = $value->id_kecamatan;
    $map_kecamatan[$id] = $value->nama_kecamatan;
}
?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Lokasi Kampanye <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                            <?= form_dropdown('id_kecamatan', $map_kecamatan, $id_kecamatan, ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi <?php echo form_error('nama_lokasi') ?></label>
                            <input type="text" class="form-control" rows="3" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi" value="<?= $nama_lokasi ?>" required />
                        </div>
                        <input type="hidden" name="id_lokasi_kampanye" value="<?php echo $id_lokasi_kampanye; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('LokasiKampanye') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>

