<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li>
                    <a href="<?= base_url() ?>" class="waves-effect"><i class="ti-home"></i> <span> Home </span> </a>
                </li>
                <li>
                    <a href="<?= base_url('berita') ?>" class="waves-effect"><i class="ti-home"></i> <span> Berita </span> </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Data Pemilu </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('pilkada') ?>">PILKADA</a></li>
                        <li><a href="<?= base_url('pileg') ?>">PILEG</a></li>
                        <li><a href="<?= base_url('pilpres') ?>">PILPRES</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-paint-bucket"></i> <span> Data Wilayah </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('Dapil') ?>">Dapil</a></li>
                        <li><a href="<?= base_url('kecamatan') ?>">Kecamatan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('parpol') ?>" class="waves-effect"><i class="ti-home"></i> <span> Parpol </span> </a>
                </li>
                <li>
                    <a href="<?= base_url('Pengguna') ?>" class="waves-effect"><i class="ti-home"></i> <span> Pengguna </span> </a>
                </li>
                <li>
                    <a href="<?= base_url('harviacode') ?>" class="waves-effect"><i class="ti-home"></i> <span> CRUD GENERATOR </span> </a>
                </li>
                <li>
                    <a href="<?= base_url('libraries/ubold') ?>" class="waves-effect"><i class="ti-home"></i> <span> Ubold </span> </a>
                </li>
                

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>