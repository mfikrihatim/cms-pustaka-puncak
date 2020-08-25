	
  <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Update Data Payment Method</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataPaymentMethod'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">

				<div class="form-group">
                    <label>Payment Method</label>
                    <input type="hidden" name="id_payment_method" class="form-control" value="<?php echo $detail['id_payment_method']; ?>" required>
              
                   <input type="text" name="nama_payment_method" class="form-control" value="<?php echo $detail['nama_payment_method']; ?>" required>
                </div>
					
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>