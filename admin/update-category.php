<?php 
    include "header.php"; 
    if($_SESSION['user_role']==0){
        header('location:post.php');
    } 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php
                            include "config.php";
                            $id=$_GET['id'];
                            $query="SELECT category_name FROM category WHERE category_id={$id}";
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0){
                ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                  <?php while($row=mysqli_fetch_assoc($result)){ ?>
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="1" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                      <?php 
                            if(isset($_POST['submit'])){
                                $cname=$_POST['cat_name'];
                                $query1="UPDATE category SET category_name='$cname' WHERE category_id={$id}";
                                if(mysqli_query($conn,$query1)){
                                    header('location:category.php');
                                } else{
                                    echo "<p style='color:red; margin:10px 0;'>Updation Failed!</p>";
                                }
                            }
                        } 
                        ?>
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
