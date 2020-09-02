<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"> Data Kamar Hotel</h3>
        <div class="box-header">
          <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddKamarHotel'); ?>">
              <div class="col-md-3 col-sm-4"><i>Tambah Data</i> </div>
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
              <th>ID Kamar</th>
              <th>ID Hotel</th>
              <th>Nama Kamar</th>
              <th>Jumlah Kamar</th>
              <th>ID Fasilitas</th>
              <th>Keterangan Kamar</th>
              <th>Max Tamu</th>
              <th>Foto Kamar</th>
              <th>Foto Profile Kamar</th>
              <th>Created By</th>
              <th>Created Date</th>
              <th>Update By</th>
              <th>Update Date</th>
              <th>Deleted By</th>
              <th>Deleted Date</th>
              <th>Is Active</th>
              <th>Tools</th>
            </tr>
            <?php
            if (!empty($DataKamarHotel)) {
              foreach ($DataKamarHotel as $ReadDS) {
                $arrayfotokamar = json_decode($ReadDS->foto_kamar, TRUE);
                $fotos = $arrayfotokamar;
            ?>
                <tr>
                  <td><?php echo $ReadDS->id_kamar; ?></td>
                  <td><?php echo $ReadDS->id_hotel; ?></td>
                  <td><?php echo $ReadDS->nama_kamar; ?></td>
                  <td><?php echo $ReadDS->jumlah_kamar; ?></td>
                  <td><?php echo $ReadDS->id_fasilitas; ?></td>
                  <td><?php echo $ReadDS->keterangan_kamar; ?></td>
                  <td><?php echo $ReadDS->max_tamu; ?></td>
                  
                  <td >
                  <?php 
				
				foreach($fotos as $foto){
				?>
				
        <img width="50px" height="50px" src="<?php echo $foto; ?>">
				<?php 
				}
				?> 
                  </td> 
                  <td ><img width="50px" height="50px" src="<?php echo $ReadDS->foto_profile_kamar; ?>"></td>        
                  <td><?php echo $ReadDS->created_by; ?></td>
                  <td><?php echo $ReadDS->created_date; ?></td>
                  <td><?php echo $ReadDS->updated_by; ?></td>
                  <td><?php echo $ReadDS->updated_date; ?></td>
                  <td><?php echo $ReadDS->deleted_by; ?></td>
                  <td><?php echo $ReadDS->deleted_date; ?></td>
                  <td><?php echo $ReadDS->is_active; ?></td>
                  <td>
                    <a href="<?php echo site_url('Welcome/DataKamarHotel/' . $ReadDS->id_kamar . '/view') ?>"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('Welcome/DeleteDataKamarHotel/' . $ReadDS->id_kamar) ?>"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </table>
        </div>