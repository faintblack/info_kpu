<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Dapil <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- CRUD -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Nama Dapil <?php echo form_error('nama_dapil') ?></label>
                            <input type="text" class="form-control" name="nama_dapil" id="nama_dapil" placeholder="Nama Dapil" value="<?php echo $nama_dapil; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Alokasi Kursi <?php echo form_error('alokasi_kursi') ?></label>
                            <input type="number" min="0" class="form-control" name="alokasi_kursi" id="alokasi_kursi" placeholder="Alokasi Kursi" value="<?php echo $alokasi_kursi; ?>" />
                        </div>
                        <input type="hidden" name="id_dapil" value="<?php echo $id_dapil; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('Dapil') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>

