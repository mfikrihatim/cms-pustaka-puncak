<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Data Experience</h3>
                <div class="box-header">
                <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddExperience'); ?>">
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
                            <th>ID Experience</th>
                            <th>Judul Experience</th>
                            <th>ID TIPE Experience</th>
                            <th>Tipe Trip Experience</th>
                            <th>Deskripsi Experience</th>
                            <th>Max Guest Experience</th>
                            <th>Itinerary Experience</th>
                            <th>ID Fasilitas</th>
                            <th>Inclusion Experience</th>
                            <th>Rules Experience</th>
                            <th>Status</th>
                            <th>Rating</th>
                            <th>Lokasi Experience</th>
                            <th>Durasi Experience</th>
                            <th>ID Minimum Booking</th>
                            <th>ID Merchant</th>
                            <th>Foto Experience</th>
                            <th>Creted BY</th>
                            <th>Creted Date</th>
                            <th>Updated BY</th>
                            <th>Updated Date</th>
                            <th>Deleted BY</th>
                            <th>Deleted Date</th>
                            <th>IS ACTIVE</th>
                            <th>Tools</th>
                        </tr>
                        <?php
            if (!empty($DataExperience)) {
              foreach ($DataExperience as $ReadDS) {
                $arrayfotoexperience = json_decode($ReadDS->foto_experience, TRUE);
                $fotos = $arrayfotoexperience;
            ?>
                                <tr>
                                    <td><?php echo $ReadDS->id_exp; ?></td>
                                    <td><?php echo $ReadDS->judul_exp; ?></td>
                                    <td><?php echo $ReadDS->id_tipe_exp; ?></td>
                                    <td><?php echo $ReadDS->tipe_trip_exp; ?></td>
                                    <td><?php echo $ReadDS->desc_exp; ?></td>
                                    <td><?php echo $ReadDS->max_guest_exp; ?></td>
                                    <td><?php echo $ReadDS->itinerary_exp; ?></td>
                                    <td><?php echo $ReadDS->id_fasilitas; ?></td>
                                    <td><?php echo $ReadDS->inclusion_exp; ?></td>
                                    <td><?php echo $ReadDS->rules_exp; ?></td>
                                    <td><?php echo $ReadDS->status; ?></td>
                                    <td><?php echo $ReadDS->rating; ?></td>
                                    <td><?php echo $ReadDS->lokasi_exp; ?></td>
                                    <td><?php echo $ReadDS->durasi_exp; ?></td>
                                    <td><?php echo $ReadDS->id_minimun_booking; ?></td>
                                    <td><?php echo $ReadDS->id_merchant; ?></td>
                                    <td >
                  <?php 
				
				foreach($fotos as $foto){
				?>
				
        <img width="50px" height="50px" src="<?php echo $foto; ?>">
				<?php 
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
                                        <a href="<?php echo site_url('Welcome/DataExperience/' . $ReadDS->id_exp . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataExperience/' . $ReadDS->id_exp) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
 
              </div>
