<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Data Kategori</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="<?php echo site_url('Welcome/UpdateDataKategori'); ?>" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="hidden" name="kd_kategori" class="form-control" value="<?php echo $detail['kd_kategori']; ?>">
                        <input type="text" name="nama_kategori" value="<?php echo $detail['nama_kategori']; ?>" class="form-control" placeholder="Nama Kategori" required>
                    </div>



                </div>
                <input type="submit" name="btn_simpan" value="Simpan">
        </form>
    </div>
</div>