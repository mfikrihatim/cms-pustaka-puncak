<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Kamar Hotel</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataKamarHotel'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Pilih Hotel</label>
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
					<input type="text" name="nama_kamar" class="form-control" placeholder="Masukan Nama Kamar"required >
				</div>
				
				<div class="form-group">
					<label>Jumlah Kamar</label>
					<input type="number" name="jumlah_kamar" class="form-control" placeholder="Masukan Jumlah Kamar"required >
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
              		<label>Keterangan Kamar</label>
                    <textarea id="editor1" name="keterangan_kamar" rows="10" cols="80">
                                            
					</textarea>
                </div>
                <div class="form-group">
					<label>Max Tamu</label>
					<input type="number" name="max_tamu" class="form-control" placeholder="Masukan Max Tamu"required >
				</div>
					<!-- <label>Upload Image</label>
					<input type="file" name="userfile"><br> -->
					<input type="hidden" name="created_by" class="form-control"  required>
					<input type="hidden" name="created_date" class="form-control"  required>
					
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
				<input type="hidden" name="id_kamar_hotel1" class="form-control">
				<!-- <div class="form-group">
          <label>Tahun Ajaran</label>
          <select class="form-control" name="availability_year" required>
            <option selected disabled>Pilih Tahun</option>
            <?php
              for($i = 2020; $i <= 2030; $i++){
            ?>
            <option><?php echo $a = $i+1; ?></option>
            <?php
              }
            ?>
                  </select>
                </div>
                <div class="form-group">
					<label>Availability Month</label>
					<input type="date" name="availability_month" class="form-control" required>
                </div>
                <div class="form-group">
					<label>Availability date</label>
					<input type="date" name="availability_date" class="form-control" required>
				</div>
				<input type="hidden" name="id_availability1" class="form-control"> -->
           <div class="form-group">
                  <label for="exampleInputFile">Masukan Foto Kamar</label>
                  <input type="file" name="file[]" multiple="multiple"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>
				<br>
                <!-- <div class="form-group">
                  <label for="exampleInputFile">Masukan Foto Profile Kamar</label>
                  <input type="file" name="file"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                <!-- </div>  -->
				<input type="hidden" name="is_active" class="form-control" value="1">
                </div>
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
