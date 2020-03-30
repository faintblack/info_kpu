<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Komentar Berita</h4>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Tabel Data Berita -->
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php foreach ($komentar as $k) { ?>
                            <div class="comment">
                                <div class="comment-body">
                                    <div class="comment-text">
                                        <div class="comment-header">
                                            <a href="#" title=""><?=$k->nama_pengguna;?></a><span><?=$k->waktu;?></span>
                                        </div>
                                        <?=$k->isi_komentar;?>
                                        <a style="float: right;" href="<?=base_url('berita/hapuskomentar/'.$k->id_komentar);?>" class="waves-effect waves-light glyphicon glyphicon-trash" onclick="return confirm('Anda yakin ingin menghapus komentar ?')"></a>
                                    </div>
                                    <div class="comment-footer">
                                        
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php foreach ($berita as $k) { ?>
                            <div class="comment" style="text-align: right;">
                                <a href="<?=base_url('berita/detail/'.$k->id_berita);?>" class="btn btn-primary btn-custom waves-effect waves-light">Kembali</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
                
</div>