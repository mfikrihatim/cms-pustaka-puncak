	
  <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Update Data Minimum Booking</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataMinimumBooking'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				
                <div class="box-body pad">
              		<label>Keterangan Hotel</label>
                    <input type="hidden" name="id_minimum_booking" class="form-control" value="<?php echo $detail['id_minimum_booking']; ?>" required>
                    <textarea id="editor1" name="desc_minimum_booking" rows="10" cols="80">
					<?php echo $detail['desc_minimum_booking']; ?>             
					</textarea>
				</div>
				<div class="form-group">
                    <label>Minimum Booking</label>
                   <input type="number" name="minimum_booking_ammount" class="form-control" value="<?php echo $detail['minimum_booking_ammount']; ?>" required>
                </div>
					
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>