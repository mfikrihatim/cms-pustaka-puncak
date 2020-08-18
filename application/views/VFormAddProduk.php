<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Produk</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataProduk'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Jenis Produk</label>
					<select class="form-control" name="kd_jenis_produk" required>
						<option selected disabled>Jenis Produk</option>
						<?php
							foreach($jenis_produk as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->kd_jenis; ?>"><?php echo $ReadDS->jenis_produk; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
				
				<div class="form-group">
					<label>Nama Produk</label>
					<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
				</div>
				
					<label>Upload Image</label>
					<input type="file" name="userfile"><br>

					<div class="box-body pad">
              		<label>Keterangan</label>
                    <textarea id="editor1" name="keterangan" rows="10" cols="80">
                                            
                    </textarea>
            </div>
                <!-- </div> -->
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>