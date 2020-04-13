<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="<?= base_url('libraries/ubold/');?>assets/images/favicon_1.ico">

        <title>Backend Info KPU</title>

        <link href="<?= base_url('libraries/ubold/') ?>assets/css/yearpicker.css" rel="stylesheet" type="text/css"/>
        
        <!-- DataTables -->
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!--Form Advance-->
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

		<link href="<?= base_url('libraries/ubold/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url('libraries/custom/') ?>css/style.css" rel="stylesheet" type="text/css" />
        
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
                        <a href="<?= base_url() ?>" class="logo"><i class="icon-magnet icon-c-logo"></i><span>INFO KPU PKU</span></a>
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
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><?=$this->session->userdata('nama');?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Update Profile</a></li>
                                        <li><a href="<?=base_url('Login/logout');?>"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
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
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/yearpicker.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/detect.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/fastclick.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/waves.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/wow.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.scrollTo.min.js"></script>

        <!--Datatable-->
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="<?= base_url('libraries/ubold/');?>assets/pages/datatables.init.js"></script>

        <!--Form Advanced-->
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="<?= base_url('libraries/ubold/');?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?= base_url('libraries/ubold/');?>assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?= base_url('libraries/ubold/');?>assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="<?= base_url('libraries/ubold/');?>assets/plugins/autocomplete/countries.js"></script>

        <script type="text/javascript" src="<?= base_url('libraries/ubold/');?>assets/pages/jquery.form-advanced.init.js"></script>

        <script type="text/javascript" src="<?= base_url('libraries/ubold/');?>assets/plugins/parsleyjs/parsley.min.js"></script>

        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.core.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            var resizefunc = [];
            $(document).ready(function () {
                $('#datatable-responsive').DataTable();
                $('#datatable').dataTable();
                $('.modal').on('shown.bs.modal', function() {
					$(this).find('[autofocus]').focus();
				});

                // Dynamic dropdown for list kecamatan in suara calon pileg
                $('#select-id_calon_pileg').change(function(){
                    var id_calon_pileg = $(this).val();

                    var html = `
                    <label for="int">Kecamatan <?php echo form_error('id_kecamatan') ?></label>
                    <select name="id_kecamatan" class="form-control" id="kecamatan_khusus">
                        <option value="" selected="selected">Pilih Kecamatan</option>
                    `;

                    $.ajax({
                        type:"ajax",
                        url: "<?= base_url('CalonPileg/getJson') ?>/" + id_calon_pileg,
                        dataType:'JSON',
                        success: function(data_kecamatan){
                            //console.log(result);
                            for(var [index, kecamatan] of data_kecamatan.entries()){
                                var id_kecamatan = kecamatan['id_kecamatan'];
                                var nama_kecamatan = kecamatan['nama_kecamatan'];

                                html += `
                                    <option value="${id_kecamatan}">${nama_kecamatan}</option>
                                `;
                            }
                            html += '</select>';
                            document.querySelector('#testes').innerHTML = html;
                        }
                    });
                });

            });
            TableManageButtons.init();
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
	</body>
</html>