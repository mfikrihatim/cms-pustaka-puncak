<div class="row">
        <div class="col-xs-12">
          <div class="box">
           <div class="box-header">
              <h3 class="box-title"> Data Merchant</h3>
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
                  <th>ID Merchant</th>
                  <th>Nama Merchant</th>
                  <th>Alamat Merchant</th>
                  <th>Telfon Merchant</th>
                  <th>Email Merchant</th>
                  <th>Deskripsi Merchant</th>
                  <th>Foto Merchant</th>
                  <th>Created By</th>
                  <th>Created Date</th>
                  <th>Updated By</th>
                  <th>Updated Date</th>
                  <th>Deleted By</th>
                  <th>Deleted Date</th>
                  <th>Is Active</th>
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataMerchant))
	{
		foreach($DataMerchant as $ReadDS)
		{
	?>
      <tr>
         <td><?php echo $ReadDS->id_merchant; ?></td>
         <td><?php echo $ReadDS->nama_merchant; ?></td>
         <td><?php echo $ReadDS->alamat_merchant; ?></td>
         <td><?php echo $ReadDS->tlp_merchant; ?></td>
         <td><?php echo $ReadDS->email_merchant; ?></td>
         <td><?php echo $ReadDS->desc_merchant; ?></td>
         <td ><img width="50px" height="50px" src="<?php echo $ReadDS->foto_merchant; ?>"></td>        
         <td><?php echo $ReadDS->created_by; ?></td>
         <td><?php echo $ReadDS->created_date; ?></td>
         <td><?php echo $ReadDS->updated_by; ?></td>
         <td><?php echo $ReadDS->updated_date; ?></td>
         <td><?php echo $ReadDS->deleted_by; ?></td>
         <td><?php echo $ReadDS->deleted_date; ?></td>
         <td><?php echo $ReadDS->is_active; ?></td>
           <td>
					<a href="<?php echo site_url('Welcome/DataMerchant/'.$ReadDS->id_merchant.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataMerchant/'.$ReadDS->id_merchant) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
		<h3 class="box-title">Tambah Data Merchant</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataMerchant'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Nama Merchant</label>
					<input type="text" name="nama_merchant" class="form-control" placeholder="Masukan Nama Merchant" required>
				</div>
        <div class="form-group">
					<label>Alamat Merchant</label>
					<input type="text" name="alamat_merchant" class="form-control" placeholder="Masukan Alamat" required>
				</div>
				
					<!-- <label>Upload Image</label>
					<input type="file" name="userfile"><br> -->

					
					<div class="form-group">
					<label>Telfon Merchant</label>
					<input type="number" name="tlp_merchant" class="form-control" placeholder="Masukan Nomer telfon" required>
				</div>

				<div class="form-group">
					<label>Email Merchant</label>
					<input type="email" name="email_merchant" class="form-control" placeholder="Masukan Email" required>
        </div>
        
        <div class="box-body pad">
              		<label>Deskripsi Merchnat</label>
                    <textarea id="editor1" name="desc_merchant" rows="10" cols="80">
                                            
					</textarea>
				</div>
        <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				<input type="hidden" name="is_active" class="form-control" value="1">
                <!-- </div> -->
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
