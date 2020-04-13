<?php

?>
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Parpol <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="int">No Urut Parpol <?php echo form_error('no_urut_parpol') ?></label>
                            <input type="hidden" name="no_urut_parpol-lama" value="<?php echo $no_urut_parpol; ?>" /> 
                            <input type="number" class="form-control" name="no_urut_parpol" id="no_urut_parpol" placeholder="No Urut Parpol" value="<?php echo $no_urut_parpol; ?>"  />
                        </div>
                        <div class="form-group">
                            <label for="nama_parpol">Nama Parpol <?php echo form_error('nama_parpol') ?></label>
                            <input type="text" class="form-control" rows="3" name="nama_parpol" id="nama_parpol" value="<?php echo $nama_parpol; ?>" placeholder="Nama Parpol"/>
                        </div>
                        <input type="hidden" name="id_parpol" value="<?php echo $id_parpol; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('Parpol') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
