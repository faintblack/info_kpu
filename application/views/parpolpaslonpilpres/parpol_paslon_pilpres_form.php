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
        <h2 style="margin-top:0px">Parpol_paslon_pilpres <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Paslon Pilpres <?php echo form_error('id_paslon_pilpres') ?></label>
            <input type="text" class="form-control" name="id_paslon_pilpres" id="id_paslon_pilpres" placeholder="Id Paslon Pilpres" value="<?php echo $id_paslon_pilpres; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Parpol <?php echo form_error('id_parpol') ?></label>
            <input type="text" class="form-control" name="id_parpol" id="id_parpol" placeholder="Id Parpol" value="<?php echo $id_parpol; ?>" />
        </div>
	    <input type="hidden" name="id_parpol_paslon_pilpres" value="<?php echo $id_parpol_paslon_pilpres; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('parpolpaslonpilpres') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>