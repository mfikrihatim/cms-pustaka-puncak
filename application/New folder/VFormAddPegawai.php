<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Pegawai</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataPegawai'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
					<label>NIK</label>
					<input type="number" name="nik" class="form-control" placeholder="Masukan NIK Pegawai" required>
				</div>
				<div class="form-group">
					<label>Nama Pegawai</label>
					<input type="text" name="nama_pegawai" class="form-control" placeholder="Masukan Nama Pegawai" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<div class="radio">
						<label>
							<input type="radio" value="Laki-Laki" name="jk" id="optionsRadios1" required>
							Laki-Laki
						</label>
						<label>
							<input type="radio" value="Perempuan" name="jk" id="optionsRadios1" required>
							Perempuan
						</label>
					</div>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tmpt_lahir" class="form-control" placeholder="Masukan Tempat Lahir Pegawai" required>
				</div>
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Agama</label>
					<select class="form-control" name="agama" required>
						<option selected disabled>Pilih Agama Pegawai</option>
						<option>Islam</option>
						<option>Kristen Protestan</option>
						<option>KristenKatolik</option>
						<option>Hindu</option>
						<option>Budha</option>
                  </select>
                </div>
				<div class="form-group">
					<label>Alamat Pegawai</label>
					<!-- <input type="text" name="tmpt" class="form-control" placeholder="Masukan Tempat Lahir Siswa"> -->
					<textarea class="form-control" rows="3" name="alamat" placeholder="Masukan Alamat Pegawai" required></textarea>
				</div>
				<div class="form-group">
					<label>Status Nikah</label>
					<div class="radio">
						<label>
							<input type="radio" value="Menikah" name="status_nikah" id="optionsRadios1" required>
							Menikah
						</label>
						<label>
							<input type="radio" value="Belum Menikah" name="status_nikah" id="optionsRadios1" required>
							Belum Menikah
						</label>
					</div>
				</div>
				<div class="form-group">
					<label>Pendidikan Terakhir</label>
					<select class="form-control" name="pend_akhir" required>
						<option selected disabled>Pilih Pendidikan Terakhir</option>
						<option>SD</option>
						<option>SMP</option>
						<option>SMA</option>
						<option>SMK</option>
						<option>D1</option>
						<option>D2</option>
						<option>D3</option>
						<option>D4</option>
						<option>S1</option>
						<option>S2</option>
						<option>S3</option>
                  </select>
                </div>
                <div class="form-group">
					<label>Pangkat Pegawai</label>
					<select class="form-control" name="pangkat" required>
						<option selected disabled>Pilih Pangkat Pegawai</option>
						<option>I/a</option>
						<option>I/b</option>
						<option>II/a</option>
						<option>II/b</option>
						<option>III/a</option>
						<option>III/b</option>
						<option>IV/a</option>
						<option>IV/b</option>
						<option>V/a</option>
                  </select>
                </div>
                <!-- <div class="form-group"> -->
					<label>Upload Foto Pegawai</label>
					<input type="file" name="userfile"><br>
                <!-- </div> -->
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>