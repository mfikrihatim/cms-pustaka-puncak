<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Data Wisata</h3>
                <div class="box-header">
                <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddWisata'); ?>">
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
                            <th>ID Wisata</th>
                            <th>ID Merchant</th>
                            <th>Nama Wisata</th>
                            <th>Alamat Wisata</th>
                            <th>No Telfon Wisata</th>
                            <th>Email Wisata</th>
                            <th>ID Fasilitas</th>
                            <th>Durasi Wisata</th>
                            <th>Rating</th>
                            <th>Keterangan Wisata</th>
                            <th>Foto Wisata</th>
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
                        if (!empty($DataWisata)) {
                            foreach ($DataWisata as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id_wisata; ?></td>
                                    <td><?php echo $ReadDS->id_merchant; ?></td>
                                    <td><?php echo $ReadDS->nama_wisata; ?></td>
                                    <td><?php echo $ReadDS->alamat_wisata; ?></td>
                                    <td><?php echo $ReadDS->tlp_wisata; ?></td>
                                    <td><?php echo $ReadDS->email_wisata; ?></td>
                                    <td><?php echo $ReadDS->id_fasilitas; ?></td>
                                    <td><?php echo $ReadDS->durasi_wisata; ?></td>
                                    <td><?php echo $ReadDS->rating; ?></td>
                                    <td><?php echo $ReadDS->keterangan_wisata; ?></td>
                                    <td ><img width="50px" height="50px" src="<?php echo $ReadDS->foto_wisata; ?>"></td> 
                                    <td><?php echo $ReadDS->price; ?></td>
                                    <td><?php echo $ReadDS->created_by; ?></td>
                                    <td><?php echo $ReadDS->created_date; ?></td>
                                    <td><?php echo $ReadDS->updated_by; ?></td>
                                    <td><?php echo $ReadDS->updated_date; ?></td>
                                    <td><?php echo $ReadDS->deleted_by; ?></td>
                                    <td><?php echo $ReadDS->deleted_date; ?></td>
                                    <td><?php echo $ReadDS->is_active; ?></td>

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataWisata/' . $ReadDS->id_wisata . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataWisata/' . $ReadDS->id_wisata) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
 
              </div>
