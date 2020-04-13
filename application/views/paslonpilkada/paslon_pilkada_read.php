
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Paslon Pilkada Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <div class="row">
                        <table class="table">
                            <tr><td>Jenis Pemilihan</td><td><?php echo $jenis_pemilihan; ?></td></tr>
                            <tr><td>Nomor Urut</td><td><?php echo $nomor_urut; ?></td></tr>
                            <tr><td>Kepala Daerah</td><td><?php echo $nama_kepala_daerah; ?></td></tr>
                            <tr><td>Wakil Kepala Daerah</td><td><?php echo $nama_wakil_kepala_daerah; ?></td></tr>
                            <tr><td>Jenis Calon</td><td><?php echo $jenis_calon; ?></td></tr>
                            <tr><td>Status Penetapan</td><td><?php echo $status_penetapan; ?></td></tr>
                            <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
                            <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('PaslonPilkada') ?>" class="btn btn-default">Cancel</a></td></tr>
                        </table>
                    </div>
                    <!-- Daftar parpol pendukun paslon pilkada -->
                    <?php
                    if (isset($parpol_data)) {
                        $data_parpol = $this->ParpolModel->get_all();
                        foreach ($data_parpol as $key => $value) {
                            $id = $value->id_parpol;
                            $map_data_parpol[$id] = $value->nama_parpol;
                        }
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title" style="margin-bottom: 10px">Daftar Parpol Pendukung</h4>

                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal" style="margin-bottom: 10px">Tambah Partai Pendukung</button>

                            <div style="margin:10px 0 10px 0" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 200px">No Urut Parpol</th>
                                        <th>Nama Parpol</th>
                                        <th>Action</th>
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
                                        <td style="text-align:center" width="200px">
                                        <?php 
                                            echo anchor(site_url('ParpolPaslonPilkada/delete/'.$parpol->id_parpol_paslon_pilkada.'/'.$id_paslon),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                    <!-- Modal Tambah Parpol Pendukung -->
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Tambah Partai Pendukung</h4> 
                                </div>
                                <?= form_open('ParpolPaslonPilkada/add/'.$id_paslon) ?>
                                <div class="modal-body"> 
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-3" class="control-label">Partai Pendukung</label> 
                                                
                                                <?= form_dropdown('parpol_pendukung[]', $map_data_parpol, '', [
                                                    'class' => 'select2 select2-multiple',
                                                    'multiple' => 'multiple',
                                                    'data-placeholder' => 'Pilih partai pendukung',
                                                    'id' => 'select-parpol_pendukung'
                                                ]) ?>
                                                
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="modal-footer"> 
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button> 
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
                                </div>
                                <?= form_close() ?>
                            </div> 
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        

    </div> 
                
</div>
