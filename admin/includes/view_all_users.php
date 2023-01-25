  <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                         <th>Id</th>
                         <th>Username</th>
                         <th>Password</th>
                         <th>Firsname</th>
                         <th>Lastname</th>
                         <th>Email</th>
                         <th>Image</th>
                         <th>Role</th>
                  
                         <th>Change to Admin</th>
                         <th>Change to Subscriber</th>
                         <th>Action</th>
                    </tr>

                </thead>
               

                <tbody>
                    
                <?php
                
                $query="select * from users";
                $select_posts=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($select_posts))
                {
                    $user_id=$row['user_id'];
                    $username=$row['username'];
                    $user_password=$row['user_password'];
                    $user_firstname=$row['user_firstname'];
                    $user_lastname=$row['user_lastname'];
                    $user_email=$row['user_email'];
                    $user_image=$row['user_image'];
                    $user_role=$row['user_role'];
       
                    
                   echo "<tr>";
                   echo "<td>$user_id</td>";
                   echo "<td>$username</td>";
                   echo "<td> $user_password</td>";
                   echo "<td>$user_firstname</td>";
                   echo "<td>$user_lastname</td>";
                   echo "<td> $user_email</td>";
                   echo "<td><img src='../images/$user_image' alt='image' width='100'></td>";
                   echo "<td>$user_role</td>";
             
                    
                   
                    
                    echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
                    
                    echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>"; 
                    
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='users.php?delete={$user_id}'>Delete</a>
                    
                    <a href='users.php?source=edit_users&user_id={$user_id}'>Edit</a>            

                    </td>";
                       
                    
                }
                
                
                ?>
                    
            <?php
                    
                    if(isset($_GET['change_to_admin']))
                    {
                        $change_to_admin=$_GET['change_to_admin'];
                        $query="update users set user_role='Admin' where user_id=$change_to_admin";
                        $change_to_admin_query=mysqli_query($connection,$query);
                        header("location: users.php");
                    }
                    
                    
                     if(isset($_GET['change_to_sub']))
                    {
                        $change_to_sub=$_GET['change_to_sub'];
                        $query="update users set user_role='Subscriber' where user_id=$change_to_sub";
                        $change_to_sub_query=mysqli_query($connection,$query);
                         header("location: users.php");
                    }
                    
                    
                    
                    
            ?>


                </tbody>
            </table>

            <?php
                    
                        if(isset($_GET['delete']))
                        {
                            $post_delete_id=$_GET['delete'];
                            
                            $query="delete from users where user_id=$user_id";
                            $delete_post_query=mysqli_query($connection,$query);
                            header("location: users.php");
                            
                        }
                        
                    ?>