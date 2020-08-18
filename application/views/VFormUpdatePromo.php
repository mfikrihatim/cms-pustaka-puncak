<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Promo</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataPromo'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
			<div class="form-group">
					<label>Kode Promo</label>
					<input type="hidden" name="id_promo" class="form-control" value="<?php echo $detail['id_promo']; ?>">
					<input type="text" name="kode_promo" value="<?php echo $detail['kode_promo']; ?>" class="form-control" placeholder="Kode Promo" required>
					<!--  -->
				 </div>
				<div class="form-group">
					<label>Nama Promo</label>
					<input type="text" name="nama_promo" value="<?php echo $detail['nama_promo']; ?>" class="form-control" placeholder="Nama Produk" required>
				</div>

				<div class="box-body pad">
              		<label>Deskripsi Promo</label>
                    <textarea id="editor1" name="desc_promo" rows="10" cols="80" >
					<?php echo $detail['desc_promo']; ?>
                    </textarea>
            </div>
				<div class="form-group">
					<label>Promo Value</label>
					<input type="text" name="promo_value" value="<?php echo $detail['promo_value']; ?>" class="form-control" placeholder="Promo Value" required>
				</div>

				<div class="form-group">
					<label>Tipe Promo</label>
					<input type="text" name="tipe_promo" value="<?php echo $detail['tipe_promo']; ?>" class="form-control" placeholder="Deskripsi Promo" required>
				</div>
				
				<!-- <div class="form-group">
				<label>Foto Sebelumnnya</label><br>
                <img src="<?php echo base_url('upload/Promo/'). $detail['foto_promo']; ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="userfile"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div> -->
				<input type="hidden" name="is_active" class="form-control" value="1">
				
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>