<form action="<?php echo site_url('Welcome/UpdateDataUser'); ?>" method="post" enctype="multipart/form-data">
<!-- Staff -->
  <!-- Username -->
  <div class="form-group">
                  <label>Email User</label>
                  <input type="hidden" name="id_user" value="<?php echo $detail['id_user']; ?>" class="form-control">
                  <input type="email" class="form-control" name="email_user" value="<?php echo $detail['email_user']; ?>" placeholder="Masukan Email">
                </div> 
  <!-- Password -->
                <div class="form-group">
                  <label>Nama User</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $detail['nama']; ?>" placeholder="Masukan Nama User">
                </div> 
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="<?php echo $detail['password']; ?>" placeholder="Masukan Password">
                </div>
                
              
             
                <input type="hidden" name="created_by" value="<?php echo $detail['created_by']; ?>" class="form-control">
                <input type="hidden" name="created_date" value="<?php echo $detail['created_date']; ?>" class="form-control">
                <input type="hidden" name="updated_by"  class="form-control">
                <input type="hidden" name="updated_date" class="form-control">
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
                <img src="<?php  echo $detail['foto_profile'];  ?>" width="200px" height="200px" style="border-radius: 100%;"><br>

                
                  <label for="exampleInputFile">File input</label>
                  <input type="file" name="file"/>
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>

  <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>