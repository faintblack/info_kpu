<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Parpol Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <table class="table">
                        <tr><td>No Urut Parpol</td><td><?php echo $no_urut_parpol; ?></td></tr>
                        <tr><td>Nama Parpol</td><td><?php echo $nama_parpol; ?></td></tr>
                        <tr><td>Pendukung Capres</td><td><?php echo "{$no_urut_capres} - {$capres} & {$cawapres}"; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('parpol') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
