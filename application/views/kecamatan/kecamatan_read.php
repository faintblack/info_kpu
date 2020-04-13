<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Judul halaman -->
                <h4 class="page-title" style="margin-bottom: 10px">Kecamatan Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- Isi content -->
                    <div class="row">
                        <table class="table">
                            <tr><td>Nama Kecamatan</td><td><?php echo $nama_kecamatan; ?></td></tr>
                            <tr><td>Dapil</td><td><?php echo $nama_dapil; ?></td></tr>
                            <tr><td>Jumlah Penduduk</td><td><?php echo $jumlah_penduduk; ?></td></tr>
                            <tr><td>Jumlah Dpt Lk</td><td><?php echo $jumlah_dpt_lk; ?></td></tr>
                            <tr><td>Jumlah Dpt Pr</td><td><?php echo $jumlah_dpt_pr; ?></td></tr>
                            <tr><td></td><td><a href="<?php echo site_url('Kecamatan') ?>" class="btn btn-default">Cancel</a></td></tr>
                        </table>
                    </div>                    
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title" style="margin-bottom: 10px">Daftar Tempat Pemungutan Suara (TPS)</h4>
                            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal" style="margin-bottom: 10px">Tambah Data TPS</button>

                            <div style="margin:10px 0 10px 0" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>

                            <table id="datatable-responsive" class="table table-striped table-bordered nowrap data-list" cellspacing="0" width="100%">
                                <thead>
                                    <!-- Ambil dari generator -->
                                    <tr>
                                        <th>No</th>
                                        <th>Nama TPS</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Ambil dari generator -->
                                <?php
                                foreach ($data_tps as $no => $value) {
                                ?>
                                    <tr>
                                        <td width="80px"><?php echo $no+1 ?></td>
                                        <td><?php echo $value->nama_tps  ?></td>
                                        <td><?php echo $value->lat  ?></td>
                                        <td><?php echo $value->long ?></td>
                                        <td style="text-align:center" width="200px">
                                            <a id="edit-tps" onclick="setValue(<?= $value->id_tps ?>)" style="color:dimgray; cursor:pointer;" data-toggle="modal" data-target="#modal-update-tps" title="Update" class="btn btn-warning waves-effect waves-light glyphicon glyphicon-pencil">
                                            </a>
                                            <?php
                                            echo ' '; 
                                            echo anchor(site_url('Tps/delete/'.$value->id_tps.'/'.$id_kecamatan),' ','class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                    <!-- Modal Tambah TPS -->
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Tambah Data TPS</h4> 
                                </div>
                                <?= form_open('Tps/add/'.$id_kecamatan, ['id' => 'form-create']) ?>
                                <div class="modal-body"> 
                                    <?= form_hidden('id_kecamatan', $id_kecamatan) ?>
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-3" class="control-label">Nama TPS</label> 
                                                <?= form_input('nama_tps','',['class' => 'form-control', 'autofocus' => '']) ?>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-4" class="control-label">Latitude</label> 
                                                <?= form_input(['name' => 'lat', 'step' => '0.000001', 'value' => '', 'class' => 'form-control', 'type' => 'number']) ?>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-5" class="control-label">Longitude</label> 
                                                <?= form_input(['name' => 'long', 'step' => '0.000001', 'value' => '', 'class' => 'form-control', 'type' => 'number']) ?>
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
                    <!-- Modal Edit TPS -->
                    <div id="modal-update-tps" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title">Edit Data TPS</h4> 
                                </div>
                                <?= form_open('Tps/update/',['id' =>'form-update-tps']) ?>
                                <div class="modal-body"> 
                                    <input type="hidden" id="edit-id_tps" name="id_tps">
                                    <?= form_hidden('id_kecamatan', $id_kecamatan) ?>
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-3" class="control-label">Nama TPS</label> 
                                                <?= form_input('nama_tps','',['class' => 'form-control', 'id' => 'edit-nama_tps']) ?>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-4" class="control-label">Latitude</label> 
                                                <?= form_input(['name' => 'lat', 'step' => '0.000001', 'value' => '', 'class' => 'form-control', 'type' => 'number', 'id' => 'edit-lat']) ?>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="row"> 
                                        <div class="col-md-12"> 
                                            <div class="form-group"> 
                                                <label for="field-5" class="control-label">Longitude</label> 
                                                <?= form_input(['name' => 'long', 'step' => '0.000001', 'value' => '', 'class' => 'form-control', 'type' => 'number', 'id' => 'edit-long']) ?>
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
                </div>
            </div>
        </div>        

    </div> 
                
</div>

<script type="text/javascript">
    function setValue($id){
        var key = $id;
        $.ajax({
            type:"ajax",
            url: "<?= base_url('Tps/getJson') ?>/" + key,
            dataType:'JSON',
            success: function(result){
                $('#form-update-tps').attr('action', '<?= base_url("Tps/update_action") ?>/'+key);
                $('#edit-id_tps').val(result.id_tps);
                $('#edit-nama_tps').val(result.nama_tps);
                $('#edit-lat').val(result.lat);
                $('#edit-long').val(result.long);
             }
        });
    }
</script>