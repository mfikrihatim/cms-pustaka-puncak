<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Merchant</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataMerchant'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<div class="form-group">
				
				<div class="form-group">
					<label>Nama Merchant</label>
					<input type="hidden" name="id_merchant" class="form-control" value="<?php echo $detail['id_merchant']; ?>">
				
					<input type="text" name="nama_merchant" class="form-control" value="<?php echo $detail['nama_merchant']; ?>" required>
				</div>
        		<div class="form-group">
					<label>Alamat Merchant</label>
					<input type="text" name="alamat_merchant" class="form-control" value="<?php echo $detail['alamat_merchant']; ?>" required>
				</div>
				<div class="form-group">
					<label>Telfon Merchant</label>
					<input type="number" name="tlp_merchant" class="form-control" value="<?php echo $detail['tlp_merchant']; ?>" required>
				</div>

				<div class="form-group">
					<label>Email Merchant</label>
					<input type="email" name="email_merchant" class="form-control" value="<?php echo $detail['email_merchant']; ?>" required>
        </div>
        
        <div class="box-body pad">
              		<label>Deskripsi Merchnat</label>
                    <textarea id="editor1" name="desc_merchant" rows="10" cols="80">
					<?php echo $detail['desc_merchant']; ?>          
					</textarea>
				</div>
                <label>Foto Sebelumnya</label><br>
				<div class="form-group">
				<img src="<?php  echo $detail['foto_merchant'];  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
                
					<label>Upload Image</label>
					<input type="file" name="file"><br>
				</div>
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>