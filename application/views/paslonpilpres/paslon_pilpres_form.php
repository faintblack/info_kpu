<?php
    $map_calon_pilpres = [' ' => 'Pilih Calon'];
    $map_calon_pilpres2 = ['' => 'Pilih Calon'];
    foreach ($calon_pilpres as $key => $value) {
        $id = $value->id_calon_pilpres;
        $map_calon_pilpres[$id] = $value->nama_calon;
        $map_calon_pilpres2[$id] = $value->nama_calon;
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
                            <input type="text" class="form-control" name="nomor_urut" id="nomor_urut" placeholder="Nomor Urut" value="<?php echo $nomor_urut; ?>" <?= $button == 'Update' ? 'readonly':'' ?> />
                        </div>
                        <div class="form-group">
                            <label for="int">Capres <?php echo form_error('id_capres') ?></label>
                            <?= form_dropdown('id_capres', $map_calon_pilpres, $id_capres, ['class' => 'form-control']) ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Cawapres <?php echo form_error('id_cawapres') ?></label>
                            <?= form_dropdown('id_cawapres', $map_calon_pilpres2, $id_cawapres, ['class' => 'form-control']) ?>
                        </div>
                        <input type="hidden" name="id_paslon_pilpres" value="<?php echo $id_paslon_pilpres; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('paslonpilpres') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>

