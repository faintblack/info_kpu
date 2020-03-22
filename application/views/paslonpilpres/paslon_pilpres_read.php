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
                    <div class="row">
                        <table class="table">
                            <tr><td>Nomor Urut</td><td><?php echo $nomor_urut; ?></td></tr>
                            <tr><td>Capres</td><td><?php echo $capres; ?></td></tr>
                            <tr><td>Cawapres</td><td><?php echo $cawapres; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('paslonpilpres') ?>" class="btn btn-default">Cancel</a></td></tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title" style="margin-bottom: 10px">Daftar Parpol Pendukung</h4>
                            
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 200px">No Urut Parpol</th>
                                        <th>Nama Parpol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($parpol_data as $no => $parpol){
                                ?>
                                    <tr>
                                        <td width="80px"><?php echo $no+1 ?></td>
                                        <td><?php echo $parpol->no_urut_parpol ?></td>
                                        <td><?php echo $parpol->nama_parpol ?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>        

    </div> 
                
</div>
