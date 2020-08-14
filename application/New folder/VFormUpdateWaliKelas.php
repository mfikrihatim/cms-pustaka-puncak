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
		<form action="<?php echo site_url('Welcome/UpdateDataWaliKelas'); ?>" method="post" enctype="multipart/form-data">
			
                <div class="form-group">
					<label>Wali Kelas</label>
					<input type="hidden" name="kd_wali" value="<?php echo $detail['kd_wali']; ?>" class="form-control">
					<select class="form-control" name="kd_guru" required>
						<option selected disabled>Pilih Wali Kelas</option>
						<?php
							foreach($pegawai as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_pegawai; ?>" <?php if($detail['kd_pegawai'] == $ReadDS->kd_pegawai){ echo 'selected'; } ?>><?php echo $ReadDS->nama_pegawai; ?></option>
						<?php
							}
						?>
                  </select>
                  <div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kd_kelas" required>
						<option selected disabled>Pilih Kelas</option>
						<?php
							foreach($kelas as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_kelas; ?>" <?php if($detail['kd_kelas'] == $ReadDS->kd_kelas){ echo 'selected'; } ?>><?php echo $ReadDS->kelas; ?></option>
						<?php
							}
						?>
                  </select>

			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>