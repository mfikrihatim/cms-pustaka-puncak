<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Principal</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataPrincipal'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
				
				
                <label>Foto Sebelumnya</label><br>
                <input type="hidden" name="kd_principal" class="form-control" value="<?php echo $detail['kd_principal']; ?>">
				
					<img src="<?php echo base_url('upload/principal/'). $detail['foto']; ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
					<label>Upload Image</label>
					<input type="file" name="userfile"><br>
				</div>
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>