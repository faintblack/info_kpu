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
        <h2 style="margin-top:0px">Parpol_paslon_pilpres Read</h2>
        <table class="table">
	    <tr><td>Id Paslon Pilpres</td><td><?php echo $id_paslon_pilpres; ?></td></tr>
	    <tr><td>Id Parpol</td><td><?php echo $id_parpol; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('parpolpaslonpilpres') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>