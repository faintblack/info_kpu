<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Pengguna Detail</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <!-- CRUD -->
                    <table class="table">
                        <!-- #this -->
                        <tr><td>Username</td><td><?php echo $username; ?></td></tr>
                        <tr><td>Password</td><td><?php echo $password; ?></td></tr>
                        <tr><td>Nama Pengguna</td><td><?php echo $nama_pengguna; ?></td></tr>
                        <tr><td>Hak Akses</td><td><?php echo $hak_akses; ?></td></tr>
                        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('Pengguna') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div>
            </div>
        </div>        

    </div> 
                
</div>

