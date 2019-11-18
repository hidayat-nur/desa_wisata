<!DOCTYPE html>
<html>
<head>
	<title>Sendal explore</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend//css/styles.css">
</head>
<body>
	<div class="container">
    <ul class="nav header-nav">
      <li class="nav-item">
        <div class="box-logo">
          <img src="<?php echo base_url() ?>assets/frontend/images/logo.png" class="logo-header" alt="logo header">
          <h4 class="text-logo">Sendal Explore</h4>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-header" href="#">Tentang kami</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-header" href="#">Artikel</a>
      </li>
    </ul>

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo base_url() ?>assets/frontend/images/pasar rayang.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>pasar rayang</h5>
            <p>Towjopark adalah taman buatan yang berkonsep pada wisata edukasi berada 300 meter di selatan waduk wadaslintang menjadikan taman ini menjadisalah t=satu destinasipaling favorit di desa sendangdalem</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>assets/frontend/images/gunung-rayang.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Gunung Rayang</h5>
            <p>gunung rayang adalah bukit batu besar di tengah desa sendangdalem ,gunung rayang dihuni ratusan monyet liar </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>assets/frontend/images/fks besar.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Festival Kali sat 2019</h5>
            <p>festival kali sat adalah event tahunan yang diselenggarakan oleh pkdarwis sendal explore , festival ini dilaksanakan setiap tanggal 1 agustus dan biasa dikunjungi ribuan pengunjung dari berbagai daerah sekitar. </p>
          </div>
        </div>
          <div class="carousel-item">
          <img src="<?php echo base_url() ?>assets/frontend/images/fks 2.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Festival Kali sat 2019</h5>
            <p>festival kali sat adalah event tahunan yang diselenggarakan oleh pkdarwis sendal explore , festival ini dilaksanakan setiap tanggal 1 agustus dan biasa dikunjungi ribuan pengunjung dari berbagai daerah sekitar. </p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
          
	  <div class="container-fluid content">
	  	<div class="row">
		    <div class="col-sm-9">
		    	<div class="row">

            <?php
            foreach($daftarDestinasi as $record){ ?>
                <div class="col-sm-4">
                    <a href="#">
                        <figure class="figure">
                            <img src="<?php echo base_url() ?>assets/gambar/destinasi/<?php echo $record->foto ?>" class="figure-img img-fluid rounded" alt="wisata">
                            <figcaption class="figure-caption caption-text text-center"><?php echo $record->nama ?></figcaption>
                        </figure>	
                    </a>
                </div>
            <?php } ?>

				  </div>

          <!-- <nav aria-label="Page navigation example">
            <ul class="pagination content-center">
              <li class="page-item"><a class="page-link" href="#">Back</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav> -->
			  </div>
			
        <div class="col-sm-3">
          <ul class="list-group">
            <li class="list-group-item active">Ruang Info</li>
            <li class="list-group-item">Event</li>
            <li class="list-group-item">Wisata sekitar</li>
            <li class="list-group-item">Tiket masuk</li>
            <li class="list-group-item">kuliner</li>
            <li class="list-group-item">Home stay</li>
             <li class="list-group-item">Hubungi Kami</li>
          </ul>
        </div>
      </div>		
      
      
      <div class="row mg-top-50">
        <div class="col-sm-3">
          <div class="box-quote">
            <img src="<?php echo base_url() ?>assets/frontend/images/quote.png" class="quote" alt="quote">
            <p class="text-quote">Wisata Dewa Bejo salah satu operator kunjungan wisata ke Goa Pindul, Kali Oya dan merupakan penggagas wisata Goa Pindul. Operator ini memiliki parkir yang luas, pemandu yang cekatan, tersedia loker yang kuncinya diserahkan pengunjung untuk dibawa sendiri, dan dilindungi dengan asuransi.</p>
            <h5>Nur amin</h5>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="box-quote">
            <img src="<?php echo base_url() ?>assets/frontend/images/quote.png" class="quote" alt="quote">
            <p class="text-quote">Wisata Dewa Bejo salah satu operator kunjungan wisata ke Goa Pindul, Kali Oya dan merupakan penggagas wisata Goa Pindul. Operator ini memiliki parkir yang luas, pemandu yang cekatan, tersedia loker yang kuncinya diserahkan pengunjung untuk dibawa sendiri, dan dilindungi dengan asuransi.</p>
            <h5>Nur amin</h5>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="box-quote">
            <img src="<?php echo base_url() ?>assets/frontend/images/quote.png" class="quote" alt="quote">
            <p class="text-quote">Wisata Dewa Bejo salah satu operator kunjungan wisata ke Goa Pindul, Kali Oya dan merupakan penggagas wisata Goa Pindul. Operator ini memiliki parkir yang luas, pemandu yang cekatan, tersedia loker yang kuncinya diserahkan pengunjung untuk dibawa sendiri, dan dilindungi dengan asuransi.</p>
            <h5>Nur amin</h5>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="box-quote">
            <img src="<?php echo base_url() ?>assets/frontend/images/quote.png" class="quote" alt="quote">
            <p class="text-quote">Wisata Dewa Bejo salah satu operator kunjungan wisata ke Goa Pindul, Kali Oya dan merupakan penggagas wisata Goa Pindul. Operator ini memiliki parkir yang luas, pemandu yang cekatan, tersedia loker yang kuncinya diserahkan pengunjung untuk dibawa sendiri, dan dilindungi dengan asuransi.</p>
            <h5>Nur amin</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 py-5">
          <div class="mb-5 flex-center">
            <a class="fb-ic" href="https://travel.detik.com/travel-news/d-2214401/sudah-coba-situs-situs-untuk-mencari-destinasi-wisata-keren">
              <i class="fa fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <a class="tw-ic" href="#">
              <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <a class="ins-ic" href="#">
              <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <span>Sendal Explore</span>
    </div>
  </footer>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script>
</body>
</html>