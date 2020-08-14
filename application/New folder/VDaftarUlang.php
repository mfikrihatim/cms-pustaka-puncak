<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddDaftarUlang'); ?>"><div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-plus"></i></div></a></h3>

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
                  <th>Kode Daftar Ulang</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Wali Kelas</th>
                  <th>Tahun Angkatan</th>
                  <th>Tahun Ajaran</th>
                  <th>Tanggal Perwalian</th>
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataDaftarUlang))
	{
		foreach($DataDaftarUlang as $ReadDS)
		{
	?>
      <tr>
          <td><?php echo $ReadDS->kd_daftar_ulang; ?></td>
          <td><?php echo $ReadDS->nama_siswa; ?></td>
          <td><?php echo $ReadDS->kelas. ' '. $ReadDS->jurusan; ?></td>
          <td><?php echo $ReadDS->nama_pegawai; ?></td>
          <td><?php echo $ReadDS->thn_angkatan; ?></td>
          <td><?php echo $ReadDS->thn_ajaran; ?></td>
          <td><?php echo $ReadDS->tgl_perwalian; ?></td>
           <!-- <td ><img width="50px" height="50px" src="<?php echo base_url('upload/'). $ReadDS->foto_user; ?>"></td> -->
					<td>
					<a href="<?php echo site_url('Welcome/DataDaftarUlang/'.$ReadDS->kd_daftar_ulang.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataDaftarUlang/'.$ReadDS->kd_daftar_ulang) ?>"><i class="fa fa-fw fa-trash"></i></a>
					</td>
      </tr>
                <?php		
		}
	}
	?>
              </table>
            </div>