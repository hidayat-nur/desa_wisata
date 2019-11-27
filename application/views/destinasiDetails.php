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

                <div class="hero-unit">
                <h1><?php echo $daftarDestinasi->nama ?></h1>
                <img src="<?php echo base_url() ?>assets/gambar/destinasi/<?php echo $daftarDestinasi->foto ?>" alt="Destinasi Image" style="width: 350px">
                <p><?php echo $daftarDestinasi->deskripsi ?></p>
                </div>

				  </div>
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