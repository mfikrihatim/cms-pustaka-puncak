<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Daftar Ulang</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataDaftarUlang'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="hidden" name="kd_daftar_ulang" value="<?php echo $detail['kd_daftar_ulang']; ?>" class="form-control">
					<select class="form-control" name="nis" required>
						<option selected disabled>Pilih Nama Siswa</option>
						<?php
							foreach($siswa as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->nis; ?>" <?php if($detail['nis'] == $ReadDS->nis){ echo 'selected'; } ?>><?php echo $ReadDS->nama_siswa; ?></option>
						<?php
							}
						?>
                  </select>
                </div>
                <div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kd_kelas" required>
						<option selected disabled>Pilih Kelas</option>
						<?php
							foreach($kelas as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_kelas; ?>" <?php if($detail['kd_kelas'] == $ReadDS->kd_kelas){ echo 'selected'; } ?>><?php echo $ReadDS->kelas. ' '. $ReadDS->jurusan; ?></option>
						<?php
							}
						?>
                  </select>
                </div>
                <div class="form-group">
					<label>Wali Kelas</label>
					<select class="form-control" name="kd_wali" required>
						<option selected disabled>Pilih Wali Kelas</option>
						<?php
							foreach($wali as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_wali; ?>" <?php if($detail['kd_wali'] == $ReadDS->kd_wali){ echo 'selected'; } ?>><?php echo $ReadDS->nama_pegawai. ' | '. $ReadDS->kelas. ' '. $ReadDS->jurusan; ?></option>
						<?php
							}
						?>
                  </select>
                </div>
                <div class="form-group">
					<label>Tahun Angkatan</label>
					<select class="form-control" name="thn_angkatan" required>
						<option selected disabled>Pilih Tahun Angkatan</option>
						<?php
							for($i = 2014; $i <= 2029; $i++){
						?>
						<option <?php if($detail['thn_angkatan'] == $i){ echo 'selected'; } ?>><?php echo $i; ?></option>
						<?php
							}
						?>
                  </select>
                </div>
                <div class="form-group">
					<label>Tahun Ajaran</label>
					<select class="form-control" name="thn_ajaran" required>
						<option selected disabled>Pilih Tahun Ajaran</option>
						<?php
							for($i = 2014; $i <= 2029; $i++){
						?>
						<option <?php if($detail['thn_ajaran'] == $i){ echo 'selected'; } ?>><?php echo $i. '/'. $a = $i+1; ?></option>
						<?php
							}
						?>
                  </select>
                </div>
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>