<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Detail Berita</h4>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Tabel Data Berita -->
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <?php foreach ($detail as $k) { ?>
                                <p><?=$k->jenis_berita;?></p>
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?=$k->judul_berita;?></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content br-n pn">
                                        <div id="navpills-1" class="tab-pane active">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <p>
                                                        <?=$k->isi_berita;?>
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="<?=base_url('libraries/ubold/assets/images/'.$k->gambar_berita);?>" class="img-responsive thumbnail m-r-15">
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="<?=base_url('Berita/komentar/'.$k->id_berita);?>" class="btn btn-success waves-effect waves-light">Lihat Komentar ...</a>
                                                </div>
                                                <div class="col-md-4" style="text-align: right;">
                                                    <a href="<?=base_url('Berita/edit/'.$k->id_berita);?>" class="btn btn-warning waves-effect waves-light glyphicon glyphicon-edit"></a>
                                                    <a href="<?=base_url('Berita/hapus/'.$k->id_berita);?>" class="btn btn-danger waves-effect waves-light glyphicon glyphicon-trash" onclick="return confirm('Anda yakin ingin menghapus berita ?')"></a>
                                                </div>
                                                <div class="col-md-4" style="text-align: right;">
                                                    <a href="<?=base_url('Berita');?>" class="btn btn-primary btn-custom waves-effect waves-light">Kembali</a>
                                                </div>
                                                    
                                            </div>
                                                <br />
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
                
</div>