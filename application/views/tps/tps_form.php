<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tps <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Kecamatan <?php echo form_error('id_kecamatan') ?></label>
            <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Id Kecamatan" value="<?php echo $id_kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Tps <?php echo form_error('nama_tps') ?></label>
            <input type="text" class="form-control" name="nama_tps" id="nama_tps" placeholder="Nama Tps" value="<?php echo $nama_tps; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lat <?php echo form_error('lat') ?></label>
            <input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Long <?php echo form_error('long') ?></label>
            <input type="text" class="form-control" name="long" id="long" placeholder="Long" value="<?php echo $long; ?>" />
        </div>
	    <input type="hidden" name="id_tps" value="<?php echo $id_tps; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tps') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>