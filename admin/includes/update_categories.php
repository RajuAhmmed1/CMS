 <form action="" method="post">
                             <div class="form-group">
                                 <label for="cat-title">Update Category</label>
                
                        <?php 
                         
                            if(isset($_GET['edit']))
                            {
                                $cat_title_edit=$_GET['edit'];
                                $query="select * from categories WHERE cat_id=$cat_title_edit";
                                $cat_update_query=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($cat_update_query))
                                {
                                    $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                     ?>
                         
                            <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" class="form-control" name="cat_title">
                               <?php }} ?>
                                 
                                 
                                 
                                <?php 
                                 
                                    if(isset($_POST['update']))
                                    {
                                        $cat_title=$_POST['cat_title'];
                                        $query="UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id={$cat_id}";
                                        $update_query=mysqli_query($connection,$query);
                                        header("Location:categories.php");
                                        
                                    }
                                 
                                 
                                 ?>
                                 
                             </div>
                             
                             <div class="form-group">
                                 <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                             </div>
                        
                        </form>