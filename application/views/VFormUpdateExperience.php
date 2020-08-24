
  <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Update Data Experience</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataExperience'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
            <div class="form-group">
					<label>Judul Experience</label>
                    <input type="hidden" name="id_exp" class="form-control" value="<?php echo $detail['id_exp']; ?>" required>
                    <input type="text" name="judul_exp" class="form-control" value="<?php echo $detail['judul_exp']; ?>" required>
                </div>
            <div class="form-group">
					<label>Pilih Tipe Experience</label>
					<select class="form-control" name="id_tipe_exp" required>
						<option selected disabled>Pilih Tipe Experience</option>
            <?php
            $nama_tipe_exp=$this->MSudi->GetDataWhere('tbl_tipe_exp', 'is_active', 1)->result();
							foreach($nama_tipe_exp as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_tipe_exp; ?>"><?php echo $ReadDS->nama_tipe_exp; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
				<div class="form-group">
					<label>Tipe Trip Experience</label>
					<input type="text" name="tipe_trip_exp" class="form-control" value="<?php echo $detail['tipe_trip_exp']; ?>" required>
                </div>
                <div class="box-body pad">
              		<label>Deskripsi Experience</label>
                    <textarea id="editor1" name="desc_exp" rows="10" cols="80">
                    <?php echo $detail['desc_exp']; ?>                    
					</textarea>
                </div>
                <div class="form-group">
					<label>Max Guest Experience</label>
					<input type="number" name="max_guest_exp" class="form-control" value="<?php echo $detail['max_guest_exp']; ?>" required>
                </div>
                <div class="form-group">
					<label>Itinerary Experience</label>
					<input type="text" name="itinerary_exp" class="form-control" value="<?php echo $detail['itinerary_exp']; ?>" required>
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
               
			
                <div class="form-group">
					<label>Inclusion Experience</label>
					<input type="text" name="inclusion_exp" class="form-control" value="<?php echo $detail['inclusion_exp']; ?>" required>
                </div>
                <div class="form-group">
					<label>Rules Experience</label>
					<input type="text" name="rules_exp" class="form-control" value="<?php echo $detail['rules_exp']; ?>" required>
                </div>
                <div class="form-group">
					<label>Lokasi Experience</label>
					<input type="text" name="lokasi_exp" class="form-control" value="<?php echo $detail['lokasi_exp']; ?>" required>
                </div>

                <div class="form-group">
					<label>Durasi Experience</label>
					<input type="text" name="durasi_exp" class="form-control" value="<?php echo $detail['durasi_exp']; ?>" required>
                </div>
                <div class="form-group">
					<label>Pilih Minimum Booking</label>
					<select class="form-control" name="id_minimum_booking" required>
						<option selected disabled>Pilih Minimum Booking</option>
            <?php
            $id_minimum_booking=$this->MSudi->GetDataWhere('tbl_minimum_booking', 'is_active', 1)->result();
							foreach($id_minimum_booking as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_minimum_booking; ?>"><?php echo $ReadDS->id_minimum_booking; ?></option>
						<?php
							}
						?>
                  </select>
				 </div>
                
                
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
                
               
                <input type="hidden" name="updated_by" class="form-control"  required>
                    <input type="hidden" name="updated_date" class="form-control"  required>
                    <div class="form-group">
		<label>Foto Sebelumnya</label><br>
				<div class="form-group">
				<img src="<?php  echo $detail['foto_experience'];  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
                
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				<input type="hidden" name="is_active" class="form-control" value="1">
				
					
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
      </div>