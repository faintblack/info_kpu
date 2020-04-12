<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li>
                    <a href="<?= site_url('homecontroller') ?>" class="waves-effect"><i class="ti-home"></i> <span> Home </span> </a>
                </li>
                <li>
                    <a href="<?= site_url('Berita') ?>" class="waves-effect"><i class="ti-book"></i> <span> Berita </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?= isset($main_menu)&&$main_menu=='Data Pemilu' ? 'subdrop' : '' ?>"><i class="ti-paint-bucket"></i> <span> Data Pemilu </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled" style="<?= isset($main_menu)&&$main_menu=='Data Pemilu' ? 'display:block' : '' ?>">
                        <!-- PILKADA -->
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect <?= isset($sub_menu) && $sub_menu == 'PILKADA' ? 'subdrop' : '' ?>"><span>PILKADA</span>  <span class="menu-arrow"></span></a>
                            <ul style="<?= isset($sub_menu) && $sub_menu == 'PILKADA' ? 'display:block' : '' ?>" >
                                <li class="<?= isset($detail_menu) && $detail_menu == 'Data Calon Pilkada' ? 'active' : '' ?>"><a href="<?= site_url('CalonPilkada') ?>"><span>Data Calon</span></a></li>
                                <li class="<?= isset($detail_menu) && $detail_menu == 'Paslon Pilkada' ? 'active' : '' ?>"><a href="<?= site_url('PaslonPilkada') ?>"><span>Data Paslon</span></a></li>
                            </ul>
                        </li>
                        <!-- PILEG -->
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect <?= isset($sub_menu) && $sub_menu == 'PILEG' ? 'subdrop' : '' ?>"><span>PILEG</span>  <span class="menu-arrow"></span></a>
                            <ul style="<?= isset($sub_menu) && $sub_menu == 'PILEG' ? 'display:block' : '' ?>" >
                                <li class="<?= isset($detail_menu) && $detail_menu == 'Data Calon Pileg' ? 'active' : '' ?>"><a href="<?= site_url('CalonPileg') ?>"><span>Data Calon</span></a></li>
                                <li class="<?= isset($detail_menu) && $detail_menu == 'Suara Calon Pileg' ? 'active' : '' ?>"><a href="<?= site_url('SuaraCalonPileg') ?>"><span>Data Perolehan Suara</span></a></li>
                            </ul>
                        </li>
                        <!-- PILPRES -->
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect <?= isset($sub_menu) && $sub_menu == 'PILPRES' ? 'subdrop' : '' ?>"><span>PILPRES</span>  <span class="menu-arrow"></span></a>
                            <ul style="<?= isset($sub_menu) && $sub_menu == 'PILPRES' ? 'display:block' : '' ?>">
                                <li class="<?= isset($detail_menu) && $detail_menu == 'Data Calon Pilpres' ? 'active' : '' ?>"><a href="<?= site_url('CalonPilpres') ?>"><span>Data Calon</span></a></li>
                                <li class="<?= isset($detail_menu) && $detail_menu == 'Paslon Pilpres' ? 'active' : '' ?>"><a href="<?= site_url('PaslonPilpres') ?>"><span>Data Paslon</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?= isset($main_menu)&&$main_menu=='Data Wilayah' ? 'subdrop' : '' ?>"><i class="ti-paint-bucket"></i> <span> Data Wilayah </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled" style="<?= isset($sub_menu)&&($sub_menu=='Dapil' || $sub_menu=='Kecamatan') ? 'display:block' : '' ?>">
                        <li class="<?= isset($sub_menu)&&$sub_menu=='Dapil' ? 'active' : '' ?>"><a href="<?= site_url('Dapil') ?>">Dapil</a></li>
                        <li class="<?= isset($sub_menu)&&$sub_menu=='Kecamatan' ? 'active' : '' ?>"><a href="<?= site_url('Kecamatan') ?>">Kecamatan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= site_url('Parpol') ?>" class="waves-effect <?= isset($main_menu)&&$main_menu=='Parpol' ? 'active' : '' ?>"><i class="ti-home"></i> <span> Parpol </span> </a>
                </li>
                <li>
                    <a href="<?= site_url('Pengguna') ?>" class="waves-effect <?= isset($main_menu)&&$main_menu=='Pengguna' ? 'active' : '' ?>"><i class="ti-user"></i> <span> Pengguna </span> </a>
                </li>
                <!--
                <li>
                    <a href="<?= site_url('harviacode') ?>" class="waves-effect"><i class="ti-home"></i> <span> CRUD GENERATOR </span> </a>
                </li>
                <li>
                    <a href="<?= site_url('libraries/ubold') ?>" class="waves-effect"><i class="ti-home"></i> <span> Ubold </span> </a>
                </li>
                <li>
                    <a href="<?= site_url('user_guide') ?>" class="waves-effect"><i class="ti-home"></i> <span> CI Documentation </span> </a>
                </li>-->
                

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>