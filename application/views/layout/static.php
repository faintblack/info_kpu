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

        <!-- Date -->
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="<?= base_url('libraries/ubold/');?>assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="<?= base_url('libraries/ubold/');?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        
        <!--calendar css-->
        <link href="<?= base_url('libraries/ubold/') ?>assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />

		<link href="<?= base_url('libraries/ubold/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('libraries/ubold/') ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <link href="<?= base_url('libraries/custom/') ?>css/style.css" rel="stylesheet" type="text/css" />
        
        <link href="<?= base_url('libraries/leaflet/') ?>leaflet.css" rel="stylesheet" type="text/css" />
        <script src="<?= base_url('libraries/leaflet/') ?>leaflet.js"></script>

        <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

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
            #mapid {
                height: 200px;
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
        
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/moment/moment.js"></script>
     	<script src="<?= base_url('libraries/ubold/') ?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
     	<script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="<?= base_url('libraries/ubold/') ?>assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src='<?= base_url('libraries/ubold/') ?>assets/plugins/fullcalendar/js/fullcalendar.min.js'></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/pages/jquery.fullcalendar.js"></script>

        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.core.js"></script>
        <script src="<?= base_url('libraries/ubold/') ?>assets/js/jquery.app.js"></script>

        <script src="<?= base_url('libraries/ubold/') ?>assets/pages/jquery.form-pickers.init.js"></script>

        <script type="text/javascript">
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            var resizefunc = [];

            $(document).ready(function () {
                
                $('#datatable-responsive').DataTable();
                $('#datatable').dataTable();
                $('.modal').on('shown.bs.modal', function() {
					$(this).find('[autofocus]').focus();
				});

                // Get jadwal kampanye
                $('#calendar2').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listWeek'
                    },
                    defaultDate: today,
                    navLinks: true,
                    eventLimit: true,
                    events: "<?= base_url('JadwalKampanye/getJson') ?>",
                    eventRender: function (eventObj, $el) {
                        $el.popover({
                            title: eventObj.title,
                            content: eventObj.paslon,
                            trigger: 'hover',
                            placement: 'top',
                            container: 'body'
                        });
                    },
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

                // Set map kecamatan
                    var mymap = L.map('map').setView([0.506566, 101.437790], 11);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'pk.eyJ1IjoibWhyZGtrIiwiYSI6ImNrYThiM3liYjBkdmEyem1yZHFjZXFiYzQifQ.-HSSet2KQSmW2hGh03UBYA'
                    }).addTo(mymap);
                    
                    $.getJSON('<?= base_url() ?>' + 'libraries/leaflet/data_kecamatan/kecamatan.geojson', function(data){
                        //console.log(data);                    
                        geoLayer = L.geoJSON(data, {
                            style: function(feature){
                                var bg_color = feature.properties.fill;
                                //console.log(feature);
                                return {
                                    color: bg_color
                                };
                            },
                            onEachFeature: function(feature, layer){
                                var nama_kecamatan = feature.properties.name;
                                var jumlah_penduduk = feature.properties.jumlah_penduduk;
                                var jumlah_dpt = feature.properties.jumlah_dpt;

                                var info_kecamatan = `
                                    <h5>Kecamatan = ${nama_kecamatan}</h5>
                                    <h5>Jumlah Penduduk = ${jumlah_penduduk}</h5>
                                    <h5>Jumlah DPT = ${jumlah_dpt}</h5>
                                `;
                                
                                layer.bindPopup(info_kecamatan, {
                                    maxWidth : 300,
                                    closeButton: true,
                                    offset: L.point(0, -20)
                                });

                                layer.on('click', function(){
                                    layer.openPopup();
                                })
                            }
                        }).addTo(mymap);
                    }); 

                // Set map dapil
                    var dapil_map = L.map('map_dapil').setView([0.506566, 101.437790], 11);

                    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                        maxZoom: 18,
                        id: 'mapbox/streets-v11',
                        tileSize: 512,
                        zoomOffset: -1,
                        accessToken: 'pk.eyJ1IjoibWhyZGtrIiwiYSI6ImNrYThiM3liYjBkdmEyem1yZHFjZXFiYzQifQ.-HSSet2KQSmW2hGh03UBYA'
                    }).addTo(dapil_map);

                    $.getJSON('<?= base_url() ?>' + 'libraries/leaflet/data_kecamatan/dapil.geojson', function(data){
                        //console.log(data);                    
                        geoLayer = L.geoJSON(data, {
                            style: function(feature){
                                var bg_color = feature.properties.fill;
                                //console.log(feature);
                                return {
                                    color: bg_color
                                };
                            },
                            onEachFeature: function(feature, layer){
                                var nama_dapil = feature.properties.name;
                                //var jumlah_penduduk = feature.properties.jumlah_penduduk;
                                var jumlah_dpt = feature.properties.jumlah_dpt;
                                var alokasi_kursi = feature.properties.alokasi_kursi;
                                var kecamatan = feature.properties.kecamatan;

                                var info_kecamatan = `
                                    <h5>${nama_dapil}</h5>
                                    <h5>Jumlah DPT = ${jumlah_dpt}</h5>
                                    <h5>Alokasi Kursi = ${alokasi_kursi}</h5>
                                    <h5>Kecamatan = ${kecamatan}</h5>
                                `;
                                
                                layer.bindPopup(info_kecamatan, {
                                    maxWidth : 300,
                                    closeButton: true,
                                    offset: L.point(0, -20)
                                });

                                layer.on('click', function(){
                                    layer.openPopup();
                                })
                            }
                        }).addTo(dapil_map);
                    }); 

            });
            TableManageButtons.init();
        </script>
	</body>
</html>