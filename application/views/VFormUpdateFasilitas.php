<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data Fasilitas</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo site_url('Welcome/UpdateDataFasilitas'); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <div class="form-group">
                        <label>Nama Fasiitas</label>
                        <input type="hidden" name="id_fasilitas" class="form-control" value="<?php echo $detail['id_fasilitas']; ?>">
                        <input type="text" name="nama_fasilitas" value="<?php echo $detail['nama_fasilitas']; ?>" class="form-control"  required>
                    </div>
                    <div class="form-group">
		<label>Foto Sebelumnya</label><br>
				<div class="form-group">
				<?php 
				
				foreach($detail['foto_fasilitas'] as $foto){
					

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
		



                </div>
                <input type="submit" name="btn_simpan" value="Simpan">
        </form>
    </div>
</div>