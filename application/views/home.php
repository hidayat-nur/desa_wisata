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
    <?php $this->load->view('header') ?>

    <?php $this->load->view('carousel') ?>
          
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
      
      <?php $this->load->view('ulasan') ?>
      
    </div>
  </div>
  
  <?php $this->load->view('footer') ?>
  
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script>
</body>
</html>