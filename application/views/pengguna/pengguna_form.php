<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Pengguna <?php echo $button ?></h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Username <?php echo form_error('username') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="username" parsley-trigger="change" required placeholder="Masukkan Username" class="form-control" id="userName" value="<?php echo $username; ?>" <?= $button == 'Update' ? 'readonly' : '' ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Password <?php echo form_error('password') ?></label>
                                    <div class="col-sm-4">
                                        <input id="pass1" name="password" type="password" placeholder="Password" required class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Ulangi Password <?php echo form_error('password') ?></label>
                                    <div class="col-sm-4">
                                        <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Pengguna <?php echo form_error('nama_pengguna') ?></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nama_pengguna" parsley-trigger="change" required placeholder="Masukkan Nama" class="form-control" id="userName" value="<?php echo $nama_pengguna; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Hak Akses <?php echo form_error('hak_akses') ?></label>
                                    <div class="col-sm-2">
                                        <select name="hak_akses" class="selectpicker" data-style="btn-purple btn-custom">
                                            <option <?php if($hak_akses == 'admin') {echo "selected";} ?> value="admin">Admin</option>
                                            <option <?php if($hak_akses == 'public') {echo "selected";} ?> value="public">Public</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email <?php echo form_error('email') ?></label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" parsley-trigger="change" required placeholder="Enter email" class="form-control" id="emailAddress" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-9 m-t-15">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo $button ?>
                                        </button>
                                        <a href="<?php echo site_url('pengguna') ?>" class="btn btn-default m-l-5">
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
