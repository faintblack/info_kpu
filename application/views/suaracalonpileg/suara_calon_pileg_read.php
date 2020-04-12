<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Perolehan Suara Calon Pileg Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <table class="table">
                        <tr><td>Calon Pileg</td><td><?php echo $nama_calon; ?></td></tr>
                        <tr><td>Kecamatan</td><td><?php echo $nama_kecamatan; ?></td></tr>
                        <tr><td>Jumlah Suara</td><td><?php echo $jumlah_suara; ?></td></tr>
                        <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('SuaraCalonPileg') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
