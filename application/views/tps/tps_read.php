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
        <h2 style="margin-top:0px">Tps Read</h2>
        <table class="table">
	    <tr><td>Id Kecamatan</td><td><?php echo $id_kecamatan; ?></td></tr>
	    <tr><td>Nama Tps</td><td><?php echo $nama_tps; ?></td></tr>
	    <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Long</td><td><?php echo $long; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tps') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>