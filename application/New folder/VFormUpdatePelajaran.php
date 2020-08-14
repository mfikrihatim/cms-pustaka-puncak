<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Pegawai</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataPelajaran'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label>Nama Pelajaran</label>
					<input type="hidden" name="kd_pljrn" value="<?php echo $detail['kd_pljrn']; ?>" class="form-control">
					<input type="text" name="nama_pljrn" value="<?php echo $detail['nama_pljrn']; ?>" class="form-control" placeholder="Masukan Pelajaran"  required>
				</div>
				
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>