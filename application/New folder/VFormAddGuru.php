<form action="<?php echo site_url('Welcome/AddDataGuru'); ?>" method="post" enctype="multipart/form-data">
<!-- Staff -->
               <div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kd_pegawai" required>
						<option selected disabled>Pilih Pegawai</option>
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
					<select class="form-control" name="kd_pljrn" required>
						<option selected disabled>Pilih pelajaran</option>
						<?php
							foreach($pelajaran as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_pljrn; ?>"><?php echo $ReadDS->nama_pljrn; ?></option>
						<?php
							}
						?>
                  </select>
                </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>