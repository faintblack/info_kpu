<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="<?= base_url('libraries/ubold/');?>assets/images/favicon_1.ico">

		<title>Login | Info KPU</title>

		<link href="<?= base_url('libraries/ubold/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/modernizr.min.js"></script>

	</head>

	<body class="fixed-left">
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class=" card-box">
            <div class="panel-heading">
                <center><img src="<?= base_url('libraries/ubold/');?>assets/images/kpu.png" width="100" height="90"></center>
                <h4 class="text-center" style="color:#4c5667;"> <strong >Komisi Pemilihan Umum</strong> </h4>
                <h4 class="text-center" style="color:#4c5667;"> <strong >(KPU)</strong></h4>
            </div>

            <div style="background-color: #4c5667;width:70%;height:3px; margin-left:15%; margin-right:10%;">
            </div>

            <div class="panel-body">
            <form action="<?=base_url('login/validasi');?>" method="POST" class="form-horizontal m-t-20" >
                
                <div class="form-group ">
                    <div class="input-group" style="margin-left: 3%; margin-right: 3%;">
                        <span class="input-group-addon" style="background-color: #4c5667 !important; border: 1px solid #4c5667 !important"><i class="fa fa-user" style="color: white;"></i></span>
                        <input type="text" required name="username" class="form-control" placeholder="Username" autofocus="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group" style="margin-left: 3%; margin-right: 3%;">
                        <span class="input-group-addon" style="background-color: #4c5667 !important; border: 1px solid #4c5667 !important"><i class="fa fa-lock" style="color: white;"></i></span>
                        </span>
                        <input type="password" required name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-inverse btn-block waves-effect waves-light" type="submit" name="login" value="login">Login</button>
                    </div>
                </div>
                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="#" class="text-dark"> Daftar</a> | 
                        <a href="<?=site_url();?>" class="text-dark"> Kembali</a>
                    </div>
                </div>

            </form> 
            
            </div>
            
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/detect.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/fastclick.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/waves.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/wow.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.core.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.app.js"></script>
	</body>
</html>