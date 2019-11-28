<!-- menu kanan -->
<div class="col-sm-3">
        <ul class="list-group">
            <li class="list-group-item active">Ruang Info</li>
            <?php
                foreach($daftarRuangInfo as $record){ ?>
                    <li class="list-group-item">
                        <a href="<?php echo base_url() ?>ruangInfoDetails/<?php echo $record->id_ruang_info ?>" class="menu-link"><?php echo $record->nama ?></a>
                    </li> <?php
                }
            ?>
        </ul>
</div>