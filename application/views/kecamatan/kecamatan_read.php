<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Kecamatan Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <table class="table">
                        <tr><td>Nama Kecamatan</td><td><?php echo $nama_kecamatan; ?></td></tr>
                        <tr><td>Dapil</td><td><?php echo $nama_dapil; ?></td></tr>
                        <tr><td>Jumlah Penduduk</td><td><?php echo $jumlah_penduduk; ?></td></tr>
                        <tr><td>Jumlah Dpt Lk</td><td><?php echo $jumlah_dpt_lk; ?></td></tr>
                        <tr><td>Jumlah Dpt Pr</td><td><?php echo $jumlah_dpt_pr; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('Kecamatan') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
