<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Guru</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataGuru'); ?>" method="post" enctype="multipart/form-data">
			
                <div class="form-group">
					<label>Pegawai</label>
					<input type="hidden" name="kd_guru" value="<?php echo $detail['kd_guru']; ?>" class="form-control">
					<select class="form-control" name="kd_pegawai" required>
						<option selected disabled>Pilih Pegawai</option>
						<?php
							foreach($pegawai as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_pegawai; ?>" <?php if($detail['kd_pegawai'] == $ReadDS->kd_pegawai){ echo 'selected'; } ?>><?php echo $ReadDS->nama_pegawai; ?></option>
						<?php
							}
						?>
                  </select>
                  <div class="form-group">
					<label>Pelajaran</label>
					<select class="form-control" name="kd_pljrn" required>
						<option selected disabled>Pilih Pelajaran</option>
						<?php
							foreach($pelajaran as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_pljrn; ?>" <?php if($detail['kd_pljrn'] == $ReadDS->kd_pljrn){ echo 'selected'; } ?>><?php echo $ReadDS->nama_pljrn; ?></option>
						<?php
							}
						?>
                  </select>

			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>