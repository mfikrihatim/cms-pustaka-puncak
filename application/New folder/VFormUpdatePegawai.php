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
		<form action="<?php echo site_url('Welcome/UpdateDataPegawai'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label>NIK</label>
					<input type="hidden" name="kd_pegawai" value="<?php echo $detail['kd_pegawai']; ?>" class="form-control">
					<input type="number" name="nik" value="<?php echo $detail['nik']; ?>" class="form-control" placeholder="Masukan NIK Pegawai"  required>
				</div>
				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="nama_pegawai" value="<?php echo $detail['nama_pegawai']; ?>" class="form-control" placeholder="Masukan Nama Pegawai" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<div class="radio">
						<label>
							<input type="radio" value="Laki-Laki" name="jk" id="optionsRadios1" <?php if($detail['jk'] == "Laki-Laki"){ echo 'checked'; } ?> required>
							Laki-Laki
						</label>
						<label>
							<input type="radio" value="Perempuan" name="jk" id="optionsRadios1" <?php if($detail['jk'] == "Perempuan"){ echo 'checked'; } ?> required>
							Perempuan
						</label>
					</div>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tmpt_lahir" value="<?php echo $detail['tmpt_lahir']; ?>" class="form-control" placeholder="Masukan Tempat Lahir Pegawai" required>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" value="<?php echo $detail['tgl_lahir']; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Agama</label>
					<select class="form-control" name="agama" required>
						<option selected disabled>Pilih Agama Pegawai</option>
						<option <?php if($detail['agama'] == "Islam"){ echo 'selected'; } ?>>Islam</option>
						<option <?php if($detail['agama'] == "Kristen Protestan"){ echo 'selected'; } ?>>Kristen Protestan</option>
						<option <?php if($detail['agama'] == "KristenKatolik"){ echo 'selected'; } ?>>KristenKatolik</option>
						<option <?php if($detail['agama'] == "Hindu"){ echo 'selected'; } ?>>Hindu</option>
						<option <?php if($detail['agama'] == "Budha"){ echo 'selected'; } ?>>Budha</option>
                  </select>
                </div>
				<div class="form-group">
					<label>Alamat Pegawai</label>
					<!-- <input type="text" name="tmpt" class="form-control" placeholder="Masukan Tempat Lahir Siswa"> -->

					<textarea class="form-control" rows="3" name="alamat"  placeholder="Masukan Alamat Pegawai" required><?php echo $detail['alamat']; ?></textarea>
				</div>
				<div class="form-group">
					<label>Status Nikah</label>
					<div class="radio">
						<label>
							<input type="radio" value="Menikah" name="status_nikah" id="optionsRadios1" <?php if($detail['status_nikah'] == "Menikah"){ echo 'checked'; } ?> required>
							Menikah
						</label>
						<label>
							<input type="radio" value="Belum Menikah" name="status_nikah" id="optionsRadios1" <?php if($detail['status_nikah'] == "Belum Menikah"){ echo 'checked'; } ?> required>
							Belum Menikah
						</label>
					</div>
				</div>
				<div class="form-group">
					<label>Pendidikan Terakhir</label>
					<select class="form-control" name="pend_akhir" required>
						<option selected disabled>Pilih Pendidikan Terakhir</option>
						<option <?php if($detail['pend_akhir'] == "SD"){ echo 'selected'; } ?>>SD</option>
						<option <?php if($detail['pend_akhir'] == "SMP"){ echo 'selected'; } ?>>SMP</option>
						<option <?php if($detail['pend_akhir'] == "SMA"){ echo 'selected'; } ?>>SMA</option>
						<option <?php if($detail['pend_akhir'] == "SMK"){ echo 'selected'; } ?>>SMK</option>
						<option <?php if($detail['pend_akhir'] == "D1"){ echo 'selected'; } ?>>D1</option>
						<option <?php if($detail['pend_akhir'] == "D2"){ echo 'selected'; } ?>>D2</option>
						<option <?php if($detail['pend_akhir'] == "D3"){ echo 'selected'; } ?>>D3</option>
						<option <?php if($detail['pend_akhir'] == "S1"){ echo 'selected'; } ?>>S1</option>
						<option <?php if($detail['pend_akhir'] == "S2"){ echo 'selected'; } ?>>S2</option>
						<option <?php if($detail['pend_akhir'] == "S3"){ echo 'selected'; } ?>>S3</option>


                  </select>
                </div>
                <div class="form-group">
					<label>Pangkat Pegawai</label>
					<select class="form-control" name="pangkat" required>
						<option selected disabled>Pilih Pangkat Pegawai</option>
						<option <?php if($detail['pangkat'] == "I/a"){ echo 'selected'; } ?>>I/a</option>
						<option <?php if($detail['pangkat'] == "I/b"){ echo 'selected'; } ?>>I/b</option>
						<option <?php if($detail['pangkat'] == "II/a"){ echo 'selected'; } ?>>II/a</option>
						<option <?php if($detail['pangkat'] == "II/b"){ echo 'selected'; } ?>>II/b</option>
						<option <?php if($detail['pangkat'] == "III/a"){ echo 'selected'; } ?>>iiI/a</option>
						<option <?php if($detail['pangkat'] == "III/b"){ echo 'selected'; } ?>>III/b</option>
						<option <?php if($detail['pangkat'] == "IV/a"){ echo 'selected'; } ?>>IV/a</option>
						<option <?php if($detail['pangkat'] == "IV/b"){ echo 'selected'; } ?>>IV/b</option>
						<option <?php if($detail['pangkat'] == "V/a"){ echo 'selected'; } ?>>V/a</option>
                  </select>
                </div>
                <!-- <div class="form-group"> -->
					<label>Upload Foto Pegawai</label>
					<input type="file" name="userfile"><br><img src="<?php echo base_url('Upload/pegawai/'). $detail['foto_pegawai'] ?>" width="auto" height="100px">
                <!-- </div> -->
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>