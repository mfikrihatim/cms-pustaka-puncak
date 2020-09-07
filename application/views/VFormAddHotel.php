<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Hotel</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataHotel'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Pilih Merchant</label>
					<select class="form-control" name="id_merchant" required>
						<option selected disabled>Pilih Merchant</option>
            <?php
            $nama_merchant=$this->MSudi->GetDataWhere('tbl_merchant', 'is_active', 1)->result();
							foreach($nama_merchant as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_merchant; ?>"><?php echo $ReadDS->nama_merchant; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
         <div class="form-group">
					<label>Nama Hotel</label>
					<input type="text" name="nama_hotel" class="form-control" placeholder="Masukan Nama Hotel"required >
				</div>
				
				<div class="form-group">
					<label>Alamat Hotel</label>
					<input type="text" name="alamat_hotel" class="form-control" placeholder="Masukan Alamat"required >
				</div>
				<div class="form-group">
					<label>Telfon Hotel</label>
					<input type="number" name="tlp_hotel" class="form-control" placeholder="Masukan No Telfon Hotel" required >
				</div>
				<div class="form-group">
					<label>Email Hotel</label>
					<input type="email" name="email_hotel" class="form-control" placeholder="Masukan Email" required >
				</div>
				
				<div class="form-group">
					
					<label>Pilih Fasilitas</label>
					

				 <?php
				 $data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
							  foreach($DataFasilitas as $ReadDS){
						  ?>
										
										<div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="id_fasilitas[]"  value="<?php echo $ReadDS->id_fasilitas; ?>">
					  <?php echo $ReadDS->nama_fasilitas; ?>
                    </label>
                  </div>
									<?php
									// $no++;
									}
									?>
										</div>
				</div>
			
				<div class="box-body pad">
              		<label>Keterangan Hotel</label>
                    <textarea id="editor1" name="keterangan_hotels" rows="10" cols="80">
                                            
					</textarea>
				</div>

				<div class="form-group">
					<label>Price</label>
					<input type="number" name="price" class="form-control" placeholder="Masukan Price" required>
				</div>
				<div class="form-group">
					<label>Custom Price</label>
					<input type="number" name="custom_price" class="form-control" placeholder="Masukan Custom Price" required>
                </div>
				<div class="form-group">
					<label>Currency</label>
					<input type="text" name="currency" class="form-control" placeholder="Masukan Currency" required>
				</div>
				<input type="hidden" name="id_hotel1" class="form-control">
				
					<!-- <label>Upload Image</label>
					<input type="file" name="userfile"><br> -->
					<input type="hidden" name="created_by" class="form-control"  required>
					<input type="hidden" name="created_date" class="form-control"  required>
					
        <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file[]" multiple="multiple"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				<input type="hidden" name="is_active" class="form-control" value="1">
                <!-- </div> -->
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
