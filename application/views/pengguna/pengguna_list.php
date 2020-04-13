<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Data Pengguna</h4>
            </div>
        </div>
        
        <!-- Tabel -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                        <!-- Ambil dari generator -->
                            <?php echo anchor(site_url('Pengguna/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <!-- Ambil dari generator -->
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>    
                            </div>
                        </div>
                    </div>
                    <!-- Data -->
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-responsive" class="table table-striped table-bordered nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Hak Akses</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Ambil dari generator -->
                                <?php
                                    foreach ($pengguna_data as $no => $pengguna){
                                ?>
                                    <tr>
                                        <td width="80px"><?php echo $no+1 ?></td>
                                        <td><?php echo $pengguna->username ?></td>
                                        <td><?php echo $pengguna->nama_pengguna ?></td>
                                        <td><?php echo $pengguna->hak_akses ?></td>
                                        <td class="pinggir"><?php echo $pengguna->email ?></td>
                                        <td style="display:table-cell; text-align:center" width="200px">
                                            <?php 
                                            echo anchor(site_url('Pengguna/read/'.$pengguna->username), ' ', 'class="btn btn-info waves-effect waves-light glyphicon glyphicon-eye-open"'); 
                                            echo ' ';
                                            echo anchor(site_url('Pengguna/update/'.$pengguna->username),' ', 'class="btn btn-warning waves-effect waves-light glyphicon glyphicon-edit"');
                                            echo ' ';
                                            echo anchor(site_url('Pengguna/delete/'.$pengguna->username),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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

