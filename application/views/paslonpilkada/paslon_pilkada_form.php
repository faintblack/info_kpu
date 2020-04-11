<?php
    $map_calon_pilkada = [' ' => 'Pilih Calon'];
    $map_calon_pilkada2 = ['' => 'Pilih Calon'];
    foreach ($calon_pilkada as $key => $value) {
        $id = $value->id_calon_pilkada;
        $map_calon_pilkada[$id] = $value->nama_calon;
        $map_calon_pilkada2[$id] = $value->nama_calon;
    }
?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Paslon Pilkada Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="enum">Jenis Pemilihan <?php echo form_error('jenis_pemilihan') ?></label>
                            <?php
                            $map_jenis_pemilihan = [
                                '' => 'Jenis Pemilihan', 
                                'Pemilihan Walikota' => 'Pemilihan Walikota', 
                                'Pemilihan Gubernur' => 'Pemilihan Gubernur', 
                                'Pemilihan Bupati' => 'Pemilihan Bupati'
                            ];
                            echo form_dropdown('jenis_pemilihan', $map_jenis_pemilihan, $jenis_pemilihan, ['class' => 'form-control select2']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Nomor Urut <?php echo form_error('nomor_urut') ?></label>
                            <input type="number" class="form-control" name="nomor_urut" id="nomor_urut" placeholder="Nomor Urut" value="<?php echo $nomor_urut; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Kepala Daerah <?php echo form_error('id_kepala_daerah') ?></label>
                            <?= form_dropdown('id_kepala_daerah', $map_calon_pilkada, $id_kepala_daerah, ['class' => 'form-control select2']); ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Wakil Kepala Daerah <?php echo form_error('id_wakil_kepala_daerah') ?></label>
                            <?= form_dropdown('id_wakil_kepala_daerah', $map_calon_pilkada2, $id_wakil_kepala_daerah, ['class' => 'form-control select2']); ?>
                        </div>
                        <div class="form-group">
                            <label for="enum">Jenis Calon <?php echo form_error('jenis_calon') ?></label>
                            <?php
                            $map_jenis_calon = [
                                '' => 'Jenis Calon', 
                                'Perseorangan' => 'Perseorangan', 
                                'Parpol' => 'Parpol'
                            ];
                            echo form_dropdown('jenis_calon', $map_jenis_calon, $jenis_calon, ['class' => 'form-control']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="enum" style="display: block">Status Penetapan <?php echo form_error('status_penetapan') ?></label>
                            <div class="radio radio-success">
                                <input type="radio" name="status_penetapan" id="radio4" value="MS" <?= $status_penetapan == 'MS' ? 'checked' : '' ?>>
                                <label for="radio4">
                                    Memenuhi Syarat
                                </label>
                            </div>
                            <div class="radio radio-danger">
                                <input type="radio" name="status_penetapan" id="radio5" value="TMS" <?= $status_penetapan == 'TMS' ? 'checked' : '' ?>>
                                <label for="radio5">
                                    Tidak Memenuhi Syarat
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
                            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
                            <input type="number" min="2015" max="2020" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </div>
                        <input type="hidden" name="id_paslon" value="<?php echo $id_paslon; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('paslonpilkada') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>


