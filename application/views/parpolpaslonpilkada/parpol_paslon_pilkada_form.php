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
        <h2 style="margin-top:0px">Parpol_paslon_pilkada <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Paslon <?php echo form_error('id_paslon') ?></label>
            <input type="text" class="form-control" name="id_paslon" id="id_paslon" placeholder="Id Paslon" value="<?php echo $id_paslon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Parpol <?php echo form_error('id_parpol') ?></label>
            <input type="text" class="form-control" name="id_parpol" id="id_parpol" placeholder="Id Parpol" value="<?php echo $id_parpol; ?>" />
        </div>
	    <input type="hidden" name="id_parpol_paslon_pilkada" value="<?php echo $id_parpol_paslon_pilkada; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('parpolpaslonpilkada') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>