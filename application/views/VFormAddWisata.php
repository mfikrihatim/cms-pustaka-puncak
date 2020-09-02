
  <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Wisata</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataWisata'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
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
					<label>Nama Wisata</label>
					<input type="text" name="nama_wisata" class="form-control" placeholder="Masukan Nama Wisata" required>
                </div>
                <div class="form-group">
					<label>Alamat Wisata</label>
					<input type="text" name="alamat_wisata" class="form-control" placeholder="Masukan Alamat Wisata" required>
                </div>
                <div class="form-group">
					<label>Telfon Wisata</label>
					<input type="number" name="tlp_wisata" class="form-control" placeholder="Masukan No Telfon Wisata" required>
                </div>
                <div class="form-group">
					<label>Email Wisata</label>
					<input type="email" name="email_wisata" class="form-control" placeholder="Masukan Email Wisata" required>
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
			
                <div class="form-group">
					<label>Durasi Wisata</label>
					<input type="text" name="durasi_wisata" class="form-control" placeholder="Masukan Durasi Wisata" required>
                </div>
                <div class="box-body pad">
              		<label>Keterangan Wisata</label>
                    <textarea id="editor1" name="keterangan_wisata" rows="10" cols="80">
                                            
					</textarea>
                </div>
                <input type="hidden" name="created_by" class="form-control"  required>
                    <input type="hidden" name="created_date" class="form-control"  required>
					<div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file[]" multiple="multiple"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				<input type="hidden" name="is_active" class="form-control" value="1">
				
					
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
      </div>