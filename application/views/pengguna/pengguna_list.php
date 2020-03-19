<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Pengguna List</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- CRUD -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('pengguna/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('pengguna/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('Pengguna'); ?>" class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                        ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama Pengguna</th>
                            <th>Hak Akses</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($pengguna_data as $pengguna)
                        {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $pengguna->username ?></td>
                            <td><?php echo $pengguna->password ?></td>
                            <td><?php echo $pengguna->nama_pengguna ?></td>
                            <td><?php echo $pengguna->hak_akses ?></td>
                            <td><?php echo $pengguna->email ?></td>
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
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                        </div>
                        <div class="col-md-6 text-right">
                            <?php echo $pagination ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

    </div> 
                
</div>

