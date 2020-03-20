<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Pengguna List</h4>
            </div>
        </div>
        
        <!-- Tabel -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Create Button -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-sm-12">
                            <?php echo anchor(site_url('pengguna/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                    </div>
                    <!-- Data -->
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Hak Akses</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($pengguna_data as $no => $pengguna){
                                ?>
                                    <tr>
                                        <td width="80px"><?php echo $no+1 ?></td>
                                        <td><?php echo $pengguna->username ?></td>
                                        <td><?php echo $pengguna->nama_pengguna ?></td>
                                        <td><?php echo $pengguna->hak_akses ?></td>
                                        <td class="pinggir"><?php echo $pengguna->email ?></td>
                                        <td style="text-align:center" width="200px">
                                            <?php 
                                            echo anchor(site_url('pengguna/read/'.$pengguna->username),'Read'); 
                                            echo ' | '; 
                                            echo anchor(site_url('pengguna/update/'.$pengguna->username),'Update'); 
                                            echo ' | '; 
                                            echo anchor(site_url('pengguna/delete/'.$pengguna->username),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                            ?>
                                        </td>
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

