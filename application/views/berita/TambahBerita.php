<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Tambah Berita</h4>
            </div>
        </div>

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Tabel Data Berita -->
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <form class="form-horizontal group-border-dashed" enctype="multipart/form-data" method="post" action="<?=base_url('berita/tambahberita');?>">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jenis Berita</label>
                                    <div class="col-sm-3">
                                        <select name="jenis_berita" class="selectpicker" data-style="btn-purple btn-custom">
                                            <option>PILEG</option>
                                            <option>PILPRES</option>
                                            <option>PILKADA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Judul Berita</label>
                                    <div class="col-sm-6">
                                        <input rows="15" name="judul_berita" required class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Isi Berita</label>
                                    <div class="col-sm-6">
                                        <textarea rows="15" name="isi_berita" required class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gambar Berita</label>
                                    <div class="col-sm-6">
                                        <input name="gambar" required type="file" class="filestyle" data-iconname="fa fa-cloud-upload">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                        <a href="<?=base_url('berita');?>" class="btn btn-default m-l-5">
                                            Kembali
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container -->
                
</div>