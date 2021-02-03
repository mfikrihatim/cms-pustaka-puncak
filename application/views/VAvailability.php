<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h2 class="box-title">DATA AVAILABILITY</h2>
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
              <th>ID AVAILABILITY</th>
              <th> AVAILABILITY YEAR</th>
              <th>AVAILABILITY MONTH</th>
              <th>AVAILABILITY DATE</th>
              <th>ID EXPERIENCE</th>
              <th>ID HOTEL</th>
              <th>ID CAMP</th>
              <th>ID WISATA</th>
              <th>ACTIVE</th>
              <th>Tools</th>
            </tr>
            <?php
            if (!empty($DataAvailability)) {
              foreach ($DataAvailability as $ReadDS) {
            ?>
                <tr>
                  <td><?php echo $ReadDS->id_availability; ?></td>
                  <td><?php echo $ReadDS->availability_year; ?></td>
                  <td><?php echo $ReadDS->availability_month; ?></td>
                  <td><?php echo $ReadDS->availability_date; ?></td>
                  <td><?php echo $ReadDS->id_exp; ?></td>
                  <td><?php echo $ReadDS->id_hotel; ?></td>
                  <td><?php echo $ReadDS->id_camp; ?></td> 
                  <td><?php echo $ReadDS->id_wisata; ?>"></td>
                   <td><?php echo $ReadDS->is_active; ?></td>
                  <td>
                    <a href="<?php echo site_url('Welcome/DataAvailability/' . $ReadDS->id_availability . '/view') ?>"><i class="fa fa-edit"></i></a>
                    <a href="<?php echo site_url('Welcome/DeleteDataAvailability/' . $ReadDS->id_availability) ?>"><i class="fa fa-fw fa-trash"></i></a>
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
		<h3 class="box-title">Tambah Data AVAILABILITY</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataAvailability'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Availability Year</label>
					<input type="date" name="availability_year" class="form-control" required>
				</div>
                <div class="form-group">
					<label>Availability Month</label>
					<input type="date" name="availability_month" class="form-control" required>
                </div>
                <div class="form-group">
					<label>Availability date</label>
					<input type="date" name="availability_date" class="form-control" required>
                </div>
                <div class="form-group">
                <label>Pilih Experience</label>
					<select class="form-control" name="id_exp" required>
						<option selected disabled>Pilih Experience</option>
            <?php
            $judul_exp=$this->MSudi->GetDataWhere('tbl_experience', 'is_active', 1)->result();
							foreach($judul_exp as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_exp; ?>"><?php echo $ReadDS->judul_exp; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
                 <div class="form-group">
                 <label>Pilih Hotel</label>
					<select class="form-control" name="id_hotel" required>
						<option selected disabled>Pilih Hotel</option>
            <?php
            $nama_hotel=$this->MSudi->GetDataWhere('tbl_hotel', 'is_active', 1)->result();
							foreach($nama_hotel as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_hotel; ?>"><?php echo $ReadDS->nama_hotel; ?></option>
						<?php
							}
						?>
                  </select>
                 </div>
                 <div class="form-group">
				 <label>Pilih Camp</label>
					<select class="form-control" name="id_camp" required>
						<option selected disabled>Pilih Camp</option>
            <?php
            $nama_camp=$this->MSudi->GetDataWhere('tbl_camp', 'is_active', 1)->result();
							foreach($nama_camp as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_camp; ?>"><?php echo $ReadDS->nama_camp; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
                 <div class="form-group">
                 <label>Pilih Wisata</label>
					<select class="form-control" name="id_wisata" required>
						<option selected disabled>Pilih Wisata</option>
            <?php
            $nama_wisata=$this->MSudi->GetDataWhere('tbl_wisata', 'is_active', 1)->result();
							foreach($nama_wisata as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_wisata; ?>"><?php echo $ReadDS->nama_wisata; ?></option>
						<?php
							}
						?>
                  </select>
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
