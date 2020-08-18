<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Promo</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataPromo'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Kode Promo</label>
					<input type="text" name="kode_promo" class="form-control" placeholder="Kode Promo" required>
				</div>
				<div class="form-group">
					<label>Nama Promo</label>
					<input type="text" name="nama_promo" class="form-control" placeholder="Nama Promo" required>
				</div>
				<div class="box-body pad">
              		<label>Deskripsi Promo</label>
                    <textarea id="editor1" name="desc_promo" rows="10" cols="80">
                                            
					</textarea>
				</div>
					<!-- <label>Upload Image</label>
					<input type="file" name="userfile"><br> -->

					
					<div class="form-group">
					<label>Promo Value</label>
					<input type="text" name="promo_value" class="form-control" placeholder="Promo Value" required>
				</div>

				<div class="form-group">
					<label>Tipe Promo</label>
					<input type="text" name="tipe_promo" class="form-control" placeholder="tipe_promo" required>
				</div>
				
				<input type="hidden" name="is_active" class="form-control" value="1">
                <!-- </div> -->
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>