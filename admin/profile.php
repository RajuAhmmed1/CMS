<?php ob_start();?>
<?php include "includes/admin_header.php";?>
<?php include "functions.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                           <h1 class="page-header">
                           Welcome to Admin
                            <small><?php echo  $_SESSION['user_role'];?></small>
                            
                          </h1>
                        
                        <?php
                        
                        if(isset($_SESSION['user_firstname']))
                        {
                            $username=$_SESSION['user_firstname'];
                            $query="select * from users WHERE user_firstname='$username'";
                            $profile_query=mysqli_query($connection,$query);
                            
                            if(!$profile_query)
                            {
                                die("failed".mysqli_error($connection));
                            }
                            
                            while($row=mysqli_fetch_assoc($profile_query))
                            {
                                $user_id=$row['user_id'];
                                $username=$row['username'];
                                $user_password=$row['user_password'];
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname'];
                                $user_email=$row['user_email'];
                                $user_image=$row['user_image'];
                                $user_role=$row['user_role'];
                                
                                echo "<img src='../images/$user_image' alt='image' width='100'>"."</br>";
                                echo "Username: ". $username."</br>";
                                echo "User Firstname: ".$user_firstname."</br>";
                                echo "User Lastname: ".$user_lastname."</br>";
                                echo $user_email."</br>";
                                echo $user_password."</br>";

                                echo " <a href='users.php?source=edit_users&user_id={$user_id}'>Edit</a>";
                            }
                        }


                        ?>

     
                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
            
            
            
            
            
            
        <!-- /#page-wrapper -->

   <?php include"includes/admin_footer.php";?>