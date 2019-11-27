<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Events
        <small>Tambah, Edit, Hapus</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>tambahEvent"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Daftar Events</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>userListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Cari"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Tanggal Acara</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    <?php
                    if(!empty($daftarEvents))
                    {
                        $no = 0;
                        foreach($daftarEvents as $record){
                        $no++
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $record->nama ?></td>
                        <td><?php echo substr($record->deskripsi, 0, 35); ?>...</td>
                        <td>
                            <img src="<?php echo base_url() ?>assets/gambar/events/<?php echo $record->foto ?>" class="img_table" alt="Event Image">
                        </td>
                        <td><?php echo $record->tgl_acara ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editEvent/'.$record->id_event; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'/hapusEvent/'.$record->id_event; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
