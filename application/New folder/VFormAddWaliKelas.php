<form action="<?php echo site_url('Welcome/AddDataWaliKelas'); ?>" method="post" enctype="multipart/form-data">
<!-- Staff -->
               <div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kd_guru" required>
						<option selected disabled>Pilih Guru</option>
						<?php
							foreach($pegawai as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_pegawai; ?>"><?php echo $ReadDS->nama_pegawai; ?></option>
						<?php
							}
						?>
                  </select>
                </div>
                <div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kd_kelas" required>
						<option selected disabled>Pilih pelajaran</option>
						<?php
							foreach($kelas as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_kelas; ?>"><?php echo $ReadDS->kelas; ?></option>
						<?php
							}
						?>
                  </select>
                </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>