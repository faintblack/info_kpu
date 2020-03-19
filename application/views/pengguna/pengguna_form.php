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
                <div class="card-box table-responsive">
                    <!-- CRUD -->
                    <form action="<?php echo $action; ?>" method="post">
                        <!-- #this for saving old username  -->
                        <input type="hidden" name="old_username" value="<?php echo $username; ?>" /> 
                        <div class="form-group">
                            <label for="varchar">Username <?php echo form_error('username') ?></label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Password <?php echo form_error('password') ?></label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Nama Pengguna <?php echo form_error('nama_pengguna') ?></label>
                            <input type="text" class="form-control" name="nama_pengguna" id="nama_pengguna" placeholder="Nama Pengguna" value="<?php echo $nama_pengguna; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="enum">Hak Akses <?php echo form_error('hak_akses') ?></label>
                            <input type="text" class="form-control" name="hak_akses" id="hak_akses" placeholder="Hak Akses" value="<?php echo $hak_akses; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Email <?php echo form_error('email') ?></label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                        </div>
                        
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('Pengguna') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>        

    </div> 
                
</div>
