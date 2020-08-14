<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"> Data Produk</h3>
        <div class="box-header">
          <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddJenisProduk'); ?>">
              <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-plus"></i></div>
            </a></h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>Kode Jenis Produk</th>
              <th>Jenis Produk</th>
              <th>Kategori</th>
              <th>Tools</th>
            </tr>
            <?php
            if (!empty($DataJenisProduk)) {
              foreach ($DataJenisProduk as $ReadDS) {
            ?>
                <tr>
                  <td><?php echo $ReadDS->kd_jenis; ?></td>
                  <td><?php echo $ReadDS->jenis_produk; ?></td>
                  <td><?php echo $ReadDS->nama_kategori; ?></td>

                  <td>
                    <a href="<?php echo site_url('Welcome/DataJenisProduk/' . $ReadDS->kd_jenis . '/view') ?>"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('Welcome/DeleteDataJenisProduk/' . $ReadDS->kd_jenis) ?>"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </table>
        </div>