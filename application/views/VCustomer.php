<div class="row">
        <div class="col-xs-12">
          <div class="box">
           <div class="box-header">
              <h3 class="box-title"> Data Customer</h3>
              <div class="box-header">
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
                  <th>ID Customer</th>
                  <th>Email Customer</th>
                  <th>Nama</th>
                  
                  <th>Password</th>
                  <th>No telfon Customer</th>
                  <th>Kode Verifikasi</th>
                  <th>tanggal verifikasi</th>
                  <th>Gambar Costumer</th>
                  <th>Alamat</th>
                  <th>Created BY</th>
                  <th>Created Date</th>
                  <th>Update BY</th>
                  <th>Update Date</th>
                  <th>Delete by</th>
                  <th>Delete date</th>
                  <th>IS ACTIVE</th>                  
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataCustomer))
	{
		foreach($DataCustomer as $ReadDS)
		{
	?>
      <tr>
         <td><?php echo $ReadDS->id_customer; ?></td>
         <td><?php echo $ReadDS->email_customer; ?></td>
         <td><?php echo $ReadDS->nama; ?></td>
         <td><?php echo $ReadDS->password; ?></td>
         <td><?php echo $ReadDS->tlp_customer; ?></td>
         <td><?php echo $ReadDS->kode_verifikasi; ?></td>
         <td><?php echo $ReadDS->tgl_verifikasi; ?></td>
          <td ><img width="50px" height="50px" src="<?php echo $ReadDS->foto_profile; ?>"></td>
          <td><?php echo $ReadDS->alamat; ?></td>
          <td><?php echo $ReadDS->created_by; ?></td>
          <td><?php echo $ReadDS->created_date; ?></td>
          <td><?php echo $ReadDS->updated_by; ?></td>
          <td><?php echo $ReadDS->updated_date; ?></td>
          <td><?php echo $ReadDS->deleted_by; ?></td>
          <td><?php echo $ReadDS->deleted_date; ?></td>
          <td><?php echo $ReadDS->is_active; ?></td>

           <td>
					<a href="<?php echo site_url('Welcome/DataCustomer/'.$ReadDS->id_customer.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataCustomer/'.$ReadDS->id_customer) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
		<h3 class="box-title">Tambah Data Customer</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataCustomer'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
			<div class="form-group">
					<label>Email Customer</label>
					<input type="email" name="email_customer" class="form-control" placeholder="Masukan Email" required>
        </div>
       <div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required>
        </div>
        <div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Masukan password" required>
        </div>
        <div class="form-group">
					<label>Telfon Customer</label>
					<input type="number" name="tlp_customer" class="form-control" placeholder="Masukan no Telfon" required>
				</div>
				<div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				
					<input type="hidden" name="created_by" class="form-control">
          <input type="hidden" name="created_date" class="form-control">
          <input type="hidden" name="is_active" class="form-control" value="1">
          
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

                </div>
              </div>
