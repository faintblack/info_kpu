<?php
    $map_calon_pilpres = [' ' => 'Pilih Calon'];
    $map_calon_pilpres2 = ['' => 'Pilih Calon'];
    foreach ($calon_pilpres as $key => $value) {
        $id = $value->id_calon_pilpres;
        $map_calon_pilpres[$id] = $value->nama_calon;
        $map_calon_pilpres2[$id] = $value->nama_calon;
    }

    $data_parpol = $this->ParpolModel->get_all();
    foreach ($data_parpol as $key => $value) {
        $id = $value->id_parpol;
        $map_data_parpol[$id] = $value->nama_parpol;
    }
?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Paslon Pilpres <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="int">Nomor Urut <?php echo form_error('nomor_urut') ?></label>
                            <input type="hidden" name="nomor_urut-lama" value="<?php echo $nomor_urut; ?>" /> 
                            <input type="text" class="form-control" name="nomor_urut" id="nomor_urut" placeholder="Nomor Urut" value="<?php echo $nomor_urut; ?>"  />
                        </div>
                        <div class="form-group">
                            <label for="int">Capres <?php echo form_error('id_capres') ?></label>
                            <?= form_dropdown('id_capres', $map_calon_pilpres, $id_capres, ['class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Cawapres <?php echo form_error('id_cawapres') ?></label>
                            <?= form_dropdown('id_cawapres', $map_calon_pilpres2, $id_cawapres, ['class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Parpol Pilres <?php echo form_error('parpol_pilpres') ?></label>
                            <?= form_dropdown('parpol_pilpres[]', $map_data_parpol, '', [
                                'class' => 'select2 select2-multiple',
                                'multiple' => 'multiple',
                                'data-placeholder' => 'Choose parpol pendukung'
                                ]) ?>
                        </div>                        
                        
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('paslonpilpres') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
