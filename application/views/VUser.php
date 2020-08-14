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
                  <th>Kode User</th>
                  <!-- <th>Kode Pegawai</th> -->
                  <th>Username</th>
                  <th>Password</th>
                  <th>Acces Level</th>
                  <th>Foto</th>
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataUser))
	{
		foreach($DataUser as $ReadDS)
		{
	?>
      <tr>
          <td><?php echo $ReadDS->kd_user; ?></td>
          <!-- <td><?php echo $ReadDS->kd_staff; ?></td> -->
					<td><?php echo $ReadDS->username; ?></td>
					<td><?php echo $ReadDS->password; ?></td>
          <td><?php echo $ReadDS->acc_lvl; ?></td>
           <td ><img width="50px" height="50px" src="<?php echo base_url('upload/'). $ReadDS->foto; ?>"></td>
					<td>
					<a href="<?php echo site_url('Welcome/DataUser/'.$ReadDS->kd_user.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataUser/'.$ReadDS->kd_user) ?>"><i class="fa fa-fw fa-trash"></i></a>
					</td>
      </tr>
                <?php		
		}
	}
	?>
              </table>
            </div>