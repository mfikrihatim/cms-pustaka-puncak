<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Data Kamar Hotel</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataKamarHotel'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				
				<div class="form-group">
					<label>Pilih Merchant</label>
					<input type="hidden" name="id_kamar" class="form-control"   value="<?php echo $detail['id_kamar']; ?>"required >
				
					<select class="form-control" name="id_hotel" required>
						<option selected disabled>Pilih Hotel</option>
            <?php
            $nama_hotel=$this->MSudi->GetDataWhere('tbl_hotel', 'is_active', 1)->result();
							foreach($nama_hotel as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_hotel; ?>"><?php echo $ReadDS->nama_hotel; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
				 <div class="form-group">
					<label>Nama Kamar Hotel</label>
					<input type="text" name="nama_kamar" class="form-control"   value="<?php echo $detail['nama_kamar']; ?>"required>
				</div>
				
				<div class="form-group">
					<label>Jumlah Kamar</label>
					<input type="number" name="jumlah_kamar" class="form-control"   value="<?php echo $detail['jumlah_kamar']; ?>"required >
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
              		<label>Keterangan Kamar Hotel</label>
                    <textarea id="editor1" name="keterangan_kamar" rows="10" cols="80">
					<?php echo $detail['keterangan_kamar']; ?>             
					</textarea>
				</div>
                <div class="form-group">
					<label>Max Tamu</label>
					<input type="number" name="max_tamu" class="form-control"   value="<?php echo $detail['max_tamu']; ?>"required >
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
				<input type="hidden" name="id_kamar_hotel1" class="form-control"  value="<?php echo $detail['id_kamar']; ?>">
				
        <div class="form-group">
		<label>Foto Sebelumnya</label><br>
				<div class="form-group">
				<?php 
				
				foreach($detail['foto_kamar'] as $foto){
					

				?>
				<img src="<?php  echo $foto;  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
				<?php 
				}
				?>
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
<!-- <script>
	function eventKamarHotel(){
		var id_merchant = document.getElementById('id_merchant').value;
		window.location = "http://localhost:8080/cms-pustaka-puncak/index.php/Welcome/VFormAddKamarHotel" + "?id_merchant=" + id_merchant;
	}
</script> -->