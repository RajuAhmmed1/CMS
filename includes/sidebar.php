

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input  name="search" type="text" class="form-control">
                        
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                        </form> <!-- search form-->
                    <!-- /.input-group -->
                </div>

        <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                        <span><?php if(isset($error)){echo $error;}?></span>
                  <div class="form-group">
                        <input  name="username" type="text" class="form-control" placeholder="Enter Username">
                    </div>
                        
                    <div class="input-group">
                        <input  name="password" type="text" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="login">submit
                        
                        </button>
                        </span>
                    </div>
                        </form> <!-- search form-->
                    <!-- /.input-group -->
                </div>


                <!-- Blog Categories Well -->   
<div class="well">
                    <h4>Blog Categories</h4>
    <?php
    
    $query="select * from categories";
    $sidebar_query=mysqli_query($connection,$query);
    
    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               <?php 
                                while($row=mysqli_fetch_assoc($sidebar_query))
                                {
                                    
                                    $cat_title=$row['cat_title'];
                                    $cat_id=$row['cat_id'];
                                    echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                                }
                                ?>
                                
                            </ul>
                        </div>
                 
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              <?php include "widget.php";?>

            </div>