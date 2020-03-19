<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Dapil Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- CRUD -->
                    <table class="table">
                        <tr><td>Nama Dapil</td><td><?php echo $nama_dapil; ?></td></tr>
                        <tr><td>Alokasi Kursi</td><td><?php echo $alokasi_kursi; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('Dapil') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> <!-- container -->
                
</div>
