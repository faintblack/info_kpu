<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Lokasi Kampanye Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <table class="table">
                        <tr><td>Kecamatan</td><td><?php echo $id_kecamatan; ?></td></tr>
                        <tr><td>Nama Lokasi</td><td><?php echo $nama_lokasi; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('LokasiKampanye') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>