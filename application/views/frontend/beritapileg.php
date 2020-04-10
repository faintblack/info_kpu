<?php date_default_timezone_set('Asia/Jakarta'); 

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KPU KOTA PEKANBARU</title>
    <link href="<?= base_url('libraries/frontend/') ?>css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('libraries/frontend/') ?>css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="<?= base_url('libraries/frontend/') ?>css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="<?= base_url('libraries/frontend/') ?>css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('libraries/frontend/') ?>css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
   
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('libraries/frontend/') ?>css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="<?= base_url('libraries/frontend/') ?>js/modernizr-3.5.0.min.js"></script>
</head>
<body>
<div class="container-fluid" style="background-image: url('<?= base_url('libraries/frontend/') ?>images/headbg.jpg'); size: 100%;">
    <div class="container" >
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <a href="#>"><img src="<?= base_url('libraries/frontend/') ?>images/logokpu.png" alt="img" class="fh5co_logo_width"/></a>
            </div>
            <div class="col-12 col-md-6 align-self-center fh5co_mediya_left" style="text-align: center;">
                
                <h1><b>KOMISI PEMILIHAN UMUM</b></h1>
                <h1><b>KOTA PEKANBARU</b></h1>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- nav-bar -->
<?php $this->load->view('frontend/nav-bar') ?>

<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height" ><img src="<?= base_url('libraries/frontend/') ?>images/kpu1.jpeg" alt="img" />
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;5 Maret, 2020.
                    </div>
                    <div class=""><p> KPU Kota Pekanbaru Goes to Campus </p></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?= base_url('libraries/frontend/') ?>images/kpu2.jpeg" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;20 Februari, 2020. </div>
                            <div class=""><p> Kunjungan KPU Kota Pekanbaru kepada Pemerintah Kota Pekanbaru. </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?= base_url('libraries/frontend/') ?>images/kpu3.jpeg" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;8 Januari, 2020. </div>
                            <div class=""><p> KPU RIAU HELAT BIMTEK SIMULASI PENCALONAN PERSEORANGAN PEMILIHAN TAHUN 2020 </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?= base_url('libraries/frontend/') ?>images/kpu4.jpeg" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><i class="fa fa-clock-o"></i>&nbsp;&nbsp;10 Desember, 2019.</div>
                            <div class=""><p> Sosialisasi RPP KPU Kota Pekanbaru di MI Muhammadiyah 01 Pekanbaru </p></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?= base_url('libraries/frontend/') ?>images/kpu5.jpeg" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;10 Desember, 2019.</div>
                            <div class=""><p> Sosialisasi RPP KPU Kota Pekanbaru </p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Berita</div>
                </div>
                <!--Fetch data dari database-->
                <?php foreach ($data->result() as $row) {?>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="<?= base_url('libraries/ubold/assets/') ?>images/<?php echo $row->gambar_berita; ?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <p class="fh5co_magna py-2"> <i class="fa fa-clock-o"></i> <?php echo date('d-m-Y', strtotime($row->waktu)); ?> </p> 
                        <p class="fh5co_mini_time py-2"> <b><?php echo $row->jenis_berita; ?></b> </p>
                        <div class="fh5co_consectetur"> 
                            <?php
                            $long_string = $row->isi_berita;
                            $limited_string_berita = limit_words($long_string, 25);
                            ?>
                            <p><?php echo $limited_string_berita; ?>...</p>
                            <p style="float: right;"><a href="">Selengkapnya</a></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--PAGINATION BOSS-->
                <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                    <div class="col-12 text-center pb-4 pt-4">
                        <?php echo $pagination; ?>
                     </div>
                </div>
            </div>

            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <a href="#" class="fh5co_tagg">Business</a>
                    <a href="#" class="fh5co_tagg">Technology</a>
                    <a href="#" class="fh5co_tagg">Sport</a>
                    <a href="#" class="fh5co_tagg">Art</a>
                    <a href="#" class="fh5co_tagg">Lifestyle</a>
                    <a href="#" class="fh5co_tagg">Three</a>
                    <a href="#" class="fh5co_tagg">Photography</a>
                    <a href="#" class="fh5co_tagg">Lifestyle</a>
                    <a href="#" class="fh5co_tagg">Art</a>
                    <a href="#" class="fh5co_tagg">Education</a>
                    <a href="#" class="fh5co_tagg">Social</a>
                    <a href="#" class="fh5co_tagg">Three</a>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="<?= base_url('libraries/frontend/') ?>images/download (1).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="<?= base_url('libraries/frontend/') ?>images/allef-vinicius-108153.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="<?= base_url('libraries/frontend/') ?>images/download (2).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center"><img src="<?= base_url('libraries/frontend/') ?>images/seth-doyle-133175.jpg" alt="img"
                                                              class="fh5co_most_trading"/></div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="<?= base_url('libraries/frontend/') ?>images/white_logo.png" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> About</div>
                <div class="footer_sub_about pb-3"> Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> Category</div>
                <ul class="footer_menu">
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Business</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Entertainment</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Environment</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Health</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Life style</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Politics</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Technology</a></li>
                    <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; World</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <div class="footer_main_title py-3"> Most Viewed Posts</div>
                <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                <div class="footer_makes_sub_font"> Dec 31, 2016</div>
                <a href="#" class="footer_post pb-4"> Success is not a good teacher failure makes you humble </a>
                <div class="footer_position_absolute"><img src="<?= base_url('libraries/frontend/') ?>images/footer_sub_tipik.png" alt="img" class="width_footer_sub_img"/></div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> Last Modified Posts</div>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/allef-vinicius-108153.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/32-450x260.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/download (1).jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/science-578x362.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/vil-son-35490.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/zack-minor-15104.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/download.jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/download (2).jpg" alt="img"/></a>
                <a href="#" class="footer_img_post_6"><img src="<?= base_url('libraries/frontend/') ?>images/ryan-moreno-98837.jpg" alt="img"/></a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2018, All rights reserved.  </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?= base_url('libraries/frontend/') ?>js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="<?= base_url('libraries/frontend/') ?>js/jquery.waypoints.min.js"></script>
<!-- Main -->
<script src="<?= base_url('libraries/frontend/') ?>js/main.js"></script>

</body>
</html>