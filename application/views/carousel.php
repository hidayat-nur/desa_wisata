<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $no = 0;
        foreach($daftarCarousel as $record){ 
            if ($no == 0) { ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $no ?>" class="active"></li> <?php
            } else { ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $no ?>"></li> <?php
            }

            $no++;
        } ?>
    </ol>

    <div class="carousel-inner">
        <?php
        $no = 0;
        foreach($daftarCarousel as $record){
            if ($no == 0) { ?>
                <div class="carousel-item active">
                    <img src="<?php echo base_url() ?>assets/gambar/events/<?php echo $record->foto ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $record->nama ?></h5>
                        <p><?php echo $record->deskripsi ?></p>
                        <p><?php echo $record->tgl_acara ?></p>
                    </div>
                </div> <?php
            } else { ?>
                <div class="carousel-item">
                    <img src="<?php echo base_url() ?>assets/gambar/events/<?php echo $record->foto ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $record->nama ?></h5>
                        <p><?php echo $record->deskripsi ?></p>
                        <p><?php echo $record->tgl_acara ?></p>
                    </div>
                </div> <?php
            }
            
            $no++;
        } ?>
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