<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Kecamatan <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Nama Kecamatan <?php echo form_error('nama_kecamatan') ?></label>
                            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $nama_kecamatan; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Dapil <?php echo form_error('id_dapil') ?></label>
                            <?php
                                $map_dapil = ['' => 'Pilih Dapil'];
                                foreach ($dapil as $key => $value) {
                                    $id = $value->id_dapil;
                                    $map_dapil[$id] = $value->nama_dapil;
                                }
                                echo form_dropdown('id_dapil', $map_dapil, $id_dapil, ['class' => 'form-control']);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="int">Jumlah Penduduk <?php echo form_error('jumlah_penduduk') ?></label>
                            <input type="text" class="form-control" name="jumlah_penduduk" id="jumlah_penduduk" placeholder="Jumlah Penduduk" value="<?php echo $jumlah_penduduk; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Jumlah Dpt Lk <?php echo form_error('jumlah_dpt_lk') ?></label>
                            <input type="text" class="form-control" name="jumlah_dpt_lk" id="jumlah_dpt_lk" placeholder="Jumlah Dpt Lk" value="<?php echo $jumlah_dpt_lk; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Jumlah Dpt Pr <?php echo form_error('jumlah_dpt_pr') ?></label>
                            <input type="text" class="form-control" name="jumlah_dpt_pr" id="jumlah_dpt_pr" placeholder="Jumlah Dpt Pr" value="<?php echo $jumlah_dpt_pr; ?>" />
                        </div>
                        <input type="hidden" name="id_kecamatan" value="<?php echo $id_kecamatan; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('Kecamatan') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>

