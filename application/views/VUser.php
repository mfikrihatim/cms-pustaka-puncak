<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 class="box-title">DATA USER</h2>
        <div class="box-header">
        <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#myModal"><div class="col-md-3 col-sm-4"></div></a>TAMBAH DATA</h3> </button>

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
          <td ><img width="50px" height="50px" src="<?php echo base_url('upload/user_profile/'). $ReadDS->foto_profile; ?>"></td>
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
                                                   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
  
			<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button> -->
        <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data User</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
        <form action="<?php echo site_url('Welcome/AddDataUser'); ?>" method="post" enctype="multipart/form-data">
<!-- Staff -->
            <!--     <div class="form-group">
          <label>Pegawai</label>
          <select class="form-control" name="kd_pegawai" required>
            <option selected disabled>Pilih Pegawai</option>
            <?php
              foreach($staff as $ReadDS){
            ?>
            <option value="<?php echo $ReadDS->kd_staff; ?>"><?php echo $ReadDS->kd_staff; ?></option>
            <?php
              }
            ?>
                  </select>
                </div> --> 
  <!-- Username -->
                <div class="form-group">
                  <label>Email User</label>
                  <input type="email" class="form-control" name="email_user" placeholder="Masukan Email">
                </div> 
  <!-- Password -->
                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama User">
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukan Password">
                </div>
                
              
             
                <input type="hidden" name="created_by" class="form-control">
                <input type="hidden" name="created_date" class="form-control">
                <input type="hidden" name="is_active" class="form-control" value="1">
   <!-- Status_user -->
                <!-- <div class="form-group">
                  <label>Status User</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="st_user" id="optionsRadios1" value="publish" checked>
                      Publish
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="st_user" id="optionsRadios2" value="unpublish ">
                      Unpublish
                    </label>
                  </div>
                </div> -->
  
                <!-- <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="userfile"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div> -->

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

  </form>


    
    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

                </div>
              </div>
