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
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username">
                </div> 
  <!-- Password -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                          <label>Akses Level</label>
                          <div class="radio">
                            <label>
                              <input type="radio" value="User" name="acc_lvl" id="optionsRadios1" required>
                              User
                            </label>
                            <label>
                              <input type="radio" value="Admin" name="acc_lvl" id="optionsRadios1" required>
                              Admin
                            </label>
                  </div>
                </div>   
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