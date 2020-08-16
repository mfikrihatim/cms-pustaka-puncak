<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddUser'); ?>"><div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-plus"></i></div></a></h3>

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
                  <th>ID User</th>
                  <th>Email User</th>
                  <th>Nama User</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>No Telfon User</th>
                  <th>Kode Verifikasi</th>
                  <th>Tanggal Verifikasi</th>
                  <th>Foto Profile</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>ID Tipe</th>
                  <th>ID Referral</th>
                  <th>Points</th>
                  <th>Created By</th>
                  <th>Created Date</th>
                  <th>Update by</th>
                  <th>Update date</th>
                  <th>Delete By</th>
                  <th>Delete date</th>
                  <th>Is Avtive </th>
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataUser))
	{
		foreach($DataUser as $ReadDS)
		{
	?>
      <tr>
          <td><?php echo $ReadDS->id_user; ?></td>
          <td><?php echo $ReadDS->email_user; ?></td>
          <td><?php echo $ReadDS->nama; ?></td>
					<td><?php echo $ReadDS->username; ?></td>
          <td><?php echo $ReadDS->password; ?></td>
          <td><?php echo $ReadDS->tlp_user; ?></td>
          <td><?php echo $ReadDS->kode_verifikasi; ?></td>
          <td><?php echo $ReadDS->tgl_verifikasi; ?></td>
          <td ><img width="50px" height="50px" src="<?php echo base_url('upload/user_profile'). $ReadDS->foto_profile; ?>"></td>
          <td><?php echo $ReadDS->alamat; ?></td>
          <td><?php echo $ReadDS->tmp_lahir; ?></td>
          <td><?php echo $ReadDS->tgl_lahir; ?></td>
          <td><?php echo $ReadDS->jenis_kelamin; ?></td>
          <td><?php echo $ReadDS->id_tipe; ?></td>
          <td><?php echo $ReadDS->kode_referral; ?></td>
          <td><?php echo $ReadDS->points; ?></td>
          <td><?php echo $ReadDS->created_by; ?></td>
          <td><?php echo $ReadDS->created_date; ?></td>
          <td><?php echo $ReadDS->updated_by; ?></td>
          <td><?php echo $ReadDS->updated_date; ?></td>
          <td><?php echo $ReadDS->deleted_by; ?></td>
          <td><?php echo $ReadDS->deleted_date; ?></td>
          <td><?php echo $ReadDS->is_active; ?></td>

					<td>
					<a href="<?php echo site_url('Welcome/DataUser/'.$ReadDS->id_user.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataUser/'.$ReadDS->id_user) ?>"><i class="fa fa-fw fa-trash"></i></a>
					</td>
      </tr>
                <?php		
		}
	}
	?>
              </table>
            </div>