<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 class="box-title">DATA PROMO</h2>
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
              <th>ID PROMO</th>
              <th>KODE PROMO</th>
              <th>NAMA PROMO</th>
              <th>DESKRIPSI PROMO</th>
              <th>PROMO VALUE</th>
              <th>TIPE PROMO</th>
              <th>FOTO PROMO</th>
              <th>ACTIVE</th>
              <th>Tools</th>
            </tr>
            <?php
            if (!empty($DataPromo)) {
              foreach ($DataPromo as $ReadDS) {
            ?>
                <tr>
                  <td><?php echo $ReadDS->id_promo; ?></td>
                  <td><?php echo $ReadDS->kode_promo; ?></td>
                  <td><?php echo $ReadDS->nama_promo; ?></td>
                  <td><?php echo $ReadDS->desc_promo; ?></td>
                  <td><?php echo $ReadDS->promo_value; ?></td>
                  <td><?php echo $ReadDS->tipe_promo; ?></td>
                  <td ><img width="50px" height="50px" src="<?php echo $ReadDS->foto_promo; ?>"></td> 
                   <td><?php echo $ReadDS->is_active; ?></td>
                  <td>
                    <a href="<?php echo site_url('Welcome/DataPromo/' . $ReadDS->id_promo . '/view') ?>"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('Welcome/DeleteDataPromo/' . $ReadDS->id_promo) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
		<h3 class="box-title">Tambah Data Promo</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataPromo'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Kode Promo</label>
					<input type="text" name="kode_promo" class="form-control" placeholder="Kode Promo" required>
				</div>
				<div class="form-group">
					<label>Nama Promo</label>
					<input type="text" name="nama_promo" class="form-control" placeholder="Nama Promo" required>
				</div>
				<div class="box-body pad">
              		<label>Deskripsi Promo</label>
                    <textarea id="editor1" name="desc_promo" rows="10" cols="80">
                                            
					</textarea>
				</div>
					<!-- <label>Upload Image</label>
					<input type="file" name="userfile"><br> -->

					
					<div class="form-group">
					<label>Promo Value</label>
					<input type="text" name="promo_value" class="form-control" placeholder="Promo Value" required>
				</div>

				<div class="form-group">
					<label>Tipe Promo</label>
					<input type="text" name="tipe_promo" class="form-control" placeholder="Tipe Promo" required>
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
