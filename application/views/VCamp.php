<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Data Camp</h3>
                <div class="box-header">
                <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddCamp'); ?>">
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
                            <th>ID Camp</th>
                            <th>ID Merchant</th>
                            <th>Nama Camp</th>
                            <th>Alamat Camp</th>
                            <th>No Telfon Camp</th>
                            <th>Email Camp</th>
                            <th>ID Fasilitas</th>
                            <th>Durasi Camp</th>
                            <th>Rating</th>
                            <th>Keterangan Camp</th>
                            <th>Foto Camp</th>
                            <th>Price</th>
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
                        if (!empty($DataCamp)) {
                            foreach ($DataCamp as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id_camp; ?></td>
                                    <td><?php echo $ReadDS->id_merchant; ?></td>
                                    <td><?php echo $ReadDS->nama_camp; ?></td>
                                    <td><?php echo $ReadDS->alamat_camp; ?></td>
                                    <td><?php echo $ReadDS->tlp_camp; ?></td>
                                    <td><?php echo $ReadDS->email_camp; ?></td>
                                    <td><?php echo $ReadDS->id_fasilitas; ?></td>
                                    <td><?php echo $ReadDS->durasi_camp; ?></td>
                                    <td><?php echo $ReadDS->rating; ?></td>
                                    <td><?php echo $ReadDS->keterangan_camp; ?></td>
                                    <td ><img width="50px" height="50px" src="<?php echo $ReadDS->foto_camp; ?>"></td> 
                                    <td><?php echo $ReadDS->price; ?></td>
                                    <td><?php echo $ReadDS->created_by; ?></td>
                                    <td><?php echo $ReadDS->created_date; ?></td>
                                    <td><?php echo $ReadDS->updated_by; ?></td>
                                    <td><?php echo $ReadDS->updated_date; ?></td>
                                    <td><?php echo $ReadDS->deleted_by; ?></td>
                                    <td><?php echo $ReadDS->deleted_date; ?></td>
                                    <td><?php echo $ReadDS->is_active; ?></td>

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataCamp/' . $ReadDS->id_camp . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataCamp/' . $ReadDS->id_camp) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
 
              </div>
