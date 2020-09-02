<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Update Data Artikel</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataArtikel'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
                    <label>Judul Artikel</label>
                    <input type="hidden" name="id_artikel" class="form-control" value="<?php echo $detail['id_artikel']; ?>" required>
					<input type="text" name="judul_artikel" class="form-control" value="<?php echo $detail['judul_artikel']; ?>" required>
                </div>
                <div class="box-body pad">
              		<label>Deskripsi Artikel</label>
                    <textarea id="editor1" name="desc_artikel" rows="10" cols="80">
                    <?php echo $detail['desc_artikel']; ?>               
					</textarea>
				</div>
				<div class="form-group">
					<label>Pilih Kategori Artikel</label>
					<select class="form-control" name="id_kategori" required>
						<option selected disabled>Pilih Kategori Artikel</option>
            <?php
            $id_kategori=$this->MSudi->GetData('tbl_kategori_artikel');
							foreach($id_kategori as $ReadDS){
						?>
						<option value="<?php echo $ReadDS->id_kategori_artikel; ?>"><?php echo $ReadDS->nama_kategori_artikel; ?></option>
						<?php
							}
						?>
                  </select>
                 </div>
                 
				 <div class="form-group">
		<label>Foto Sebelumnya</label><br>
				<div class="form-group">
				<?php 
				
				foreach($detail['foto_artikel'] as $foto){
					

				?>
				<img src="<?php  echo $foto;  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
				<?php 
				}
				?>
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file[]" multiple="multiple"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
               
                <input type="hidden" name="updated_by" class="form-control"  required>
					<input type="hidden" name="updated_date" class="form-control"  required>
					
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>