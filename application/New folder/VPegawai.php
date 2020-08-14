<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?php echo site_url('Welcome/VFormAddPegawai'); ?>"><div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-plus"></i></div></a></h3>

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
                  <th>Kode Pegawai</th>
                  <th>NIK</th>
                  <th>Nama Pegawai</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>FotTanggal Lahir</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Status NIkah</th>
                  <th>Pndidikan Terakhir</th>
                  <th>Pangkat</th>
                  <th>Foto Pegawai</th>
                  <th>Tools</th>
                </tr>
                <?php
	if(!empty($DataPegawai))
	{
		foreach($DataPegawai as $ReadDS)
		{
	?>
      <tr>
          <td><?php echo $ReadDS->kd_pegawai; ?></td>
          <td><?php echo $ReadDS->nik; ?></td>
					<td><?php echo $ReadDS->nama_pegawai; ?></td>
					<td><?php echo $ReadDS->jk; ?></td>
          <td><?php echo $ReadDS->tmpt_lahir; ?></td>
          <td><?php echo $ReadDS->tgl_lahir; ?></td>
          <td><?php echo $ReadDS->agama; ?></td>
          <td><?php echo $ReadDS->alamat; ?></td>
          <td><?php echo $ReadDS->status_nikah; ?></td>
          <td><?php echo $ReadDS->pend_akhir; ?></td>
          <td><?php echo $ReadDS->pangkat; ?></td>
          
           <td ><img width="50px" height="50px" src="<?php echo base_url('upload/pegawai/'). $ReadDS->foto_pegawai; ?>"></td>
					<td>
					<a href="<?php echo site_url('Welcome/DataPegawai/'.$ReadDS->kd_pegawai.'/view') ?>"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Welcome/DeleteDataPegawai/'.$ReadDS->kd_pegawai) ?>"><i class="fa fa-fw fa-trash"></i></a>
					</td>
      </tr>
                <?php		
		}
	}
	?>
              </table>
            </div>