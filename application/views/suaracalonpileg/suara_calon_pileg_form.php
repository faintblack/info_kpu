<?php
$data_calon_pileg = $this->CalonPilegModel->get_all();
$data_kecamatan = $this->KecamatanModel->get_all();
?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Suara Calon Pileg <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="int">Calon Pileg <?php echo form_error('id_calon_pileg') ?></label>
                            <input type="text" class="form-control" name="id_calon_pileg" id="id_calon_pileg" placeholder="Id Calon Pileg" value="<?php echo $id_calon_pileg; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                            <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Id Kecamatan" value="<?php echo $id_kecamatan; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Jumlah Suara <?php echo form_error('jumlah_suara') ?></label>
                            <input type="text" class="form-control" name="jumlah_suara" id="jumlah_suara" placeholder="Jumlah Suara" value="<?php echo $jumlah_suara; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Tahun <?php echo form_error('tahun') ?></label>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </div>
                        <input type="hidden" name="id_suara_calon_pileg" value="<?php echo $id_suara_calon_pileg; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('suaracalonpileg') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
