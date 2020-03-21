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
                    <div class="row">
                        <table class="table">
                            <tr><td>Nama Dapil</td><td><?php echo $nama_dapil; ?></td></tr>
                            <tr><td>Alokasi Kursi</td><td><?php echo $alokasi_kursi; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('dapil') ?>" class="btn btn-default">Cancel</a></td></tr>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title" style="margin-bottom: 10px">Daftar Kecamatan</h4>
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <!-- Ambil dari generator -->
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Jumlah Penduduk</th>
                                        <th>Jumlah Dpt Lk</th>
                                        <th>Jumlah Dpt Pr</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Ambil dari generator -->
                                <?php
                                    foreach ($kecamatan_dapil as $no => $kecamatan){
                                ?>
                                
                                    <tr>
                                        <td width="80px"><?php echo $no+1 ?></td>
                                        <td><?php echo $kecamatan->nama_kecamatan ?></td>
                                        <td><?php echo $kecamatan->jumlah_penduduk ?></td>
                                        <td><?php echo $kecamatan->jumlah_dpt_lk ?></td>
                                        <td><?php echo $kecamatan->jumlah_dpt_pr ?></td>
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

    </div> <!-- container -->
                
</div>
