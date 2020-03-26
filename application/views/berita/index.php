<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title" style="margin-bottom: 10px">Data Berita</h4>
            </div>
        </div>

        <!-- Tabel -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                            <p><a href="<?=base_url('berita/tambah');?>" class="btn btn-primary waves-effect waves-light">Create</a></p>
                	<table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Pengguna</th>
                                <th>Jenis Berita</th>
                                <th>Waktu</th>
                                <th style="text-align: center;">Isi Berita</th>
                            </tr>
                        </thead>


                        <tbody>
                        	<?php $no = 1; foreach ($berita as $b) { ?>
                            <tr>
                                <td style="text-align: center;"><?=$no++;?></td>
                                <td><?=$b->username;?></td>
                                <td><?=$b->nama_pengguna;?></td>
                                <td><?=$b->jenis_berita;?></td>
                                <td><?=$b->waktu;?></td>
                                <td style="text-align: center;"><a href="<?=base_url('berita/detail/'.$b->id_berita);?>" class="btn btn-info btn-custom waves-effect waves-light">Lihat Berita</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> <!-- container -->
                
</div>