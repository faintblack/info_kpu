<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Data Dapil</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- CRUD -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('dapil/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('dapil/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('dapil'); ?>" class="btn btn-default">Reset</a>
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
                            <th>Nama Dapil</th>
                            <th>Alokasi Kursi</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($dapil_data as $dapil)
                        {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $dapil->nama_dapil ?></td>
                            <td><?php echo $dapil->alokasi_kursi ?></td>
                            <td style="text-align:center" width="200px">
                                <?php 
                                echo anchor(site_url('dapil/read/'.$dapil->id_dapil),'Read'); 
                                echo ' | '; 
                                echo anchor(site_url('dapil/update/'.$dapil->id_dapil),'Update'); 
                                echo ' | '; 
                                echo anchor(site_url('dapil/delete/'.$dapil->id_dapil),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                            <?php echo anchor(site_url('dapil/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <?php echo $pagination ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

    </div> <!-- container -->
                
</div>
