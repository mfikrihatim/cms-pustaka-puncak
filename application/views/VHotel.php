<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"> Data Hotel</h3>
        <div class="box-header">
          <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddHotel'); ?>">
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
              <th>ID Hote</th>
              <th>ID Merchant</th>
              <th>Nama Hotel</th>
              <th>Alamat Hotel</th>
              <th>telefon Hotel</th>
              <th>Email Hotel</th>
              <th>ID Fasilitas</th>
              <th>Rating</th>
              <th>Keterangan Hotel</th>
              <th>Foto Hotel</th>
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
            if (!empty($DataHotel)) {
              foreach ($DataHotel as $ReadDS) {
                $arrayfotohotel = json_decode($ReadDS->foto_hotel, TRUE);
                $fotos = $arrayfotohotel;
            ?>
                <tr>
                  <td><?php echo $ReadDS->id_hotel; ?></td>
                  <td><?php echo $ReadDS->id_merchant; ?></td>
                  <td><?php echo $ReadDS->nama_hotel; ?></td>
                  <td><?php echo $ReadDS->alamat_hotel; ?></td>
                  <td><?php echo $ReadDS->tlp_hotel; ?></td>
                  <td><?php echo $ReadDS->email_hotel; ?></td>
                  <td><?php echo $ReadDS->id_fasilitas; ?></td>
                  <td><?php echo $ReadDS->rating; ?></td>
                  <td><?php echo $ReadDS->keterangan_hotels; ?></td>
                  <td >
                  <?php 
				if ($fotos != Null) {
          foreach($fotos as $foto){
				
       
				?>
				
        <img width="50px" height="50px" src="<?php echo $foto; ?>">
				<?php 
        }
      }
				?> 
                  </td> 
                  <td><?php echo $ReadDS->created_by; ?></td>
                  <td><?php echo $ReadDS->created_date; ?></td>
                  <td><?php echo $ReadDS->updated_by; ?></td>
                  <td><?php echo $ReadDS->updated_date; ?></td>
                  <td><?php echo $ReadDS->deleted_by; ?></td>
                  <td><?php echo $ReadDS->deleted_date; ?></td>
                  <td><?php echo $ReadDS->is_active; ?></td>
                  <td>
                    <a href="<?php echo site_url('Welcome/DataHotel/' . $ReadDS->id_hotel . '/view') ?>"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('Welcome/DeleteDataHotel/' . $ReadDS->id_hotel) ?>"><i class="fa fa-fw fa-trash"></i></a>
                  </td>
                </tr>
            <?php
              }
            }
            ?>
          </table>
        </div>