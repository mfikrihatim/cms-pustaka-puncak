<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Jenis Produk</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataJenisProduk'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Jenis Produk</label>
					<input type="text" name="jenis_produk" class="form-control" placeholder="Jenis Produk" required>
				</div>

				<div class="form-group">
					<label>Kategori</label>
					<select class="form-control" name="kd_kategori" required>
						<option selected disabled>Kategori</option>
						<?php
						foreach ($nama_kategori as $ReadDS) {
						?>
							<option value="<?php echo $ReadDS->kd_kategori; ?>"><?php echo $ReadDS->nama_kategori; ?></option>
						<?php
						}
						?>
					</select>
				</div>

			</div>
			<!-- </div> -->
	</div>
	<input type="submit" name="btn_simpan" value="Simpan">
	</form>
</div>
</div>