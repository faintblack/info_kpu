<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Paslon Pilpres Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <table class="table">
                        <tr><td>Nomor Urut</td><td><?php echo $nomor_urut; ?></td></tr>
                        <tr><td>Id Capres</td><td><?php echo $id_capres; ?></td></tr>
                        <tr><td>Id Cawapres</td><td><?php echo $id_cawapres; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('paslonpilpres') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
