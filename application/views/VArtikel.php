<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Data Artikel</h3>
                <div class="box-header">
                <button type="button" class="btn btn-primary btn-fw" data-toggle="modal" data-target="#myModal"><div class="col-md-3 col-sm-4"></div></a>TAMBAH DATA</h3> </button>


                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID  Artikel</th>
                            <th>Judul Artikel</th>
                            <th>Deskripsi Artikel</th>
                            <th>ID Kategori</th>
                            <th>Foto Artikel</th>
                           
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Updated By</th>
                            <th>Updated Date</th>
                            <th>Deleted By</th>
                            <th>Deleted Date</th>
                            <th>IS ACTIVE</th>
                            <th>Tools</th>
                        </tr>
                        <?php
            if (!empty($DataArtikel)) {
              foreach ($DataArtikel as $ReadDS) {
                $arrayfotoartikel = json_decode($ReadDS->foto_artikel, TRUE);
                $fotos = $arrayfotoartikel;
            ?>
                                <tr>
                                    <td><?php echo $ReadDS->id_artikel; ?></td>
                                    <td><?php echo $ReadDS->judul_artikel; ?></td>
                                    <td><?php echo $ReadDS->desc_artikel; ?></td>
                                    <td><?php echo $ReadDS->id_kategori; ?></td>
                                    <td >
                  <?php 
				
				foreach($fotos as $foto){
				?>
				
        <img width="50px" height="50px" src="<?php echo $foto; ?>">
				<?php 
				}
				?> 
                  </td>      
                                    <td><?php echo $ReadDS->created_by; ?></td>
                                    <td><?php echo $ReadDS->created_date; ?></td>
                                    <td><?php echo $ReadDS->updated_by; ?></td>
                                    <td><?php echo $ReadDS->updated_date; ?></td>
                                    <td><?php echo $ReadDS->deleted_by; ?></td>
                                    <td><?php echo $ReadDS->deleted_date; ?></td>
                                    <td><?php echo $ReadDS->is_active; ?></td>

                                    <td>
                                        <a href="<?php echo site_url('Welcome/DataArtikel/' . $ReadDS->id_artikel . '/view') ?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo site_url('Welcome/DeleteDataArtikel/' . $ReadDS->id_artikel) ?>"><i class="fa fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                                                           <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
  
			<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button> -->
	
  <div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Data Artikel</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/AddDataArtikel'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
				<!-- <div class="form-group">
					<label>Kode Image</label>
					<input type="number" name="kd_img" class="form-control" placeholder="Masukan Kode Image" required>
				</div> -->
				<div class="form-group">
					<label>Judul Artikel</label>
					<input type="text" name="judul_artikel" class="form-control" placeholder="Masukan Judul Artikel" required>
                </div>
                <div class="box-body pad">
              		<label>Deskripsi Artikel</label>
                    <textarea id="editor1" name="desc_artikel" rows="10" cols="80">
                                            
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
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file[]" multiple="multiple"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>

                <input type="hidden" name="is_active" class="form-control" value="1">
                <input type="hidden" name="created_by" class="form-control"  required>
					<input type="hidden" name="created_date" class="form-control"  required>
					
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

                </div>
              </div>
