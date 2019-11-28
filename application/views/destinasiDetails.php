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
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url() ?>">Home</a> <span class="divider">/</span></li>
                    <li class="active"><?php echo $daftarDestinasi->nama ?></li>
                </ul>
		    	<div>
                    <div class="hero-unit">
                        <h3><?php echo $daftarDestinasi->nama ?></h3>
                        <img src="<?php echo base_url() ?>assets/gambar/destinasi/<?php echo $daftarDestinasi->foto ?>" alt="Destinasi Image" class="img-destinasi-details">
                        <p style="margin-top: 20px"><?php echo $daftarDestinasi->deskripsi ?></p>
                    </div>
				</div>
		    </div>
			
            <?php $this->load->view('menukanan') ?>
        </div>	
        
        <hr class="hr-dashed" />		
      
      <?php $this->load->view('ulasan') ?>
      
    </div>
  </div>
  
  <?php $this->load->view('footer') ?>
  
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script>
</body>
</html>