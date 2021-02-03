<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Hotel</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataHotel'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				
				<div class="form-group">
					<label>Pilih Merchant</label>
					<input type="hidden" name="id_hotel" class="form-control"   value="<?php echo $detail['id_hotel']; ?>"required >
				
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
					<input type="text" name="nama_hotel" class="form-control"   value="<?php echo $detail['nama_hotel']; ?>"required>
				</div>
				
				<div class="form-group">
					<label>Alamat Hotel</label>
					<input type="text" name="alamat_hotel" class="form-control"   value="<?php echo $detail['alamat_hotel']; ?>"required >
				</div>
				<div class="form-group">
					<label>Telfon Hotel</label>
					<input type="number" name="tlp_hotel" class="form-control"  value="<?php echo $detail['tlp_hotel']; ?>" required >
				</div>
				<div class="form-group">
					<label>Email Hotel</label>
					<input type="email" name="email_hotel" class="form-control"  value="<?php echo $detail['email_hotel']; ?>" required >
				</div>
				<div class="form-group">
					
					<label>Pilih Fasilitas</label>
					

				 <?php
				 $data['DataFasilitas'] = $this->MSudi->GetDataWhere('tbl_fasilitas', 'is_active', 1)->result();
						 
				 foreach($DataFasilitas as $ReadDS){
									$ada = null;
									foreach($detail['id_fasilitas'] as $ids){
										if($ids == $ReadDS->id_fasilitas){
											$ada = $ids;
										}
									}
								 if (isset($ada)){
									 ?> 
									 <div class='form-group'>
									 <div class='checkbox'>
									 <label>
									 <input type='checkbox' id="id_fasilitas" name='id_fasilitas[]'  value='<?php echo $ReadDS->id_fasilitas; ?>' checked>
									 <?php echo $ReadDS->nama_fasilitas; ?>
									 </label>
									 </div>
									 <?php 
								 }else {
									 ?>
									<div class='form-group'>
									<div class='checkbox'>
									<label>
									<input type='checkbox' id="id_fasilitas" name='id_fasilitas[]'  value='<?php echo $ReadDS->id_fasilitas; ?>' >
									<?php echo $ReadDS->nama_fasilitas; ?>
									</label>
									</div>
									<?php
								 }								 	
						  ?>
										

									<?php
								  }
									// $no++;
									
									?>
										</div>
				</div>
		
			
				<div class="box-body pad">
              		<label>Keterangan Hotel</label>
                    <textarea id="editor1" name="keterangan_hotels" rows="10" cols="80">
					<?php echo $detail['keterangan_hotels']; ?>             
					</textarea>
				</div>
					<!-- <label>Upload Image</label>
					<input type="file" name="userfile"><br> -->
					<input type="hidden" name="updated_by" class="form-control"  required>
					<input type="hidden" name="updated_date" class="form-control"  required>
					
					<div class="form-group">
					<label>Price</label>
					<input type="number" name="price" class="form-control" value="<?php echo $detail['price']; ?>" required>
				</div>
				<div class="form-group">
					<label>Custom Price</label>
					<input type="hidden" name="id_payment" class="form-control"   value="<?php echo $detail['id_payment']; ?>"required >
					<input type="number" name="custom_price" class="form-control" value="<?php echo $detail['custom_price']; ?>" required>
                </div>
				<div class="form-group">
					<label>Currency</label>
					<input type="text" name="currency" class="form-control" value="<?php echo $detail['currency']; ?>" required>
				</div>
				<div class="form-group">
					<label>Start Date</label>
					<input type="date" name="start" class="form-control" value="<?php echo $detail['start']; ?>" required>
                </div>
                <div class="form-group">
					<label>End Date</label>
					<input type="date" name="end" class="form-control" value="<?php echo $detail['end']; ?>" required>
				</div>
				<input type="hidden" name="id_availability" class="form-control value="<?php echo $detail['id_availability']; ?>">
         

				<input type="hidden" name="id_hotel1" class="form-control"  value="<?php echo $detail['id_hotel']; ?>">
				
        <div class="form-group">
		<label>Foto Sebelumnya</label><br>
				<div class="form-group">
				<?php 
				
				foreach($detail['foto_hotel'] as $foto){
					

				?>
				<img src="<?php  echo $foto;  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
				<?php 
				}
				?>
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file[]" multiple="multiple"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>
				<div class="form-group">
                <img src="<?php  echo $detail['foto_profile_hotel'];  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>

                
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="fileprofile"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				<input type="hidden" name="is_active" class="form-control" value="1">
                <!-- </div> -->
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
<!-- <script>
	function eventHotel(){
		var id_merchant = document.getElementById('id_merchant').value;
		window.location = "http://localhost:8080/cms-pustaka-puncak/index.php/Welcome/VFormAddHotel" + "?id_merchant=" + id_merchant;
	}
</script> -->