daftarUlasan
<div class="row mg-top-50">
    <?php
    foreach($daftarUlasan as $record){ ?>
        <div class="col-sm-3">
            <div class="box-quote">
                <img src="<?php echo base_url() ?>assets/frontend/images/quote.png" class="quote" alt="quote">
                <p class="text-quote"><?php echo $record->ulasan ?></p>
                <h5><?php echo $record->nama ?></h5>
            </div>
        </div> <?php
    } ?>
</div>