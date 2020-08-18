<form action="<?php echo site_url('Welcome/AddDataUser'); ?>" method="post" enctype="multipart/form-data">
<!-- Staff -->
            <!--     <div class="form-group">
          <label>Pegawai</label>
          <select class="form-control" name="kd_pegawai" required>
            <option selected disabled>Pilih Pegawai</option>
            <?php
              foreach($staff as $ReadDS){
            ?>
            <option value="<?php echo $ReadDS->kd_staff; ?>"><?php echo $ReadDS->kd_staff; ?></option>
            <?php
              }
            ?>
                  </select>
                </div> --> 
  <!-- Username -->
                <div class="form-group">
                  <label>Email User</label>
                  <input type="email" class="form-control" name="email_user" placeholder="Masukan Email">
                </div> 
  <!-- Password -->
                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama User">
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Masukan Password">
                </div>
                
              
             
                <input type="hidden" name="created_by" class="form-control">
                <input type="hidden" name="created_date" class="form-control">
                <input type="hidden" name="is_active" class="form-control" value="1">
   <!-- Status_user -->
                <!-- <div class="form-group">
                  <label>Status User</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="st_user" id="optionsRadios1" value="publish" checked>
                      Publish
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="st_user" id="optionsRadios2" value="unpublish ">
                      Unpublish
                    </label>
                  </div>
                </div> -->
  
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="userfile"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>