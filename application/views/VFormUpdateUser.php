<form action="<?php echo site_url('Welcome/UpdateDataUser'); ?>" method="post" enctype="multipart/form-data">
<!-- Staff -->
  <!-- Username -->
                <div class="form-group">
                  <label>Username</label>
                  <input type="hidden" name="kd_user" value="<?php echo $detail['kd_user']; ?>" class="form-control">
                  <input type="text" class="form-control" name="username" value="<?php echo $detail['username']; ?>" placeholder="Username">
                </div> 
  <!-- Password -->
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" value="<?php echo $detail['password']; ?>" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
          <label>Akses Level</label>
          <div class="radio">
            <label>
              <input type="radio" value="User" name="acc_lvl" id="optionsRadios1" required 
              <?php if($detail['acc_lvl'] == "User"){ echo 'checked'; } ?>>
              User
            </label>
            <label>
              <input type="radio" value="Admin" name="acc_lvl" id="optionsRadios1" required <?php if($detail['acc_lvl'] == "Admin"){ echo 'checked'; } ?>>
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
                <img src="<?php echo base_url('upload/'). $detail['foto']; ?>" width="200px" height="200px" style="border-radius: 100%;"><br>
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="userfile"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>