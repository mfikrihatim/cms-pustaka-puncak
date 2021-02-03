<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Data Tipe Experience</h3>
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
                            <th>ID Tipe Experience</th>
                            <th>Nama Tipe Experience</th>
                            <th>IS ACTIVE</th>
                            <th>Tools</th>
                        </tr>
                        <?php
                        if (!empty($DataTipeExperience)) {
                            foreach ($DataTipeExperience as $ReadDS) {
                        ?>
                                <tr>
                                    <td><?php echo $ReadDS->id_tipe_exp; ?></td>
                                    <td><?php echo $ReadDS->nama_tipe_exp; ?></td>
                                    <td><?php echo $ReadDS->is_active; ?></td>

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataTipeExperience/' . $ReadDS->id_tipe_exp . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataTipeExperience/' . $ReadDS->id_tipe_exp) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
		<h3 class="box-title">Tambah Data Tipe Experience</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataTipeExperience'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Nama Tipe Experience</label>
					<input type="text" name="nama_tipe_exp" class="form-control" placeholder="Masukan Tipe Experience" required>
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
