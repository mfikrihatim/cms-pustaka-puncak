<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Update Data Customer</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<form action="<?php echo site_url('Welcome/UpdateDataCustomer'); ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
			<div class="form-group">
					<label>Email Customer</label>
					<input type="hidden" name="id_customer" class="form-control" value="<?php echo $detail['id_customer']; ?>"  required>
 
					<input type="email" name="email_customer" class="form-control" value="<?php echo $detail['email_customer']; ?>" placeholder="Masukan Email" required>
        </div>
       <div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $detail['nama']; ?>" placeholder="Masukan Nama Anda" required>
        </div>
        <div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?php echo $detail['password']; ?>"  placeholder="Masukan password" required>
        </div>
        <div class="form-group">
					<label>Telfon Customer</label>
					<input type="number" name="tlp_customer" class="form-control" value="<?php echo $detail['tlp_customer']; ?>" placeholder="Masukan no Telfon" required>
				</div>
				<div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
				
					
          
			</div>
			<input type="submit" name="btn_simpan" value="Simpan">
		</form>
	</div>
</div>
      </div>
