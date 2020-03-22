<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Backend Info KPU</title>
        
        <!-- Data tables -->
        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />

		<link href="<?= base_url('libraries/ubold/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
        
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/modernizr.min.js"></script>

        <!--  -->
        <style type="text/css">
            #sidebar-menu{
                padding-top:0;
            }
            .data-list th, .data-list td {
                text-align: center;
            }
            .data-list .pinggir{
                text-align: left;
            }
        </style>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>INFO KPU PKU</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <!-- Fullscreen button -->
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="<?= base_url('libraries/ubold/') ?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Update Profile</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>

            <!-- Left Sidebar Start -->
            <?php $this->load->view('layout/left-bar') ?>

			<div class="content-page">
                <!-- Content -->
                <?php $this->load->view($content) ?>

                <footer class="footer">
                    © 2020. All rights reserved.
                </footer>
            </div>

        </div>
        <!-- END wrapper -->

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

        <!-- Data tables -->
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/pages/datatables.init.js"></script>
        
        <!-- Multi select -->
        <script type="text/javascript" src="<?= base_url('libraries/ubold/') ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= base_url('libraries/ubold/') ?>assets/pages/jquery.form-advanced.init.js"></script>

        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.core.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            var resizefunc = [];
            $(document).ready(function () {
                $('#datatable-responsive').DataTable();
                
            });
            TableManageButtons.init();
        </script>
	</body>
</html>