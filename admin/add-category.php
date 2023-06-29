<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <?php
                        if(isset($_POST['save'])){
                            include "config.php";
                            $cname=$_POST['cat'];
                            $query="SELECT * FROM category WHERE category_name='{$cname}'";
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0){
                                $query1="UPDATE category SET post=post+1 WHERE category_name='{$cname}'";
                                if(mysqli_query($conn,$query1)){
                                    header('location:category.php');
                                }else{
                                    echo "<p style='color:red; margin:10px 0'>Post Failed to Upload!</p>";
                                }
                            }else{
                                $postval=1;
                                $query2="INSERT INTO category(category_name,post) VALUES('$cname',$postval)";
                                if(mysqli_query($conn,$query2)){
                                    header('location:category.php');
                                }else{
                                    echo "<p style='color:red; margin:10px 0'>Post Failed to Upload!</p>";
                                }
                            }
                        }
                    ?>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
