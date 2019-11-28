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
    <!-- header -->
    <?php $this->load->view('header') ?>

    <!-- events -->
    <?php $this->load->view('carousel') ?>
          
	  <div class="container-fluid content">
	  	<div class="row">

        <!-- destinasi -->
		    <div class="col-sm-9">
		    	<div class="row" id="grid-destinasi">

            <?php
            foreach($daftarDestinasi as $record){ ?>
                <div class="col-sm-4">
                    <a href="<?php echo base_url() ?>destinasiDetails/<?php echo $record->id ?>" class="box-destinasi">
                      <figure class="figure figure-destinasi">
                        <div>
                          <img src="<?php echo base_url() ?>assets/gambar/destinasi/<?php echo $record->foto ?>" class="figure-img img-fluid rounded img-destinasi" alt="wisata">
                        </div>
                        <figcaption class="figure-caption caption-text text-center"><?php echo $record->nama ?></figcaption>
                      </figure>	
                    </a>
                </div>
            <?php } ?>

          </div>
          <div class="row row-pagination-destinasi">
            <nav aria-label="Page navigation example" class="pagination-destinasi">
              <ul class="pagination">

                <?php
                  if ($posisiOffset == 1) { ?>
                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li> <?php
                  } else { ?>
                    <li class="page-item">
                      <a class="page-link" href="<?php echo base_url() ?>destinasi/<?php echo $posisiOffset - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li> <?php
                  } 
                ?>
                

                <?php
                  for($i = 1; $i <= $jumlahpagging; $i++) {
                    if ($i == $posisiOffset) { ?>
                      <li class="page-item disabled"><a class="page-link" href="<?php echo base_url() ?>destinasi/<?php echo $i ?>"><?php echo $i ?></a></li> <?php
                    } else { ?>
                      <li class="page-item"><a class="page-link" href="<?php echo base_url() ?>destinasi/<?php echo $i ?>"><?php echo $i ?></a></li> <?php
                    }
                  }
                ?>

                <?php
                  if ($posisiOffset == $jumlahpagging) { ?>
                    <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li> <?php
                  } else { ?>
                    <li class="page-item">
                      <a class="page-link" href="<?php echo base_url() ?>destinasi/<?php echo $posisiOffset + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li> <?php
                  } 
                ?>
              </ul>
            </nav>
          </div>
			  </div>
			
        <?php $this->load->view('menukanan') ?>
      </div>

      <hr class="hr-dashed" />		
      
      <!-- ulasan -->
      <?php $this->load->view('ulasan') ?>
      
    </div>
  </div>
  
  <?php $this->load->view('footer') ?>
  
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.js"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/masonry.js"></script>
    <script>
      $(document).ready(function() {
        $('#grid-destinasi').masonry({
          itemSelector: '.col-sm-4',
          // columnWidth: 200
        });
      })
    </script>
</body>
</html>